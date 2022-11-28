<?php 
ob_start();
include('Crypto1.php');
include( __DIR__."/../config.php" );
use Cocur\Slugify\Slugify;
use Illuminate\Filesystem\Filesystem;
global $antiXss;
$_GET = $antiXss->xss_clean($_GET);
$_POST = $antiXss->xss_clean($_POST);

	error_reporting(0);
	
	$workingKey='1F05C130CAA6BC9289CA13796E548EDD';
	$encResponse=$_POST["encResp"];	
	$rcvdString=decrypt($encResponse,$workingKey);
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);

	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
	}

    $con=mysqli_connect("localhost","techtonic","d#4ab01db3!bT","acma_web");
    // Check connection
     if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    
    mysqli_select_db($con,"acma_web");
    
    $orderiddetails =explode('=',$decryptValues[0]);
    $tracking_id =explode('=',$decryptValues[1]);
    $bank_ref_no =explode('=',$decryptValues[2]);
    $orderstatus =explode('=',$decryptValues[3]);
    
    

	if($order_status==="Success")
	{   
	    $responce_gateway = "Tracking Id : ".$tracking_id[1]."<br>Bank Ref No : ".$bank_ref_no[1]."<br>Order Status : ".$orderstatus[1];
	
	    $sql = mysqli_query($con, "UPDATE online_payment SET responce_gateway='$responce_gateway' WHERE order_id = ".$orderiddetails[1]);
	    $con->query($sql);
		$sql_update_status = mysqli_query($con,"UPDATE newmember SET status ='1' WHERE order_id =".$orderiddetails[1]);
		header("location:https://www.acma.in/thankyou-annual_session.php");
		
	}
	else if($order_status==="Aborted")
	{
	    $responce_gateway = "Order Status : Aborted";
	    $sql = "UPDATE online_payment SET responce_gateway='$responce_gateway' WHERE order_id = ".$orderiddetails[1];
		echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
	   $con->query($sql);
	}
	else if($order_status==="Failure")
	{
	    $responce_gateway = "Order Status : Failed";
	    $sql = mysqli_query($con, "UPDATE online_payment SET responce_gateway='$responce_gateway' WHERE order_id = ".$orderiddetails[1]);
		echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
		$con->query($sql);
	}
	else
	{
		echo "<br>Security Error. Illegal access detected";
	
	}
?>
