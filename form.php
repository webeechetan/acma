<?php include("includes/header.php");?>
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
        <img src="img/acma-60-5.jpeg" class="img-fluid">
    </div>
  </section><!-- #intro -->
<form name="frm" class="sponsors-form" method="post" action="ccform/ccavRequestHandler.php">
              <div class="row">
                  <div class="col-sm-6">
                      <label>Name <span class="required">*</span> : </label>
                      <input type="text" name="billing_name"  required>
                  </div>
                  <div class="col-sm-6">
                      <label>Designation <span class="required">*</span> : </label>
                      <input type="text" name="designation" required>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-6">
                      <label>Email <span class="required">*</span> : </label>
                      <input type="text" name="billing_email" required>
                  </div>
                  <div class="col-sm-6">
                      <label>Mobile No <span class="required">*</span> : </label>
                      <input type="text" name="billing_tel" min="10" max="12" required>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-6">
                      <label>Company Name <span class="required">*</span> : </label>
                      <input type="text" name="company_name" required>
                  </div>
                   </div>
                    </div>
                      <?php include("includes/footer.php");?>

                  