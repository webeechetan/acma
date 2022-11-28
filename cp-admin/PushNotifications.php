<?php

class PushNotifications {
 
    private static $URL  = "https://fcm.googleapis.com/fcm/send";  
     
    private static $API_ACCESS_KEY = 'AAAAvNS5Cho:APA91bE5AYwB5Z3QRFZnUVlzyhddVM_ExvWLmSXld0lvLXBQ-F5vTTJk1d4UEkumiJpp_fMvo8ZAOXvq2EKggWuNCJLjebBMVIRjb7I8aepsBE14ds40PYiPhswJIT3bkwIFrDsdT1No';
     
    public function __construct() {
     
    }
     
    public static function sendPushNotification($fields = array(), $notification_for_member, $notification_for_guest)
     {
                    $registrationIds = array();
                    $conn=mysqli_connect("localhost","techtonic","d#4ab01db3!bT","acma_web");
                    
                   
                  
                  if(! $conn ){
                    die('Could not connect: ' .mysqli_connect_error());
                   }
 
                // Attempt select query execution
                  
                  $sql   = "SELECT * FROM memberlogin";
                  
                  $guest = "SELECT * FROM guests";
          
                if($result = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result) > 0 && $notification_for_member == '1'){
                        
                        while($row = mysqli_fetch_array($result)){
                            if($row['fcm_id']){
                             array_push($registrationIds, $row['fcm_id']);
                        }
                        }
                        mysqli_free_result($result);
                    } else{
                        echo "No records matching your query were found.";
                    }
              
                  } elseif($notification_for_guest == '1' && $result_data = mysqli_query($conn, $guest)){
                    if(mysqli_num_rows($result_data) > 0){
                        
                        while($row_data = mysqli_fetch_array($result_data)){
                            if($row_data['fcm_id']){
                             array_push($registrationIds, $row_data['fcm_id']);
                        }
                        }
                        mysqli_free_result($result_data);
                    } else{
                        echo "No records matching your query were found.";
                    }
                } 
                else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
                    
            
                // array_push($registrationIds, $token);
     
                $msg     = array('body' => $fields['body'], 'title'  => $fields['title']);
                
                $data    = array('click_action' => $fields['click_action'], 'isEvent' => $fields['isEvent'], 'isPublication' => $fields['isPublication'], 'isnotify' => $fields['isnotify']);
     
                $fields  = array('registration_ids' => $registrationIds, 'notification' => $msg, 'data' => $data);
     
                $headers = array('Authorization: key=' . self::$API_ACCESS_KEY, 'Content-Type: application/json');
     
                #Send Reponse To FireBase Server    
                $ch = curl_init(); 
                curl_setopt($ch,CURLOPT_URL, self::$URL);
                curl_setopt($ch,CURLOPT_POST, true);
                curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
                
                 $title =$_POST['title'];
                    $text  =$_POST['text'];
                    
                    $qy = "insert into send_notifications(title,text) values ('$title', '$text')";
                    mysqli_query($con, $qy);
                $result = curl_exec($ch);
                curl_close($ch);
                return $result;
     }
      





    }



    // $device_token    =  "f6nltYd7STKKqwe6-L0X65:APA91bHTHD6YmBlsXiWsIeEQVRK3ITjccgwvivQ0Vt87utBWZJ_VesRFpSwzGU21LirFwvwuSbyu-vp9KuZ_ff1W9OcPlqq0S6mo8jj01e44drxlkqWJV2rCJ-kcRM0mCorMQhjI9XYw";
    // $fields          =  ["title" => "message title", "body" => "message text"];
    // $response        =  PushNotifications::sendPushNotification( $fields);
    // print_r($response);  