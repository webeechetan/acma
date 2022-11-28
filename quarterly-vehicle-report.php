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
          <h2>Monthly Vehicle Report</h2>
          <div class="headingborder"><img src="img/heading-border.jpg"  class="img-fluid"></div>
          <div class="content-txt">
              <table cellspacing="0" cellpadding="0" width="80%" class="tablecss">
                <tr>
                    <th width="10%" class="border-right">Year</th>
                    <th width="45%" class="border-right date-blackbg">Table</th>
                    <th width="45%">Graph</th>
                </tr>
                <?php
                $VehiclereportTables=App\Models\VehiclereportTable::where('cat','=',3)->orderBy("docyear","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                
                $srno = 1; 
		        foreach($VehiclereportTables as $VehiclereportTable){
                ?>
                <tr class="tablerow">
                    <td class="border-right"><?php echo $VehiclereportTable->docyear;?></td>
                    <td class="border-right"><a href="uploads/vehiclereport/<?php echo $VehiclereportTable->doc;?>"><?php echo $VehiclereportTable->title;?></a></td>
                    <td class="border-right"><a href="uploads/vehiclereport/<?php echo $VehiclereportTable->doc2;?>"><?php echo $VehiclereportTable->title2;?></a></td>
                </tr>
                <?php }?>
              </table> 
</div>
<p><img src="img/content-bottom-border.jpg"  class="img-fluid"></p>
      </div></div></div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>