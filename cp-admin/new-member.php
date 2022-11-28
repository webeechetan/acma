<?php 
include("header.php");

if(isset($_POST['name'])){
	validate_csrf();
	$name = $_POST['name'];	
	$email = $_POST['email'];
	$phone = $_POST['phone'];
    $website = $_POST['website'];
    $mainaddress = $_POST['mainaddress'];
    $trademark = $_POST['trademark'];
	$company = $_POST['company'];
    $region = $_POST['region'];
    $userid = $_POST['userid'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    // $password = $_POST['password'];
	
    $members = new App\Models\MembersTable();
	$members->name = $name;
	$members->email = $email;
	$members->phone = $phone;
    $members->website = $website;
    $members->mainaddress = $mainaddress;
    $members->trademark = $trademark;
    $members->company = $company;
    $members->region = $region;
    $members->userid = $userid;
    $members->password = $password;
	$members->save();	

	header( 'location:all-members.php?msg=add' );	
	exit;
}
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> New Member</h3>
            </div>
            <div class="widget-content">
            <form name="frm" method="post" enctype="multipart/form-data">
				<?php csrf(); ?>
			<table cellpadding="0" cellspacing="0" width="100%">
			    <tr>
					<td width="200">Name</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td width="200">Email</td>
					<td><input required type="text" name="email"></td>
				</tr>
				<tr>
					<td width="200">Phone</td>
					<td><input type="text" name="phone"></td>
				</tr>
				<tr>
					<td width="200">Website</td>
					<td><input type="text" name="website"></td>
				</tr>
				<tr>
					<td width="200">Main Plant Address</td>
					<td><input type="text" name="mainaddress"></td>
				</tr>
				<tr>
					<td width="200">Trade Mark</td>
					<td><input type="text" name="trademark"></td>
				</tr>
				<tr>
					<td width="200">Company</td>
					<td><input type="text" name="company"></td>
				</tr>
				<tr>
					<td width="200">Region</td>
					<td><input type="text" name="region"></td>
				</tr>
				<tr>
					<td width="200">User Id</td>
					<td><input type="text" required name="userid"></td>
				</tr>
				<tr>
					<td width="200">Password</td>
					<td><input type="text" required name="password"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="action" value="Submit"> <input type="reset" value="Cancel"></td>
				</tr>
			  </table></form>
			  </div>  
          </div>    
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<?php include("footer.php");?>