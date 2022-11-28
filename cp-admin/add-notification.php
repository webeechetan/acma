<?php include("header.php");
include("PushNotifications.php");

$conn=mysqli_connect("localhost","techtonic","d#4ab01db3!bT","acma_web");
if(isset($_POST['action'])){
    
     $status=$_POST['status'];
      $notification=$_POST['notification'];
     $title=$_POST['title'];
     
      
    
      date_default_timezone_set('Asia/Kolkata');
          $uploaddate = date('Y-d-m h:i:s A', time());
   
     $query="INSERT INTO notifications(status,notification,text,created_at) VALUES('$status','$notification','$title','$uploaddate')";
     
     	//  here notification code will be written there only ....
	
	
     $device_token    =  $row_data['fcm_id'];
     $fields          =  ["title" => "new Notification$notification  ", "body" => "Tap to view more details", "click_action" => "FLUTTER_NOTIFICATION_CLICK",  "isPublication" => '' , "isnotify" => true, "isEvent"=>''];
     $response        =  PushNotifications::sendPushNotification( $fields);
    
     if(mysqli_query($conn, $query)){
         
     header("location:acma-notification.php");
       
          }else{
             
             echo"errr".mysqli_error($conn);
              
          }
      }
      
?>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/7.19.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="/__/firebase/7.19.1/firebase-analytics.js"></script>

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> New Notification</h3>
            </div>
            <div class="widget-content">
            <form name="frm" method="post" enctype="multipart/form-data">
			<table cellpadding="0" cellspacing="0" width="100%">
			     <tr>
					<td width="200">Message For</td>
						<td>
                        <select name="status">
                            <option value="">--Select For--</option>
                            <option value="0">Member</option>
                            <option value="1">Public</option>
                           
                            
                        </select>

                    </td>
					    
				</tr>
			    	<tr>
					<td width="200">Type</td>
					<td><input type="text" name="notification"></td>
                </tr>
			   
				<!--<tr>-->
				<!--	<td width="200">Upload Date</td>-->
				<!--	<td>-->
    <!--                    <input type="date" name="uploaddate">-->
    <!--                </td>-->
				<!--</tr>-->
			
                 <tr>
					<td width="200">Notification Message</td>
					<td><textarea name="title" id="" cols="2" rows="4"></textarea>
					    
				</tr>
				
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="action" value="Submit"></td>
				</tr>
			  </table></form>
			  </div>  
          </div>    
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<?php include("footer.php");?>