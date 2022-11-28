<?php 
include('Crypto.php');

if($captcha_success_flag){
	$merchant_data = '';
	$working_key="1E44C04560288076E8EEEE9F3D87F263";
	$access_code="AVVU82GA93BJ27UVJB";

	$order_id_string_encrypt	=	encrypt($order_id_string,$working_key);
	$order_id					=	substr($order_id_string_encrypt, 2, 10);

	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.urlencode($value).'&';
	}
	$merchant_data  =  'order_id='.$order_id.'&'.$merchant_data;
	$encrypted_data =   encrypt($merchant_data,$working_key);

	
	?>
	<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
	<input type="hidden" name="encRequest" value="<?php echo $encrypted_data;?>" >
	<input type="hidden" name="access_code" value="<?php echo $access_code;?>" >
	<input type="hidden" name="order_id" value="<?php echo $order_id;?>" >
	</form>
	<script language='javascript'>document.redirect.submit();</script>
	<?php
}
?>