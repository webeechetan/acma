<?php include("includes/header.php");
$message='';
if(isset($_SESSION['user'])){
header("Location:my-account.php");
exit;
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
?>

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">
     <div class="secondarymenu">  
     <div class="row">
         <div class="secondarymenu-right">
            <?php include("includes/secondaory-menu.php");?>
         </div>
     </div>    
     <div class="row introbanner">
      <div class="introvideo">   
          <div class="halfwidth">
              <a href="acma-annual-session.php"><img src="img/acma-new-9-09-2020.PNG" style="width:100%" alt="acma"></a>
          </div>
          <div class="halfwidth" style="background-color:#000">
              <video width="100%" poster="img/placeholder-bg.jpg" style="height: 100%;" controls>
                <source src="video/AGM_Movie_Final_cut_2020 (1).mp4" type="video/mp4">
              Your browser does not support the video tag.
              </video> 
          </div> 
      </div>  
     </div> 
    </div>
   </div>      
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="bottom-about-bg">
        <div class="top-about-bg">    
        <header class="section-header">
          <h3>About ACMA</h3>
          <p class="align-center"><img src="img/seprator-img.jpg"></p>
          <p>The Automotive Component Manufacturers Association of India (ACMA) is the apex body representing the interest of the Indian Auto Component Industry. Its membership of over 800 manufacturers contributes more than eighty five per cent of the auto component industry’s turnover in the organised sector. ACMA is an ISO 9001:2015 Certified Association.</p>
          <p class="align-center"><img src="img/seprator-img.jpg"></p>
        </header>
        </div>
        </div>
      </div>
    </section><!-- #about -->
    
     <!--==========================
      Messages Section
    ============================-->
    <section id="messages">
      <div class="container">
          <div class="row">
          <div class="col-12 col-lg-4 mb-3 mb-lg-0">
              <div class="president-msg profile-height">
                  <h4>President - ACMA</h4>
                  <p class="align-center"><img src="img/msg-heading-border.jpg"></p>
                  <p>Mr. Deepak Jain is the Chairman & Managing Director of Lumax Group, which is a leading manufacturer of automotive components and systems in India, with market leaders in Lighting and Gear Shifter Systems.</p>
                  <p>Currently the President of Automotive Component Manufacturers Association of India (ACMA), Mr. Jain wears many hats - Vice President of Toyota Kirloskar Supplier Association (TKSA), Executive Committee Member of Maruti Suzuki Supplier Welfare Association (MSSWA) and Tata Motors Supplier Council.</p>
                  <p class="traingle"><img src="img/traingle.jpg"></p>
                  <h3>Mr. Deepak Jain</h3>
                  <img src="img/president-photo.jpg" class="president-photo">
              </div>
          </div>
          <div class="col-12 col-lg-4 mb-3 mb-lg-0">
              <div class="director-msg profile-height">
                  <h4>Director General's Message</h4>
                  <p class="align-center"><img src="img/msg-heading-border-blue.jpg"></p>
                  <p>ACMA’s active involvement in trade promotion, technology up-gradation, quality enhancement and collection and dissemination of information has made it a vital catalyst for the auto component industry’s growth and development. Its other activities include participation in international trade fairs, mounting trade delegations overseas and bringing out publications on various topical subjects related to the automotive industry.</p>
                  <p class="traingle"><img src="img/traingle-blue.jpg"></p>
                  <h3>Mr. Vinnie Mehta</h3>
                  <img src="img/d-photo.jpg" class="president-photo">
              </div>
          </div>
          <div class="col-12 col-lg-4 mb-3 mb-lg-0">
              <div class="login-panel profile-height">
                  <div class="card mt-3 tab-card">
                    <div class="card-header tab-card-header">
                      <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true"><?php if(!$_SESSION['user']){?> Member Login<?php }else{
                            ?>Member Info
                            <?php } ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Become A Member</a>
                        </li>
                      </ul>
                    </div>
            
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                          <?php if($message){
                          echo $message;
                          }?>
                          <?php if(!$_SESSION['user']){?>
                        <form class="login-form" method="post">
                            <div class="form-group">
                                <lable>Username</lable>
                                <input type="text" name="username">
                            </div>
                            <div class="form-group">
                                <lable>Password</lable>
                                <input type="password" name="password">
                            </div>
                            <div class="form-group d-flex justify-content-between align-items-center mt-4">
                                <button>Login</button>
                                <a class="forgotpassword" href="coming-soon.php">Forgot Password</a>
                            </div>
                            <br><br>
                            <p class="alignleft"><a class="btn mb-2 mb-sm-0" href="payment-online.php">Pay Now</a>&nbsp;<a class="btn" href="register.php">Register</a></p>
                        </form>  
                        <?php }else{
                        ?>
                        <p align="center"><strong>Welcome <?php echo $_SESSION['user'];?></strong><br><br><a class="btn" href="edit-profile.php">Edit Profile</a>&nbsp;<a class="btn" href="logout.php">Logout</a></p>
                        <?
                        }?>
                      </div>
                      <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
                        <p align="center"><a class="btn" href="become-member.php">Become a Member</a></p>            
                      </div>
            
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </section><!-- #about -->
    
    <!--==========================
      Sponsors Section
    ============================-->
       <section id="member-search">
      <div class="container">
          <div class="row">
          <div class="top-roll"><img src="img/roll.jpg"></div>  
          <div class="bottom-roll"><img src="img/roll.jpg" style="z-index: 9; position: relative;display:none;" ></div> 
          <div class="col-sm-6">
              <!-- <h3>Upcoming Events</h3> -->
              <h3>ACMA Webinar's</h3>
              <div class="slides">
                  <div id="myCarousel2" class="carousel slide" data-ride="carousel" data-interval="5000" style="background-color: transparent;">
                      <!-- Indicators -->
                      <!-- <ol class="carousel-indicators">
                        <li data-target="#myCarousel2" data-slide-to="0"></li>
                        <li data-target="#myCarousel2" data-slide-to="1"></li>
                        <li data-target="#myCarousel2" data-slide-to="2"></li>
                      </ol> -->
                    
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner"> 
                        <div class="item active" style="height: auto; width:100%; display: flex; align-items: center;">
                          <a href="acma-webinar.php" target="_blank">
                             	<img src="img/WhatsApp Image 2020-05-04 at 8.51.18 PM.jpeg">

                                  </a>
                        </div>
                        <!-- <div class="item active" style="height: 275px; width:100%; display: flex; align-items: center;">
                          <a href="uploads/AMCA-covid-advisory.pdf">
                            <img src="img/covid-19-upcoming.jpg">
                          </a>
                        </div>
                        <div class="item">
                          <a href="#"><img src="uploads/events/aCMA-BANNER (1).png" alt="Los Angeles" style="height: 100%; width:100%;"></a>
                        </div> -->
                        <!-- <div class="item">
                          <a href="img/Summit_Brochure 2019.pdf"><img src="img/Banner_510x277.png" alt="Acma Technology Summit & Awards 2019 (5th Edition)" style="width:100%"></a>
                        </div>   -->
                        <!-- <div class="item">
                          <a href="uploads/events/ACAM-iAutoConnect-Flyer.pdf"><img src="uploads/events/sides-2.png" alt="Los Angeles" style="width:100%"></a>
                        </div> -->
                      </div>
                    
                      <!-- Left and right controls -->
                      <!-- <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
                        <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                      </a>
                      <a class="right carousel-control" href="#myCarousel2" data-slide="next">
                        <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                      </a> -->
                    </div>
              </div>
              <!-- <div class="border-top"></div> -->
          </div>
          <div class="col-sm-6">
              <h3>ACMA Member Search</h3>
              <form method="post" action="member-search.php">
              <div class="search-form" style="padding: 38px 45px 23px;">
                    <div class="form-group">
                        <label class="rad">
                          <input type="radio" name="rad1" value="a">
                          <i></i><select name="companyname"><option  value="">Select Company</option>
                          <?php
                            $MembersDatabases=App\Models\MembersDatabase::orderBy("companyname","ASC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                            
                            $srno = 1; 
            		        foreach($MembersDatabases as $Member){
            			  ?>
                          <option><?php echo $Member->companyname;?></option>
                          <?php } ?>
                          </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="rad">
                          <input type="radio" name="rad1" value="b" checked>
                          <i></i><select name="productmanufactured">
                              <option value="">Select Product Category</option>
                              <?php foreach($MembersDatabases as $Member){ ?>
                              <option><?php echo $Member->productmanufactured;?></option>
                              <?php }?>
                              </select>
                        </label>
                    </div> 
                    <div class="form-group" align="right" style="margin-right:59px;">
                                <button>Search</button>
                    </div>
              </div>
              </form>
              <!-- <div class="border-top"></div> -->
          </div>
        </div>
        <!--upcomming event-->
        <div class="row text-center py-4">
            <div class="col-md-12">
                <h3 class="mb-3">Upcomming Event</h3>
                <div class="slider-area">
            <div class="slider-img">
                 <div><a href="https://acma-automechanika-newdelhi.in.messefrankfurt.com/newdelhi/en/planning-preparation/exhibitors.html" target="_blank"><img src="https://www.acma.in/img/acma-upcomming-event-14-2020.jpeg"></a></div>
              <div><a href="https://virtualvaluechainexpo.acma.events/#/signup" target="_blank"><img src="https://www.acma.in/img/upcomming-event-2020-13.jpeg"></a></div>
              <div><a href="http://www.acmaindia-iautoconnect.in/" target="_blank"><img src="https://www.acma.in/img/Banner_Iconnect.png"></a></div>
            </div>
        </div>
            </div>
          
        </div>
      </div>
    </section><!-- #about -->
    <!--==========================
      Sponsors Section
    ============================-->
    <section id="sponsors">
      <div class="container">
          <div class="row">
          <div class="col-sm-8">
            <h3>Our Sponsors</h3>
            <div class="row">
            <div class="col-lg-12">
                <div id="carousel" class="carousel slide scroll-2" data-ride="carousel" data-type="multitv" data-interval="100" style="background-color: #fcfcfc;">
                
                <div class="carousel-inner">
                    <div class="item active">
						<div class="carousel-col-2">
						     <a href="http://sonacomstar.com/" target="_blank">
						     
                      <img src="img/int-9.JPG"  height="auto" style="border:0px;" >
                      </a>
							
						</div>
					</div>
					<div class="item">
						<div class="carousel-col-2">
						   <a href="https://jkfenner.com/" target="_blank">
                      <img src="img/int-13.jpg" height="auto" style="border:none;">
                      </a>
						
						</div>
					</div>
				    <div class="item">
						<div class="carousel-col-2">
						     <a href="https://minda.co.in/" target="_blank">
                      <img src="img/spons-1.jpg"  height="auto" style="border:0px;">
                      </a>
						</div>
					</div>
					<div class="item">
						<div class="carousel-col-2">
						     <a href="https://www.bossard.com/en/company/india/" target="_blank">
                      <img src="img/spons-2.jpg"   height="auto" style="border:0px;" >
                      </a>
						
						</div>
					</div> 
					
				
				</div>

          
              <div class="left carousel-control">
                <a href="#carousel" role="button" data-slide="prev">
                  <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                </a>
              </div>
              <div class="right carousel-control">
                <a href="#carousel" role="button" data-slide="next">
                  <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
         </div> 

             
          </div>
          <div class="col-sm-4 align-center">
              <a class="twitter-timeline" data-lang="en" data-width="300" data-height="300" data-link-color="#2B7BB9" href="https://twitter.com/ACMAIndia?ref_src=twsrc%5Etfw">Tweets by ACMAIndia</a> 
              <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
        </div>
      </div>
    </section><!-- #about -->
    
    <!--==========================
      Initiatives Section
    ============================-->
    <section id="initiative">
      <div class="container">
        <div class="section-initiative">
          <h3>acma initiatives</h3>
          <div class="row">
            <div class="col-lg-12">
                <div id="carousel3" class="carousel slide scroll-2" data-ride="carousel" data-type="multi" data-interval="500" style="background-color: #fcfcfc;">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="carousel-col">
                        <a href="impact.php" target="_blank"><img src="img/int-1.jpg"></a>
                    </div>
                    <div class="carousel-col">
                        <a href="javascript:;"><img src="img/int-2.jpg"></a>
                    </div>
                    <div class="carousel-col">
                        <a href="http://autodx.org/" target="_blank"><img src="img/int-3.jpg"></a>
                    </div>
                    <div class="carousel-col">
                        <a href="img/YBLF_Core_Team_Year_20-21.png" target="_blank"><img src="img/int-4.jpg"></a>
                    </div>
                    
                   
                  </div>

                  <div class="carousel-item">
                    
                    <div class="carousel-col">
                        <a href="#"><img src="img/int-2.jpg"></a>
                    </div>
                    <div class="carousel-col">
                        <a href="http://autodx.org/" target="_blank"><img src="img/int-3.jpg"></a>
                    </div>
                    <div class="carousel-col">
                        <a href="img/YBLF_Core_Team_Year_20-21.png" target="_blank"><img src="img/int-4.jpg"></a>
                    </div>
                    <div class="carousel-col">
                        <a href="http://asdc.org.in/" target="_blank"><img src="img/int-5.jpg"></a>
                    </div>
                   
                  </div>

                  
                
                 
                  
                  <!---->
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#carousel3" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                </a>
                <a class="right carousel-control" href="#carousel3" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </div>
         </div> 
        </div>
      </div>
    </section><!-- #about --><!-- #about -->

  </main>
  <!-- PopUp -->
  <div id="id0q" class="modal pop">
       <div class="modal-content">
            <div class="pop-inner">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="pop-inner-body">
                    <!--Tool-&-Die-Expo.pdf-->
                    <a href="http://www.acmaindia-iautoconnect.in" target="_blank"><img src="https://www.acma.in/img/acma-14-10-2020.jpeg" alt=""></a>
                    <!-- <h3>Collation of Notifications & Advisories in light of <span>COVID-19</span></h3>
                    <a href="img/ACMA-Manual-for-restart-after-de-lockdown.pdf" target="_self" class="pop-btn">ACMA Manual for Restart</a>
                    <a href="govt-center-state-notifications" class="pop-btn">Govt. – Centre & State</a>
                    <a href="oem-notifications-covid19" class="pop-btn">OEM Start-up Manual</a>
                    <a href="https://acmaindia.webex.com/mw3300/mywebex/default.do?nomenu=true&siteurl=acmaindia&service=6&rnd=0.3298176521396089&main_url=https%3A%2F%2Facmaindia.webex.com%2Fec3300%2Feventcenter%2Fevent%2FeventAction.do%3FtheAction%3Ddetail%26%26%26EMK%3D4832534b00000004eef19e4e683e169bdb78923c3d6fbaf0cc2f779045605e72939e550401d029dd%26siteurl%3Dacmaindia%26confViewID%3D169534532048917423%26encryptTicket%3DSDJTSwAAAAQOoCEkvWndRwSNp98ApYtiWRyFvWLA0dLKOwngjz6ycA2%26" target="_blank"><img src="img/shakshm-samvad-pop.jpeg" alt=""></a> -->
               </div>
            </div>
        </div>
    </div>
   
<?php include("includes/footer-home.php");?>