<?php include("includes/header.php");
if(isset($_POST['message'])){
	
	$message = $_POST['message'];
	
    $enquiry = new App\Models\EnquiryTable();
    $enquiry->message = $message;
	$enquiry->save();	

	header( 'location:contact-us.php?msg=add' );	
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
        <img src="img/contact-us.jpg" class="img-fluid">
    </div>
  </section><!-- #intro -->
  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="innerpage" class="whitebg">
      <div class="container">
          <div class="row">
          <div class="col-sm-12 aligncenter">
          <h2>Contact Us</h2>
          <p><img src="img/seprator-img.jpg"  class="img-fluid"></p>
          <h3 class="bluebg-heading">ACMA OFFICE NETWORK</h3>
           <?php
			if(isset($_GET['msg']) && $_GET['msg'] == 'add'){
		  ?>
				<div class="msg-green">
                    Message Successfully Submitted...
                </div>
          <?php
			}
		  ?>   
            </div>
      </div></div></div>
    </section><!-- #about -->
    <section id="innerpage">
      <div class="container">     
            <div class="contact-details">
                  <div class="row">
                        <div class="col-sm-12">
                              <h2>Head Office</h2>
                              <h3>Mr. Vinnie Mehta</h3>
                              <h4>Director General</h4>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-sm-7">
                              <p>Automotive Component Manufacturers
                                    <br>Association of India The Capital Court
                                    <br>6th Floor, Olof Palme Marg,
                                    <br>Munirka New Delhi : 110 067</p>
                        </div>
                        <div class="col-sm-5">
                              <p><i class="fa fa-mobile" aria-hidden="true"></i>PHONE (s) [Board] : +91-11-26160315
                                    <br> <i class="fa fa-fax" aria-hidden="true"></i>FAX : +91-11-26160317
                                    <br> <i class="fa fa-envelope" aria-hidden="true"></i>E-mail : <a href="mail-to:acma@acma.in">acma@acma.in</a>
                                    <br> <i class="fa fa-globe" aria-hidden="true"></i>Website : <a href="http://www.acma.in">www.acma.in</a>
                              </p>
                        </div>
                  </div>
            </div>
            <div class="contact-details">
                  <div class="row">
                        <div class="col-sm-12">
                              <h2>ACMA Centre of Excellence (ACoE)</h2>
                              <h3>Mr. Dinesh Vepathak</h3>
                              <h4>CEO, Skilling & Training, ACMA</h4>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-sm-7">
                              <p>First Floor - Academic Block,
                                    <br/>Plot No : 4(B),
                                    <br/>I - Tec TechnoPark,
                                    <br/>IITD Campus - Sonipat Rajive Gandhi Education City,
                                    <br/>Kundali (Sonipat),
                                    <br/>Haryana - 131029</p>
                        </div>
                        <div class="col-sm-5">
                              <p><i class="fa fa-mobile" aria-hidden="true"></i>PHONE (s) : +91 99991 97693
                                    <br> <i class="fa fa-envelope" aria-hidden="true"></i>E-mail : <a href="mail-to:dinesh.vedpathak@acma.in">dinesh.vedpathak@acma.in</a>,
                                    <br><a class="margin-left-83" href="mail-to:acoe@acma.in">acoe@acma.in</a>
                              </p>
                        </div>
                  </div>
            </div>
            <div class="contact-details">
                  <div class="row">
                        <div class="col-sm-12">
                              <h2>Eastern Region</h2>
                              <h3>MR. ANIL KUMAR UNNI</h3>
                              <!-- <h3>Ms. Yogita Satpathy</h3> -->
                              <h4>Regional Secretary (ER)</h4>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-sm-7">
                              <p>ACMA (Eastern Region)
                                    <br>Room No. 4
                                    <br>Centre for excellence
                                    <br>Jubilee Road. Jamshedpur. 831001</p>
                        </div>
                        <div class="col-sm-5">
                              <p><i class="fa fa-mobile" aria-hidden="true"></i>PHONE (s) : +91-44-28330968, 28330949
                                    <br> <i class="fa fa-fax" aria-hidden="true"></i>FAX : +91-44-28330590
                                    <br> <i class="fa fa-envelope" aria-hidden="true"></i>E-mail : <a href="mail-to:anilk.unni@acma.in">anilk.unni@acma.in</a>,
                                    <br><a class="margin-left-83" href="mail-to:acmaer@acma.in">acmaer@acma.in</a>
                              </p>
                              <!-- <p><i class="fa fa-mobile" aria-hidden="true"></i>PHONE (s) : +91 657-2230035, +91 657-2224670<br>
                              <i class="fa fa-fax" aria-hidden="true"></i>FAX : +91 7280055655<br><i class="fa fa-fax" aria-hidden="true"></i>FAX : +91 7280055655<br>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>E-mail : <a href="mail-to:yogita.satpathy@acma.in">yogita.satpathy@acma.in</a>,<br><a class="margin-left-83" href="mail-to:acmaer@acma.in">acmaer@acma.in</a></p> -->
                        </div>
                  </div>
            </div>
            <div class="contact-details">
                  <div class="row">
                        <div class="col-sm-12">
                              <h2>Northern Region</h2>
                              <h3>Ms. Meenakshi Narayanan</h3>
                              <h4>Regional Secretary (NR)</h4>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-sm-7">
                              <p>6th Floor, The Capital Court
                                    <br>Olof Palme Marg, Munirka
                                    <br>New Delhi 110 067</p>
                        </div>
                        <div class="col-sm-5">
                              <p><i class="fa fa-mobile" aria-hidden="true"></i>PHONE (s) : +91-11-26160315
                                    <br> <i class="fa fa-fax" aria-hidden="true"></i>FAX : +91-11-26160317
                                    <br> <i class="fa fa-envelope" aria-hidden="true"></i>E-mail : <a href="mail-to:meenakshi.narayanan@acma.in">meenakshi.narayanan@acma.in</a>,
                                    <br><a class="margin-left-83" href="mail-to:acmanr@acma.in">acmanr@acma.in</a>
                                    <br>
                              </p>
                        </div>
                  </div>
            </div>
            <div class="contact-details">
                  <div class="row">
                        <div class="col-sm-12">
                              <h2>Uttarakhand Zonal Office</h2>
                              <h3>Mr. Hansraj Sarma</h3>
                              <h4>C/o Minda Industries Ltd.</h4>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-sm-7">
                              <p>Sector – 10, Plot No. 5, 9, 9A Integrated Industrial Estate
                                    <br>Pantnagar, Rudrapur</p>
                              <p>Udham Singh Nagar – 263153
                                    <br>Uttarakhand</p>
                        </div>
                        <div class="col-sm-5">
                              <p><i class="fa fa-mobile" aria-hidden="true"></i>PHONE (s) : +91 7060508867
                                    <br> <i class="fa fa-envelope" aria-hidden="true"></i>E-mail : <a href="mail-to:acma.pantnagar@acma.in">acma.pantnagar@acma.in</a>
                              </p>
                        </div>
                  </div>
            </div>
            <div class="contact-details">
                  <div class="row">
                        <div class="col-sm-12">
                              <h2>Southern Region</h2>
                              <h3>Mr. Anil Kumar Unni</h3>
                              <h4>Regional Secretary (SR)</h4>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-sm-7">
                              <p>Automotive Component Manufacturers
                                    <br>Association of India
                                    <br>1-B, "Crystal Lawn"
                                    <br>20 Haddows Road 1st Street
                                    <br>Chennai 600 006</p>
                        </div>
                        <div class="col-sm-5">
                              <p><i class="fa fa-mobile" aria-hidden="true"></i>PHONE (s) : +91-44-28330968, 28330949
                                    <br> <i class="fa fa-fax" aria-hidden="true"></i>FAX : +91-44-28330590
                                    <br> <i class="fa fa-envelope" aria-hidden="true"></i>E-mail : <a href="mail-to:anilk.unni@acma.in">anilk.unni@acma.in</a>,
                                    <br><a class="margin-left-83" href="mail-to:acmasr@acma.in">acmasr@acma.in</a>
                              </p>
                        </div>
                  </div>
            </div>
            <div class="contact-details">
                  <div class="row">
                        <div class="col-sm-12">
                              <h2>Karnatka and Hosur Zonal Office</h2>
                              <h3>Ms. Neeraja S. Rao</h3>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-sm-7">
                              <p class="padding-top-30">Shop No. 1, 1st Floor
                                    <br>NGV Commercial Complex
                                    <br>National Games Village Koram angala,
                                    <br>Bangalore 560 047,
                                    <br>Karnataka</p>
                        </div>
                        <div class="col-sm-5">
                              <p class="padding-top-30"><i class="fa fa-mobile" aria-hidden="true"></i>PHONE (s) : +91 80-2570 2855
                                    <br> <i class="fa fa-fax" aria-hidden="true"></i>FAX : +91-80-40939689
                                    <br> <i class="fa fa-envelope" aria-hidden="true"></i>E-mail : <a href="mail-to:neeraja.raj@acma.in">neeraja.raj@acma.in</a>,
                                    <br><a class="margin-left-83" href="mail-to:acmakh@acma.in">acmakh@acma.in</a>
                              </p>
                        </div>
                  </div>
            </div>
            <div class="contact-details">
                  <div class="row">
                        <div class="col-sm-12">
                              <h2>Western Region</h2>
                              <h3>Mr. Ashwani Jotshi</h3>
                              <h4>Deputy Executive Director </h4>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-sm-7">
                              <p>Office No. C, 10th Floor
                                    <br>Godrej Eternia "C", B-wing,
                                    <br>Old Mumbai - Pune Highway
                                    <br>Wakdewadi, Shivaji Nagar
                                    <br>Pune – 411 005
                                    <br>Maharashtra, India</p>
                        </div>
                        <div class="col-sm-5">
                              <p><i class="fa fa-mobile" aria-hidden="true"></i>PHONE (s) [Board] : +91-20-6606 1219/20
                                    <br> <i class="fa fa-fax" aria-hidden="true"></i>FAX : +91-20 6606 1220
                                    <br> <i class="fa fa-envelope" aria-hidden="true"></i>E-mail : <a href="mail-to:ashwani.jotshi@acma.in">ashwani.jotshi@acma.in</a>,
                                    <br><a class="margin-left-83" href="mail-to:acma@acma.in">acmawr@acma.in</a>
                                    <br>
                              </p>
                        </div>
                  </div>
            </div>
            <div class="contact-details">
                  <div class="row">
                        <div class="col-sm-12">
                              <h2>Western Region - Zonal Office, Mumbai</h2>
                              <h3>MR. ASHWANI JOTSHI</h3>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-sm-7">
                              <p class="padding-top-30">80, Dr. Annie Besant Road, Worli,
                                    <br>Mumbai - 400 018, Maharashtra,
                                    <br>India</p>
                        </div>
                        <div class="col-sm-5">
                              <p><i class="fa fa-mobile" aria-hidden="true"></i>PHONE (s) [Board] : +91-20-6606 1219/20
                                    <br> <i class="fa fa-fax" aria-hidden="true"></i>FAX : +91-20 6606 1220
                                    <br> <i class="fa fa-envelope" aria-hidden="true"></i>E-mail : <a href="mail-to:ashwani.jotshi@acma.in">ashwani.jotshi@acma.in</a>,
                                    <br><a class="margin-left-83" href="mail-to:acma@acma.in">acmawr@acma.in</a>
                                    <br>
                              </p>
                        </div>
                  </div>
            </div>
            <div class="contact-details">
                  <div class="row">
                        <div class="col-sm-12">
                              <h2>Western Region - Zonal Office, Gujarat</h2>
                              <h3>MR. ASHWANI JOTSHI</h3>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-sm-7">
                              <p class="padding-top-30">801 "Matrix", Near Vodafone House,
                                    <br>B/H Divya Bhaskar, Corporate Road,
                                    <br>Ahmedabad – 380015,
                                    <br>Gujarat</p>
                        </div>
                        <div class="col-sm-5">
                              <p><i class="fa fa-mobile" aria-hidden="true"></i>PHONE (s) [Board] : +91-20-6606 1219/20
                                    <br> <i class="fa fa-fax" aria-hidden="true"></i>FAX : +91-20 6606 1220
                                    <br> <i class="fa fa-envelope" aria-hidden="true"></i>E-mail : <a href="mail-to:ashwani.jotshi@acma.in">ashwani.jotshi@acma.in</a>,
                                    <br><a class="margin-left-83" href="mail-to:acma@acma.in">acmawr@acma.in</a>
                                    <br>
                              </p>
                        </div>
                  </div>
            </div>
      </div>
    </section><!-- #about -->
<section id="innerpage-msg-form">
      <div class="container">
          <div class="row">
          <div class="col-sm-12 aligncenter">
          <form method="post" action="">      
          <h2>Leave Message</h2>
          <p><textarea name="message" placeholder="Type your message..."></textarea></p>
          <p class="alignright form-group"><button>SUBMIT<div></div></button></p> 
          </form>
          </div>
      </div></div></div>
    </section><!-- #about -->
  </main>

  <?php include("includes/footer.php");?>