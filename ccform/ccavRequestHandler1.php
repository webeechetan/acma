<html>
<head>
<title> Custom Form Kit </title>
</head>
<body>
<center>

<?php include('Crypto1.php')?>
<?php 
include( __DIR__."/../config.php" );
use Cocur\Slugify\Slugify;
use Illuminate\Filesystem\Filesystem;
global $antiXss;
$_GET = $antiXss->xss_clean($_GET);
$_POST = $antiXss->xss_clean($_POST);
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

    if($form_name == 'sponsors_session_form' || $form_name =='deligates_session_form' && $can_submit==false){
        $_SESSION['captcha_msg'] = $message;
        if($form_name=='sponsors_session_form'){
            echo "<script>location.href='$sponser_form_url'</script>";
        }
        if($form_name=='deligates_session_form'){
            echo "<script>location.href='$delegates_form_url'</script>";
        }
        die;
    }
    $gst = 0;
	foreach ($_POST as $key => $value){
        if($key=='amount' && $form_name = 'deligates_session_form'){
            $amt = $value;
            $amt = $amt/100;
            $amt = $amt * 18;
            $gst = $amt;
            $value = $value + $amt;
        }
		$merchant_data.=$key.'='.urlencode($value).'&';
	}

	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
	
	//new
	
	if(isset($_POST['billing_name'])){
	
    	$billing_name = $_POST['billing_name'];	
    	$designation = $_POST['designation'];
    	$billing_email = $_POST['billing_email'];
        $billing_tel = $_POST['billing_tel'];
        $billing_date = $_POST['billing_date'];
        $company_name = $_POST['company_name'];
        $event_name = $_POST['event_name'];
    	$gstno = $_POST['gstno'];
        $billing_address = $_POST['billing_address'];
        $amount = $_POST['amount'] + $gst;
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
        // new code start
        //name field
        $member_name2=$_POST['member_name2'];
         $member_name3=$_POST['member_name3'];
         $member_name4=$_POST['member_name4'];
      $member_name5=$_POST['member_name5'];
         $member_name6=$_POST['member_name6'];
         $member_name7=$_POST['member_name7'];
        $member_name8=$_POST['member_name8'];
         $member_name9=$_POST['member_name9'];
          $member_name10=$_POST['member_name10'];
          $member_name11=$_POST['member_name11'];
          $member_name12=$_POST['member_name12'];
          $member_name13=$_POST['member_name13'];
         $member_name14=$_POST['member_name14'];
         $member_name15=$_POST['member_name15'];
        $member_name16=$_POST['member_name16'];
     $member_name17=$_POST['member_name17'];
          $member_name18=$_POST['member_name18'];
        $member_name19=$_POST['member_name19'];
      $member_name20=$_POST['member_name20'];
                    //member degiganation
          $member_designation2=$_POST['member_designation2'];
        $member_designation3=$_POST['member_designation3'];
         $member_designation4=$_POST['member_designation4'];
      $member_designation5=$_POST['member_designation5'];
          $member_designation6=$_POST['member_designation6'];
           $member_designation7=$_POST['member_designation7'];
          $member_designation8=$_POST['member_designation8'];
          $member_designation9=$_POST['member_designation9'];
          $member_designation10=$_POST['member_designation10'];
          $member_designation11=$_POST['member_designation11'];
         $member_designation12=$_POST['member_designation12'];

          $member_designation13=$_POST['member_designation13'];
         $member_designation14=$_POST['member_designation14'];
          $member_designation15=$_POST['member_designation15'];
          $member_designation16=$_POST['member_designation16'];
          $member_designation17=$_POST['member_designation17'];
          $member_designation18=$_POST['member_designation18'];
         $member_designation19=$_POST['member_designation19'];
          $member_designation20=$_POST['member_designation20'];
            // email
            $member_email2=$_POST['member_email2'];
            $member_email3=$_POST['member_email3'];
        $member_email4=$_POST['member_email4'];
         $member_email5=$_POST['member_email5'];
          $member_email6=$_POST['member_email6'];
              $member_email7=$_POST['member_email7'];
          $member_email8=$_POST['member_email8'];
          $member_email9=$_POST['member_email9'];
            $member_email10=$_POST['member_email10'];
            $member_email11=$_POST['member_email11'];
             $member_email12=$_POST['member_email12'];
             $member_email13=$_POST['member_email13'];
             $member_email14=$_POST['member_email14'];
             $member_email15=$_POST['member_email15'];
             $member_email16=$_POST['member_email16'];
             $member_email17=$_POST['member_email17'];
             $member_email18=$_POST['member_email18'];
             $member_email19=$_POST['member_email19'];
             $member_email20=$_POST['member_email20'];
        //     //teliphone
            $member_tel2=$_POST['member_tel2'];
            $member_tel3=$_POST['member_tel3'];
         $member_tel4=$_POST['member_tel4'];
         $member_tel5=$_POST['member_tel5'];
            $member_tel6=$_POST['member_tel6'];
            $member_tel7=$_POST['member_tel7'];
            $member_tel8=$_POST['member_tel8'];
            $member_tel9=$_POST['member_tel9'];
            $member_tel10=$_POST['member_tel10'];
            $member_tel11=$_POST['member_tel11'];
            $member_tel12=$_POST['member_tel12'];
            $member_tel13=$_POST['member_tel13'];
            $member_tel14=$_POST['member_tel14'];
            $member_tel15=$_POST['member_tel15'];
            $member_tel16=$_POST['member_tel16'];
            $member_tel17=$_POST['member_tel17'];
            $member_tel18=$_POST['member_tel18'];
            $member_tel19=$_POST['member_tel19'];
            $member_tel20=$_POST['member_tel20'];
           
       $con=mysqli_connect("localhost","techtonic","d#4ab01db3!bT","acma_web");
    // Check connection
    
        $sql="INSERT INTO newmember(billing_name,designation,billing_email,billing_tel,member_name2,member_designation2,member_email2,member_tel2,member_name3,member_designation3,member_email3,member_tel3,member_name4,member_designation4,member_email4,member_tel4,member_name5,member_designation5,member_email5,member_tel5,member_name6,member_designation6,member_email6,member_tel6,member_name7,member_designation7,member_email7,member_tel7,member_name8,member_designation8,member_email8,member_tel8,member_name9,member_designation9,member_email9,member_tel9,member_name10,member_designation10,member_email10,member_tel10,member_name11,member_designation11,member_email11,member_tel11,member_name12,member_designation12,member_email12,member_tel12,member_name13,member_designation13,member_email13,member_tel13,member_name14,member_designation14,member_email14,member_tel14,member_name15,member_designation15,member_email15,member_tel15,member_name16,member_designation16,member_email16,member_tel16,member_name17,member_designation17,member_email17,member_tel17,member_name18,member_designation18,member_email18,member_tel18,member_name19,member_designation19,member_email19,member_tel19,member_name20,member_designation20,member_email20,member_tel20,order_id) 
                VALUES('$billing_name','$designation','$billing_email','$billing_tel','$member_name2','$member_designation2','$member_email2','$member_tel2','$member_name3','$member_designation3','$member_email3','$member_tel3','$member_name4','$member_designation4','$member_email4','$member_tel4','$member_name5','$member_designation5','$member_email5','$member_tel5','$member_name6','$member_designation6','$member_email6','$member_tel6','$member_name7','$member_designation7','$member_email7','$member_tel7','$member_name8','$member_designation8','$member_email8','$member_tel8','$member_name9','$member_designation9','$member_email9','$member_tel9','$member_name10','$member_designation10','$member_email10','$member_tel10','$member_name11','$member_designation11','$member_email11','$member_tel11','$member_name12','$member_designation12','$member_email12','$member_tel12','$member_name13','$member_designation13','$member_email13','$member_tel13','$member_name14','$member_designation14','$member_email14','$member_tel14','$member_name15','$member_designation15','$member_email15','$member_tel15','$member_name16','$member_designation16','$member_email16','$member_tel16','$member_name17','$member_designation17','$member_email17','$member_tel17','$member_name18','$member_designation18','$member_email18','$member_tel18','$member_name19','$member_designation19','$member_email19','$member_tel19','$member_name20','$member_designation20','$member_email20','$member_tel20','$order_id')";
           $row= mysqli_query($con,$sql);
        
    //   if($row){
    //       echo"ii";
    //   }else{
    //       echo"".mysqli_error($con);
    //   }
    //   die();
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
    //	$payment->member_name2=$member_name2;
    //	$payment->member_designation2=$member_designation2;
    //	$payment->member_email2=$member_email2;
    //	$payment->member_tel22=$member_tel2;
    	
    	
    	
    	$username="webeesocial";
        $password ="webeesocial";
        $number=$billing_tel;
        $sender="ACMAAS";
        $message="Thank you for registering for the 59th ACMA Annual Session. We're glad that you will be taking part, and look forward to seeing you at the event.";
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

