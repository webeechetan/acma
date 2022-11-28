<?php include("includes/header.php");?>

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

          <h2>ACoE Events</h2>

           <table cellspacing="0" cellpadding="0" width="80%" class="tablecss">

                <tr>

                    <th width="20%" class="border-right">Date</th>

                    <th width="50%" class="border-right date-blackbg">Programme Description</th>

                    <th width="30%">Venue</th>

                </tr>

                <?php

                $EventsTables=App\Models\EventsTable::where('cat','=',3)->orderBy("id","ASC")->paginate(1000,['*'],'page',(int)$_GET['page']);

                

                $srno = 1; 

		        foreach($EventsTables as $EventsTable){

                ?>

                <tr class="tablerow">

                    <td class="border-right"><?php echo $EventsTable->eventdate;?></td>

					<td class="border-right alignleft"><?php echo $EventsTable->title;?></td>

					<td class="border-right alignleft"><?php echo $EventsTable->location;?></td>

                </tr>

                <?php }?>

                </table> 

            </div>

      </div></div></div>

    </section><!-- #about -->



  </main>



  <?php include("includes/footer.php");?>