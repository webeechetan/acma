<?php
namespace formModel;

class Form {
    
    public $type;
    public $name;
    public $address;
    public $city;
    public $pincode;
    public $state;
    public $mobile;
    public $company;
    public $email;
    public $service;
    public $segment;

    
    function __construct($lang, $name, $address, $city, $pincode, $state, $mobile, $company, $email, $service, $segment, $broad_product_category) {
        
        $this -> lang = $lang;
        $this -> name = $name;
        $this -> address = $address;
        $this -> city = $city;
        $this -> pincode = $pincode;
        $this -> state = $state;
        $this -> mobile = $mobile;
        $this -> company = $company;
        $this -> email = $email;
        $this -> service = $service;
        $this -> segment = $segment;
        $this -> broad_product_category = $broad_product_category;
        
    }
    
    /* ========
    Saving Data
    ==========*/
    function save() {
        
        $res = db("insert into after_market_channel_directory (lang, name, address, city, pincode, state, mobile, company, email, service, segment, broad_product_category) values('{$this -> lang}', '{$this -> name}', 
        '{$this -> address}', '{$this -> city}', '{$this -> pincode}', '{$this -> state}', '{$this -> mobile}', '{$this -> company}' ,'{$this -> email}', '{$this -> service}', 
        '{$this -> segment}', '{$this -> broad_product_category}')");
        
        return $res;
        
    }

    /* ========
    Generating an OTP through TextLocalApi
    ==========*/
    static function textLocalApi($otp, $number) {
       
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
    
    /* ========
    Send Email OTP
    ==========*/
    static function sendMail($otp, $email) {
        global $response;
        
        $to = $email;
        $subject = "One Time Password";
        $txt = "<span style='font-weight:bold;'>Your OTP is <span>";
        $txt .= "<span> {$otp}<span>";

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From:  acma@acma.in" . "\r\n";
        $headers .= "Return-Path: acma@acma.in\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "Organization: https://www.acma.in/\r\n";
        
        if(mail($to,$subject,$txt,$headers)){
            
            $_SESSION['otp'] = [$otp, $email, 1];
            $response['activity'] = "verify";
            response(true, "OTP sent!");
            
        } else {
            
            $response['activity'] = "failed";
            response(false, "unable to sent otp!");
            
        }
        
        return;
        
    }
    
}
?>