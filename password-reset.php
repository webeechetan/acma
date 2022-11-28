<?php 
include( "includes/header-new.php");
date_default_timezone_set('Asia/Kolkata');
use Carbon\Carbon;
$error = false;
$error_msg = "";
$user_id = 0;
if(isset($_GET['otp']) && isset($_GET['email'])){
	$email = $_GET['email'];
	$otp = $_GET['otp'];
    $user = App\Models\MembersTable::where('email',$email)->first();
	$user_id = $user->id;
	if($user){
		if($otp==$user->otp){
			$otp_created_at = $user->otp_created_at;
			// echo Carbon::now().' - ';
			// echo $otp_created_at.' - ';
			$otp_expire_at = Carbon::parse($otp_created_at)->addMinutes(5);
			// echo $otp_expire_at;
			if(Carbon::now() > $otp_expire_at){
				$error = true;
				$error_msg = 'Link Expired';
			}else{
				$error = false;
			}
		}else{
			$error = true;
			$error_msg = 'Invalid OTP';
		}
	}else{
		$error = true;
		$error_msg = 'Invalid Parameters';
	}
}else{
	$error = true;
	$error_msg = 'Something Went Wrong';
}


if(isset($_POST['password'])){
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	if($password == $cpassword){
		$id = $_POST['id'];
		$user = App\Models\MembersTable::where('id',$id)->first();
		$user->password = password_hash($password,PASSWORD_DEFAULT);
		$user->otp = '0';
		if($user->save()){
			$error_msg = 'Password updated';
		}
	}else{
		$error_msg = 'Password not match with confirm password';
	}
}




?>

<!-- EV Pilocy Content -->
<section class="ev-policy-sec sec-space pb-0">
    <div class="container">
        <div class="row">
           <div class="col-md-12 mb-4">
				<h3 class="text-center title-big text-center "><b>Password Reset </b></h3>	
				<h6 class="text-center title-small text-center text-danger"><b><?php echo $error_msg;?></b></h6>	

			</div>
			<?php if(!$error){?>
            <div class="col-4 offset-4">
               <div class="">
					<form method="post">
						<div class="form-group">
							<lable>New Password</lable>
							<input type="text" class="form-control" name="password" placeholder="New Password">
						</div>
						<div class="form-group">
							<lable>Confirm New Password</lable>
							<input type="text" class="form-control" name="cpassword" placeholder="Confirm New Password">
						</div>
						<input type="hidden" name="id" value="<?php echo $user_id;?>">
						<button type="submit" class="btn btn-green">Save</button>
					</form> 
               </div>   
            </div>  
			<?php }?>  
        </div>   
    </div>
</section>   
<!--Banner end-->
<?php include( 'includes/footer-new.php')?>