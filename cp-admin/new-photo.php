<?php include("header.php");

if(isset($_POST['title'])){
	
	$title = $_POST['title'];
	$cat_gallery = $_POST['cat_gallery'];
	$photodate = $_POST['photodate'];
	
    $gallery = new App\Models\GalleryTable();
	$gallery->title = $title;
	$gallery->cat_gallery = $cat_gallery;
	$gallery->photodate = $photodate;
	$gallery->uploaddate = date("d-m-Y");
	$gallery->save();

	$target = FS_UPLOADS_PATH.'/gallery/';
	
	if(isset($_FILES['attachement'])){
	
      	if(copy($_FILES['attachement']['tmp_name'],$target.basename($_FILES['attachement']['name']) )) 
		{
			$attach = basename($_FILES['attachement']['name']);
			$gallery->photo=$attach ;
		}	

	}
	
	if(isset($_FILES['attachement2'])){
	
      	if(copy($_FILES['attachement2']['tmp_name'],$target.basename($_FILES['attachement2']['name']) )) 
		{
			$attach2 = basename($_FILES['attachement2']['name']);
			$gallery->photo2=$attach2 ;
		}	

	}
	
	if(isset($_FILES['attachement3'])){
	
      	if(copy($_FILES['attachement3']['tmp_name'],$target.basename($_FILES['attachement3']['name']) )) 
		{
			$attach3 = basename($_FILES['attachement3']['name']);
			$gallery->photo3=$attach3 ;
		}	

	}
	
	if(isset($_FILES['attachement4'])){
	
      	if(copy($_FILES['attachement4']['tmp_name'],$target.basename($_FILES['attachement4']['name']) )) 
		{
			$attach4 = basename($_FILES['attachement4']['name']);
			$gallery->photo4=$attach4 ;
		}	

	}
	
	if(isset($_FILES['attachement5'])){
	
      	if(copy($_FILES['attachement5']['tmp_name'],$target.basename($_FILES['attachement5']['name']) )) 
		{
			$attach5 = basename($_FILES['attachement5']['name']);
			$gallery->photo5=$attach5 ;
		}	

	}
	
	if(isset($_FILES['attachement6'])){
	
      	if(copy($_FILES['attachement6']['tmp_name'],$target.basename($_FILES['attachement6']['name']) )) 
		{
			$attach6 = basename($_FILES['attachement6']['name']);
			$gallery->photo6=$attach6 ;
		}	

	}
	
	if(isset($_FILES['attachement7'])){
	
      	if(copy($_FILES['attachement7']['tmp_name'],$target.basename($_FILES['attachement7']['name']) )) 
		{
			$attach7 = basename($_FILES['attachement7']['name']);
			$gallery->photo7=$attach ;
		}	

	}
	
	if(isset($_FILES['attachement8'])){
	
      	if(copy($_FILES['attachement8']['tmp_name'],$target.basename($_FILES['attachement8']['name']) )) 
		{
			$attach8 = basename($_FILES['attachement8']['name']);
			$gallery->photo8=$attach ;
		}	

	}
	
	if(isset($_FILES['attachement9'])){
	
      	if(copy($_FILES['attachement9']['tmp_name'],$target.basename($_FILES['attachement9']['name']) )) 
		{
			$attach9 = basename($_FILES['attachement9']['name']);
			$gallery->photo9=$attach9 ;
		}	

	}
	
	if(isset($_FILES['attachement10'])){
	
      	if(copy($_FILES['attachement10']['tmp_name'],$target.basename($_FILES['attachement10']['name']) )) 
		{
			$attach10 = basename($_FILES['attachement10']['name']);
			$gallery->photo10=$attach10 ;
		}	

	}
	$gallery->save();	

	header( 'location:all-photos.php?msg=add' );	
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
              <h3> New Photo</h3>
            </div>
            <div class="widget-content">
            <form name="frm" method="post" enctype="multipart/form-data">
			<table cellpadding="0" cellspacing="0" width="100%">
			    <tr>
					<td width="200">Title</td>
					<td><input type="text" name="title" required></td>
				</tr>
				<tr>
					<td width="200">Date</td>
					<td><input type="month" name="photodate" ></td>
				</tr>
				<tr>
					<td width="200">Photo 1</td>
					<td><input type="file" name="attachement" required></td>
				</tr>
				<tr>
					<td width="200">Photo 2</td>
					<td><input type="file" name="attachement2"></td>
				</tr>
				<tr>
					<td width="200">Photo 3</td>
					<td><input type="file" name="attachement3"></td>
				</tr>
				<tr>
					<td width="200">Photo 4</td>
					<td><input type="file" name="attachement4"></td>
				</tr>
				
				<tr>
					<td width="200">Category</td>
					<td><select name="cat_gallery" required><option value="">Select</option><option value="International">International</option><option value="Domestic">Domestic</option></select></td>
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