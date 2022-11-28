<?php 
session_start();
if($_SESSION['userstaff'] == ""){
    header("location:myacma.php");
}
include("includes/header.php");?>
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="introimg">
        <div class="container">
          <div class="secondarymenu">  
           <div class="row">
             <div class="secondarymenu-right">
                <?php include("includes/secondaory-menu.php");?>
             </div>
           </div>
          </div>
        </div>
        <img src="img/member-login.png" class="img-fluid">
    </div>
  </section><!-- #intro -->
  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="innerpage">
      <div class="container">
          <div class="row">
          <div class="col-sm-12">
          <h2>Upload ISO DOcument</h2>
          <?php
          if(isset($_POST['title'])){
	
        	$title = $_POST['title'];
        	$cat = $_POST['cat'];

            $docs = new App\Models\IsoDocTable();
        	$docs->title = $title;
        	$docs->cat = $cat;
        	$docs->save();
        
        	$target = FS_UPLOADS_PATH.'/isodocmanager/';
        	
        	if(isset($_FILES['attachement'])){
        	
              	if(copy($_FILES['attachement']['tmp_name'],$target.basename($_FILES['attachement']['name']) )) 
        		{
        			$attach = basename($_FILES['attachement']['name']);
        			$docs->filename=$attach ;
        		}	
        
        	}
        	$docs->save();	
        
        	header( 'location:iso-upload-documents.php?msg=add' );	
        	exit;
        }
          ?>
          <?php
			if(isset($_GET['msg']) && $_GET['msg'] == 'add'){
		  ?>
				<div style="text-align:center; padding-top:25px;">
                    Added Record Successfully.
                </div>
          <?php
			}
		  ?>
		  <style>
		      .formcss{ width:500px; margin:50px auto; border-left:solid #ccc 1px; border-top:solid #ccc 1px;}
		      .formcss td{border-right:solid #ccc 1px; border-bottom:solid #ccc 1px; padding:10px;}
		      .formcss td input[type="text"]{ padding:5px; width:100%;}
		      .formcss td input[type="submit"],.formcss td input[type="reset"]{ padding:5px 10px; background-color:#000; color:#fff; border:none; cursor: pointer}
		  </style>
          <form name="frm" method="post" enctype="multipart/form-data">
			<table class="formcss" cellpadding="0" cellspacing="0" width="100%">
			    <tr>
					<td width="200">Title</td>
					<td><input type="text" name="title"></td>
				</tr>
				<tr>
					<td width="200">Category</td>
					<td><select name="cat">
					    <option value="ISO_9001_2015_Formats">ISO_9001_2015_Formats</option>
                        <option value="ISO_9001_2015_Quality_Manual">ISO_9001_2015_Quality_Manual</option>
                        <option value="ISO_9001_2015_Process_Manual">ISO_9001_2015_Process_Manual</option>
                        <option value="ISO_9001_2015">ISO_9001_2015</option>
					</select></td>
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
      </div></div></div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>