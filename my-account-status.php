<?php include("includes/header.php"); include(__DIR__."/validate_login.php" );?>
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
        <img src="img/my-account.jpg" class="img-fluid">
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
            <h2 class="alignleft padding-25-greytxt">Account Status</h2>    
          </div>  
        </div>  
        <div class="row account-status">
          <div class="col-sm-3">
              <div class="member-photo">
                  <p><img src="img/mp-photo.jpg"></p>
                  <h3>Name Lastname</h3>
              </div>
          </div>
          <div class="col-sm-9">
              <div class="member-details">
                  <p><img src="img/account-status.jpg" class="shadow"></p>
                  <div class="member-details-points"><label>Membership type</label> Type 1</div>
                  <div class="member-details-points"><label>membership payment due date</label> DD/MM/YYYY</div>
                  <div class="member-details-points"><label>last membership payment made</label> DD/MM/YYYY</div>
                  <div class="member-details-points"><label>outstanding payments</label> .....</div>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">    
            &nbsp;
          </div>  
        </div>
      </div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>