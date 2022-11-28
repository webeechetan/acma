<?php include("includes/header.php"); include(__DIR__."/validate_login.php" );?>
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
        <img src="img/ec-minutes.jpg" class="img-fluid">
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
          <div class="content-txt">
            <table cellspacing="0" cellpadding="0" width="80%" class="tablecss">
                <tr>
                    <th width="10%" class="border-right">S.NO.</th>
                    <th width="20%" class="border-right date-blackbg">Date</th>
                    <th width="70%">Description (<i> Click to Download </i>)</th>
                </tr>
                <?php
                
                $EcminutesTables=App\Models\EcminutesTable::orderBy("id","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                
                $srno = 1; 
		        foreach($EcminutesTables as $EcminutesTable){
					?>
				<tr class="tablerow">
                    <td class="border-right"><?php echo $srno;?></td>
                    <td class="border-right"><?php echo $EcminutesTable->uploaddate;?></td>
                    <td class="alignleft"><a href="uploads/ec-minutes/<?php echo $EcminutesTable->attachment;?>"><?php echo $EcminutesTable->title;?></a></td>
                </tr>	
				<?php $srno++; }?>
            </table>   
            <p class="aligncenter" style="display:none"><a href=""><img src="img/see-more.jpg"  class="img-fluid"></a></p>
          </div>
      </div></div></div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>