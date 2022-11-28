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
        <img src="img/australia.jpg" class="img-fluid">
    </div>
  </section><!-- #intro -->
  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="innerpage2">
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
                  <div class="content-txt">
                      <p class="aligncenter">ACMA provides opportunities to its members  to explore business opportunities in international markets.<br>Check out the various initiatives and events in australasia by ACMA</p>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-2">
                  <div class="iconbox1">
                      <img src="img/home-icon.jpg"  class="img-fluid">
                  </div>
                  <ul class="grey-white-bg">
                      <li><a href="">Desk Details</a></li>
                      <li><a href="">Events</a></li>
                      <li><a href="">Studies</a></li>
                      <li><a href="">Press Release</a></li>
                      <li><a href="">Media Coverage</a></li>
                      <li><a href="">Mission Report</a></li>
                  </ul>
              </div>
              <div class="col-sm-2">
                  <div class="iconbox2">
                      <img src="img/phone-icon.jpg"  class="img-fluid">
                  </div>
                  <ul class="grey-white-bg" id="countryli">
                      <li class="current"><a id="address">Australia, New Zealand
</a></li>
                  </ul>
              </div>
              <div class="col-sm-8">
                  <div class="content-txt location-page">
                      <p>Name of contact person: </p>
                      <p>Email id: </p>
                      <p>Contact Number: </p>
                  </div>
              </div>
          </div> 
          <div class="row">
              <div class="col-sm-12">
              <p class="height-500"></p>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
              <p class="blue-content-bottom-border"><img src="img/blue-content-bottom-border.jpg"  class="img-fluid"></p>
              </div>
          </div>
      </div>      
    </section><!-- #about -->

  </main>
<?php include("includes/footer.php");?>
<script>
        $(document).ready(function() {
            $('ul#countryli li a').on('click', function(){
                $(this).parent().addClass('current').siblings().removeClass('current');
            });
          $("#address").click(function() {
             $(".address").show();
             $(".address1").hide();
             $(".address2").hide();
             $(".address3").hide();
             $(".address4").hide();
          });
          $("#address1").click(function() {
             $(".address").hide();
             $(".address1").show();
             $(".address2").hide();
             $(".address3").hide();
             $(".address4").hide();
          });
          $("#address2").click(function() {
             $(".address2").show();
             $(".address").hide();
             $(".address1").hide();
             $(".address3").hide();
             $(".address4").hide();
          });
          $("#address3").click(function() {
             $(".address3").show();
             $(".address").hide();
             $(".address2").hide();
             $(".address1").hide();
             $(".address4").hide();
          });
          $("#address4").click(function() {
             $(".address4").show();
             $(".address").hide();
             $(".address2").hide();
             $(".address3").hide();
             $(".address1").hide();
          });
        });
  </script>