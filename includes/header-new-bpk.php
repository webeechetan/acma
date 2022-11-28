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

<!doctype html>

<html lang="en">



<head>

	<!-- Required meta tags -->

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php  include("meta.php");?>

	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

	<!-- Favicons -->

	<link href="img/favicon.png" rel="icon">

	<link href="img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Font Awesome -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

	<!-- All Css Files -->

	<link rel="stylesheet" href="css/bootstrap.min.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/animate.min.css">

	<link rel="stylesheet" href="css/slick-theme.min.css">

	<link rel="stylesheet" href="css/slick.min.css">

	<link rel="stylesheet" href="css/burger-menu.css">

	<!-- Custom Css -->

	<link rel="stylesheet" href="css/custom.css">

	<!-- Google Fonts -->

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

	<title>ACMA | Home</title>

	<!-- Google Tag Manager -->

	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

	})(window,document,'script','dataLayer','GTM-PZ274H3');</script>

	<!-- End Google Tag Manager --> 

</head>



<body class="home">

	<!-- Google Tag Manager (noscript) -->

	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PZ274H3"

	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

	<!-- End Google Tag Manager (noscript) -->

	<!-- Header -->

	<header class="header">

		<div class="container">

			<div class="row align-items-center">

				<div class="col-lg-3">

					<a href="/"><img src="images/logo.png" class="logo" alt="ACMA Logo"></a>

				</div>

				<div class="col-lg-9 main-menu">

					<div class="mob_menu">

						<div class="d-lg-none mr-4">

							<p class="mb-0 searchimg"><i class="fas fa-search text-white"></i>

							</p>

							<form class="search-form-top" id="search-top">

								<input class="form-control  " type="text" placeholder="Enter Keyword...">

							</form>

						</div>

						<div class="offcanvas d-flex justify-content-end d-lg-none">

							<button type="button" class="offcanvas-menu-btn menu-status-open"> <span class="btn-icon-wrap">



                                <span></span>

								<span></span>

								<span></span>

								</span>

							</button>

						</div>

					</div>

					<div class="header_menu">

						<nav class="menu menu-top">

							<ul>

								<li><a href="index.php" onclick="location.href='index.php';">Home</a>

								</li>

								<li class="has-submenu"><a href="#">About Us <span class="submenu-icon"><i class="fas fa-chevron-down"></i></span></a>

									<ul>

										<li><a href="about-us.php" onclick="location.href='about-us.php';">About Us</a>

										</li>

										<li><a href="coming-soon.php" onclick="location.href='coming-soon.php'">Past Presidents</a>

										</li>

										<li><a href="office-bearers.php" onclick="location.href='office-bearers.php'">Office Bearers</a>

										</li>

										<li><a href="message.php" onclick="location.href='message.php'">President/DG Message</a>

										</li>

										<li><a href="pillars.php" onclick="location.href='pillars.php'">Pillars</a>

										</li>

										<li><a href="https://www.digitalact.in/" onclick="location.href='https://www.digitalact.in/'">ACT</a>

										</li>

									</ul>

								</li>

								<li class="has-submenu"><a href="#">Members <span class="submenu-icon"><i class="fas fa-chevron-down"></i></span></a>

									<ul>

										<li><a href="benefits-of-joining.php" onclick="location.href='benefits-of-joining.php'">Benefits</a>

										</li>

										<li><a href="become-member.php" onclick="location.href='become-member.php'">Become A member</a>

										</li>

									</ul>

								</li>

								<li class="has-submenu"><a href="#">Events <span class="submenu-icon"><i class="fas fa-chevron-down"></i></span></a>

									<ul>

										<li><a href="international-events.php" onclick="location.href='international-events.php'">International</a>

										</li>

										<li><a href="national-events.php" onclick="location.href='national-events.php'">Domestic</a>

										</li>

										<li><a href="acoe-events.php" onclick="location.href='acoe-events.php'">ACoE</a>

										</li>

										<li><a href="uploads/doc/Integrated_Calendar_Of_Activities_2018-19 (21).xlsx" onclick="location.href='uploads/doc/Integrated_Calendar_Of_Activities_2018-19 (21).xlsx'">Integrated Calendar Of<br> Activities 2018-19</a>

										</li>

									</ul>

								</li>

								<li><a href="contact.php" onclick="location.href='contact-us.php'">Contact Us</a>

								</li>

								<li class="d-none d-lg-inline-flex">

									<p class="mb-0 searchimg"><i class="fas fa-search text-white"></i>

									</p>

									<form class="search-form-top" id="search-top">

										<input class="form-control  " type="text" placeholder="Enter Keyword...">

									</form>

								</li>

							</ul>

						</nav>

						<div class="menu menu-btm">

							<ul>

								<li class="has-submenu"><a href="#">International Desk <span class="submenu-icon"><i class="fas fa-chevron-down"></i></span></a>

									<ul>

										<li><a href="asia.php" onclick="location.href='asia.php'">Asia </a>

										</li>

										<li><a href="europe.php" onclick="location.href='europe.php'">Europe</a>

										</li>

										<li><a href="africa.php" onclick="location.href='africa.php'">Africa</a>

										</li>

										<li><a href="south-america.php" onclick="location.href='south-america.php'">South America</a>

										</li>

										<li><a href="middle-east.php" onclick="location.href='middle-east.php'">Middle east</a>

										</li>

										<li><a href="north-america.php" onclick="location.href='north-america.php'">North America</a>

										</li>

										<li><a href="australia.php" onclick="location.href='australia.php'">Australia</a>

										</li>

									</ul>

								</li>

								<li class="has-submenu"><a href="#">Govt. Policy <span class="submenu-icon"><i class="fas fa-chevron-down"></i></span></a>

									<ul>

										<li><a href="center-goverment-policy.php" onclick="location.href='center-goverment-policy.php'">Central Govt Policy</a>

										</li>

										<li><a href="state-govt-policy.php" onclick="location.href='state-govt-policy.php'">State Policy</a>

										</li>

										<li><a href="ev-policy.php" onclick="location.href='ev-policy.php'">EV Policy</a>

										</li>

									</ul>

								</li>

								<li class="has-submenu"><a href="#">Industry Statistics <span class="submenu-icon"><i class="fas fa-chevron-down"></i></span></a>

									<ul>

										<li><a href="auto-component.php" onclick="location.href='auto-component.php'">Auto Component</a>

										</li>

									</ul>

								</li>

								<li class="has-submenu"><a href="#">Publications <span class="submenu-icon"><i class="fas fa-chevron-down"></i></span></a>

									<ul>

										<li><a href="auto-news.php" onclick="location.href='auto-news.php'">Auto News</a>

										</li>

										<li><a href="impact.php" onclick="location.href='impact.php'">IMPACT</a>

										</li>

										<li><a href="annual-report.php" onclick="location.href='annual-report.php'">Annual Report</a>

										</li>

										<li><a href="research-studies.php" onclick="location.href='research-studies.php'">Research Studies</a>

										</li>

									</ul>

								</li>

								<li class="has-submenu"><a href="#">Media Room <span class="submenu-icon"><i class="fas fa-chevron-down"></i></span></a>

									<ul>

										<li><a href="press-release.php" onclick="location.href='press-release.php'">Press releases</a>

										</li>

										<li><a href="press-coverage.php'" onclick="location.href='press-coverage.php'">Press coverage</a>

										</li>

										<li><a href="tv-covrage.php" onclick="location.href='tv-covrage.php'">TV Coverage</a>

										</li>

									</ul>

								</li>

								<li class="has-submenu"><a href="#">Gallery <span class="submenu-icon"><i class="fas fa-chevron-down"></i></span></a>

									<ul>

										<li><a href="gallery-international.php" onclick="location.href='gallery-international.php'">International</a>

										</li>

										<li><a href="domestic-gallery.php" onclick="location.href='domestic-gallery.php'">Domestic</a>

										</li>

									</ul>

								</li>

							</ul>

						</div>

					</div>

				</div>

			</div>

		</div>

	</header>