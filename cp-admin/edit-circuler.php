<?php include("header.php");

if(isset($_POST['circuler_no'])){
	$postid = $_POST['postid'];
	$circuler_no = $_POST['circuler_no'];	
	$title = addslashes($_POST['title']);
    $region = $_POST['region'];
    $daycirculer = $_POST['daycirculer'];	
	$circuler = $_POST['circuler'];
    $keyword = addslashes($_POST['keyword']);
	$monthcirculer = $_POST['monthcirculer'];
    $yearcirculer = $_POST['yearcirculer'];
	
    $circulers = App\Models\CirculersTable::find($postid);
	$circulers->circuler_no = $circuler_no;
	$circulers->title = $title;
    $circulers->region = $region;
    $circulers->daycirculer = $daycirculer;
    $circulers->monthcirculer = $monthcirculer;
    $circulers->yearcirculer = $yearcirculer;
    $circulers->circuler = $circuler;
    $circulers->keyword = $keyword;
	$circulers->save();

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
	$circulers->save();	

	header( 'location:all-circulers.php?msg=update' );	
	exit;
}
$circuler = App\Models\CirculersTable::find((int)$_GET['id']);
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Edit Curculer</h3>
            </div>
            <div class="widget-content">
            <form name="frm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="postid" value="<?php echo $_GET['id'];?>" />
			<table cellpadding="0" cellspacing="0" width="100%">
			    <tr>
					<td width="200">Circular No.</td>
					<td><input type="text" name="circuler_no" value="<?php echo $circuler->circuler_no;?>"></td>
				</tr>
				<tr>
					<td width="200">Title</td>
					<td><input type="text" name="title"  value="<?php echo $circuler->title;?>"></td>
				</tr>
                <tr>
					<td width="200">Category</td>
					<td><select name="region">
                              <option value="all">All Category</option>
                              <option <?php if($circuler->region == "CMVR Regulations"){ echo "Selected";}?>>CMVR Regulations</option>
                              <option <?php if($circuler->region == "Eastern Region"){ echo "Selected";}?>>Eastern Region</option>
                              <option <?php if($circuler->region == "Executive Committee"){ echo "Selected";}?>>Executive Committee</option>
                              <option <?php if($circuler->region == "Government Policy Matters"){ echo "Selected";}?>>Government Policy Matters</option>
                              <option <?php if($circuler->region == "Knowledge Partner Reports/ Industry Statistics"){ echo "Selected";}?>>Knowledge Partner Reports/ Industry Statistics</option>
                              <option <?php if($circuler->region == "National Events"){ echo "Selected";}?>>National Events
                              <option <?php if($circuler->region == "Northern Regio"){ echo "Selected";}?>>Northern Region</option>
                              <option <?php if($circuler->region == "Overseas Events"){ echo "Selected";}?>>Overseas Events</option>
                              <option <?php if($circuler->region == "Southern Region"){ echo "Selected";}?>>Southern Region</option>
                              <option <?php if($circuler->region == "Steering Committee"){ echo "Selected";}?>>Steering Committee</option>
                              <option <?php if($circuler->region == "Western Region"){ echo "Selected";}?>>Western Region</option>
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
                                <option value="<?php echo $x;?>" <?php if($circuler->daycirculer == $x){ echo "Selected";}?>><?php echo $x;?></option>
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
                                <option value="<?php echo $y;?>" <?php if($circuler->monthcirculer == $y){ echo "Selected";}?>><?php echo $y;?></option>
                                <?php
                            }
                            ?>          
                        </select>
                        <select name="yearcirculer" style="width:100px;">
                            <option>Year</option>              
                            <?php
                            for ($z = 1999; $z <= date("Y"); $z++) {
                                ?>
                                <option value="<?php echo $z;?>" <?php if($circuler->yearcirculer == $z){ echo "Selected";}?>><?php echo $z;?></option>
                                <?php
                            }
                            ?>            
                        </select>
                    </td>
				</tr>
				<tr>
					<td width="200">Circular</td>
					<td><textarea name="circuler" rows="15" style="width: 100%" > <?php echo $circuler->circuler;?></textarea></td>
				</tr>
				<tr>
					<td width="200">Keywords</td>
					<td><input type="text" name="keyword"  value="<?php echo $circuler->keyword;?>"></td>
				</tr>
				<tr>
					<td width="200">Attach</td>
					<td>
					    <input type="file" name="attachement"> Filename : <?php echo $circuler->attachement;?> / Only : PDF, DOC
					<br>
					<input type="file" name="attachement2"> Filename : <?php echo $circuler->attachement2;?> / Only : PDF, DOC
					<br>
					<input type="file" name="attachement2"> Filename : <?php echo $circuler->attachement3;?> / Only : PDF, DOC
					<br>
					<input type="file" name="attachement3"> Filename : <?php echo $circuler->attachement4;?> / Only : PDF, DOC
					<br>
					<input type="file" name="attachement4"> Filename : <?php echo $circuler->attachement5;?> / Only : PDF, DOC
					</td>
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