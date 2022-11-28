<?php include("includes/header-app.php");?>
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
          <h2>My Account</h2>
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
                  <table cellspacing="0" cellpadding="0" width="100%" class="myaccount-table">
                  <tr>
                      <th width="20%">My Accounts</th>
                      <th width="20%">Resource Centre</th>
                      <th width="20%">Notifications</th>
                      <th width="20%">Member's Help Desk</th>
                      <th width="20%">ACMA Charter</th>
                  </tr>
                  <tr>
                      <td><a href="edit-profile.php">Edit Profile</a></td>
                      <td><a href="docs.php?subject=4&title=Automotive Deal">Automotive Deal</a></td>
                      <td><a href="docs.php?subject=17&title=CMVR Notifications">CMVR Notifications</a>	</td>
                      <td><a href="helpdesk.php">Helpdesk</a></td>
                      <td><a href="uploads/doc/ACMA_MEMORANDUM__AA after amendment - 20072018.pdf">Memorandum of Association</a> </td>
                  </tr>
                  <tr>
                      <td><a href="my-account-status.php">Account Status</a></td>
                      <td><a href="circular.php">Circulars</a></td>
                      <td><a href="docs.php?subject=19&title=EV Notification">EV Notification</a></td>
                      <td>&nbsp;</td>
                      <td><a href="elections.php">Electing Executive Committee</a></td>
                  </tr>
                  <tr>
                      <td><a href="logout.php">Logout</a></td>
                      <td><a href="docs.php?subject=6&title=Budget Memorandum">Budget Memorandum</a></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><a href="coming-soon.php">Certificate of Incorporation</a></td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="docs.php?subject=20&title=Commodity Price Trends">Commodity Price & Trends</a></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><a href="ec-minutes.php">EC Minutes</a></td>
                  </tr>
                  <!--new add code-->
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="docs.php?subject=21&title=ECONOMY-WATCH">Economy-Watch</a></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><a href="#"></a></td>
                  </tr>
                  
                  <!--new add code-->
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="docs.php?subject=8&title=EXIM">EXIM</a></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><a href="uploads/doc/SCAN_20190801_113755886.pdf">Election Results 2019</a></td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td align="center"><p style="text-align:left; margin-botton:0; padding-bottom:0"><a href="docs.php?subject=9&title=Financial Analysis">Financial Analysis</a></p><a href="docs.php?subject=10&title=Auto Component">-Auto Component</a><br>
                          <a href="docs.php?subject=11&title=OEM's">-OEM's</a></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="docs.php?subject=12&title=Report/Studies">Report/Studies</a>	</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="docs.php?subject=13&title=Tax Alert">Tax Alert</a>	</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="docs.php?subject=7&title=EV Reports">EV Reports</a></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><a href="javascript:void(0)">Vehicle Retail v/s Off-Take Trends</a></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="docs.php?subject=15&title=Quarterly Vehicle Forecast">Quarterly Vehicle Forecast</a></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="https://www.acma.in/monthly-vehicle-report.php">Monthly Vehicle Performance Report</a></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="docs.php?subject=16&title=Quarterly Vehicle Performance Report">Quarterly Vehicle Performance Report</a></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                  </tr>
              </table>
              </div>
              
              <div class="mobileview">
                  <table cellspacing="0" cellpadding="0" width="100%" class="myaccount-table">
                  <tr>
                      <th width="20%">My Accounts</th>
                      <th width="20%">Resource Centre</th>
                      <th width="20%">Notifications</th>
                  </tr>
                  <tr>
                      <td><a href="edit-profile.php">Edit Profile</a></td>
                      <td><a href="docs.php?subject=4&title=Automotive Deal">Automotive Deal</a></td>
                      <td><a href="docs.php?subject=17&title=CMVR Notifications">CMVR Notifications</a>	</td>
                  </tr>
                  <tr>
                      <td><a href="my-account-status.php">Account Status</a></td>
                      <td><a href="circular.php">Circulars</a></td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td><a href="logout.php">Logout</a></td>
                      <td><a href="docs.php?subject=6&title=Budget Memorandum">Budget Memorandum</a></td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="docs.php?subject=7&title=EV Policy">EV Policy</a>	</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="docs.php?subject=8&title=EXIM">EXIM</a></td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td align="center"><p style="text-align:left; margin-botton:0; padding-bottom:0"><a href="docs.php?subject=9&title=Financial Analysis">Financial Analysis</a></p><a href="docs.php?subject=10&title=Auto Component">-Auto Component</a><br>
                          <a href="docs.php?subject=11&title=OEM's">-OEM's</a></td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="docs.php?subject=12&title=Report/Studies">Report/Studies</a>	</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="docs.php?subject=13&title=Tax Alert">Tax Alert</a>	</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="docs.php?subject=14&title=Trade Watch">Trade Watch</a></td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="docs.php?subject=15&title=Quarterly Vehicle Forecast">Quarterly Vehicle Forecast</a></td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="https://www.acma.in/monthly-vehicle-report.php">Monthly Vehicle Performance Report</a></td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="docs.php?subject=16&title=Quarterly Vehicle Performance Report">Quarterly Vehicle Performance Report</a></td>
                      <td>&nbsp;</td>
                  </tr>
              </table>
              <table cellspacing="0" cellpadding="0" width="100%" class="myaccount-table">
                  <tr>
                      <th width="20%">Member's Help Desk</th>
                      <th width="20%">ACMA Charter</th>
                  </tr>
                  <tr>
                      <td><a href="helpdesk.php">Helpdesk</a></td>
                      <td><a href="uploads/doc/ACMA_MEMORANDUM__AA after amendment - 20072018.pdf">Memorandum of Association</a> </td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="elections.php">Electing Executive Committee</a></td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="coming-soon.php">Certificate of Incorporation</a></td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><a href="ec-minutes.php">EC Minutes</a></td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                  </tr>
              </table>
              </div>
          </div>
      </div></div></div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer-app.php");?>