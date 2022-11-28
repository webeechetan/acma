<?php include("header.php");

if(isset($_POST['title'])){
	
	$title = $_POST['title'];
	$cat = $_POST['cat'];
	$section = $_POST['section'];
	
	$DocTables=App\Models\DoccoronaTable::where('cat','=',$cat)->orderBy("sort","DESC")->first();
	if($DocTables->sort == 0){
	$sort = 1;
	}else{
	$sort = $DocTables->sort+1;    
	}
    $docs = new App\Models\DoccoronaTable();
	$docs->title = $title;
	$docs->cat = $cat;
	$docs->section = $section;
	$docs->uploaddate = date("d-m-Y");
	$docs->sort = $sort;
	$docs->save();

	$target = FS_UPLOADS_PATH.'/doccoronamanager/';
	
	if(isset($_FILES['attachement'])){
	
      	if(copy($_FILES['attachement']['tmp_name'],$target.basename($_FILES['attachement']['name']) )) 
		{
			$attach = basename($_FILES['attachement']['name']);
			$docs->doc=$attach ;
		}	

	}
	$docs->save();	

	header( 'location:all-doc-corona.php?msg=add' );	
	exit;
}
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
            <p align="right"><a  style="background-color:blue; color:#fff; padding:5px 10px;" href="all-doc-corona.php">Covid19 Doc</a>&nbsp;&nbsp;<a  style="background-color:blue; color:#fff; padding:5px 10px;" href="add-new-doc-corona.php">Add New Covid19 Doc</a></p> 
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Add New Covid19 Doc</h3>
            </div>
            <div class="widget-content">
            <form name="frm" method="post" enctype="multipart/form-data">
			<table cellpadding="0" cellspacing="0" width="100%">
			    <tr>
					<td width="200">Title</td>
					<td><input type="text" name="title"></td>
				</tr>
				<tr>
					<td width="200">Page</td>
					<td>
                        <select name="cat" style="width:100px;">
                            <option value="Covid19 Govt">Covid19 Govt </option> 
                            <option value="Covid19 OEM">Covid19 OEM </option> 
                        </select>
                    </td>
				</tr>
				<tr>
					<td width="200">Section</td>
					<td>
                        <select name="section" style="width:100px;">
                            <option value="State">State </option> 
                            <option value="Centeral">Centeral </option> 
                        </select>
                    </td>
				</tr>
				<tr>
					<td width="200">Doc</td>
					<td><input type="file" name="attachement"></td>
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