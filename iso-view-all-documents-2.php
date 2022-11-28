<?php 
session_start();
if($_SESSION['userstaff'] == ""){
    header("location:myacma.php");
}
include("includes/header.php");
if(isset($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id']))
{
	$DocTable=App\Models\IsoDocTable::find((int)$_GET['id']);
	if($DocTable){
		$DocTable->delete();
	}
	header( 'location:iso-view-all-documents-2.php?msg=delete' );			
}
?>
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
          <h2>View All ISO Documents</h2>
          <div class="content-txt">
              <?php
			  if(isset($_GET['msg']) && $_GET['msg'] == 'delete'){
    		  ?>
    				<div class="alert">
                        Delete Record Successfully.
                    </div>
              <?php
    			}
    		  ?>   
              <table cellspacing="0" cellpadding="0" width="80%" class="tablecss">
                <tr>
                    <th width="20%" class="border-right">Sr No</th>
                    <th width="55%" class="border-right date-blackbg">Title</th>
                </tr>
                <?php
                $IsoDocTables=App\Models\IsoDocTable::where('cat','=',$_GET['cat'])->orderBy("id","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                
                $srno = 1; 
		        foreach($IsoDocTables as $IsoDocTable){
                ?>
                <tr class="tablerow">
                    <td class="border-right"><?php echo $srno;?></td>
                    <td class="border-right"><a href="uploads/isodocmanager/<?php echo $IsoDocTable->filename;?>"><?php echo $IsoDocTable->title;?></a></td>
                    
                    <!--<td class="border-right"><a href="iso-view-all-documents-2.php/action=delete&id=<?php //echo $IsoDocTable->id;?>">Delete</a></td>-->
                    <!--new changes-->
                    
            	<td class="border-right"><a href="iso-view-all-documents-2.php?id=<?php echo $IsoDocTable->id;?>&action=delete">Delete</a></td>

                     <!--new changes-->
                    
                </tr>
                <?php $srno++; }?>
              </table> 
</div>
      </div></div></div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>