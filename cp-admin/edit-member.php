<?php include("header.php");

if(isset($_POST['name'])){
    $postid = $_POST['postid'];
	$name = $_POST['name'];	
	$email = $_POST['email'];
	$phone = $_POST['phone'];
    $website = $_POST['website'];
    $mainaddress = $_POST['mainaddress'];
    $trademark = $_POST['trademark'];
	$company = $_POST['company'];
    $region = $_POST['region'];
    $userid = $_POST['userid'];
	
    $members = App\Models\MembersTable::find($postid);
	$members->name = $name;
	$members->email = $email;
	$members->phone = $phone;
    $members->website = $website;
    $members->mainaddress = $mainaddress;
    $members->trademark = $trademark;
    $members->company = $company;
    $members->region = $region;
    $members->userid = $userid;
	$members->save();	

	header( 'location:all-members.php?msg=update' );	
	exit;
}
$member = App\Models\MembersTable::find((int)$_GET['id']);
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Edit Member</h3>
            </div>
            <div class="widget-content">
            <form name="frm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="postid" value="<?php echo $member->id;?>">
			<table cellpadding="0" cellspacing="0" width="100%">
			    <tr>
					<td width="200">Name</td>
					<td><input type="text" name="name" value="<?php echo $member->name;?>"></td>
				</tr>
				<tr>
					<td width="200">Email</td>
					<td><input type="text" name="email" value="<?php echo $member->email;?>"></td>
				</tr>
				<tr>
					<td width="200">Phone</td>
					<td><input type="text" name="phone" value="<?php echo $member->phone;?>"></td>
				</tr>
				<tr>
					<td width="200">Website</td>
					<td><input type="text" name="website" value="<?php echo $member->website;?>"></td>
				</tr>
				<tr>
					<td width="200">Main Plant Address</td>
					<td><input type="text" name="mainaddress" value="<?php echo $member->mainaddress;?>"></td>
				</tr>
				<tr>
					<td width="200">Trade Mark</td>
					<td><input type="text" name="trademark" value="<?php echo $member->trademark;?>"></td>
				</tr>
				<tr>
					<td width="200">Company</td>
					<td><input type="text" name="company" value="<?php echo $member->company;?>"></td>
				</tr>
				<tr>
					<td width="200">Region</td>
					<td><input type="text" name="region" value="<?php echo $member->region;?>"></td>
				</tr>
				<tr>
					<td width="200">UserId</td>
					<td><input type="text" name="userid" value="<?php echo $member->userid;?>"></td>
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