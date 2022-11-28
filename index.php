<?php

require __DIR__ . "/bootstrap.php";
date_default_timezone_set('Asia/Kolkata');

use Carbon\Carbon;
// echo Carbon::now();
if (isset($_POST['action']) && $_POST['action'] = 'password_reset') {
    $useremail = $_POST['email'];
    $user = App\Models\MembersTable::where('email', $useremail)->first();
    if ($user) {
        $otp = rand(000000, 999999);
        $otp_created_date = Carbon::now();
        $_SESSION['password_reset'] = ["otp" => $otp, "email" => $useremail];
        require './acma-ec-election-2022-23/vendor/autoload.php';
        require('./acma-ec-election-2022-23/php/constant/constant.php');
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("acma@acma.in", "ACMA");
        $email->setSubject("Reset Your Password");
        // $email->isHTML(true);
        $email->addTo($useremail, "Company");
        ob_start();
        include('password_reset_email_template.php');
        $email->addContent("text/html", ob_get_contents());
        $sendgrid = new \SendGrid(constant('MAIL_PASSWORD'));
        $response = $sendgrid->send($email);
        ob_end_clean();
        $user->otp = $otp;
        $user->otp_created_at = $otp_created_date;
        if ($user->save()) {
            echo json_encode(array("code" => '200', "msg" => "Password reset link has been sended on your registered email."));
        }
    } else {
        echo json_encode(array("code" => '404', "msg" => "Email not match with our database."));
    }
    die;
}

if (isset($_POST['key_word'])) {
    $keyword = $_POST['key_word'];
    $MembersDatabases = App\Models\MembersDatabase::where('companyname', 'like', '%' . $keyword . '%')
        ->orWhere('productmanufactured', 'like', '%' . $keyword . '%')
        ->orWhere('product2', 'like', '%' . $keyword . '%')
        ->orWhere('product3', 'like', '%' . $keyword . '%')
        ->orWhere('product4', 'like', '%' . $keyword . '%')
        ->get();
    echo json_encode($MembersDatabases);
    die();
}
include("includes/header-new.php");
$message = '';
if (isset($_SESSION['user'])) {
    #header("Location:my-account.php");
    #exit;
}
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = App\Models\MembersTable::where('userid', '=', $username)->first();
    if ($user) {
        if (password_verify($password, $user->password))
        // if($password == $user->password)
        {
            $_SESSION['user'] = $user->userid;
            $_SESSION['user_id'] = $user->id;
            header("Location:my-account.php");
            exit;
        } else {
            $message = '<p class="alert">Invalid Password!</p>';
        }
    } else {
        $message = '<p class="alert">Invalid UserName!</p>';
    }
}
$MembersDatabases = App\Models\MembersDatabase::orderBy("companyname", "ASC")->paginate(1000, ['*'], 'page', (int)$_GET['page']);
$srno = 1;
$conn = mysqli_connect("localhost", "techtonic", "d#4ab01db3!bT", "acma_web");

?>
<!-- Hero Section -->
<!-- <section class="hero-sec">
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
</section> -->
<!-- <section class="hero-sec test" style="background-image: url(images/Annual-Session-banner-new.jpg);">
   <div class="container">
      <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="images/61-new.png" alt="">
                <a  class="d-block text-center mt-3 mt-md-4" target="_blank" href="pdf/Research-Report.pdf">
                    <button  class="btn btn-primary">Research Report</button>
                </a>
                <a  class="d-block text-center mt-3 mt-md-4" target="_blank" href="pdf/Annual-Report.pdf">
                    <button  class="btn btn-primary">Annual Report</button>
                </a>
                <a  class="d-block text-center mt-3 mt-md-4" target="_blank" href="pdf/Compendium.pdf">
                    <button  class="btn btn-primary">Compendium</button>
                </a>
            </div>
            <div class="col-md-6">
                <iframe width="525px" height="325px" src="https://www.youtube.com/embed/YhekexkYsJk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
      </div>
   </div>
</section> -->
<!-- <section class="index-test hero-sec test" style="background-image: url(images/modi-jee.png);">
    <div class="container">
        <div class="row align-items-center justify-content-center d-none">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="images/61-new.png" alt="">
            </div>
            <div class="col-md-6">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/5EhJVi-I7RI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <a  class="d-block text-center mt-3 mt-md-4" target="_blank" href="https://www.acma.in/61st-acma-annual-session.php">
                    <img src="images/click-here.png" alt="">
                </a>
                <a  class="d-block text-center mt-3 mt-md-4" target="_blank" href="https://www.acma.in/61st-acma-annual-session.php">
                <button type="submit" class="btn btn-primary">CLICK HERE TO KNOW MORE</button>
                </a>
            </div>
        </div>
    </div>
    </section> -->


<section class="hero-slider">
    <div class="single_slider">

        <!-- <?php
                $slectSlider = mysqli_query($conn, "SELECT * FROM home_page_slides ORDER BY image_order");
                while ($row = mysqli_fetch_array($slectSlider)) {
                ?>
        <div class="">
            <div class="container-fluid">
                <div class="row">
                    <a href="<?php echo $row['image_url'] ?>"><img src="images/<?php echo $row['image'] ?>" alt=""></a>
                </div> 
            </div>
        </div>
        <?php } ?> -->
        <!-- <div class="">
            <div class="container-fluid">
                <div class="row">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSfBdV4d7Ry4VQISqRNQAEgEwvpBx7NWibN3qy320K__WAfSdA/viewform">
                        <img src="images/77388-slide-Reverse-Buyers-Sellers-Meet-Banner_revised.png" alt="">
                    </a>
                </div>
            </div>
        </div> -->
        <div class="">
            <div class="container-fluid">
                <div class="row">
                    <a href="">
                        <img src="images/99666-slide-1920 x 750 pixels-2.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="annual_session_62">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0 annual_session_62_left">
                        <div class="annual_session_62_video">
                            <iframe width="530" height="315" src="https://www.youtube.com/embed/kIwC_siwg2c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <!-- <div class="annual_session_62_btm">
                            <h5><span>Catch Us Live:</span> ACMA 62nd Annual Session</h5>
                        </div> -->
                    </div>
                    <div class="col-lg-6">
                        <div class="annual_session_62_right">
                            <div class="annual_session_62_right_top">
                                <div><img src="images/62_annual_22_banner_logo.png" alt="ACMA 62nd Annual Session"></div>
                                <div><img src="images/62_annual_22_banner_text.png" alt="ACMA 62nd Annual Session"></div>
                            </div>
                            <ul>
                                <li><a href="pdf/ACMA-McKinsey Joint Report - ACMA Annual Session 2022.pdf" target="_blank">ACMA-McKinsey Joint Report</a></li>
                                <li><a href="pdf/AR 2021-22.pdf" target="_blank">Annual Report</a></li>
                                <li><a href="pdf/Program - ACMA Annual Session 2022.pdf" target="_blank">Program</a></li>
                                <li><a href="pdf/Compendiun of Papers - ACMA Annual Session 2022.pdf" target="_blank">Compendium of Papers</a></li>
                                <li><a href="pdf/Profile of Speakers - ACMA Annual Session 2022.pdf" target="_blank">Profile of Speakers</a></li>
                                <li><a href="pdf/Thank You Sponsors - ACMA Annual Session 2022.pdf" target="_blank">Thank You Sponsors</a></li>
                                <li><a href="pdf/Lunch Co-Hosts - ACMA Annual Session 2022.pdf" target="_blank">Lunch Co-Hosts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- PLI-section -->
<section class="pli sec-space management-sec  bg-light position-relative overflow-hidden d-none">
    <ul class="ani-sec">
        <li class="wow fadeInLeft">
            <img src="images/gears.gif">
        </li>
        <li class="wow fadeInRight">
            <img src="images/gears.gif">
        </li>
    </ul>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <a href="#" class="btn btn-primary mb-3 mb-md-0" data-toggle="modal" data-target="#Press-Release">Press Releases</a>
                <div class="modal fade p-0" id="Press-Release" tabindex="-1" role="dialog" aria-labelledby="Press-ReleaseTitle" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></a>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="pli-boxes mb-3 mb-md-0">
                                            <div class="pli-boxes-inner">
                                                <h5 class="text-primary"><b>Press release on Production Linked Incentive Schemes of 10 key sectors- 11th November 2021</b></h5>
                                            </div>
                                            <a href="pdf/Press-Release_PLI-Schemes-of-10-Key-Sectors_11th-November-2020.pdf" class="btn btn-primary mt-2" data-target="#job-vacancy">Read More</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="pli-boxes mb-3 mb-md-0">
                                            <div class="pli-boxes-inner">
                                                <h5 class="text-primary"><b>Press Release on PLI Scheme for Auto Sector -15th September 2021</b></h5>
                                            </div>
                                            <a href="pdf/Press-Release_PLI-Scheme-for-Automotive-Sector_15th-September-2021.pdf" class="btn btn-primary mt-2" data-target="#job-vacancy">Read More</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="pli-boxes mb-3 mb-md-0">
                                            <div class="pli-boxes-inner">
                                                <h5 class="text-primary"><b>Tables of press release on PLI scheme for Auto Sector-15th September 2021</b></h5>
                                            </div>
                                            <a href="pdf/Press-Release_PLI-Scheme_Tables_15th-September-2021.pdf" class="btn btn-primary mt-2" data-target="#job-vacancy">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-primary mb-3 mb-md-0" data-toggle="modal" data-target="#Circulars">Circulars</a>
                <div class="modal fade p-0" id="Circulars" tabindex="-1" role="dialog" aria-labelledby="CircularsTitle" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></a>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="pli-boxes mb-3 mb-md-0">
                                            <div class="pli-boxes-inner">
                                                <h5 class="text-primary"><b>ACMA Circular- Seeking Urgent Inputs on inclusion of Advanced Technologies in Production Linked Incentive (PLI) Scheme for Automotive- 23rd September 2021</b></h5>
                                            </div>
                                            <a href="pdf/Important-Circular_Seeking-inputs-on-advanced-technologies.pdf" class="btn btn-primary mt-2" data-target="#job-vacancy">Read More</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pli-boxes mb-3 mb-md-0">
                                            <div class="pli-boxes-inner">
                                                <h5 class="text-primary"><b>Enclosure of ACMA Circular dated 23rd September 2021</b></h5>
                                            </div>
                                            <a href="pdf/Format-for-capturing-AAT-Products_ACMA-Circular_23rd-September-2021.xlsx" class="btn btn-primary mt-2" data-target="#job-vacancy">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-primary mb-3 mb-md-0" data-toggle="modal" data-target="#PLI-Scheme">PLI Scheme</a>
                <div class="modal fade p-0" id="PLI-Scheme" tabindex="-1" role="dialog" aria-labelledby="PLI-SchemeTitle" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></a>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="pli-boxes mb-3 mb-md-0">
                                            <div class="pli-boxes-inner">
                                                <h5 class="text-primary height-auto"><b>Auto PLI scheme notification 23rd September 2021</b></h5>
                                            </div>
                                            <a href="pdf/Auto-Pli-Scheme-notification.pdf" class="btn btn-primary mt-2" d data-target="#job-vacancy">Read More</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pli-boxes mb-3 mb-md-0">
                                            <div class="pli-boxes-inner">
                                                <h5 class="text-primary height-auto"><b>Auto PLI guidelines notification 23rd September 2021</b></h5>
                                            </div>
                                            <a href="pdf/Auto-PLI-guidelines.pdf" class="btn btn-primary mt-2" d data-target="#job-vacancy">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-primary mb-3 mb-md-0" data-toggle="modal" data-target="#Webinars">Webinars</a>
                <div class="modal fade p-0" id="Webinars" tabindex="-1" role="dialog" aria-labelledby="WebinarsTitle" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></a>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="pli-boxes mb-3 mb-md-0">
                                            <div class="pli-boxes-inner">
                                                <h5 class="text-primary"><b>Recording- Interactive Session with Secretary, Ministry of Heavy Industries- 15th September 2021</b></h5>
                                            </div>
                                            <a href="https://www.youtube.com/watch?v=19Xrc7iDdrA" target=”_blank” class="btn btn-primary mt-2" data-target="#job-vacancy">Read More</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pli-boxes mb-3 mb-md-0">
                                            <div class="pli-boxes-inner">
                                                <h5 class="text-primary"><b>Recording- ACMA Webinar on PLI Scheme-24th September 2021</b></h5>
                                            </div>
                                            <!---->
                                            <a href="video/Recording-ACMA-Webinar-01.mp4" target=”_blank” class="btn btn-primary mt-2" data-target="#job-vacancy _blank">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-primary mb-3 mb-md-0" data-toggle="modal" data-target="#EY-Presentation">EY Presentation</a>
                <div class="modal fade p-0" id="EY-Presentation" tabindex="-1" role="dialog" aria-labelledby="EY-PresentationTitle" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></a>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pli-boxes mb-3 mb-md-0">
                                            <div class="pli-boxes-inner">
                                                <h5 class="text-primary height-auto"><b>EY Presentation on PLI- 23rd September 2021</b></h5>
                                            </div>
                                            <a href="pdf/EY-Presentation.pdf" class="btn btn-primary mt-2" d data-target="#job-vacancy">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-primary mb-3 mb-md-0" data-toggle="modal" data-target="#PLI-FAQ">PLI FAQ<small>s</small></a>
                <div class="modal fade p-0" id="PLI-FAQ" tabindex="-1" role="dialog" aria-labelledby="PLI-FAQTitle" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></a>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pli-boxes mb-3 mb-md-0">
                                            <div class="pli-boxes-inner">
                                                <h5 class="text-primary height-auto"><b>PLI Frequently Asked Questions (FAQs)</br>(For PLI Scheme for Automobile and Auto Component Industry)</b></h5>
                                            </div>
                                            <a href="pdf/MHI-FAQs-PLIs_8th-October-2021.pdf" class="btn btn-primary mt-2" data-target="#job-vacancy">Read More</a>
                                            <a href="pdf/FAQs_II_PLI_Automobile_&_Auto_Component_Industry.pdf" class="btn btn-primary mt-2" d data-target="#job-vacancy">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-primary mb-3 mb-md-0 mt-0 mt-md-4" data-toggle="modal" data-target="#PLI-Application-Form">PLI Application Form & AAT List</a>
                <div class="modal fade p-0" id="PLI-Application-Form" tabindex="-1" role="dialog" aria-labelledby="PLI-Application-Formtitle" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></a>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pli-boxes mb-3 mb-md-0">
                                            <div class="pli-boxes-inner">
                                                <h5 class="text-primary height-auto"><b>PLI Application Form & AAT List</b></h5>
                                            </div>
                                            <a href="pdf/PLI-Application-form-and-Advanced-automotive-list.pdf" class="btn btn-primary mt-2" d data-target="#PLI-Application-Form">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-primary mb-3 mb-md-0 mt-0 mt-md-4" data-toggle="modal" data-target="#Last-Date-Form">Last Date for PLI Application</a>
                <div class="modal fade p-0" id="Last-Date-Form" tabindex="-1" role="dialog" aria-labelledby="Last-Date-Title" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></a>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pli-boxes mb-3 mb-md-0">
                                            <div class="pli-boxes-inner">
                                                <h5 class="text-primary height-auto"><b>Last Date for PLI Application</b></h5>
                                            </div>
                                            <a href="pdf/Intimation-Last-date-of-Filling-PLI-Application.PDF" class="btn btn-primary mt-2" d data-target="#PLI-Application-Form">Read More</a>
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
<!-- Overview Section  -->
<section class="brand-name-bg sec-space bg-primary overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-md-5 text-center mb-3 mb-md-0 text-md-left wow fadeInLeft">
                <p class="mb-0">
                    <img class="line line-left-top" src="images/line-1.png">
                </p>
                <h4 class="title text-white">60+ year of promoting auto component manufacturing in India</h4>
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
                        <img src="images/sunjay_k.jpg">
                        <img class="frame" src="images/org_frame.png">
                    </div>
                    <div class="box-item-text">
                        <!-- <p class="mb-0">Mr. Sunjay J Kapur, is the Chairman of SONA Comstar Ltd., which is a largest manufacturer of precision forged gears in the world. The company supplies gears to all the leading [global] passenger cars, trucks, and off-highway vehicles as well as Farm Equipment. Currently the President of ACMA, Mr. Kapur, he was Co-Chairman of CII Smart Manufacturing Council during 2018-19 & 2019-20 and
                    Co-Chairman of CII Manufacturing Council during 2020-21 &  2021-22. -->
                        <p class="mb-0">Mr. Sunjay J Kapur, is the Chairman of SONA Comstar Ltd., which is a largest manufacturer of precision forged gears in the world. The company supplies gears to all the leading (global) passengers’ cars, trucks and off-highway vehicles. Currently the President of ACMA, Mr. Kapur, wears many hats ---- he was Co-Chairman of CII Smart Manufacturing Council in 2018-19 & 2019-20 and currently Co-Chairman of CII Manufacturing Council for the 2021-22 session.</p>
                        </p>
                    </div>
                    <p>
                        <img src="images/line-2.png">
                    </p>
                    <p><b>Sunjay J Kapur, President, ACMA</b>
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
        <ul class="ani-sec">
            <li><img data-aos="fade-up" src="images/org_frame.png"></li>
            <li><img data-aos="fade-down" src="images/green_frame.png"></li>
        </ul>
        <div class="login_sec bg-white" id="login_sec_bg_white">
            <div class="row wow zoomIn">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="title text-primary text-center mb-3">Login to ACMA</h2>
                    <?php if ($message) {
                        echo $message;
                    } ?>
                    <?php if (!$_SESSION['user']) { ?>
                        <form class="login-form" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Member ID">
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                                <div class="col-12 mt-4 text-center">
                                    <div class="g-recaptcha" data-sitekey="6LedyJ0UAAAAAH_QMd0rmrWbX5XhQAT6K8Nj8Q_T"></div>
                                </div>
                                <div class="col-12 mt-4 text-center">
                                    <button type="submit" class="btn btn-green">Login</button>
                                    <a href="register.php" class="btn btn-green">Register</a>
                                    <p><a href="javascript:void(0)" data-toggle="modal" data-target="#password_reset_modal" class="btn btn-link forgotpassword">Forgot Password</a></p>
                                </div>
                                <div class="col-12 text-center">
                                    <ul class="pay-btn-grp">
                                        <li><a href="payment-online.php" class="btn btn-green">Pay Now</a></li>
                                        <li><a href="become-member.php" class="btn btn-green">Become A Member</a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    <?php } else {
                    ?>
                        <p class="text-center"><strong>Welcome <?php echo $_SESSION['user']; ?></strong><br><br><a class="btn btn-primary" href="my-account.php">My Account</a><br><br><a class="btn" href="edit-profile.php">Edit Profile</a>&nbsp;<a class="btn" href="logout.php">Logout</a></p>
                    <?php
                    } ?>
                </div>
                <div class="col-lg-1 d-none d-lg-inline-block text-center">
                    <div class="mid-cog"><span><img src="images/orange_gear.png"><img src="images/green_gear.png"></span></div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <h2 class="title text-primary text-center mb-3">Acma Member Search</h2>
                    <form class="search-form" method="post" action="member-search.php">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="position-relative">
                                    <div class="position-relative member_search_field"><input class="form-control search_company" type="text" name="productmanufactured" placeholder="Search..."> <button class="member_search_btn"><i class="fas fa-search"></i></button></div>
                                    <ul class="list-none member_search_result">

                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <select class="form-control select_company" id="companyname" name="main_companyname">
                                    <option value="">Select Company</option>
                                    <?php foreach ($MembersDatabases as $Member) { ?>
                                        <option value="<?php echo $Member->companyname; ?>"><?php echo $Member->companyname; ?>
                                        </option>
                                    <?php } ?>
                                    <option>A G Industries Pvt. Ltd.</option>
                                    <option>A Raymond Fasteners India Pvt. Ltd.</option>
                                    <option>Aakar Foundary Pvt. Ltd.</option>
                                    <option>AAM India Manufacturing Corporation Pvt. Ltd.</option>
                                </select>
                            </div>
                            <input type="hidden" name="companyname" id="companyname">
                            <div class="col-12 mt-4 text-center">
                                <button type="submit" class="btn btn-green btn-big  search_go">Search</button>
                            </div>
                        </div>
                    </form>
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
                    <?php
                    $sql = "SELECT * FROM home_page_events ORDER BY image_order ASC";
                    $res = mysqli_query($conn, $sql);
                    while ($r = mysqli_fetch_array($res)) {
                    ?>
                        <div class="events_slider_items">
                            <div id="img-text" class="">
                                <a href="<?php echo $r['image_url'] ?>" target="_blank">
                                    <img src="images/<?php echo $r['image'] ?>">
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- The Modal -->
                <!--<div id="myModal" class="modal-1">-->
                <!--   <span class="close-1">&times;</span>-->
                <!--   <a href="https://docs.google.com/forms/d/e/1FAIpQLScLzlVpvwPD91h8Sf4G_zIugvlos6QFNMbE8hWREw4bLKdYWg/viewform">-->
                <!--   <img src="https://www.acma.in/images/flyer.jpg" draggable=false>-->
                <!--   </a>-->
                <!--   <div id="caption"></div>-->
                <!--</div>-->
            </div>
            <div class="col-lg-2 d-none d-lg-inline-block text-center">
                <div class="mid-cog"><span><img src="images/orange_gear.png"><img src="images/green_gear.png"></span>
                </div>
            </div>
            <div class="col-lg-5 text-center mb-3 mb-lg-0 wow fadeInRight">
                <h2 class="title text-primary mb-3">Acma Webinars</h2>
                <a href="https://www.acma.in/acma-webinar.php">
                    <!--<img src="images/acma-webinar.png" >-->
                    <img src="images/webinar-12_01_22.jpg">
                </a>
                <!-- <a href="video/Special-Webinar-on-Eliminate-Digital-Blind-Spots-by-Unifying-Machine-and-Human-Intelligence-20210929-0936-1.mp4" target="_blank">
                <img src="images/acma-webinar.png" alt="">
            </a> -->
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
                    <p class="text-white mt-3">Promoting and facilitating Make In India</p>
                    <span class="box-line-btm"></span>
                </div>
            </div>
            <div class="col-md-4 wow zoomIn mb-3 mb-md-0">
                <div class="box-item text-center">
                    <img src="images/icon_2.gif" width="100px">
                    <p class="text-white mt-3">Helping the automotive industry recover</p>
                    <span class="box-line-btm"></span>
                </div>
            </div>
            <div class="col-md-4 wow zoomIn">
                <div class="box-item text-center">
                    <img src="images/icon_3.gif" width="100px">
                    <p class="text-white mt-3">Putting the Indian automotive industry on the world’s map</p>
                    <span class="box-line-btm"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Video Section -->
<section class="video-sec sec-space pb-0">
    <div class="container">
        <video width="100%" poster="images/video_bg.jpg">
            <!-- <source src="https://www.acma.in/video/AGM_Movie_Final_cut_2020 (1).mp4" type="video/mp4"> -->
            <source src="https://www.acma.in/video/ACMA_AGM 2022 12th sep_02.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</section>
<!-- Acma Webinars -->
<!-- <section class="webinars_sec">
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
   </section> -->
<!-- Footer -->
<?php if ($message) { ?>
    <script>
        var elmnt = document.getElementById("login_sec_bg_white");
        elmnt.scrollIntoView();
    </script>
<?php    } ?>
<!-- Popup -->
<div id="home-pop" class="modal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">
                <a href="images/Reply Form_1st AFEILE_Ludhiana_Circular_6-7 April 2022.doc" target="_blank"><img src="images/1642679815.jpg
" alt="ACMA Health Advisory Jan 2022"></a>
            </div>
        </div>
    </div>
</div>

<div id="homeSlide4" class="modal fade" tabindex="-1" aria-labelledby="homeSlide4Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">
                <div class="row text-center">
                    <div class="col-12 mb-4">
                        <h3 class="text-primary"><b>Reverse Buyers - Sellers Meet</b></h3>
                        <h5>23rd to 24th March 2022</h5>
                    </div>
                    <div class="col-12 mb-3"><a class="btn btn-primary" href="https://www.iautoconnect-acma.in/buyer-registration/">Buyer Registration</a></div>
                    <div class="col-12"><a class="btn btn-primary" href="https://docs.google.com/forms/d/e/1FAIpQLScF31qJoCqbq3crDcZAqG0PwbUDzupOZbr2lmdIVarmXdy_SQ/viewform">Exhibitor Registration</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cookie Js -->
<!-- Password reset model -->
<!-- Modal -->
<div class="modal fade" id="password_reset_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Password Reset</h5>
            </div>
            <form method="post" id="password_reset_form">
                <div class="modal-body">
                    <input type="email" class="form-control" name="email" id="password_reset_email" placeholder="Email">
                </div>
                <div class="text-center text-danger password_reset_msg"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary modal_close_btn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-green password_reset_btn">Send Link</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="double_link_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close_modal_btn" data-dismiss="modal" aria-label="Close">
                    <span class="close_modal_span" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h6>Register now if you are a</h6>
                <a href="https://acma.in/uploads/doc/iauto-connect-hosted-buyers-registration-form-2022-V3.docx" download="iauto-connect-hosted-buyers-registration-form-2022-V3.docx">
                    <button class="btn btn-green download_form">Buyer</button>
                </a>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSfBdV4d7Ry4VQISqRNQAEgEwvpBx7NWibN3qy320K__WAfSdA/viewform">
                    <button class="btn btn-green visit_link">Exhibitor</button>
                </a>
            </div>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<?php include('includes/footer-new.php');  ?>
<script src="js/password_reset.js"></script>
<script>
    var loader = `<li class="text-center search_loader"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></li>`;
    $(document).ready(function() {
        $(".member_search_result").hide();
        $(".search_company").keyup(function(e) {
            $(".member_search_result").html(loader);
            let key_word = $(this).val();
            $.post('index.php', {
                key_word
            }, function(data) {
                data = JSON.parse(data);
                $(".member_search_result");
                let list = '';
                if (data.length < 1) {
                    list += "<li style='color:red'>No Result Found!</li>";
                } else {
                    for (x of data) {
                        list += `<li class="list_result" data-companyname='${x.companyname}'>${x.productmanufactured}<br> <small>${x.companyname}</small></li>`;
                    }
                }
                $(".member_search_result").html(list);
                $(".member_search_result").show();
            })
        })
    })
    $(document).on("click", ".list_result", function() {
        let companyname = $(this).data('companyname');
        $("#companyname").val(companyname);
        $(".search_go").click();
    });
    $('.select_company').select2({
        placeholder: 'Select Company'
    });


    $(".download_class").click(function(e) {
        e.preventDefault();
        $("#double_link_modal").modal('show');
    });
</script>