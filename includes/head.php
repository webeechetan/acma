<?php
ob_start();
error_reporting(0);
if(empty($_GET['page'])){
$_GET['page'] = "";
}
include( __DIR__."/../config.php" );
use Cocur\Slugify\Slugify;
use Illuminate\Filesystem\Filesystem;
global $antiXss;
$_GET = $antiXss->xss_clean($_GET);
$_POST = $antiXss->xss_clean($_POST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <?php
  include("meta.php");
  ?>
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  
  <link rel="stylesheet" href="lightbox/dist/css/lightbox.min.css">
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PZ274H3');</script>
<!-- End Google Tag Manager --> 
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PZ274H3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <a href="/" class="scrollto"><img src="img/acma-logo.png" alt="" class="img-fluid"></a>
      </div>
      <nav id="nav" role="navigation">
    	<a href="#nav" title="Show navigation">Show navigation</a>
    	<a href="#" title="Hide navigation">Hide navigation</a>
    	<ul class="clearfix">
    	  <li><a href="index.php" onclick="location.href='index.php';">Home</a></li>  
          <li><a href="#">About Us</a>
          <ul>
              <li><a href="about-us.php" onclick="location.href='about-us.php';">About Us</a></li>
              <li><a href="coming-soon.php" onclick="location.href='coming-soon.php'">Past Presidents</a></li>
              <li><a href="office-bearers.php" onclick="location.href='office-bearers.php'">Office Bearers</a></li>
              <li><a href="message.php" onclick="location.href='message.php'">President/DG Message</a></li>
              <li><a href="pillars.php" onclick="location.href='pillars.php'">Pillars</a></li>
              <li><a href="https://www.digitalact.in/"  onclick="location.href='https://www.digitalact.in/'">ACT</a></li>
            </ul>
          </li>
          <li><a href="#">Members</a>
             <ul>
              <li><a href="benefits-of-joining.php" onclick="location.href='benefits-of-joining.php'">Benefits</a></li>
              <li><a href="become-member.php" onclick="location.href='become-member.php'">Become A member</a></li>
            </ul>
          </li>
          <li><a href="#">Events</a>
             <ul>
              <li><a href="international-events.php" onclick="location.href='international-events.php'">International</a></li>
              <li><a href="national-events.php" onclick="location.href='national-events.php'">National</a></li>
              <li><a href="uploads/otherdocmanager/Integrated_Calendar_Of_Activities_2019-20 (21).xlsx" onclick="location.href='uploads/otherdocmanager/Integrated_Calendar_Of_Activities_2019-20 (21).xlsx'">Integrated Calendar Of<br> Activities 2019-20</a></li>
            </ul>
          </li>
          <li><a href="contact.php" onclick="location.href='contact-us.php'">Contact Us</a></li>
          <li class=" mobileview"><a href="#">International Desk</a>
                     <ul>
                      <li><a href="asia.php" onclick="location.href='asia.php'">Asia </a></li>
                      <li><a href="europe.php" onclick="location.href='europe.php'">Europe</a></li>
                      <li><a href="africa.php" onclick="location.href='africa.php'">Africa</a></li>
                      <li><a href="south-america.php" onclick="location.href='south-america.php'">South America</a></li>
                      <li><a href="middle-east.php" onclick="location.href='middle-east.php'">Middle east</a></li>
                      <li><a href="north-america.php" onclick="location.href='north-america.php'">North America</a></li>
                      <li><a href="australia.php" onclick="location.href='australia.php'">Australia</a></li>
                    </ul>
                  </li>
                  <li class=" mobileview"><a href="#">Govt. Policy </a>
                     <ul>
                      <li><a href="center-goverment-policy.php" onclick="location.href='center-goverment-policy.php'">Central Govt Policy</a></li>
                      <li><a href="state-govt-policy.php" onclick="location.href='state-govt-policy.php'">State Policy</a></li>
                      <li><a href="ev-policy.php" onclick="location.href='ev-policy.php'">EV Policy</a></li>
                    </ul>
                  </li>
                  <li class=" mobileview"><a href="#">Industry Statistics</a><ul>
                      <li><a href="auto-component.php" onclick="location.href='auto-component.php'">Auto Component</a></li>
                    </ul></li>
                  <li class=" mobileview"><a href="#">Publications</a>
                     <ul>
                      <li><a href="auto-news.php" onclick="location.href='auto-news.php'">Auto News</a></li>
                      <li><a href="impact.php" onclick="location.href='impact.php'">IMPACT</a></li>
                      <li><a href="annual-report.php" onclick="location.href='annual-report.php'">Annual Report</a></li>
                      <li><a href="research-studies.php" onclick="location.href='research-studies.php'">Research Studies</a></li>
                    </ul>
                  </li>
                  <li class=" mobileview"><a href="#">Media Room</a>
                     <ul>
                      <li><a href="press-release.php" onclick="location.href='press-release.php'">Press releases</a></li>
                      <li><a href="press-coverage.php'" onclick="location.href='press-coverage.php'">Press coverage</a></li>
                      <li><a href="tv-covrage.php" onclick="location.href='tv-covrage.php'">TV Coverage</a></li>
                    </ul>
                  </li>
                  <li class=" mobileview"><a href="#">Gallery</a>
                     <ul>
                      <li><a href="gallery-international.php" onclick="location.href='gallery-international.php'">International</a></li>
                      <li><a href="domestic-gallery.php" onclick="location.href='domestic-gallery.php'">Domestic</a></li>
                    </ul>
                  </li>
        </ul>
    </nav>
      <nav class="main-nav float-left d-none d-lg-block" style="display:none !important">
        <ul>
          <li class="drop-down"><a href="#">About Us</a>
          <ul>
              <li><a href="about-us.php" onclick="location.href='about-us.php';">About Us</a></li>
              <li><a href="coming-soon.php" onclick="location.href='coming-soon.php'">Past Presidents</a></li>
              <li><a href="office-bearers.php" onclick="location.href='office-bearers.php'">Office Bearers</a></li>
              <li><a href="message.php" onclick="location.href='message.php'">Pres/DG Message</a></li>
              <li><a href="pillars.php" onclick="location.href='pillars.php'">Pillars</a></li>
              <li><a href="" href="https://www.digitalact.in/">ACT Summit </a></li>
            </ul>
          </li>
          <li class="drop-down"><a href="#">Members</a>
             <ul>
              <li><a href="benefits-of-joining.php" onclick="location.href='benefits-of-joining.php'">Benefits</a></li>
              <li><a href="become-member.php" onclick="location.href='become-member.php'">Become A member</a></li>
              <li><a href="elections.php" onclick="location.href='elections.php'">Elections</a></li>
              <li><a href="ec-minutes.php" onclick="location.href='ec-minutes.php'">EC Minutes</a></li>
            </ul>
          </li>
          <li class="drop-down"><a href="#">Event</a>
             <ul>
              <li><a href="coming-soon.php" onclick="location.href='coming-soon.php'">International</a></li>
              <li><a href="coming-soon.php" onclick="location.href='coming-soon.php'">National</a></li>
              <li><a href="uploads/doc/Integrated_Calendar_Of_Activities_2018-19 (21).xlsx" onclick="location.href='uploads/doc/Integrated_Calendar_Of_Activities_2018-19 (21).xlsx'">Integrated Calendar Of<br> Activities 2018-19</a></li>
            </ul>
          </li>
          <li><a href="contact-us.php" onclick="location.href='contact-us.php'">Contact Us</a></li>
          <li class="drop-down mobileview"><a href="#">International Desk</a>
                     <ul>
                      <li><a href="asia.php" onclick="location.href='asia.php'">Asia </a></li>
                      <li><a href="europe.php" onclick="location.href='europe.php'">Europe</a></li>
                      <li><a href="africa.php" onclick="location.href='africa.php'">Africa</a></li>
                      <li><a href="south-america.php" onclick="location.href='south-america.php'">South America</a></li>
                      <li><a href="middle-east.php" onclick="location.href='middle-east.php'">Middle east</a></li>
                      <li><a href="north-america.php" onclick="location.href='north-america.php'">North America</a></li>
                      <li><a href="australia.php" onclick="location.href='australia.php'">Australia</a></li>
                    </ul>
                  </li>
                  <li class="drop-down mobileview"><a href="#">Govt. Policy </a>
                     <ul>
                      <li><a href="center-goverment-policy.php" onclick="location.href='center-goverment-policy.php'">Central Govt Policy</a></li>
                      <li><a href="state-govt-policy.php" onclick="location.href='state-govt-policy.php'">State Policy</a></li>
                      <li><a href="ev-policy.php" onclick="location.href='ev-policy.php'">EV Policy</a></li>
                    </ul>
                  </li>
                  <li class="drop-down mobileview"><a href="#">Industry Trends</a><ul>
                      <li><a href="auto-component.php" onclick="location.href='auto-component.php'">Auto Component</a></li>
                    </ul></li>
                  <li class="drop-down mobileview"><a href="#">Publications</a>
                     <ul>
                      <li><a href="auto-news.php" onclick="location.href='auto-news.php'">Auto News</a></li>
                      <li><a href="impact.php" onclick="location.href='impact.php'">IMPACT</a></li>
                      <li><a href="ev-policy.php" onclick="location.href='ev-policy.php'">EV Policy</a></li>
                    </ul>
                  </li>
                  <li class="drop-down mobileview"><a href="#">Media Room</a>
                     <ul>
                      <li><a href="press-release.php" onclick="location.href='press-release.php'">Press Releases</a></li>
                      <li><a href="press-coverage.php'" onclick="location.href='press-coverage.php'">Press Coverage</a></li>
                      <li><a href="tv-covrage.php" onclick="location.href='tv-covrage.php'">TV Coverage</a></li>
                    </ul>
                  </li>
                  <li class="drop-down mobileview"><a href="#">Gallery</a>
                     <ul>
                      <li><a href="gallery-international.php" onclick="location.href='gallery-international.php'">International</a></li>
                      <li><a href="domestic-gallery.php" onclick="location.href='domestic-gallery.php'">Domestic</a></li>
                    </ul>
                  </li>
        </ul>
      </nav><!-- .main-nav -->
      <div class="float-right top-social">
          <ul>
              <li><img class="searchimg" src="img/search.png" alt=""></li>
              <li><a href="https://www.facebook.com/india.acma/" target="_blank" class="fb"><img src="img/fb.jpg" alt="" class="img-fluid"></a></li>
              <li><a href="https://twitter.com/acmaindia" target="_blank" class="twitter"><img src="img/twitter.jpg" alt="" class="img-fluid"></a></li>
              <li><a href="https://www.linkedin.com/company/acma-india/" target="_blank" class="linkedin"><img src="img/linkedin.jpg" alt="" class="img-fluid"></a></li>
              <?php if (isset($_SESSION[ 'user' ]) || !empty( $_SESSION[ 'user' ] ) ) 
{?>
                  <li><a href="logout.php" onclick="location.href='logout.php';"><i class="fa fa-sign-out" aria-hidden="true"></i>
</a></li>  
                  <?php }?>
          </ul>
          <form class="search-form-top" id="search-top" style="display:none">
              <input type="text" placeholder="Enter Keyword...">
          </form>
      </div>
    </div>
  </header><!-- #header -->