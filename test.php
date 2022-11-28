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
        <img src="img/press-release.jpg" class="img-fluid">
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
              <h2 class="aligncenter">PRESS / MEDIA RELEASE</h2>
          <div class="content-txt">
            <table cellspacing="0" cellpadding="0" width="80%" class="tablecss">
                <tr>
                    <th width="10%" class="border-right">S.NO.</th>
                    <th width="25%" class="border-right date-blackbg">Date of UPLOAD</th>
                    <th width="65%">Description (<i> Click to Download </i>)</th>
                </tr>
                <?php
                
                $PressreleaseTables=App\Models\PressreleaseTable::orderBy("uploaddate","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                
                $srno = 1; 
		        foreach($PressreleaseTables as $PressreleaseTable){
					?>
				<tr class="tablerow">
                    <td class="border-right"><?php echo $srno;?></td>
                    <td class="border-right"><?php echo $PressreleaseTable->uploaddate;?></td>
                    <td class="alignleft"><a href="uploads/press-release/<?php echo $PressreleaseTable->attachment;?>"><?php echo $PressreleaseTable->title;?></a></td>
                </tr>	
				<?php $srno++; }?>	

            </table>   
            <p class="aligncenter"><a id="showmore"><img src="img/see-more.jpg"  class="img-fluid"></a></p>
          </div>
      </div></div></div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>
  <script>
        $(document).ready(function() {
          $("#showmore").click(function() {
             $(".tablerow").show();
          });
        });
  </script>