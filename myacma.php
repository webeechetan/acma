<?php include("includes/header.php");
$message='';
if (isset($_POST['staffusername']) && isset($_POST['staffpassword']))
{	  
	$staffusername=$_POST['staffusername'];
	$staffpassword=$_POST['staffpassword'];

	
	$staff = App\Models\Staff::where('userid','=',$staffusername)->where('password','=',$staffpassword)->first();
	
    if(isset($_POST['g-recaptcha-response']))
        $captcha=$_POST['g-recaptcha-response'];

    if(!$captcha){
        $message='<h2>Please check the the captcha form.</h2>';
    }else{
    
	$response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LedyJ0UAAAAAAl1ogpyCYU8Zj1RltS0qGlV5zNk&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
    if($response['success'] == false)
    {
        $message='<p class="alert">You are spammer.</p>';
    }else{
	if ($staff)
	{
		 $_SESSION['userstaff']=$staff->userid;
		 $_SESSION['userstaffid']=$staff->uid;
		 header("Location:my-staff-page.php");
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
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="introimg">
        <div class="container">
          <div class="secondarymenu">  
           <div class="row">
             <div class="secondarymenu-right">
                <?php include("includes/secondaory-menu.php");?>
             </div>
           </div>
          </div>
        </div>
    </div>
  </section><!-- #intro -->
  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="innerpage">
      <div class="container">
          <div class="row">
          <div class="col-sm-12">
          <div class="my-account-dashboard">
              <div class="account-container">
	           <div class="content clearfix">
              <script src='https://www.google.com/recaptcha/api.js'></script> 
        		<form action="" method="post">
        		
        			<h1>Employee Login</h1>		
        			
        			<div class="login-fields">
        				<?php if(isset($message)){ ?>
        				<?php echo $message;?>
        				<?php }?>
        				<div class="field">
        					<label for="username">Username</label>
        					<input type="text" id="staffusername" name="staffusername" value="" placeholder="Username" class="login username-field" />
        				</div> <!-- /field -->
        				
        				<div class="field">
        					<label for="password">Password:</label>
        					<input type="password" id="staffpassword" name="staffpassword" value="" placeholder="Password" class="login password-field"/>
        				</div> <!-- /password -->
        				<div class="field">
        				<div class="g-recaptcha" data-sitekey="6LedyJ0UAAAAAH_QMd0rmrWbX5XhQAT6K8Nj8Q_T"></div>
        				</div>
        				
        			</div> <!-- /login-fields -->
        			
        			<div class="login-actions">
        									
        				<button class="button btn btn-success btn-large">Sign In</button>
        				
        			</div> <!-- .actions -->
        		</form>
        		</div>
        	</div>	
          </div>
      </div></div></div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>