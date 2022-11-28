<?php include("header.php");

if(isset($_POST['title'])){
	
	$title = $_POST['title'];
	$uploaddate = $_POST['uploaddate'];
	
    $EcminutesTable = new App\Models\EcminutesTable();
	$EcminutesTable->title = $title;
	$EcminutesTable->uploaddate = $uploaddate;
	$EcminutesTable->save();

	$target = FS_UPLOADS_PATH.'/ec-minutes/';
	
	if(isset($_FILES['attachement'])){
	
      	if(copy($_FILES['attachement']['tmp_name'],$target.basename($_FILES['attachement']['name']) )) 
		{
			$attach = basename($_FILES['attachement']['name']);
			$EcminutesTable->attachment=$attach ;
		}	

	}
	$EcminutesTable->save();	

	header( 'location:all-ecminutes.php?msg=add' );	
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
              <h3> New EC Minutes</h3>
            </div>
            <div class="widget-content">
            <form name="frm" method="post" enctype="multipart/form-data">
			<table cellpadding="0" cellspacing="0" width="100%">
			    <tr>
					<td width="200">Title</td>
					<td><input type="text" name="title"></td>
				</tr>
				<tr>
					<td width="200">Upload Date</td>
					<td>
                        <input type="text" name="uploaddate">
                    </td>
				</tr>
				<tr>
					<td width="200">Attachement</td>
					<td><input type="file" name="attachement"></td>
				</tr
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