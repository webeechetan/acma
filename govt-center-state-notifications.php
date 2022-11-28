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
        <img src="img/GOVT-BANNER.jpg" alt="">
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
                    <h2>Central Government</h2>
                    <table class="tablecss bigpadding" width="80%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <th class="border-right" width="15%">S. No.</th>
                                <th class="border-right date-blackbg">Title</th>
                                <th class="border-right date-blackbg">Download</th>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">1</td>
                                <td class="border-right border-bottom">Cabinet Secretary Reviews Covid 19</td>
                                <td class="border-right border-bottom"><a href="img/Central-Government/Cabinet-Secretary-Reviews-Covid-19.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">2</td>
                                <td class="border-right border-bottom">Ministry of Commerce & Industry</td>
                                <td class="border-right border-bottom"><a href="img/Central-Government/Ministry-of-COmmerce-&-Industry.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">3</td>
                                <td class="border-right border-bottom">Ministry of Corporate Affairs</td>
                                <td class="border-right border-bottom"><a href="img/Central-Government/Ministry-of-Corporate-Affairs.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">4</td>
                                <td class="border-right border-bottom">Ministry of Health and Family Welfare</td>
                                <td class="border-right border-bottom"><a href="img/Central-Government/Ministry-of-Health-and-Family-Welfare.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">5</td>
                                <td class="border-right border-bottom">Ministry of Labour & Employment</td>
                                <td class="border-right border-bottom"><a href="img/Central-Government/Ministry-of-Labour-&-Employment.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">6</td>
                                <td class="border-right border-bottom">PM Address to Nation 19th March 2020</td>
                                <td class="border-right border-bottom"><a href="img/Central-Government/PM-Address-to-Nation_19th-March-2020.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">7</td>
                                <td class="border-right border-bottom">PRESS RELEASE National Security Council</td>
                                <td class="border-right border-bottom"><a href="img/Central-Government/PRESS-RELEASE-National-Security-Council.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">8</td>
                                <td class="border-right border-bottom">Railways</td>
                                <td class="border-right border-bottom"><a href="img/Central-Government/Railways.jpg">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">9</td>
                                <td class="border-right border-bottom">SEBI Relaxation</td>
                                <td class="border-right border-bottom"><a href="img/Central-Government/SEBI-relaxation.pdf">Download</a></td>
                            </tr>
                            <?php
                            $DocTables=App\Models\DoccoronaTable::where('cat','=','Covid19 Govt')->where('section','=','Centeral')->orderBy("id","ASC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                            
                            $srno = 10; 
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

                    <div class="row">
                        <div class="col-sm-12">
                            <p class="blue-content-bottom-border my-4"><img src="img/blue-content-bottom-border.jpg" class="img-fluid"></p>
                        </div>
                    </div>
                    <!--  -->
                    <h2>State Government</h2>
                    <table class="tablecss bigpadding" width="80%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <th class="border-right" width="15%">S. No.</th>
                                <th class="border-right date-blackbg">Title</th>
                                <th class="border-right date-blackbg">Download</th>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">1</td>
                                <td class="border-right border-bottom">Faridabad</td>
                                <td class="border-right border-bottom"><a href="img/State-Government/Faridabad.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">2</td>
                                <td class="border-right border-bottom">Ghaziabad</td>
                                <td class="border-right border-bottom"><a href="img/State-Government/Ghaziabad.jpg">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">3</td>
                                <td class="border-right border-bottom">Gurugram</td>
                                <td class="border-right border-bottom"><a href="img/State-Government/Gurugram.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">4</td>
                                <td class="border-right border-bottom">Haryana Lockdown</td>
                                <td class="border-right border-bottom"><a href="img/State-Government/Haryana Lockdown.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">5</td>
                                <td class="border-right border-bottom">Jharkhand Lockdown</td>
                                <td class="border-right border-bottom"><a href="img/State-Government/Jharkhand_LockDown.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">6</td>
                                <td class="border-right border-bottom">Mumbai</td>
                                <td class="border-right border-bottom"><a href="img/State-Government/Mumbai.jpg">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">7</td>
                                <td class="border-right border-bottom">Pune</td>
                                <td class="border-right border-bottom"><a href="img/State-Government/Pune.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">8</td>
                                <td class="border-right border-bottom">Pune 22nd March</td>
                                <td class="border-right border-bottom"><a href="img/State-Government/Pune_22nd-March-2020.jpg">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">9</td>
                                <td class="border-right border-bottom">Punjab</td>
                                <td class="border-right border-bottom"><a href="img/State-Government/Punjab.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">10</td>
                                <td class="border-right border-bottom">Rajasthan</td>
                                <td class="border-right border-bottom"><a href="img/State-Government/Rajasthan.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">11</td>
                                <td class="border-right border-bottom">Rajasthan Lockdown</td>
                                <td class="border-right border-bottom"><a href="img/State-Government/Rajasthan_Lockdown.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">12</td>
                                <td class="border-right border-bottom">Tamil Nadu Advisory</td>
                                <td class="border-right border-bottom"><a href="img/State-Government/Tamil-Nadu-Advisory.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">13</td>
                                <td class="border-right border-bottom">Uttarkhand Lockdown</td>
                                <td class="border-right border-bottom"><a href="img/State-Government/Uttarkhand-LockDown.pdf">Download</a></td>
                            </tr>
                            <tr>
                                <td class="border-right border-bottom">14</td>
                                <td class="border-right border-bottom">West Bengal</td>
                                <td class="border-right border-bottom"><a href="img/State-Government/West-Bengal.pdf">Download</a></td>
                            </tr>
                            <?php
                            $DocTables=App\Models\DoccoronaTable::where('cat','=','Covid19 Govt')->where('section','=','State')->orderBy("id","ASC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                           // print_
                            $srno = 15; 
            		        foreach($DocTables as $DocTable){
                            ?>
                            <tr class="tablerow">
                                <td class="border-right  border-bottom"><?php echo $srno;?></td>
                                <td class="border-right  border-bottom"><?php echo $DocTable->title;?></td>
                                <td class="border-right  border-bottom"><a href="uploads/doccoronamanager/<?php echo $DocTable->doc;?>">Download</a></td>
                            </tr>
                            <?php }?>
                            
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