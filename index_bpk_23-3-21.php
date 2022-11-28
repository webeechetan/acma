<?php include("includes/header-new.php");



$message='';



if(isset($_SESSION['user'])){



	#header("Location:my-account.php");



	#exit;



}



if (isset($_POST['username']) && isset($_POST['password']))



{	  



	$username=$_POST['username'];



	$password=$_POST['password'];



	$user = App\Models\MembersTable::where('userid','=',$username)->where('password','=',$password)->first();



	if ($user)



	{



		$_SESSION['user']=$user->userid;



		$_SESSION['user_id']=$user->id;



		header("Location:my-account.php");



		exit;



	}



	else



	{



		$message='<p class="alert">User Name Or Password Invalid!</p>';



		



		



	}



}



$MembersDatabases=App\Models\MembersDatabase::orderBy("companyname","ASC")->paginate(1000,['*'],'page',(int)$_GET['page']);



$srno = 1; 







?>







	<!-- Hero Section -->



	<section class="hero-sec">



		<div class="img-zoom">



			<img src="images/home_hero.jpg">



		</div>



		<div class="container">



			<div class="row align-items-center">



				<div class="col-md-9 col-lg-6 mx-auto text-center wow zoomIn">



					<h2 class="banner-title text-white">Welc<span class="ani-gear"><img src="images/gear_icon.png"></span>me t<span class="ani-gear"><img src="images/gear_icon.png"></span> ACMA</h2>



					<p class="text-big text-white">The apex body representing the interest of the Indian Auto Component Industry</p>



				</div>



			</div>



		</div>



	</section>



	<!-- Overview Section  -->



	<section class="brand-name-bg sec-space bg-primary overflow-hidden">



		<div class="container">



			<div class="row">



				<div class="col-md-5 text-center mb-3 mb-md-0 text-md-left wow fadeInLeft">



					<p class="mb-0">



						<img class="line line-left-top" src="images/line-1.png">



					</p>



					<h4 class="title text-white">50+ Years of bringing the Indian automotive industry together </h4>



				</div>



				<div class="col-md-2 text-center mb-3 mb-md-0 wow zoomIn">



					<img src="images/gear_icon_big.png" width="125px">



				</div>



				<div class="col-md-5 text-center text-md-right wow fadeInRight">



					<p class="text-white">With membership of over 800 manufacturers, ACMA contributes more than 85% of the auto component industry’s turnover in the organised sector.</p>



					<p class="text-white mb-0"><b>ACMA is an ISO 9001:2015 Certified Association.</b>



					</p>



					<p class="mb-0">



						<img class="line line-right-bot" src="images/line-1.png">



					</p>



				</div>



			</div>



		</div>



	</section>

    <!-- Image and video -->

    <section class="sec-space overflow-hidden ">

        <div class="container">

            <div class="row">

				<div class="col-12 text-center mb-4 mb-md-5 zoomIn">
					<h2 class="title text-primary">Catch live action on 25th Feb 10 AM onwards</h2>
				</div>

                <div class="col-lg-5 text-center mb-3 mb-lg-0 wow fadeInLeft">

					<img src="images/acma-feb-25-21.jpg">

                </div>

                <div class="col-lg-2 d-none d-lg-inline-block text-center">

                    <div class="mid-cog"><span><img src="images/orange_gear.png"><img src="images/green_gear.png"></span>

                    </div>

                </div>

                <div class="col-lg-5 text-center wow fadeInRight">

					<iframe src="https://vimeo.com/event/729829/embed/5f40fae395" width="500" height="295" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>

                </div>

            </div>

        </div>

    </section>

    

	<!-- Message from the Management -->



	<section class="management-sec sec-space pb-0 bg-light position-relative overflow-hidden">



		<ul class="ani-sec">



			<li class="wow fadeInLeft">



				<img src="images/gears.gif">



			</li>



			<li class="wow fadeInRight">



				<img src="images/gears.gif">



			</li>



		</ul>



		<div class="container">



			<div class="row">



				<div class="col-12 text-center mb-4 mb-md-5 zoomIn">



					<h2 class="title text-primary">Message from the Management</h2>



				</div>



			</div>



			<div class="row">



				<div class="col-md-6 mb-5 mb-md-0">



					<div class="box-item overview-item text-center wow fadeIn">



						<div class="box-item-img">



							<img src="images/manag_img1.png">



							<img class="frame" src="images/org_frame.png">



						</div>



						<div class="box-item-text">



							<p class="mb-0">Mr. Deepak Jain is the Chairman & Managing Director of Lumax Group, which is a leading manufacturer of automotive components and systems in India, with market leaders in Lighting and Gear Shifter Systems. Currently the President of Automotive Component Manufacturers Association of India (ACMA), Mr. Jain wears many hats - Vice President of Toyota Kirloskar Supplier Association (TKSA), Executive Committee Member of Maruti Suzuki Supplier Welfare Association (MSSWA) and Tata Motors Supplier Council.</p>



						</div>



						<p>



							<img src="images/line-2.png">



						</p>



						<p><b>Deepak Jain, President, ACMA</b>



						</p>



					</div>



				</div>



				<div class="col-md-6">



					<div class="box-item overview-item text-center wow fadeIn">



						<div class="box-item-img">



							<img src="images/manag_img2.png">



							<img class="frame" src="images/green_frame.png">



						</div>



						<div class="box-item-text">



							<p class="mb-0">ACMA’s active involvement in trade promotion, technology up-gradation, quality enhancement and collection and dissemination of information has made it a vital catalyst for the auto component industry’s growth and development. Its other activities include participation in international trade fairs, mounting trade delegations overseas and bringing out publications on various topical subjects related to the automotive industry.</p>



						</div>



						<p>



							<img src="images/line-2.png">



						</p>



						<p><b>Vinnie Mehta, Director General, ACMA</b>



						</p>



					</div>



				</div>



			</div>



		</div>



	</section>



	<!-- Login to Acma -->



	<section class="acma_login_sec bg-light overflow-hidden">



		<div class="container position-relative">



			<div class="row">



				<div class="col-md-11 mx-auto">



					<ul class="ani-sec">



						<li><img data-aos="fade-up" src="images/org_frame.png"></li>



						<li><img data-aos="fade-down" src="images/green_frame.png"></li>



					</ul>



					<div class="login_sec bg-white" id="login_sec_bg_white">



						<div class="row wow zoomIn">



							<div class="col-12 text-center mb-3 mb-md-4">



								<h2 class="title-big text-secondary">Login to ACMA</h2>



							</div>



							<div class="col-md-11 col-lg-10 mx-auto">



								<ul class="nav nav-pills mb-4 mb-md-5 justify-content-center" id="pills-tab" role="tablist">



									<li class="nav-item"> 



										<a class="login_btn active" id="member-login-tab" data-toggle="pill" href="#member-login" role="tab" aria-controls="member-login" aria-selected="true"><?php if(!$_SESSION['user']){?> Member Login<?php }else{



											?>Member Info



										<?php } ?></a>



									</li>



									<li class="nav-item"> <a class="login_btn" id="become-member-tab" data-toggle="pill" href="#become-member" role="tab" aria-controls="become-member" aria-selected="false">Become A Member</a>



									</li>



								</ul>



								<div class="tab-content" id="pills-tabContent">



									<div class="tab-pane fade show active" id="member-login" role="tabpanel" aria-labelledby="member-login-tab">



										<p class="text-big text-center"><b>Enter your details below:</b>



										</p>



										<?php if($message){



											echo $message;



										}?>



										<?php if(!$_SESSION['user']){?>



										<form class="login-form" method="post">



											<div class="row">



												<div class="col-md-6 mb-3 mb-md-0">



													<input type="text" class="form-control" name="username" id="username" placeholder="Member ID">



												</div>



												<div class="col-md-6">



													<input type="password" class="form-control" name="password" id="password" placeholder="Password">



												</div>



												<div class="col-12 mt-4 text-center">



													<button type="submit" class="btn btn-primary btn-big">Login</button>



													<p><a href="coming-soon.php" class="btn btn-link forgotpassword">Forgot Password</a>



													</p>



												</div>



											</div>



											<div class="row">



												<div class="col text-right"> <a href="payment-online.php" class="btn btn-green">Pay Now</a>



												</div>



												<div class="col"> <a href="register.php" class="btn btn-green">Register</a>



												</div>



											</div>



										</form>



										<?php }else{



											?>



											<p class="text-center"><strong>Welcome <?php echo $_SESSION['user'];?></strong><br><br><a class="btn" href="edit-profile.php">Edit Profile</a>&nbsp;<a class="btn" href="logout.php">Logout</a></p>



											<?



										}?>



									</div>



									<div class="tab-pane fade" id="become-member" role="tabpanel" aria-labelledby="become-member-tab">



										<div class="row">



											<div class="col text-center"> <a href="become-member.php" class="btn btn-green btn-big">Become A Member</a>



											</div>



										</div>



									</div>



								</div>



							</div>



						</div>



					</div>



				</div>



			</div>



		</div>



	</section>



	<!-- ACMA Upcoming Events -->



	<section class="sec-space overflow-hidden ">



		<div class="container">



			<div class="row">



				<div class="col-lg-5 text-center mb-3 mb-lg-0 wow fadeInLeft">



					<h2 class="title text-primary mb-3">Acma Upcoming Events</h2>



					<div class="events_slider">



						<div class="events_slider_items">



							<a href="acma-technology-summit-awards-2020.php"><img src="img/acma-new-banner.png"></a>



						</div>



						<div class="events_slider_items">



							<a href="https://acma-automechanika-newdelhi.in.messefrankfurt.com/newdelhi/en.html"><img src="images/automechanika-banner.png"></a>



						</div>

                        



					</div>



				</div>



				<div class="col-lg-2 d-none d-lg-inline-block text-center">



					<div class="mid-cog"><span><img src="images/orange_gear.png"><img src="images/green_gear.png"></span>



					</div>



				</div>



				<div class="col-lg-5 text-center wow fadeInRight">



					<h2 class="title text-primary mb-3">Acma Member Search</h2>



					<form class="search-form" method="post" action="member-search.php">



						<div class="row">



							<div class="col-12 mb-3">



								<select class="form-control" id="companyname" name="companyname">



									<option value="">Select Company</option>



									<?php foreach($MembersDatabases as $Member){ ?>



										<option value="<?php echo $Member->companyname;?>"><?php echo $Member->companyname;?></option>



									<?php } ?>



									<option>A G Industries Pvt. Ltd.</option>



									<option>A Raymond Fasteners India Pvt. Ltd.</option>



									<option>Aakar Foundary Pvt. Ltd.</option>



									<option>AAM India Manufacturing Corporation Pvt. Ltd.</option>



								</select>



							</div>



							<div class="col-12">



								<select class="form-control" id="productmanufactured" name="productmanufactured">



									<option value="">Select Product Category</option>



									<?php foreach($MembersDatabases as $Member){ ?>



										<option value="<?php echo $Member->productmanufactured;?>"><?php echo $Member->productmanufactured;?></option>



									<?php } ?>



									<option>LPDC, HPDC, GDC, Powder Coating, Machining, Tool-Room</option>



									<option>Rear Axle System & Parts, Propeller Shaft, Drive Train & Power Train Parts</option>



								</select>



							</div>



							<div class="col-12 mt-4 text-center">



								<button type="submit" class="btn btn-green btn-big">Search</button>



							</div>



						</div>



					</form>



				</div>



			</div>



		</div>



	</section>



	<!-- ACMA is committed to build an Aatmanirbhar Bharat -->



	<section class="bg-img sec-space bg-primary" style="background-image: url(images/bg1.jpg);">



		<div class="container">



			<div class="row">



				<div class="col-12 text-center mb-4 mb-md-5 wow zoomIn">



					<h2 class="title text-orange">ACMA is Committed to build an Aatmanirbhar Bharat</h2>



					<p class="text-white">Our active involvement and association with the Government of India, integral trade alliances, and technology introduction and upgradation in the sector presents us with opportunities to uncover the potential of our dynamic industry. Together, we can work towards ensuring that one day, all our components are 100% made in India and that we become a global factory - making India a force to be reckoned with.</p>



				</div>



				<div class="col-md-4 wow zoomIn mb-3 mb-md-0">



					<div class="box-item text-center">



						<img src="images/icon_1.gif" width="100px">



						<p class="text-white mt-3">Promoting and facilitating Make In India</p> <span class="box-line-btm"></span>



					</div>



				</div>



				<div class="col-md-4 wow zoomIn mb-3 mb-md-0">



					<div class="box-item text-center">



						<img src="images/icon_2.gif" width="100px">



						<p class="text-white mt-3">Helping the automotive industry recover</p> <span class="box-line-btm"></span>



					</div>



				</div>



				<div class="col-md-4 wow zoomIn">



					<div class="box-item text-center">



						<img src="images/icon_3.gif" width="100px">



						<p class="text-white mt-3">Putting the Indian automotive industry on the world’s map</p> <span class="box-line-btm"></span>



					</div>



				</div>



			</div>



		</div>



	</section>



	<!-- Video Section -->



	<section class="video-sec">



		<video width="100%" poster="images/video_bg.jpg">



			<source src="https://www.acma.in/video/AGM_Movie_Final_cut_2020 (1).mp4" type="video/mp4">Your browser does not support the video tag.</video>



	</section>



	<!-- Acma Webinars -->



	<section class="webinars_sec">



		<div class="container-fluid">



			<div class="row">



				<div class="col-md-4 p-0">



					<div class="web_slider mb-0">



						<div class="web_slider_item">



							<img src="images/webinar_1.jpg">



						</div>



						<div class="web_slider_item">



							<img src="images/webinar_2.jpg">



						</div>



					</div>



				</div>



				<div class="col-md-4 p-0">



					<a href="acma-webinar.php">



                        <div class="web-title">



                        <h2 class="title text-primary wow zoomIn">Acma Webinars</h2>



                        </div>



                    </a>



                </div>



				<div class="col-md-4 p-0">



					<div class="web_slider mb-0">



						<div class="web_slider_item">



							<img src="images/webinar_2.jpg">



						</div>



						<div class="web_slider_item">



							<img src="images/webinar_1.jpg">



						</div>



					</div>



				</div>



			</div>



		</div>



	</section>



	<!-- Footer -->



	<?php if($message){ ?>



		<script>



			var elmnt = document.getElementById("login_sec_bg_white");



			elmnt.scrollIntoView();



		</script>



	<?php	} ?>







	<!-- Popup -->



	<!-- <div id="home-pop" class="modal" style="display: block;">

		<div class="modal-dialog">

			<div class="modal-content">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

				<div class="modal-body">

				<iframe width="100%" height="315" src="https://www.youtube.com/embed/VDxXT3j942Q" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

				</div>

			</div>

		</div>

	</div> -->



	<!-- Cookie Js -->



	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>







<?php include('includes/footer-new.php'); 