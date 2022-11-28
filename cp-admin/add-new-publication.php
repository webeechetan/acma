<?php include("header.php");
include("PushNotifications.php");

$conn=mysqli_connect("localhost","techtonic","d#4ab01db3!bT","acma_web");
    // Check connection
     if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
   if(isset($_POST['action'])){
      
      $event_name= $_POST['event_name'];
      $title= $_POST['title'];
     $doc_disc= $_POST['doc_disc'];
      $attachment= $_FILES['attachment']['name'];
      $doc_img= $_FILES['doc_img']['name'];
      //for annual report
      if($event_name=="Annual-Report"){
      $row = move_uploaded_file($_FILES["attachment"]["tmp_name"],"../uploads/publication/annual-report/".$attachment);

      
      $row1 = move_uploaded_file($_FILES["doc_img"]["tmp_name"],"../uploads/publication/annual-report/".$doc_img);
      }
      //for auto-news
      elseif($event_name=="Auto-News"){
      $row = move_uploaded_file($_FILES["attachment"]["tmp_name"],"../uploads/publication/auto-news/".$attachment);

      
      $row1 = move_uploaded_file($_FILES["doc_img"]["tmp_name"],"../uploads/publication/auto-news/".$doc_img);
      }
      //for IMPACT
      elseif($event_name=="IMPACT"){
      $row = move_uploaded_file($_FILES["attachment"]["tmp_name"],"../uploads/publication/impact/".$attachment);

      
      $row1 = move_uploaded_file($_FILES["doc_img"]["tmp_name"],"../uploads/publication/impact/".$doc_img);
      }
      //for Reaserch-studies
      elseif($event_name=="Reaserch-Studies"){
      $row = move_uploaded_file($_FILES["attachment"]["tmp_name"],"../uploads/publication/research-studies/".$attachment);

      
      $row1 = move_uploaded_file($_FILES["doc_img"]["tmp_name"],"../uploads/publication/research-studies/".$doc_img);
      }
      // for saksham-samvad
       elseif($event_name=="Saksham-Samvad"){
      $row = move_uploaded_file($_FILES["attachment"]["tmp_name"],"../uploads/publication/saksham-samvad/".$attachment);

      
      $row1 = move_uploaded_file($_FILES["doc_img"]["tmp_name"],"../uploads/publication/saksham-samvad/".$doc_img);
       }
      
    $sql="INSERT INTO publications (doc_title,event_name,doc_disc,attachment,doc_img) VALUES('$event_name','$title','$doc_disc','$attachment','$doc_img')";
    
    $sql1="INSERT INTO send_notifications (title , event_name) VALUES('publication','$event_name')";
    
	//  here notification code will be written there only ....
	$notification_for_member = '1';
	$notification_for_guest  = '0';
	
	
     $device_token    =  $row_data['fcm_id'];;
     $fields          =  ["title" => "new Publications $event_name", "body" => "Tap to view more details", "click_action" => "FLUTTER_NOTIFICATION_CLICK", "isPublication" => '', "isEvent"=>'', "isnotify" => true];
     $response        =  PushNotifications::sendPushNotification( $fields, $notification_for_member, $notification_for_guest);
    //  print_r($response); 

    if(mysqli_query($conn,$sql)){?>
        <div class="alert alert-primary" role="alert">
  Document uploaded successfully!
</div>

   <?php }else{
       echo"".mysqli_error($conn);
        
    }
    
        if(mysqli_query($conn,$sql1)){?>

   <?php }else{
       echo"".mysqli_error($conn);
        
    }
}
      
      
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Publication</h3>
            </div>
            <div class="widget-content">
            <form name="frm" method="post" enctype="multipart/form-data">
			<table cellpadding="0" cellspacing="0" width="100%">
			    
				<tr>
					<td width="200">Publication Name</td>
					<td>
                        <select name="event_name" id="" required>
                            <option value="0">Select Name</option>
                            <option value="Auto-News">Auto-News</option>
                            <option value="IMPACT">IMPACT</option>
                            <option value="Annual-Report">Annual-Report</option>
                            <option value="Reaserch-Studies">Reaserch-Studies</option>
                            <option value="Saksham-Samvad">Saksham-Samvad</option>
                        </select>

                    </td>
                </tr>
                <tr>
					<td width="200">Document Title</td>
					<td><input type="text" name="title" required></td>
                </tr>
                <tr>
					<td width="200">Document Description</td>
					<td><textarea name="doc_disc" id="" cols="30" rows="10"></textarea></td>
				</tr>
				<tr>
					<td width="200">Document Upload</td>
					<td><input type="file" name="attachment" required></td>
				</tr>
					<tr>
					<td width="200">Document Image (Optional)</td>
					<td><input type="file" name="doc_img"></td>
				</tr>
				       	
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="action" value="Submit"> <input type="reset" value="Cancel"></td>
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