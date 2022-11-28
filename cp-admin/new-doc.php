<?php include("header.php");

if(isset($_POST['title'])){
	
	$title = $_POST['title'];
	$subject = $_POST['subject'];
	$docyear = $_POST['docyear'];
	
	$DocTables=App\Models\DocTable::where('subject','=',$subject)->orderBy("sort","DESC")->first();
	if($DocTables->sort == 0){
	$sort = 1;
	}else{
	$sort = $DocTables->sort+1;    
	}
    $docs = new App\Models\DocTable();
	$docs->title = $title;
	$docs->subject = $subject;
	$docs->docyear = $docyear;
	$docs->uploaddate = date("d-m-Y");
	$docs->sort = $sort;
	$docs->save();

	$target = FS_UPLOADS_PATH.'/docmanager/';
	
	if(isset($_FILES['attachement'])){
	
      	if(copy($_FILES['attachement']['tmp_name'],$target.basename($_FILES['attachement']['name']) )) 
		{
			$attach = basename($_FILES['attachement']['name']);
			$docs->doc=$attach ;
		}	

	}
	$docs->save();	

	header( 'location:all-docs.php?msg=add' );	
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
					<td width="200">Title</td>
					<td><input type="text" name="title"></td>
				</tr>
				<tr>
					<td width="200">Folder</td>
					<td>
                        <select name="subject" style="width:100px;">
                            <?php
                
                            $DocsubjectTables=App\Models\DocsubjectTable::orderBy("id","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
            		        foreach($DocsubjectTables as $DocsubjectTable){
            					?>
                                <option value="<?php echo $DocsubjectTable->id;?>"><?php echo $DocsubjectTable->name;?></option>
                                <?php
                            }
                            ?>            
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