<?php

    function textLocalApi1($otp, $number) {
        
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
        echo "<pre>";
        print_r($resfrom);
        // $response['email_otp'] = $resp;
        if($resfrom -> status == 'success'){
            echo "sended";
           
        } else {
           echo "error";
        }
       
        
    }
    
    textLocalApi1('4454','9753591245');
?>