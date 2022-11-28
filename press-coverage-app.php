<?php include("includes/header-app.php"); ?>

<!--==========================
    Intro Section
  ============================-->
<section id="intro pt-0" class="clearfix">
    <div class="introimg">
        <div class="container">
            <div class="secondarymenu">
                <div class="row">
                    <div class="secondarymenu-right">
                        <?php include("includes/secondaory-menu.php"); ?>
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
                        <tbody>
                            <tr>
                                <th class="border-right" width="15%">Date</th>
                                <th class="border-right date-blackbg">Description</th>
                                <th class="border-right date-blackbg">Print</th>
                                <th class="border-right date-blackbg">Web</th>
                                <th class="border-right date-blackbg">Electronics</th>
                            </tr>
                            <?php
                            $PressCoverageTables = App\Models\PressCoverageTable::orderBy("id", "ASC")->paginate(1000, ['*'], 'page', (int)$_GET['page']);
                            foreach ($PressCoverageTables as $data) {
                            ?>
                                <tr>
                                    <td class="border-right border-bottom">
                                        <?php if ($data->date) {
                                            echo $data->date;
                                        } ?>
                                    </td>
                                    <td class="border-right border-bottom"><?php if ($data->description) {
                                                                                echo $data->description;
                                                                            } ?></td>
                                    <td class="border-right border-bottom"><a href="uploads/press-release/<?php if ($data->file) {
                                                                                                                echo $data->file;
                                                                                                            } ?>"><?php if ($data->file) {
                                                                                                                        echo $data->file;
                                                                                                                    } ?></a></td>
                                    <td class="border-right border-bottom"><u><a href="<?php if ($data->description) {
                                                                                            echo $link->link;
                                                                                        } ?>"><?php if ($data->link) {
                                                                                                    echo $data->link;
                                                                                                } ?></a></u></td>
                                    <td class="border-right border-bottom"><a href="#">&nbsp;</a></td>
                                </tr>
                            <?php } ?>
                            <!--                 
                <tr>
                    <td class="border-right border-bottom" >&nbsp;</td>
                    <td class="border-right border-bottom">Budget <br>Reccomendations <br>2019</td>
                    <td class="border-right border-bottom"><a href="#">&nbsp;</a></td>
                    <td class="border-right border-bottom"><u><a href="https://timesofindia.indiatimes.com/business/india-business/auto-body-seeks-18-gst-on-all-components/articleshow/67627983.cms">TOI</a>, <a href="https://auto.economictimes.indiatimes.com/news/auto-components/auto-body-seeks-18-gst-on-all-components/67634459">ET Auto</a>,<br><a href="https://www.fortuneindia.com/macro/auto-industry-expects-gst-cuts-and-ev-push-from-the-interim-budget/102883">Fortune India</a></u></td>
                    <td class="border-right border-bottom"><a href="#">&nbsp;</a></td>
                </tr>
                <tr>
                    <td class="border-right border-bottom">30th January <br>2019</td>
                    <td class="border-right border-bottom">ACMA Technology <br>
Summit 2019</td>
                    <td class="border-right border-bottom"><a href="uploads/press-release/Autocar.pdf"><u> Autocar Professional</u>
</a></td>
                    <td class="border-right border-bottom"><u><a href="https://auto.economictimes.indiatimes.com/news/industry/move-towards-e-mobility-will-be-slow-geete/67753613">ET Auto</a>,<a href="https://timesofindia.indiatimes.com/business/india-business/move-towards-e-mobility-will-be-slow-geete/articleshow/67746722.cms"> TOI</a>,<br> 
<a href="http://www.autocarpro.in/news-national/captains-of-component-industry-urge-suppliers-to-transform-in-an-era-of-disruptions-41958">Autocar Professional</a></u>
</a></td>
                    <td class="border-right border-bottom"><a href="#">&nbsp;</a></td>
                </tr>
                <tr>
                    <td class="border-right border-bottom">14th February 2019</td>
                    <td class="border-right border-bottom">ACMA Automechanika<br>
 New Delhi 2019</td>
                    <td class="border-right border-bottom"><a href="#">&nbsp;</a></td>
                    <td class="border-right border-bottom"><u><a href="https://www.aninews.in/news/business/business/auto-show-to-bring-after-market-expertise-from-16-countries20190204130308/">ANI News</a>,<a href="https://businesswireindia.com/news/fulldetails/acma-automechanika-new-delhi-sold-out-brings-aftermarket-expertise-from-16-countries/61762"> Business Wire</a>, <br>
<a href="http://www.autocarpro.in/news-national/acma-automechanika-new-delhi-2019-sold-out--brings-aftermarket-expertise-from-16-countries-41978">Autocar Professional</a>,  <br>
<a href="https://micorporate.com/Bureau/Auto-Components/429/Elegant-Auto-Retail-showcases-products-at-4th-ACMA-Automechanika-Motown-India-Bureau">Motown</a>, <a href="http://www.ptinews.com/pressrelease/33586_press-subACMA-Automechanika-New-Delhi-Sold-Out--Brings-Aftermarket-Expertise-From-16-Countries">PTI</a></u></td>
                    <td class="border-right border-bottom"><a href="#">&nbsp;</a></td>
                </tr>
                <tr>
                    <td class="border-right border-bottom">5th September 2018</td>
                    <td class="border-right border-bottom">58th Annual Session 2018</td>
                    <td class="border-right border-bottom"><a href="#">&nbsp;</a></td>
                    <td class="border-right border-bottom"><u> <a href="http://www.motorindiaonline.in/component/acma-annual-meet-outlines-roadmap-for-auto-component-industry/"> Motorindia</a>, <a href="http://www.autocarpro.in/news-national/industry-captains-urge-suppliers-to-think-global--invest-in-r&d--be-agile-in-a-disruptive-era-40616">Autocarpro</a>, <a href="https://autotechreview.com/news/acma-s-58th-annual-session-mulls-over-future-of-indian-component-industry">Autotechreview</a></u></a></td>
                    <td class="border-right border-bottom"><a href="#">&nbsp;</a></td>
                </tr>
                <tr>
                    <td class="border-right border-bottom">1st May  2018</td>
                    <td class="border-right border-bottom">ACMA Automechanika Dubai</td>
                    <td class="border-right border-bottom"><u><a href="uploads/press-release/Autocar Professional.pdf">Autocar professional</a>, <a href="uploads/press-release/Autoparts Asia.pdf">Autoparts Asia</a>, <a href="uploads/press-release/Khaleej Times 2018.pdf">Khaleej Times 2018</a></u></td>
                    <td class="border-right border-bottom">&nbsp;</td>
                    <td class="border-right border-bottom"><a href="#">&nbsp;</a></td>
                </tr> -->
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
        </div>
    </section><!-- #about -->

</main>
<?php include("includes/footer-app.php"); ?>