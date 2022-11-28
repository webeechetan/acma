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
  <link rel="stylesheet" href="css/slick-theme.min.css">
	<link rel="stylesheet" href="css/slick.min.css">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/custom.css">
  
  <link rel="stylesheet" href="lightbox/dist/css/lightbox.min.css">
</head>

<body>