<?php include("header.php");

if(isset($_POST['title'])){
	
	$title = $_POST['title'];
	$title2 = $_POST['title2'];
	$subject = $_POST['subject'];
	$docyear = $_POST['docyear'];
	
    $VehiclereportTable = new App\Models\VehiclereportTable();
	$VehiclereportTable->title = $title;
	$VehiclereportTable->title2 = $title2;
	$VehiclereportTable->cat = $subject;
	$VehiclereportTable->docyear = $docyear;
	$VehiclereportTable->uploaddate = date("d-m-Y");
	$VehiclereportTable->save();

	$target = FS_UPLOADS_PATH.'/vehiclereport/';
	
	if(isset($_FILES['attachement'])){
	
      	if(copy($_FILES['attachement']['tmp_name'],$target.basename($_FILES['attachement']['name']) )) 
		{
			$attach = basename($_FILES['attachement']['name']);
			$VehiclereportTable->doc=$attach ;
		}	

	}
	if(isset($_FILES['attachement2'])){
	
      	if(copy($_FILES['attachement2']['tmp_name'],$target.basename($_FILES['attachement2']['name']) )) 
		{
			$attach2 = basename($_FILES['attachement2']['name']);
			$VehiclereportTable->doc2=$attach2 ;
		}	

	}
	$VehiclereportTable->save();	

	header( 'location:all-vehicle-report.php?msg=add' );	
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
              <h3> New Document</h3>
            </div>
            <div class="widget-content">
            <form name="frm" method="post" enctype="multipart/form-data">
			<table cellpadding="0" cellspacing="0" width="100%">
			    <tr>
					<td width="200">Title for Table</td>
					<td><input type="text" name="title"></td>
				</tr>
				<tr>
					<td width="200">Title for Graph</td>
					<td><input type="text" name="title2"></td>
				</tr>
				<tr>
					<td width="200">Folder</td>
					<td>
                        <select name="subject" style="width:100px;">
                                <option value="1">Quarterly Vehicle Forecast</option>
                                <option value="2">Monthly Vehicle Performance Report</option>
                                <option value="3">Quarterly Vehicle Performance Report</option>
                        </select>
                    </td>
				</tr>
				<tr>
					<td width="200">Year</td>
					<td>
                        <select name="docyear" style="width:100px;">
                            <?php
            		        for($x=1999; $x <= date("Y"); $x++){
            					?>
                                <option value="<?php echo $x;?>"><?php echo $x;?></option>
                                <?php
                            }
                            ?>            
                        </select>
                    </td>
				</tr>
				<tr>
					<td width="200">Table</td>
					<td><input type="file" name="attachement"></td>
				</tr>
				<tr>
					<td width="200">Graph</td>
					<td><input type="file" name="attachement2"></td>
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