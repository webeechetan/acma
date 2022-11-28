<?php include("header.php");
      include("PushNotifications.php");
      
      $conn=mysqli_connect("localhost","techtonic","d#4ab01db3!bT","acma_web");
    // Check connection
     if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
   if(isset($_POST['title'])){
      
      $title= $_POST['title'];
      $region= $_POST['region'];
      
    $sql1="INSERT INTO send_notifications (title,event_name) VALUES('circular' ,'$title')";
    
    
        if(mysqli_query($conn,$sql1)){?>

   <?php }else{
       echo"".mysqli_error($conn);
        
    }
}

if(isset($_POST['circuler_no'])){
	
	$circuler_no = $_POST['circuler_no'];	
	$title = addslashes($_POST['title']);
    $region = $_POST['region'];
    $daycirculer = $_POST['daycirculer'];	
	$circuler = addslashes($_POST['circuler']);
    $keyword = addslashes($_POST['keyword']);
	$monthcirculer = $_POST['monthcirculer'];
    $yearcirculer = $_POST['yearcirculer'];
	
    $circulers = new App\Models\CirculersTable();
	$circulers->circuler_no = $circuler_no;
	$circulers->title = $title;
    $circulers->region = $region;
    $circulers->daycirculer = $daycirculer;
    $circulers->monthcirculer = $monthcirculer;
    $circulers->yearcirculer = $yearcirculer;
    $circulers->circuler = $circuler;
    $circulers->keyword = $keyword;
	$circulers->save();
	
	
	
	$notification_for_member = '1';
	$notification_for_guest  = '0';
	
	//  here notification code will be written there only ....
	
	     $device_token    =  $row_data['fcm_id'];
         $fields          =  ["title" => "new Circular $title", "body" => "Tap to view more details", "click_action" => "FLUTTER_NOTIFICATION_CLICK", "isPublication" => '', "isEvent"=>'', "isnotify" => true];
         $response        =  PushNotifications::sendPushNotification($fields, $notification_for_member, $notification_for_guest);

     //print_r($response); 


	$target = FS_UPLOADS_PATH.'/ciculer-attachement/';
	
	if(isset($_FILES['attachement'])){
	
      	if(copy($_FILES['attachement']['tmp_name'],$target.basename($_FILES['attachement']['name']) )) 
		{
			$attach = basename($_FILES['attachement']['name']);
			$circulers->attachement=$attach ;
		}	

	}
	
	if(isset($_FILES['attachement2'])){
      
		if(copy($_FILES['attachement2']['tmp_name'],$target.basename($_FILES['attachement2']['name']) )) 
		{
			$attach2 = basename($_FILES['attachement2']['name']);
			$circulers->attachement2=$attach2 ;
		}	

	}
	if(isset($_FILES['attachement3'])){
      
		if(copy($_FILES['attachement3']['tmp_name'],$target.basename($_FILES['attachement3']['name']) )) 
		{
			$attach3 = basename($_FILES['attachement3']['name']);
			$circulers->attachement3=$attach3 ;
		}	

	}
	if(isset($_FILES['attachement4'])){
      
		if(copy($_FILES['attachement4']['tmp_name'],$target.basename($_FILES['attachement4']['name']) )) 
		{
			$attach4 = basename($_FILES['attachement4']['name']);
			$circulers->attachement4=$attach4 ;
		}	

	}
	if(isset($_FILES['attachement5'])){
      
		if(copy($_FILES['attachement5']['tmp_name'],$target.basename($_FILES['attachement5']['name']) )) 
		{
			$attach5 = basename($_FILES['attachement5']['name']);
			$circulers->attachement5=$attach5 ;
		}	

	}
	if(isset($_FILES['attachement6'])){
      
		if(copy($_FILES['attachement6']['tmp_name'],$target.basename($_FILES['attachement6']['name']) )) 
		{
			$attach6 = basename($_FILES['attachement6']['name']);
			$circulers->attachement6=$attach6 ;
		}	

	}
	if(isset($_FILES['attachement7'])){
      
		if(copy($_FILES['attachement7']['tmp_name'],$target.basename($_FILES['attachement7']['name']) )) 
		{
			$attach7 = basename($_FILES['attachement7']['name']);
			$circulers->attachement7=$attach7 ;
		}	

	}
	if(isset($_FILES['attachement8'])){
      
		if(copy($_FILES['attachement8']['tmp_name'],$target.basename($_FILES['attachement8']['name']) )) 
		{
			$attach8 = basename($_FILES['attachement8']['name']);
			$circulers->attachement8=$attach8 ;
		}	

	}
	if(isset($_FILES['attachement9'])){
      
		if(copy($_FILES['attachement9']['tmp_name'],$target.basename($_FILES['attachement9']['name']) )) 
		{
			$attach9 = basename($_FILES['attachement9']['name']);
			$circulers->attachement9=$attach9 ;
		}	

	}
	if(isset($_FILES['attachement10'])){
      
		if(copy($_FILES['attachement10']['tmp_name'],$target.basename($_FILES['attachement10']['name']) )) 
		{
			$attach10 = basename($_FILES['attachement10']['name']);
			$circulers->attachement10=$attach10 ;
		}	

	}

	$attachments = []; 

	foreach($_FILES['attachements']['tmp_name'] as $key => $val){
		$file_name=$_FILES["attachements"]["name"][$key];
		$file_tmp=$_FILES["attachements"]["tmp_name"][$key];
		move_uploaded_file($file_tmp,"/var/www/html/acma.in/uploads/ciculer-attachement/".$file_name);
		$attachments[] = $file_name; 
	}
 
	$circulers->attachments = implode(",",$attachments);

	$circulers->save();	

	header( 'location:all-circulers.php?msg=add' );	
	exit;
}
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> New Circular</h3>
            </div>
            <div class="widget-content">
            <form name="frm" method="post" enctype="multipart/form-data">
			<table cellpadding="0" cellspacing="0" width="100%">
			    <tr>
					<td width="200">Circular No.</td>
					<td><input type="text" name="circuler_no" name=""></td>
				</tr>
				<tr>
					<td width="200">Title</td>
					<td><input type="text" name="title" name=""></td>
				</tr>
                <tr>
					<td width="200">Category</td>
					<td><select name="region">
                              <option value="all">All Category</option>
                              <option>CMVR Regulations</option>
                              <option>Eastern Region</option>
                              <option>Executive Committee</option>
                              <option>Government Policy Matters</option>
                              <option>Knowledge Partner Reports/ Industry Statistics</option>
                              <option>National Events
                              <option>Northern Region</option>
                              <option>Overseas Events</option>
                              <option>Southern Region</option>
                              <option>Steering Committee</option>
                              <option>Western Region</option>
                          </select></td>
				</tr>
				<tr>
					<td width="200">Date of Circular</td>
					<td>
					    <select name="daycirculer" style="width:100px;">
                            <option>Day</option>
                            <?php
                            for ($x = 1; $x <= 31; $x++) {
                                ?>
                                <option value="<?php echo $x;?>"><?php echo $x;?></option>
                                <?php
                            }
                            ?>
                            <option value="1">1</option>            
                        </select>
                        <select name="monthcirculer" style="width:100px;">
                            <option>Month</option>              
                            <?php
                            for ($y = 1; $y <= 12; $y++) {
                                ?>
                                <option value="<?php echo $y;?>"><?php echo $y;?></option>
                                <?php
                            }
                            ?>          
                        </select>
                        <select name="yearcirculer" style="width:100px;">
                            <option>Year</option>              
                            <?php
                            for ($z = 1999; $z <= date("Y"); $z++) {
                                ?>
                                <option value="<?php echo $z;?>"><?php echo $z;?></option>
                                <?php
                            }
                            ?>            
                        </select>
                    </td>
				</tr>
				<tr>
					<td width="200">Circular</td>
					<td><textarea name="circuler" rows="15" style="width: 100%" ></textarea></td>
				</tr>
				<tr>
					<td width="200">Keywords</td>
					<td><input type="text" name="keyword" name=""></td>
				</tr>
				<tr>
					<td width="200">Attach</td>
					<td><input type="file" name="attachements[]" multiple> Only : PDF, DOC</td>
				</tr>
				<!-- <tr>
					<td width="200">Attach 2</td>
					<td><input type="file" name="attachement2" name=""> Only : PDF, DOC</td>
				</tr>
				<tr>
					<td width="200">Attach 3</td>
					<td><input type="file" name="attachement3" name=""> Only : PDF, DOC</td>
				</tr>
				<tr>
					<td width="200">Attach 4</td>
					<td><input type="file" name="attachement4" name=""> Only : PDF, DOC</td>
				</tr>
				<tr>
					<td width="200">Attach 5</td>
					<td><input type="file" name="attachement5" name=""> Only : PDF, DOC</td>
				</tr>
				<tr>
					<td width="200">Attach 6</td>
					<td><input type="file" name="attachement6" name=""> Only : PDF, DOC</td>
				</tr>
				<tr>
					<td width="200">Attach 7</td>
					<td><input type="file" name="attachement7" name=""> Only : PDF, DOC</td>
				</tr>
				<tr>
					<td width="200">Attach 8</td>
					<td><input type="file" name="attachement8" name=""> Only : PDF, DOC</td>
				</tr><tr>
					<td width="200">Attach 9</td>
					<td><input type="file" name="attachement9" name=""> Only : PDF, DOC</td>
				</tr>
				<tr>
					<td width="200">Attach 10</td>
					<td><input type="file" name="attachement10" name=""> Only : PDF, DOC</td>
				</tr> -->
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