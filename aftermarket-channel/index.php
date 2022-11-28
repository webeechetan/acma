<?php
session_start();
use formModel\Form;

function textLocalApi1($otp, $number) {
       
        global $response;
        
        $apiKey = urlencode('YjZiYzFjODExNGYwYWNlM2ExOTExMmQ4YjU3MDQyYTI=');
        $sender = urlencode('ACMAIN');//TXTLCL ACMAIN 600010
        $message = rawurlencode("Your One Time Password (OTP) for mobile number verification is $otp- Automotive Component Manufacturers Association of India");
        $data = array('apikey' => $apiKey, 'numbers' => $number, "sender" => $sender, "message" => $message);//, "test" => true
        
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($ch);
        curl_close($ch);
        $resfrom = json_decode($resp);
        // $response['email_otp'] = $resp;
        if($resfrom -> status == 'success'){
            
            $_SESSION['otp'] = [$otp, $number, 1];
            $response['activity'] = "verify";
            response(true, "OTP sent!");
            $response['error_hindi'] = "OTP भेजा गया";
        } else {
            
            $response['activity'] = "failed";
            response(false, "Unable to send otp!");
            $response['error_hindi'] = "OTP भेजने में असमर्थ";
        }
        // return json_decode($response);
        $response["error"] = $resfrom;
        return;
        
    }

if($_SERVER['REQUEST_METHOD'] === "POST"){
    
    require('db.php');
    require('models/index.php');
    /* ========
    Generating an OTP
    ==========*/
    if((!(isset($_SESSION['otp']))) || input($_POST['activity']) === "verify"){
        unset($_SESSION['otp']);
        $OTP = rand(1000, 9999);
        $sendOTP = textLocalApi1($OTP,$_POST['mobile']);
        echo json_encode($response);
        exit();
        
    }
    /* ========
    Validating OTP
    ==========*/
    else if(isset($_SESSION['otp']) && $_POST['otp'] && input($_POST['activity']) === "otpsubmit"){
        
        if($_SESSION['otp'][0] == input($_POST['otp'])){
            
            $_SESSION['otp'][2] = 2;
            $response['activity'] = "otpsubmit";
            response(true, "OTP verified");
            $response['error_hindi'] = "OTP वेरिफाइड";
            echo json_encode($response);
            exit();
            
        } else {
            
            // unset($_SESSION['otp']);
            $response['activity'] = "resend";
            response(false, "Invalid OTP");
            $response['error_hindi'] = "OTP अमान्य";
        }
        
    }
    /* ========
    Submitting the Data
    ==========*/
    if($_SESSION['otp'][2] === 2){
        
        $lang= isset($_POST['lang']) ? input($_POST['lang']) : 'eng';
        $lang = in_array($lang, ["eng", "hin"]) ? $lang : "eng";
        $name= input($_POST['name']);
        $address= input($_POST['address']);
        $city= input($_POST['city']);
        $pincode= input($_POST['pincode']);
        $state= input($_POST['state']);
        $mobile= input($_POST['mobile']);
        $company= input($_POST['company']);
        $email= input($_POST['email']);
        $service= implode(", ", $_POST['service']);
        $service = input($service);
        $segment= implode(", ", $_POST['segment']);
        $segment = input($segment);
        $broad_product_category= implode(" # ", $_POST['broad_product_category']);
        $broad_product_category = input($broad_product_category);
        $otp = input($_POST['otp']);
        if($mobile === $_SESSION['otp'][1]){
            
            $res = new Form($lang, $name, $address, $city, $pincode, $state, $mobile, $company, $email, $service, $segment, $broad_product_category);
            $res -> save() ? response(true, "Successfully updated") : response(false, "Error in submission");
            $response['error_hindi'] = $response['success'] === true ? "अपडेट सफल" : "अपडेट असफल";
            
            unset($_SESSION['otp']);
            $response['data'] = (object)[
                "name" => $name,
                "service" => $service,
                "company" => $company
                ];
        } else {
            
            response(false, "This is not the Verified mobile number");
            $response['error_hindi'] = "यह वेरिफाइड मोबाइल नंबर नहीं है";
            
            unset($_SESSION['otp']);
        }
    } 
    // else {
    //     unset($_SESSION['otp']);
    // }
    
    echo json_encode($response);
}
?>