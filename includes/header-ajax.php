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

