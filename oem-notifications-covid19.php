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
        <img src="img/OEM-BANNER.jpg" alt="">
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
                <h2>OEM start up manual</h2>
                    <table class="tablecss bigpadding" width="80%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <th class="border-right" width="15%">S. No.</th>
                                <th class="border-right date-blackbg">Title</th>
                                <th class="border-right date-blackbg">Download</th>
                            </tr>
                            <?php
                            $DocTables=App\Models\DoccoronaTable::where('cat','=','Covid19 OEM')->orderBy("id","ASC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                            
                            $srno = 1; 
            		        foreach($DocTables as $DocTable){
                            ?>
                            <tr class="tablerow">
                                <td class="border-right border-bottom"><?php echo $srno;?></td>
                                <td class="border-right border-bottom"><?php echo $DocTable->title;?></td>
                                <td class="border-right border-bottom"><a href="uploads/doccoronamanager/<?php echo $DocTable->doc;?>">Download</a></td>
                            </tr>
                            <?php $srno++; }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p class="blue-content-bottom-border"><img src="img/blue-content-bottom-border.jpg" class="img-fluid"></p>
                </div>
            </div>
        </div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer2.php");?>