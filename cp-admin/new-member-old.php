<?php include("header.php");

if(isset($_POST['name'])){
	
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
    $registerdate = $_POST['year'].'-'.$_POST['month'].''.$_POST['day'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $access_allowed = $_POST['access_allowed'];
    $access_to_forum = $_POST['access_to_forum'];
    $access_to_ec_forum = $_POST['access_to_ec_forum'];
    $create_profile = $_POST['create_profile'];
    $acma_member = $_POST['acma_member'];
    $acma_ipo_member = $_POST['acma_ipo_member'];
    $acma_staff = $_POST['acma_staff'];
	
    $members = new App\Models\MembersTable();
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
    $members->registerdate = $registerdate;
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
			<table cellpadding="0" cellspacing="0" width="100%">
			    <tr>
					<td width="200">Name</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td width="200">Email</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td width="200">Address</td>
					<td><input type="text" name="adress1"></td>
				</tr>
				<tr>
					<td width="200">City</td>
					<td><input type="text" name="city"></td>
				</tr>
				<tr>
					<td width="200">State</td>
					<td><input type="text" name="state"></td>
				</tr>
				<tr>
					<td width="200">Country</td>
					<td><input type="text" name="country"></td>
				</tr>
				<tr>
					<td width="200">Pincode</td>
					<td><input type="text" name="pin"></td>
				</tr>
				<tr>
					<td width="200">Company</td>
					<td><input type="text" name="company"></td>
				</tr>
				<tr>
					<td width="200">Religon</td>
					<td><input type="text" name="relegion"></td>
				</tr>
				<tr>
					<td width="200">Phone</td>
					<td><input type="text" name="phone"></td>
				</tr>
				<tr>
					<td width="200">Fax</td>
					<td><input type="text" name="fax"></td>
				</tr>
				<tr>
					<td width="200">Website</td>
					<td><input type="text" name="website"></td>
				</tr>
				<tr>
					<td width="200">Product(s) Manufactured</td>
					<td><textarea name="products" rows="15" style="width: 100%" ></textarea></td>
				</tr>
				<tr>
					<td width="200">Registered on</td>
					<td>
					    <select name="day" style="width:100px;">
                            <option>Day</option>
                            <?php
                            for ($x = 1; $x <= 31; $x++) {
                                ?>
                                <option value="<?php echo $x;?>"><?php echo $x;?></option>
                                <?php
                            }
                            ?>
                            <option value="1">1</option>            
                        </select>
                        <select name="month" style="width:100px;">
                            <option>Month</option>              
                            <?php
                            for ($y = 1; $y <= 12; $y++) {
                                ?>
                                <option value="<?php echo $y;?>"><?php echo $y;?></option>
                                <?php
                            }
                            ?>          
                        </select>
                        <select name="year" style="width:100px;">
                            <option>Year</option>              
                            <?php
                            for ($z = 1999; $z <= date("Y"); $z++) {
                                ?>
                                <option value="<?php echo $z;?>"><?php echo $z;?></option>
                                <?php
                            }
                            ?>            
                        </select>
                    </td>
				</tr>
				<tr>
					<td width="200">Username</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td width="200">Password</td>
					<td><input type="text" name="password"></td>
				</tr>
				<tr>
					<td width="200">Access Allowed</td>
					<td><input type="checkbox" name="access_allowed" value="1"></td>
				</tr>
				<tr>
					<td width="200">Access to forum</td>
					<td><input type="checkbox" name="access_to_forum" value="1"></td>
				</tr>
				<tr>
					<td width="200">Access to EC forum</td>
					<td><input type="checkbox" name="access_to_ec_forum" value="1"></td>
				</tr>
				<tr>
					<td width="200">Allowed Create profile</td>
					<td><input type="checkbox" name="create_profile" value="1"></td>
				</tr>
				<tr>
					<td width="200">ACMA Member</td>
					<td><input type="checkbox" name="acma_member" value="1"></td>
				</tr>
				<tr>
					<td width="200">ACMA IPO Member</td>
					<td><input type="checkbox" name="acma_ipo_member" value="1"></td>
				</tr>
				<tr>
					<td width="200">ACMA Staff</td>
					<td><input type="checkbox" name="acma_staff" value="1"></td>
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