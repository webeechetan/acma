<?php include("header.php");

if(isset($_POST['description'])){
	
    $PressCoverageTable = new App\Models\PressCoverageTable();
	$PressCoverageTable->description = $_POST['description'];
	$PressCoverageTable->date = $_POST['uploaddate'];
    $PressCoverageTable->link = $_POST['link'];
	// $PressreleaseTable->save();

	$target = FS_UPLOADS_PATH.'/press-release/';
	
	if(isset($_FILES['file'])){
	
      	if(copy($_FILES['file']['tmp_name'],$target.basename($_FILES['file']['name']) )) 
		{
			$attach = basename($_FILES['file']['name']);
			$PressCoverageTable->file=$attach ;
		}	

	}
	$PressCoverageTable->save();	

	header( 'location:all-press-coverage.php?msg=add' );	
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
              <h3> New Press Release</h3>
            </div>
            <div class="widget-content">
            <form name="frm" method="post" enctype="multipart/form-data">
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td width="200">Upload Date</td>
					<td>
                        <input type="text" name="uploaddate">
                    </td>
				</tr>
                <tr>
					<td width="200">Description</td>
					<td><input type="text" name="description"></td>
				</tr>
				<tr>
					<td width="200">Attachement</td>
					<td><input type="file" name="file"></td>
                </tr>
                <tr>
					<td width="200">Link</td>
					<td><input type="text" name="link"></td>
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