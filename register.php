<?php include("includes/header.php");
if(isset($_POST['txtname'])){
	
	$name = $_POST['txtname'];	
	$email = $_POST['email'];
	$phone = $_POST['phone'];
    $website = $_POST['website'];
    $mainaddress = $_POST['mainaddress'];
    $trademark = $_POST['trademark'];
	
    $members = new App\Models\MembersTable();
	$members->name = $name;
	$members->email = $email;
    $members->phone = $phone;
    $members->website = $website;
    $members->mainaddress = $mainaddress;
    $members->trademark = $trademark;
	$members->save();
	
	// Multiple recipients
    $to = 'upender.singh@acma.in'; // note the comma
    
    // Subject
    $subject = 'Register MEMBER ACMA';
    
    // Message
    $message = '
    <html>
    <head>
      <title>Register MEMBER ACMA</title>
    </head>
    <body>
      <p>Here are the Register MEMBER ACMA!</p>
      <table>
        <tr>
          <td>Name</td><td>'.$name.'</td>
        </tr>
        <tr>
          <td>Email</td><td>'.$email.'</td>
        </tr>
        <tr>
          <td>Phone</td><td>'.$phone.'</td>
        </tr>
        <tr>
          <td>Website</td><td>'.$website.'</td>
        </tr>
        <tr>
          <td>Main Address</td><td>'.$mainaddress.'</td>
        </tr>
        <tr>
          <td>Trade Mark</td><td>'.$trademark.'</td>
        </tr>
      </table>
    </body>
    </html>
    ';
    
    // To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    
    // Additional headers
    $headers[] = 'To: Admin <upender.singh@acma.in>';
    $headers[] = 'From: Member <'.$email.'>';
    
    // Mail it
    mail($to, $subject, $message, implode("\r\n", $headers));

	header( 'location:register.php?msg=add' );	
	exit;
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
        <img src="img/about-us.jpg" class="img-fluid">
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
          <h2>Member Registration</h2>
          <div class="headingborder"><img src="img/heading-border.jpg"  class="img-fluid"></div>
           <div class="content-txt formbox">
               <?php
    			if(isset($_GET['msg']) && $_GET['msg'] == 'add'){
    		  ?>
    				<div class="successmsg aligncenter">
                        Registration Successfully Done.
                        <br><br>
                    </div>
              <?php
    			}
    		  ?>  
    		  <form name="frm" action="" method="post">
              <div class="formfield">
                  <lable>Name</lable>
                  <input type="text" name="txtname" required>
              </div>
              <div class="formfield">
                  <lable>Phone</lable>
                  <input type="text" name="phone" required>
              </div>
              <div class="formfield">
                  <lable>Email</lable>
                  <input type="email" name="email" required>
              </div>
              <div class="formfield">
                  <lable>Website</lable>
                  <input type="text" name="website">
              </div>
              <div class="formfield">
                  <lable>Main Plant Address</lable>
                  <input type="text" name="mainaddress">
              </div>
              <div class="formfield">
                  <lable>Trade Mark</lable>
                  <input type="text" name="trademark">
              </div>
              <div class="formfield aligncenter">
                  <input type="submit" name="action" value="Register" class="btn">
              </div>
              </form>
          </div>
      </div></div></div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>