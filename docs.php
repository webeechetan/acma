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
          <h2><?php if($_GET['title'] == 'Commodity Price Trends'){echo 'COMMODITY PRICE & TRENDS';}else{echo $_GET['title'];}?></h2>
          <div class="headingborder"><img src="img/heading-border.jpg"  class="img-fluid"></div>
          <div class="content-txt">
              <table cellspacing="0" cellpadding="0" width="80%" class="tablecss">
                <tr>
                    <th width="20%" class="border-right">Year</th>
                    <th width="55%" class="border-right date-blackbg">Title</th>
                    <th width="25%" class="border-right date-blackbg">Download</th>
                </tr>
                <?php
                $DocTables=App\Models\DocTable::where('subject','=',$_GET['subject'])->orderBy("sort","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                
                $srno = 1; 
		        foreach($DocTables as $DocTable){
                ?>
                <tr class="tablerow">
                    <td class="border-right"><?php echo $DocTable->docyear;?></td>
                    <td class="border-right"><?php echo $DocTable->title;?></td>
                    <td class="border-right"><a href="uploads/docmanager/<?php echo $DocTable->doc;?>">Download</a></td>
                </tr>
                <?php }?>
              </table> 
</div>
<p><img src="img/content-bottom-border.jpg"  class="img-fluid"></p>
      </div></div></div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>