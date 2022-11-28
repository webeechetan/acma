<!DOCTYPE html> 
<html lang="en" class="ie ie9">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>

    <!-- Mobile Specific Metas
    +++++++++++++++++++++++++++ -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="shortcut icon" href="img/favicon.ico">
<title>ACMA Automotive Component Manufacturers Association of India</title>

<link href="../css/bootstrap.css" rel="stylesheet" media="all">
<link href="../css/animate.min.css" rel="stylesheet" media="all">
<link href="../css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="../css/css-font.css" rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<link href="../css/menu.css" rel="stylesheet" type="text/css">
<link href="../css/menu-event.css" rel="stylesheet" type="text/css">
<style type="text/css">
    #cir-head{margin-top:0;}
    #cir-head input[type="radio"], input[type="checkbox"]{float: none; margin-top:0;}
    /*.cir{padding:20px;}*/
    .mr30{margin-left: 30px;}
    .mt8{ float: left; line-height: 26px;}
    #cir-head label{width: 32%;}
    #cir-head input[type="text"]{width: 67%;}
    #cir-head textarea{width: 72%;}
    #cir-head span{vertical-align: middle;}
    @media only screen and (min-width:767px){
        #cir-head .wdt label{width: 16%;}
        #cir-head .wdt textarea{width: 83%;}
    }
</style>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery-1.10.1.min.js" type="text/javascript"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.js"></script>

<script type="text/javascript">
var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23756457-1']);
  _gaq.push(['_trackPageview']);
   (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>
</head>

<body>
<div class="main">
<!-- Header -->
<?php include("../header.php"); ?>
<!-- End Header -->
<div class="clr"></div>
<!-- Main Container -->  
<div id="acma">
 <div class="container">
<!-- Aside -->
<section id="acma-0">
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="acma-top-pad20 acma-bottom-pad40">

<?php 
include('Crypto.php');

$workingKey     =   '1E44C04560288076E8EEEE9F3D87F263';
$encResponse    =   $_POST["enc_response"];
$responseData   =   decrypt($encResponse,$workingKey);
$order_status   =   "";
$responseDataArray  =   explode('&', $responseData);
//echo "<pre>";print_r($responseDataArray);
$dataSize=sizeof($responseDataArray);

//echo $responseData;echo "<br /><br /><br />";

function parameterValue($parameter_name, $responseDataArray)
{
    if($parameter_name == 'order_id') $index        =   0;
    if($parameter_name == 'tracking_id') $index     =   1;
    if($parameter_name == 'bank_ref_no') $index     =   2;
    if($parameter_name == 'order_status') $index    =   3;
    if($parameter_name == 'failure_message') $index =   4;
    if($parameter_name == 'payment_mode') $index    =   5;
    if($parameter_name == 'delivery_name') $index   =   19;
    if($parameter_name == 'delivery_address') $index=   20;
    if($parameter_name == 'delivery_city') $index   =   21;
    if($parameter_name == 'delivery_state') $index  =   22;
    if($parameter_name == 'delivery_zip') $index    =   23;
    if($parameter_name == 'delivery_country') $index=   24;
    if($parameter_name == 'delivery_tel') $index    =   25;
    if($parameter_name == 'trans_date') $index      =   40;  

    $parameter          =   $responseDataArray[$index];
    $parameter_array    =   explode("=",$parameter);
    return $parameter_value    =   $parameter_array[1];
}

$order_id       =   parameterValue('order_id', $responseDataArray);
$tracking_id    =   parameterValue('tracking_id', $responseDataArray);
$bank_ref_no    =   parameterValue('bank_ref_no', $responseDataArray);
$order_status   =   parameterValue('order_status', $responseDataArray);
$failure_message=   parameterValue('failure_message', $responseDataArray);
$payment_mode   =   parameterValue('payment_mode', $responseDataArray);
$delivery_name  =   parameterValue('delivery_name', $responseDataArray);
$delivery_address=  parameterValue('delivery_address', $responseDataArray);
$delivery_city  =   parameterValue('delivery_city', $responseDataArray);
$delivery_state =   parameterValue('delivery_state', $responseDataArray);
$delivery_zip   =   parameterValue('delivery_zip', $responseDataArray);
$delivery_country=  parameterValue('delivery_country', $responseDataArray);
$delivery_tel   =   parameterValue('delivery_tel', $responseDataArray);
$response_date  =   parameterValue('trans_date', $responseDataArray);

for($i = 0; $i < $dataSize; $i++) 
{
    $information=explode('=',$responseDataArray[$i]);
    if($i==3)   $order_status=$information[1];
    
    
}

if($order_status==="Success")
{
	echo "Success";
}
else if($order_status==="Aborted")
{
    echo "<br><div class='alert alert-warning' role='alert'>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail.</div>";

}
else if($order_status==="Failure")
{
    echo "<br><div class='alert alert-danger' role='alert'>The transaction has been declined.<br><a href=''>Please try again.</a></div>";
}
else
{
    echo "<br>Security Error. Illegal access detected";

}

echo "<br><br>";

echo "<table cellspacing=4 cellpadding=4>";
for($i = 0; $i < $dataSize; $i++) 
{
    $information=explode('=',$responseDataArray[$i]);
        echo '<tr><td>'.$information[0].'</td><td>'.urldecode($information[1]).'</td></tr>';
}

echo "</table><br>";
?>

</div>
</div>
</div>
</section>

</div>
</div>
</div>

</body>
</html>
