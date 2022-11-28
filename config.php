<?php
error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(!function_exists('printe')){
    session_start();
    require __DIR__."/bootstrap.php";
    if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
        define("BASEPATH",'https://www.acma.in/');
    }else{
        define("BASEPATH",'https://www.acma.in/');
    }
    date_default_timezone_set( 'asia/kolkata' );
    define("FS_UPLOADS_PATH",__DIR__.'/uploads');
    define("SITE_EMAIL",'acma@acma.in');
    define("SITE_NAME",'ACMA');
    function printe(){
        echo "<pre>".print_r(func_get_args(),true)."</pre>";

    }


	function mail_setup()
	{

		$Mail = new PHPMailer(true);
		$Mail->SetLanguage("en","");
		$Mail->IsHTML(true);
		$Mail->Priority = 3;
		$Mail->Encoding = "8bit";
		$Mail->CharSet = "iso-8859-1";
		$Mail->WordWrap = 0;
		$Mail->Mailer = "mail";
		$Mail->IsSMTP();
		//$Mail->Host       = "smtp.gmail.com"; 
		$Mail->SMTPAuth   = true;
		$Mail->Port       = 587; 
		$Mail->SMTPSecure = 'tls';
		//$Mail->Username   = "noreply@ghj.com"; 
		$Mail->Password   = "jhgj<24";        
		$Mail->From =SITE_EMAIL;
		$Mail->FromName =SITE_NAME;
		//$Mail->Sender = "holidays@hjhgj.in";
		return $Mail;		
	}
}
use voku\helper\AntiXSS;
$antiXss = new AntiXSS();
