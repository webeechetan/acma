<?php include("header.php");

if(isset($_POST['name'])){
    
	$postid = $_POST['postid'];
	$name = $_POST['name'];
	$email = $_POST['email'];
    $adress1 = $_POST['adress1'];
    $city = $_POST['city'];	
	$state = $_POST['state'];
    $country = $_POST['country'];
    $pin = $_POST['pin'];	
	$company = $_POST['company'];
    $relegion = $_POST['relegion'];
    $phone = $_POST['phone'];
    $fax = $_POST['fax'];
    $website = $_POST['website'];
    $products = $_POST['products'];
    $register_day = $_POST['register_day'];
    $register_month = $_POST['register_month'];
    $register_year = $_POST['register_year'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $access_allowed = $_POST['access_allowed'];
    $access_to_forum = $_POST['access_to_forum'];
    $access_to_ec_forum = $_POST['access_to_ec_forum'];
    $create_profile = $_POST['create_profile'];
    $acma_member = $_POST['acma_member'];
    $acma_ipo_member = $_POST['acma_ipo_member'];
    $acma_staff = $_POST['acma_staff'];
	
    $members = App\Models\MembersTable::find($postid);
	$members->name = $name;
	$members->email = $email;
    $members->adress1 = $adress1;
    $members->city = $city;
    $members->state = $state;
    $members->country = $country;
    $members->pin = $pin;
    $members->company = $company;
    $members->relegion = $relegion;
    $members->phone = $phone;
    $members->fax = $fax;
    $members->website = $website;
    $members->products = $products;
    $members->register_day = $register_day;
    $members->register_month = $register_month;
    $members->register_year = $register_year;
    $members->username = $username;
    $members->password = $password;
    $members->access_allowed = $access_allowed;
    $members->access_to_forum = $access_to_forum;
    $members->access_to_ec_forum = $access_to_ec_forum;
    $members->create_profile = $create_profile;
    $members->acma_member = $acma_member;
    $members->acma_ipo_member = $acma_ipo_member;
    $members->acma_staff = $acma_staff;
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
					<td width="200">Address</td>
					<td><input type="text" name="adress1" value="<?php echo $member->adress1;?>"></td>
				</tr>
				<tr>
					<td width="200">City</td>
					<td><input type="text" name="city" value="<?php echo $member->city;?>"></td>
				</tr>
				<tr>
					<td width="200">State</td>
					<td><input type="text" name="state" value="<?php echo $member->state;?>"></td>
				</tr>
				<tr>
					<td width="200">Country</td>
					<td><input type="text" name="country" value="<?php echo $member->country;?>"></td>
				</tr>
				<tr>
					<td width="200">Pincode</td>
					<td><input type="text" name="pin" value="<?php echo $member->name;?>"></td>
				</tr>
				<tr>
					<td width="200">Company</td>
					<td><input type="text" name="company" value="<?php echo $member->company;?>"></td>
				</tr>
				<tr>
					<td width="200">Religon</td>
					<td><input type="text" name="relegion" value="<?php echo $member->relegion;?>"></td>
				</tr>
				<tr>
					<td width="200">Phone</td>
					<td><input type="text" name="phone" value="<?php echo $member->phone;?>"></td>
				</tr>
				<tr>
					<td width="200">Fax</td>
					<td><input type="text" name="fax" value="<?php echo $member->fax;?>"></td>
				</tr>
				<tr>
					<td width="200">Website</td>
					<td><input type="text" name="website" value="<?php echo $member->website;?>"></td>
				</tr>
				<tr>
					<td width="200">Product(s) Manufactured</td>
					<td><textarea name="products" rows="15" style="width: 100%" ><?php echo $member->products;?></textarea></td>
				</tr>
				<tr>
					<td width="200">Registered on</td>
					<td>
					    <select name="register_day" style="width:100px;">
                            <option>Day</option>
                            <?php
                            for ($x = 1; $x <= 31; $x++) {
                                ?>
                                <option value="<?php echo $x;?>" <?php if($member->register_day == $x){ echo "Selected";}?>><?php echo $x;?></option>
                                <?php
                            }
                            ?>
                            <option value="1">1</option>            
                        </select>
                        <select name="register_month" style="width:100px;">
                            <option>Month</option>              
                            <?php
                            for ($y = 1; $y <= 12; $y++) {
                                ?>
                                <option value="<?php echo $y;?>" <?php if($member->register_month == $y){ echo "Selected";}?>><?php echo $y;?></option>
                                <?php
                            }
                            ?>          
                        </select>
                        <select name="register_year" style="width:100px;">
                            <option>Year</option>              
                            <?php
                            for ($z = 1999; $z <= date("Y"); $z++) {
                                ?>
                                <option value="<?php echo $z;?>" <?php if($member->register_year == $z){ echo "Selected";}?>><?php echo $z;?></option>
                                <?php
                            }
                            ?>            
                        </select>
                    </td>
				</tr>
				<tr>
					<td width="200">Username</td>
					<td><input type="text" name="username" value="<?php echo $member->username;?>"></td>
				</tr>
				<tr>
					<td width="200">Password</td>
					<td><input type="text" name="password" value="<?php echo $member->password;?>"></td>
				</tr>
				<tr>
					<td width="200">Access Allowed</td>
					<td><input type="checkbox" name="access_allowed" value="1" <?php if($member->access_allowed == 1){ echo "checked";}?>></td>
				</tr>
				<tr>
					<td width="200">Access to forum</td>
					<td><input type="checkbox" name="access_to_forum" value="1" <?php if($member->access_allowed == 1){ echo "checked";}?>></td>
				</tr>
				<tr>
					<td width="200">Access to EC forum</td>
					<td><input type="checkbox" name="access_to_ec_forum" value="1" <?php if($member->access_to_ec_forum == 1){ echo "checked";}?>></td>
				</tr>
				<tr>
					<td width="200">Allowed Create profile</td>
					<td><input type="checkbox" name="create_profile" value="1" <?php if($member->create_profile == 1){ echo "checked";}?>></td>
				</tr>
				<tr>
					<td width="200">ACMA Member</td>
					<td><input type="checkbox" name="acma_member" value="1"  <?php if($member->acma_member == 1){ echo "checked";}?>></td>
				</tr>
				<tr>
					<td width="200">ACMA IPO Member</td>
					<td><input type="checkbox" name="acma_ipo_member" value="1"  <?php if($member->acma_ipo_member == 1){ echo "checked";}?>></td>
				</tr>
				<tr>
					<td width="200">ACMA Staff</td>
					<td><input type="checkbox" name="acma_staff" value="1" <?php if($member->acma_staff == 1){ echo "checked";}?>></td>
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