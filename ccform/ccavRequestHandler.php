<html>
<head>
<title> Custom Form Kit </title>
</head>
<body>
<center>

<?php include('Crypto.php')?>
<?php 
include( __DIR__."/../config.php" );
use Cocur\Slugify\Slugify;
use Illuminate\Filesystem\Filesystem;
global $antiXss;
$_GET = $antiXss->xss_clean($_GET);
$_POST = $antiXss->xss_clean($_POST);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	// error_reporting(0);
	
	$merchant_data='';
	$working_key='1F05C130CAA6BC9289CA13796E548EDD';//Shared by CCAVENUES
	$access_code='AVOI77FD49BH25IOHB';//Shared by CCAVENUES
    $can_submit = true;
    $message = '';
    if(isset($_POST['formname'])){
        $form_name = $_POST['formname'];
    }else{
        $form_name = "";
    }
    if(isset($_POST['g-recaptcha-response'])){
        $captcha=$_POST['g-recaptcha-response'];
    }

    if(!$captcha){
        $can_submit = false;
        $message='Please check the the captcha form.';
    }else{
        $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LedyJ0UAAAAAAl1ogpyCYU8Zj1RltS0qGlV5zNk&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        if($response['success'] == false)
        {
            $can_submit = false;
            $message='You are spammer.';
        }
    }

    $delegates_form_url = "https://acma.in/delegates-form.php";
    $sponser_form_url = "https://acma.in/sponsors-form.php";
    $pay_now_form_url = "https://www.acma.in/payment-online.php";


    if(($form_name == 'sponsors_session_form' || $form_name =='deligates_session_form' || $form_name == 'Paynow Form') && $can_submit==false){
        $_SESSION['captcha_msg'] = $message;
        if($form_name=='sponsors_session_form'){
            echo "<script>location.href='$sponser_form_url'</script>";
        }
        if($form_name=='Paynow Form'){
            echo "<script>location.href='$pay_now_form_url'</script>";
        }
        if($form_name=='deligates_session_form'){
            echo "<script>location.href='$delegates_form_url'</script>";
        }
        die;
    }



	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.urlencode($value).'&';
	}

	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
	
	//new
	
	if(isset($_POST['billing_name'])){
	
    	$billing_name = $_POST['billing_name'];	
    	$designation = $_POST['designation'];
    	$billing_email = $_POST['billing_email'];
        $billing_tel = $_POST['billing_tel'];
        $billing_date = date('Y-m-d H:i:s');
        $company_name = $_POST['company_name'];
        $event_name = $_POST['event_name'];
    	$gstno = $_POST['gstno'];
        $billing_address = $_POST['billing_address'];
        $amount = $_POST['amount'];
        $tds_amount = $_POST['tds_amount'];
        $currency = $_POST['currency'];
        $payment_type = $_POST['payment_type'];
        $payment_option = $_POST['payment_option'];
        $agree = $_POST['agree'];
        $order_id = $_POST['order_id'];
        $status = $_POST['status'];
        $tid = $_POST['tid'];
        $taxinovice = $_POST['taxinovice'];
        $formname = $_POST['formname'];
        if(isset($_SESSION)){
            $_SESSION['name'] = $billing_name;
            $_SESSION['billing_date'] = $billing_date;
            $_SESSION['amount'] = $amount;
         }else{
            session_start();
            $_SESSION['name'] = $billing_name;
            $_SESSION['billing_date'] = $billing_date;
            $_SESSION['amount'] = $amount;
        }
        // print_r($tid);
        // die;
    	//end new code
        $payment = new App\Models\OnlinePaymentTable();
    	$payment->billing_name = $billing_name;
    	$payment->designation = $designation;
    	$payment->billing_email = $billing_email;
        $payment->billing_tel = $billing_tel;
        $payment->company_name = $company_name;
        $payment->event_name = $event_name;
        $payment->gstno = $gstno;
        $payment->billing_address = $billing_address;
        $payment->amount = $amount;
        $payment->tds_amount = $tds_amount;
        $payment->currency = $currency;
        $payment->payment_type = $payment_type;
        $payment->payment_option = $payment_option;
        $payment->agree = $agree;
        $payment->order_id = $order_id;
        $payment->status = "0";
        $payment->tid = $tid;
        $payment->taxinovice = $taxinovice;
        $payment->formname = $formname;
        $payment->billing_date = $billing_date;
    	$payment->save();
    // 	new
    
    	
    	
    	
    	$username="webeesocial";
        $password ="webeesocial";
        $number=$billing_tel;
        $sender="ACMAAS";
        $message="Thank you for registering for 6th ACMA Technology Summit and Awards 2021. You will receive the event joining link prior to summit.";
    	$url="login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($number)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3'); 
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        echo $curl_scraped_page = curl_exec($ch);
        curl_close($ch); 
    }

?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

