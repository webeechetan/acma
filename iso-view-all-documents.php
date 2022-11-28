<?php 
session_start();
if($_SESSION['userstaff'] == ""){
    header("location:myacma.php");
}
include("includes/header.php");?>
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
        <img src="img/member-login.png" class="img-fluid">
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
          <h2>View All ISO Documents</h2>
          <style>
              .my-account-dashboard ul{ list-style:none; text-align:center;}
              .my-account-dashboard ul li{ margin-bottom:10px;}
          </style>
          <div class="my-account-dashboard" style="padding:50px 0">
               <ul>
                   <li>
                       <a href="iso-view-all-documents-2.php?cat=ISO_9001_2015_Formats">ISO_9001_2015_Formats</a>
                   </li>
<li>
                       <a href="iso-view-all-documents-2.php?cat=ISO_9001_2015_Quality_Manual">ISO_9001_2015_Quality_Manual</a>
                   </li>
<li>
                       <a href="iso-view-all-documents-2.php?cat=ISO_9001_2015_Process_Manual">ISO_9001_2015_Process_Manual</a>
                   </li>
<li>
                       <a href="iso-view-all-documents-2.php?cat=ISO_9001_2015">ISO_9001_2015</a>
                   </li>
               </ul>
          </div>
      </div></div></div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>