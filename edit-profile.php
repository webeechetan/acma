<?php include("includes/header.php");
include(__DIR__."/validate_login.php" );
if(isset($_POST['name'])){
    $postid = $_POST['postid'];
	$name = $_POST['name'];	
	$email = $_POST['email'];
	$company = $_POST['company'];
    $region = $_POST['region'];
    $userid = $_POST['userid'];
    $password = $_POST['password'];
	
    $members = App\Models\MembersTable::find($postid);
	$members->name = $name;
	$members->email = $email;
    $members->company = $company;
    $members->region = $region;
    $members->userid = $userid;
    $members->password = $password;
	$members->save();	

	header( 'location:edit-profile.php?msg=update' );	
	exit;
}
$member = App\Models\MembersTable::where('id','=',$_SESSION['user_id'])->first();
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
        <img src="img/my-account.jpg" class="img-fluid">
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
            <h2 class="alignleft padding-25-greytxt">Edit Profile</h2>    
          </div>  
        </div>  
        <div class="row account-status">
          <div class="col-sm-3">
              <div class="member-photo">
                  <p><img src="img/mp-photo.jpg"></p>
                  <h3><?php echo $_SESSION['user'];?></h3>
              </div>
          </div>
          <div class="col-sm-9">
              <?php
    			if(isset($_GET['msg']) && $_GET['msg'] == 'update'){
    		  ?>
    				<div class="alert green whitetxt">
                        Updated Record Successfully.
                    </div>
              <?php
    			}
    		  ?>
              <div class="member-details-form">
                  <form name="frm" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="postid" value="<?php echo $member->id;?>">
                  <div class="member-details-edit">
                      <div class="member-details-edit-row">
                        <label>Name</label> 
                        <p><input type="text"  name="name" value="<?php echo $member->name;?>"></p>
                      </div>
                      <div class="edit-icon">
                        <input type="image" src="img/icon-edit.jpg"> 
                      </div>
                      <div class="clearboth"></div>
                  </div>
                  <div class="member-details-edit">
                      <div class="member-details-edit-row">
                        <label>Email</label> 
                        <p><input type="text"  name="email" value="<?php echo $member->email;?>"></p>
                      </div>
                      <div class="edit-icon">
                        <input type="image" src="img/icon-edit.jpg"> 
                      </div>
                      <div class="clearboth"></div>
                  </div>
                  <div class="member-details-edit">
                      <div class="member-details-edit-row">
                        <label>Company</label> 
                        <p><input type="text"  name="company" value="<?php echo $member->company;?>"></p>
                      </div>
                      <div class="edit-icon">
                        <input type="image" src="img/icon-edit.jpg"> 
                      </div>
                      <div class="clearboth"></div>
                  </div>
                  <div class="member-details-edit">
                      <div class="member-details-edit-row">
                        <label>Region</label> 
                        <p><input type="text"  name="region" value="<?php echo $member->region;?>"></p>
                      </div>
                      <div class="edit-icon">
                        <input type="image" src="img/icon-edit.jpg"> 
                      </div>
                      <div class="clearboth"></div>
                  </div>
                  <div class="member-details-edit">
                      <div class="member-details-edit-row">
                        <label>Username</label> 
                        <p><input type="text"  name="userid" value="<?php echo $member->userid;?>"></p>
                      </div>
                      <div class="edit-icon">
                        <input type="image" src="img/icon-edit.jpg"> 
                      </div>
                      <div class="clearboth"></div>
                  </div>
                  <div class="member-details-edit">
                      <div class="member-details-edit-row">
                        <label>Password</label> 
                        <p><input type="text"  name="password" value="<?php echo $member->password;?>"></p>
                      </div>
                      <div class="edit-icon">
                        <input type="image" src="img/icon-edit.jpg"> 
                      </div>
                      <div class="clearboth"></div>
                  </div>
                  </form>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">    
            &nbsp;
          </div>  
        </div>
      </div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>