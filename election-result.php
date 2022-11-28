<?php include("includes/header.php");

// include(__DIR__."/validate_login.php" );

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

          <h2>Election Results</h2>

          <div class="my-account-dashboard">

              <style>

                  .desktopview{ display:block;}

                  .mobileview{ display:none;}

                  @media only screen and (max-width: 600px) {

                      .desktopview{ display:none;}

                      .mobileview{ display:block;}

                  }

              </style>

              <div class="desktopview">

                  <table cellspacing="0" cellpadding="0" width="100%" class="myaccount-table text-center">

                  <tr>

                      <th width="20%">Year</th>

                  </tr>
                  <?php
                  $conn=mysqli_connect("localhost","techtonic","d#4ab01db3!bT","acma_web");
                    $query = mysqli_query($conn,"SELECT * FROM election_result");
                    while($row = mysqli_fetch_array($query)){
                  ?>
                  <tr>
                      <td><a href="uploads/election-result/<?php echo $row['file']?>"><?php echo $row['title'];?></a></td>
                  </tr>
                  <?php }?>
              </table>

              </div>

          </div>

      </div></div></div>

    </section><!-- #about -->



  </main>



  <?php include("includes/footer.php");?>