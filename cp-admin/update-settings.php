<?php
include( __DIR__."/../config.php" );
include(__DIR__."/validate_login.php" );

use Illuminate\Filesystem\Filesystem;
global $antiXss;
$_GET = $antiXss->xss_clean($_GET);
$_POST = $antiXss->xss_clean($_POST);


if(isset($_POST['address'])){
	$postid = (int)$_POST['postid'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$emailid = $_POST['emailid'];
	$helpline = $_POST['helpline'];
	$website = $_POST['website'];
	
	$SettingWebsite = App\Models\SettingWebsite::find($postid);
	$SettingWebsite->address = $address;
	$SettingWebsite->phone = $phone;
	$SettingWebsite->emailid = $emailid;
	$SettingWebsite->helpline = $helpline;
	$SettingWebsite->website = $website;
	$SettingWebsite->save();
	
	$target = FS_IMAGES_PATH.'/websites/';
	
	if(isset($_FILES['image1'])){
		
		  $imageInfo = getimagesize( $_FILES['image1']['tmp_name'] );
		   if ( $imageInfo['mime'] == ( "image/png" ) || $imageInfo['mime'] == ( "image/jpeg" ) ) {
			if(copy($_FILES['image1']['tmp_name'],$target.basename($_FILES['image1']['name']) )) 
			{
				$imge1name = basename($_FILES['image1']['name']);
				$SettingWebsite->logo=$imge1name ;
			}
		   }	
	
	}
	$SettingWebsite->save();
    header( 'location:update-settings.php?id=1&msg=update' );	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<title>Nomads Admin</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="header">
		<h1>Nomads Admin Panel</h1>
		<span><a href="logout.php"> Logout </a></span>
		<div class="clear"></div>
	</div>
	<div class="main">
		<div class="left-sidebar">
			<?php include('menu.php');?>
		</div>
		<div class="content">
			<h2>Website Settings</h2>
            <?php 
			 $settings = App\Models\SettingWebsite::find((int)$_GET['id']);
			?>
			<form action="" method="post" name="frm" enctype="multipart/form-data">
            <input type="hidden" name="postid" value="<?php echo $settings->id;?>" />
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td width="200">Address </td>
					<td><input type="text" name="address" value="<?php echo $settings->address;?>" required>
					</td>
				</tr>
				<tr>
					<td width="200">Email </td>
					<td><input type="text" name="emailid" value="<?php echo $settings->emailid;?>" required>
					</td>
				</tr>
				<tr>
					<td width="200">Phone </td>
					<td><input type="text" name="phone" value="<?php echo $settings->phone;?>" required>
					</td>
				</tr>
				<tr>
					<td width="200">Travel Helpline </td>
					<td><input type="text" name="helpline" value="<?php echo $settings->helpline;?>" required>
					</td>
				</tr>
				<tr>
					<td width="200">Website </td>
					<td><input type="text" name="website" value="<?php echo $settings->website;?>" required>
					</td>
				</tr>
				<tr>
					<td>Site Logo</td>
					<td><input type="file" name="image1" ><?php if(!empty($settings->logo)){?><img src="../images/websites/<?php echo $settings->logo;?>"><?php }?>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="action" value="Update"> <input type="reset" value="Cancel">
					</td>
				</tr>
			</table>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</body>

</html>