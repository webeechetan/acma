<?php
error_reporting("E_ALL");
include( __DIR__."/../config.php" );
global $antiXss;
$_GET = $antiXss->xss_clean($_GET);
$_POST = $antiXss->xss_clean($_POST);
$message='';
if (isset($_POST['username']) && isset($_POST['password']))
{	  

	
	$username=$_POST['username'];
	$password=md5($_POST['password']);

	
	$user = App\Models\User::where('username','=',$username)->where('password','=',$password)->first();
	
    if(isset($_POST['g-recaptcha-response']))
        $captcha=$_POST['g-recaptcha-response'];

    if(!$captcha){
        $message='<h2>Please check the the captcha form.</h2>';
    }else{
    
	$response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LedyJ0UAAAAAAl1ogpyCYU8Zj1RltS0qGlV5zNk&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
    if($response['success'] == false)
    {
        $message='<h2>You are spammer.</h2>';
    }else{
	if ($user)
	{
		
		 $_SESSION['useradmin']=$user->username;
		 $_SESSION['useradmin_id']=$user->uid;
		//  echo $_SESSION['useradmin_id'];
		//  die(); //
		 header("location:index.php");
		 exit;
  	}
  	else
  	{
		$message='<p class="alert">User Name Or Password Invalid!</p>';
	}
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login - ACMA ADMIN</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.php">
				ACMA ADMIN			
			</a>
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
		<script src='https://www.google.com/recaptcha/api.js'></script> 
		<form action="#" method="post">
		
			<h1>Member Login</h1>		
			
			<div class="login-fields">
				
				<p>Please provide your details</p>
				<?php if(isset($message)){ ?>
				<?php echo $message;?>
				<?php }?>
				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				<div class="field">
				<div class="g-recaptcha" data-sitekey="6LedyJ0UAAAAAH_QMd0rmrWbX5XhQAT6K8Nj8Q_T"></div>
				</div>
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
									
				<button class="button btn btn-success btn-large">Sign In</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>

</body>

</html>

