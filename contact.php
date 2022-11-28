<?php include("includes/header-new.php");
      if(isset($_POST['message'])){
            
            $message = $_POST['message'];
            $enquiry = new App\Models\EnquiryTable();
            $enquiry->message = $message;
            $enquiry->save();	

            header( 'location:contact.php?msg=add' );	
            exit;
      }
?>

      <!-- Contact Banner -->
	<section class="hero-sec inner-banner sec-space d-flex align-items-center" style="background-image: url(images/contact-banner.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
				      <h2 class="banner-title text-white text-uppercase">Contact Us</h2>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact Content -->
	<section class="contact-text-sec sec-space">
		<div class="container">
			<div class="row">
                        <div class="col-md-12 text-center mb-3 mb-md-4">
					<h3 class="title text-primary"><b>ACMA office network</b></h3>
                              <?php
                                    if(isset($_GET['msg']) && $_GET['msg'] == 'add'){
                                          ?>
                                    <div class="msg-green">Message Successfully Submitted...</div>
                                    <?php
                                    }
                              ?>
				</div>
				<div class="col-lg-6 mb-4">
					<div class="contact-address_card bg-light_green">
						<h5 class="address_card_title">Head Office</h5>
						<div class="head-office-proffle">
							<h4 class="title mb-0"><b>Mr.Vinnie Mehta</b></h4>
							<p><b>Director General</b></p>
							<p>Automotive Component Manufacturers Association of India The Capital Court 6th Floor, Olof Palme Marg, Munirka New Delhi : 110 067</p>
						</div>
						<div class="address-list">
							<ul>
								<li>
									<div><i class="fa fa-phone"></i>PHONE (s)</div>
									<div><a href="tel:+91-11-26160315">+91-11-26160315</a></div>
								</li>
								<li>
									<div><i class="fa fa-fax"></i>FAX</div>
									<span><a href="fax:+91-11-26160317">+91-11-26160317</a></span>
								</li>
								<li>
									<div><i class="fa fa-envelope"></i>E-mail</div>
									<div><a href="mail-to:acma@acma.in">acma@acma.in</a></div>
								</li>
								<li>
									<div><i class="fa fa-globe"></i>Website</div>
									<div><a href="http://www.acma.in">www.acma.in</a></div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb-4">
					<div class="contact-address_card bg-light_blue">
						<h5 class="address_card_title address_card_title2">Acma Centre Of Excellence (ACOE)</h5>
						<div class="head-office-proffle">
							<h4 class="title  mb-0"><b>MR. DINESH VEDPATHAK</b></h4>
							<p><b>CEO, SKILLING & TRAINING, ACMA</b></p>
							<p>First Floor - Academic Block,Plot No : 4(B),I - Tec TechnoPark,IITD Campus - Sonipat Rajive Gandhi Education City,Kundali (Sonipat),Haryana - 131029</p>
						</div>
						<div class="address-list">
							<ul>
								<li>
									<div><i class="fa fa-phone"></i>PHONE (s)</div>
									<div><a href="tel:+91 99991 97693">+91 99991 97693</a></div>
								</li>
								<li>
									<div><i class="fa fa-envelope"></i> E-mail</div>
									<div>
										<a class="d-block" href="mail-to:dinesh.vedpathak@acma.in">dinesh.vedpathak@acma.in,</a>
										<a class="d-block" href="mail-to:acoe@acma.in">acoe@acma.in</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb-4">
					<div class="contact-address_card bg-light_blue">
						<h5 class="address_card_title address_card_title2">EASTERN REGION</h5>
						<div class="head-office-proffle">
							<h4 class="title  mb-0"><b>MR. ANIL KUMAR UNNI</b></h4>
							<p><b>REGIONAL SECRETARY (ER)</b></p>
							<p>ACMA (Eastern Region) Room No. 4 Centre for excellence Jubilee Road. Jamshedpur. 831001</p>
						</div>
						<div class="address-list">
							<ul>
								<li>
									<div><i class="fa fa-phone"></i>PHONE (s)</div>
								      <div><a href="tel:+91-44-28330968">+91-44-28330968, 28330949</a></div>
							      </li>
								<li>
									<div><i class="fa fa-fax"></i>FAX</div> 
									<div><a href="fax: +91-44-28330590">+91-44-28330590</a></div>
								</li>
								<li>
									<div><i class="fa fa-envelope"></i>E-mail</div>
									<div>
										<a class="d-flex" href="mail-to:anilk.unni@acma.in">anilk.unni@acma.in,</a>
										<a class="d-flex" href="mail-to:acmaer@acma.in">acmaer@acma.in</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb-4">
					<div class="contact-address_card bg-light_green">
						<h5 class="address_card_title">NORTHERN REGION</h5>
						<div class="head-office-proffle">
							<h4 class="title  mb-0"><b>MS. MEENAKSHI NARAYANAN</b></h4>
							<p><b>REGIONAL SECRETARY (NR)</b></p>
							<p>6th Floor, The Capital Court Olof Palme Marg, Munirka New Delhi 110 067</p>
						</div>
						<div class="address-list">
							<ul>
								<li>
									 <div><i class="fa fa-phone"></i>PHONE (s)</div> 
									 <div><a href="tel:+91-11-26160315">+91-11-26160315</a></div>
								</li>
								<li>
									<div><i class="fa fa-fax"></i>FAX</div>
								      <div><a href="fax:+91-11-26160317">+91-11-26160317</a></div>
								</li>
								<li>
									<div><i class="fa fa-envelope"></i>E-mail</div> 
									<div>
									      <a class="d-flex" href="mail-to:anilk.unni@acma.in">meenakshi.narayanan@acma.in,</a>
								            <a class="d-flex" href="mail-to:acmaer@acma.in">acmanr@acma.in</a>
                                                      </div>
                                                </li>  	
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb-4">
					<div class="contact-address_card bg-light_green">
						<h5 class="address_card_title">Uttarakhand Zonal Office</h5>
						<div class="head-office-proffle">
							<h4 class="title  mb-0"><b>Mr. Hansraj Sarma</b></h4>
							<p><b>C/o Minda Industries Ltd.</b></p>
							<p>Sector – 10, Plot No. 5, 9, 9A Integrated Industrial Estate Pantnagar, Rudrapur Udham Singh Nagar – 263153 Uttarakhand</p>
						</div>
						<div class="address-list">
							<ul>
								<li>
									<div><i class="fa fa-phone"></i>PHONE (s)</div>
									<div><a href="tel:+91 7060508867"></a></div>								
								</li>
								<li>
									<div><i class="fa fa-envelope"></i>E-mail</div>
									<div><a href="mail-to:acma.pantnagar@acma.in">acma.pantnagar@acma.in</a></div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb-4">
					<div class="contact-address_card bg-light_blue">
						<h5 class="address_card_title address_card_title2">SOUTHERN REGION</h5>
						<div class="head-office-proffle">
							<h4 class="title mb-0"><b>MS. NEERAJA S. RAO</b></h4>
							<p><b></b></p>
							<p>Automotive Component Manufacturers Association of India 1-B, "Crystal Lawn" 20 Haddows Road 1st Street Chennai 600 006</p>
						</div>
						<div class="address-list">
							<ul>
								<li>
									<div><i class="fa fa-phone"></i>PHONE (s)</div>
									<div> <a href="tel:+91-44-28330968, 28330949">+91-44-28330968, 28330949</a></div>
								</li>
								<li>
									<div><i class="fa fa-fax"></i>FAX</div>
								      <div><a href="fax:  +91-44-28330590"> +91-44-28330590</a></div>
								</li>
								<li>
									<div><i class="fa fa-envelope"></i>E-mail</div>
									<div>
										<a class="d-flex" href="mail-to:anilk.unni@acma.in">neeraja.raj@acma.in,</a>
								            <a class="d-flex" href="mail-to:acmasr@acma.in">acmasr@acma.in</a>
                                                      </div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb-4">
					<div class="contact-address_card bg-light_blue">
						<h5 class="address_card_title address_card_title2">KARNATKA AND HOSUR ZONAL OFFICE</h5>
						<div class="head-office-proffle">
							<h4 class="title  mb-0"><b>MS. NEERAJA S. RAO</b></h4>
							<p>Shop No. 1, 1st Floor NGV Commercial Complex National Games Village Koram angala, Bangalore 560 047, Karnataka</p>
						</div>
						<div class="address-list">
							<ul>
								<li>
									<div><i class="fa fa-phone"></i>PHONE (s)</div>
									<div><a href="tel:+91 80-2570 2855">+91 80-2570 2855</a></div>
								</li>
								<li>
									<div><i class="fa fa-fax"></i>FAX</div>
									<div><a href="fax:  +91-80-40939689"> +91-80-40939689</a></div>
								</li>
								<li>
									<div><i class="fa fa-envelope"></i>E-mail</div>
									<div>
									      <a class="d-flex" href="mail-to:neeraja.raj@acma.in">neeraja.raj@acma.in,</a>
								            <a class="d-flex" href="mail-to:acmakh@acma.in">acmakh@acma.in</a>
								      </div>
							      </li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb-4">
					<div class="contact-address_card bg-light_green">
						<h5 class="address_card_title">WESTERN REGION</h5>
						<div class="head-office-proffle">
							<h4 class="title  mb-0"><b>MR. ASHWANI JOTSHI</b></h4>
							<p><b>DEPUTY EXECUTIVE DIRECTOR</b></p>
							<p>Office No. C, 10th Floor Godrej Eternia "C", B-wing, Old Mumbai - Pune Highway Wakdewadi, Shivaji Nagar Pune – 411 005 Maharashtra, India</p>
						</div>
						<div class="address-list">
							<ul>
								<li>
									<div><i class="fa fa-phone"></i>PHONE (s)</div>
									<div><a href="tel:+91-20-6606 1219/20">+91-20-6606 1219/20</a></div>
								</li>
								<li>
								     <div><i class="fa fa-fax"></i>FAX</div>
									 <div><a href="fax:  +91-20 6606 1220">+91-20 6606 1220</a></div>
								</li>
								<li>
									<div><i class="fa fa-envelope"></i>E-mail</div>
									<div>
										<a class="d-flex" href="mailto:ashwani.jotshi@acma.in">ashwani.jotshi@acma.in,</a>
								            <a class="d-flex" href="mail-to:acmawr@acma.in">acmawr@acma.in</a>
									</div>
							      </li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb-4 mb-lg-0">
					<div class="contact-address_card bg-light_green">
						<h5 class="address_card_title">WESTERN REGION - ZONAL OFFICE, MUMBAI</h5>
						<div class="head-office-proffle">
							<h4 class="title  mb-0"><b>MR. ASHWANI JOTSHI</b></h4>
							<p><b>DEPUTY EXECUTIVE DIRECTOR</b></p>
							<p>80, Dr. Annie Besant Road, Worli, mumbai - 400 018, Maharashtra,India</p>
						</div>
						<div class="address-list">
							<ul>
								<li>
									<div><i class="fa fa-phone"></i>PHONE (s)</div>
									<div><a href="tel:+91-20-6606 1219/20">+91-20-6606 1219/20</a></div>
								</li>
								<li>
									<div><i class="fa fa-fax"></i>FAX</div>
								    <div><a href="fax:  +91-20 6606 1220">+91-20 6606 1220</a></div>
								<li>
								<li>
									<div><i class="fa fa-envelope"></i>E-mail</div>
									<div>
								            <a class="d-flex" href="mail-to:ashwani.jotshi@acma.in">ashwani.jotshi@acma.in,</a>
								            <a class="d-flex" href="mail-to:acmawr@acma.in">acmawr@acma.in</a>
                                                      </div>  
							      </li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="contact-address_card bg-light_blue">
						<h5 class="address_card_title">WESTERN REGION - ZONAL OFFICE, GUJARAT</h5>
						<div class="head-office-proffle">
							<h4 class="title mb-0"><b>MR. ASHWANI JOTSHI</b></h4>
							<p><b>DEPUTY EXECUTIVE DIRECTOR</b></p>
							<p>801 "Matrix", Near Vodafone House,B/H Divya Bhaskar, Corporate Road,Ahmedabad – 380015,Gujarat</p>
						</div>
						<div class="address-list">
							<ul>
								<li>
									<div><i class="fa fa-phone"></i>PHONE (s)</div>
									<div> <a href="tel:+91-20-6606 1219/20">+91-20-6606 1219/20</a></div>
								</li>
								<li>
									<div><i class="fa fa-fax"></i>FAX</div>
								     <div><a href="fax:  +91-20 6606 1220">+91-20 6606 1220</a></div>
							      </li>
							      <li>
								      <div><i class="fa fa-envelope"></i>E-mail</div> 
									<div>
								            <a class="d-flex" href="mail-to:ashwani.jotshi@acma.in">ashwani.jotshi@acma.in,</a>
								            <a class="d-flex" href="mail-to:acmawr@acma.in">acmawr@acma.in</a>
                                                      </div>
							      </li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
      <!-- Contact Message Section -->
	<section class="bg-light sec-space">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="contact-message bg-primary">
						<div class="row">
							<div class="col-md-10 mx-auto p-4 p-md-5">
                                                <h5 class="address_card_title text-white text-uppercase">leave message</h5>
                                                <form method="post" action="">
                                                      <p><textarea class="form-control" name="message" placeholder="Type your message..."></textarea></p>
                                                      <button class="btn btn-green mt-3" type="submit">SUBMIT</button> 
                                                </form>
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include("includes/footer-new.php");?>