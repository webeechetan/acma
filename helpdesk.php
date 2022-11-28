<?php include("includes/header.php");
include(__DIR__."/validate_login.php" );
if(isset($_POST['txtname'])){
	
	$txtname = $_POST['txtname'];
	$txtcompany = $_POST['txtcompany'];
	$query = $_POST['query'];
	
    $enquiry = new App\Models\EnquiryTable();
    $enquiry->name = $txtname;
    $enquiry->company = $txtcompany;
    $enquiry->message = $query;
	$enquiry->save();	

	header( 'location:helpdesk.php?msg=add' );	
	exit;
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
        <img src="img/helpdesk.jpg" class="img-fluid">
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
              <div class="form">
                  <?php
        			if(isset($_GET['msg']) && $_GET['msg'] == 'add'){
        		  ?>
        				<div class="msg-green">
                            Message Successfully Submitted...
                        </div>
                  <?php
        			}
        		  ?>   
                  <form method="post" action="">    
                      <p><input type="text" name="txtname" placeholder="Your Name" required></p>
                      <p><input type="text" name="txtcompany" placeholder="Company" required></p>
                      <p><textarea name="query" placeholder="Query" required></textarea></p>
                      <p class="alignright"><input type="submit" value="SUBMIT"></p>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>