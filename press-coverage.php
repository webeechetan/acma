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
        <img src="img/press-coverage.jpg" class="img-fluid">
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
          <h2>Press Coverage</h2>
             <table class="tablecss bigpadding" width="80%" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <th class="border-right" width="15%">Date</th>
                    <th class="border-right date-blackbg">Description</th>
                    <th class="border-right date-blackbg">Print</th>
                    <th class="border-right date-blackbg">Web</th>
                    <th class="border-right date-blackbg">Electronics</th>
                </tr>
                <?php
                $PressCoverageTables=App\Models\PressCoverageTable::orderBy("id","ASC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                foreach($PressCoverageTables as $data){
                ?>
                <tr>
                    <td class="border-right border-bottom" >
                      <?php if($data->date){ echo $data->date; } ?>
                    </td>
                    <td class="border-right border-bottom"><?php if($data->description){ echo $data->description; } ?></td>
                    <td class="border-right border-bottom"><a href="uploads/press-release/<?php if($data->file){ echo $data->file; } ?>"><?php if($data->file){ echo $data->file; } ?></a></td>
                    <td class="border-right border-bottom"><u><a href="<?php if($data->description){ echo $link->link; } ?>"><?php if($data->link){ echo $data->link; } ?></a></u></td>
                    <td class="border-right border-bottom"><a href="#">&nbsp;</a></td>
                </tr>
                <?php }?>
            </tbody></table>
          </div>
      </div>
      <div class="row">
              <div class="col-sm-12">
              <p class="blue-content-bottom-border"><img src="img/blue-content-bottom-border.jpg" class="img-fluid"></p>
              </div>
          </div>
      </div>
      </div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>