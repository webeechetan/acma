<?php
ob_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
if(empty($_GET['page'])){
$_GET['page'] = "";
}
include( __DIR__."/../config.php" );
include(__DIR__."/validate_login.php" );
include 'csrf.php';
use Cocur\Slugify\Slugify;
use Illuminate\Filesystem\Filesystem;
global $antiXss;
$_GET = $antiXss->xss_clean($_GET);
$_POST = $antiXss->xss_clean($_POST);
$conn=mysqli_connect("localhost","techtonic","d#4ab01db3!bT","acma_web");
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard - ACMA</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.4/tinymce.min.js"></script>
    <script>
		tinymce.init({
		selector: 'textarea',
		height: 300,
    plugins: 'paste',
    paste_remove_spans: true,
    paste_remove_styles: true,
    paste_auto_cleanup_on_paste: true
		/*plugins: 'table, lists, image,textcolor,link,code',
			toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
			toolbar2: "print preview media | forecolor backcolor emoticons",
			image_advtab: true,
		content_css: [
		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		'//www.tinymce.com/css/codepen.min.css'],
		
		style_formats: [
		{ title: 'Bold text', inline: 'strong' },
		{ title: 'Red text', inline: 'span', styles: { color: '#ff0000' } },
		{ title: 'Red header', block: 'h1', styles: { color: '#ff0000' } },
		{ title: 'Badge', inline: 'span', styles: { display: 'inline-block', border: '1px solid #2276d2', 'border-radius': '5px', padding: '2px 5px', margin: '0 2px', color: '#2276d2' } },
		{ title: 'Table row 1', selector: 'tr', classes: 'tablerow1' }
		],
		formats: {
		alignleft: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'left' },
		aligncenter: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'center' },
		alignright: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'right' },
		alignfull: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'full' },
		bold: { inline: 'span', 'classes': 'bold' },
		italic: { inline: 'span', 'classes': 'italic' },
		underline: { inline: 'span', 'classes': 'underline', exact: true },
		strikethrough: { inline: 'del' },
		customformat: { inline: 'span', styles: { color: '#00ff00', fontSize: '20px' }, attributes: { title: 'My custom format' }, classes: 'example1' },
		}*/
		});
    </script>
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">ACMA ADMIN </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="settings.php">Settings</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?php echo $_SESSION['useradmin'];?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i><span>Circulars</span></a>
              <ul class="dropdown-menu">
                <li><a href="all-circulers.php">All Records</a></li>
                <li><a href="new-circuler.php">Add New</a></li>
              </ul>
          </li>
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i><span>Members</span></a>
              <ul class="dropdown-menu">
                <li><a href="all-members.php">All Members</a></li>
                <li><a href="new-member.php">Add New</a></li>
              </ul>
          </li>
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-envelope"></i><span>EC Minutes</span></a>
              <ul class="dropdown-menu">
                <li><a href="all-ecminutes.php">All EC Minutes</a></li>
                <li><a href="add-new-ecminutes.php">New EC Minutes</a></li>
              </ul>
          </li>
          <li><a href="view-members-log.php"><i class="icon-user"></i><span>View Member’s Log</span></a></li>
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-camera"></i><span>Photogallery</span></a>
             <ul class="dropdown-menu">
                <li><a href="all-photos.php">All Photos</a></li>
                <li><a href="new-photo.php">Add New</a></li>
              </ul>
          </li>
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-file-alt"></i><span>Doc Manager</span></a>
              <ul class="dropdown-menu">
                <li><a href="all-docs.php">All Docs</a></li>
                <li><a href="new-doc.php">Add New Doc</a></li>
                <li><a href="all-subjects.php">All Subjects</a></li>
              </ul>
          </li>
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i><span>Event Master</span></a>
              <ul class="dropdown-menu">
                <li><a href="all-events.php">All Events</a></li>
                <li><a href="new-event.php">Add New</a></li>
              </ul>
          </li>
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i><span>Vehicle Report</span></a>
              <ul class="dropdown-menu">
                <li><a href="all-vehicle-report.php">All Reports</a></li>
                <li><a href="new-vehicle-report.php">Add New</a></li>
              </ul>
          </li>
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i><span>Press Release</span></a>
              <ul class="dropdown-menu">
                <li><a href="all-press-release.php">All Press Release</a></li>
                <li><a href="new-press-release.php">Add New</a></li>
              </ul>
          </li>
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i><span>Press Coverage</span></a>
              <ul class="dropdown-menu">
                <li><a href="all-press-coverage.php">All Press Coverage</a></li>
                <li><a href="new-press-coverage.php">Add New</a></li>
              </ul>
          </li>
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i><span>All Other Doc</span></a>
              <ul class="dropdown-menu">
                <li><a href="all-other-doc.php">All Other Doc</a></li>
                <li><a href="new-other-doc.php">Add New</a></li>
              </ul>
          </li>
          <!--new code-->
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i><span> Publications</span></a>
              <ul class="dropdown-menu">
                <li><a href="all-publications.php">All Publications</a></li>
                <li><a href="add-new-publication.php">Add New Publications</a></li>
                <li><a href="home-page-publications.php">Home Page Publications</a></li>
              </ul>
          </li>
          <!---->
           <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i><span> Notification</span></a>
              <ul class="dropdown-menu">
                <li><a href="acma-notification.php">All Notification</a></li>
                <li><a href="add-notification.php">Add New Notification</a></li>
              </ul>
          </li>

          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i><span> Govt. Policy</span></a>
              <ul class="dropdown-menu">
                <li><a href="all-policies.php">All Policy</a></li>
                <li><a href="add-new-policy.php">Add New Policy</a></li>
              </ul>
          </li>

          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i><span>Election Result</span></a>
              <ul class="dropdown-menu">
                <li><a href="all-election-results.php">All Results</a></li>
                <li><a href="add-new-election-result.php">Add New Result</a></li>
              </ul>
          </li>
          
          <!--end code-->
          <li><a href="enquiries.php"><i class="icon-envelope"></i><span>Enquiry</span></a></li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
