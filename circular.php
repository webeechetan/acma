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
          <h2 id="subHeading">Circulars</h2>
          <div class="circuler-form">
          <form method="get" action="circular.php" name="circfrm">
            <select name="month">
                <option value="">Select Month</option>
                <option value="01" <?php if($_GET['month'] == '01'){ echo "selected";}?>>January</option>
                <option value="02" <?php if($_GET['month'] == '02'){ echo "selected";}?>>February</option>
                <option value="03" <?php if($_GET['month'] == '03'){ echo "selected";}?>>March</option>
                <option value="04" <?php if($_GET['month'] == '04'){ echo "selected";}?>>April</option>
                <option value="05" <?php if($_GET['month'] == '05'){ echo "selected";}?>>May</option>
                <option value="06" <?php if($_GET['month'] == '06'){ echo "selected";}?>>June</option>
                <option value="07" <?php if($_GET['month'] == '07'){ echo "selected";}?>>July</option>
                <option value="08" <?php if($_GET['month'] == '08'){ echo "selected";}?>>August</option>
                <option value="09" <?php if($_GET['month'] == '09'){ echo "selected";}?>>September</option>
                <option value="10" <?php if($_GET['month'] == '10'){ echo "selected";}?>>October</option>
                <option value="11" <?php if($_GET['month'] == '11'){ echo "selected";}?>>November</option>
                <option value="12" <?php if($_GET['month'] == '12'){ echo "selected";}?>>December</option>
            </select>
            <select name="year">
                    <?php
                            for ($x = date("Y"); $x>= 2019; $x--) {
                                ?>
                                <option value="<?php echo $x;?>"  <?php if($_GET['year'] == $x){ echo "selected";}?>><?php echo $x;?></option>
                                <?php
                            }
                    ?>
                </select>
            &nbsp;
                  <input name="submit2" type="submit" class="ta-blue" value="Find">
          </form>
          </div>
          <div class="circuler-form">
              <select name="circular" class="ta-text" onchange="location='circular.php?year=<?php echo $_GET['year'];?>&amp;month=<?php echo $_GET['month'];?>&amp;id='+this.options[this.selectedIndex].value">
                  <option value="#">Select Circular</option>
                  <?php
                  $searchcirculers=App\Models\CirculersTable::where('monthcirculer','=',$_GET['month'])->where('yearcirculer','=',$_GET['year'])->orderBy("id","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                  foreach($searchcirculers as $searchcirculer){
                      ?><option value="<?php echo $searchcirculer->id;?>" <?php if($_GET['id'] == $searchcirculer->id){ echo "selected";}?>><?php echo $searchcirculer->title;?></option><?php
                  }      
                  ?>
              </select>
              <select name="region" onchange="location='circular.php?year=<?php echo $_GET['year'];?>&amp;month=<?php echo $_GET['month'];?>&amp;cat='+this.options[this.selectedIndex].value">
                              <option value="all">All Category</option>
                              <option>CMVR Regulations</option>
                              <option>Eastern Region</option>
                              <option>Executive Committee</option>
                              <option>Government Policy Matters</option>
                              <option>Knowledge Partner Reports/ Industry Statistics</option>
                              <option>National Events
                              <option>Northern Region</option>
                              <option>Overseas Events</option>
                              <option>Southern Region</option>
                              <option>Steering Committee</option>
                              <option>Western Region</option>
                          </select>
          </div>
          <div class="circuler-dashboard" id="printableArea">
              <?php
              if(isset($_GET['cat'])){
              $circulers=App\Models\CirculersTable::where('region','=',$_GET['cat'])->orderBy("id","DESC")->paginate(1,['*'],'page',(int)$_GET['page']);
              }elseif(isset($_GET['id'])){
              $circulers=App\Models\CirculersTable::where('id','=',$_GET['id'])->orderBy("id","DESC")->paginate(1,['*'],'page',(int)$_GET['page']);
              }else{
                  
              if(empty($_GET['month']) && empty($_GET['year'])){
                  $circulers=App\Models\CirculersTable::orderBy("id","DESC")->paginate(1,['*'],'page',(int)$_GET['page']);
                  // echo "<br/>break<br/>";   
              }else{
              $circulers=App\Models\CirculersTable::where('monthcirculer','=',$_GET['month'])->where('yearcirculer','=',$_GET['year'])->orderBy("id","DESC")->paginate(1,['*'],'page',(int)$_GET['page']);
              }
              }
              // echo "<pre>";
              $idArr = [];
              foreach($circulers as $circuler){
                array_push($idArr, $circuler->id);
              
                  $dateObj   = DateTime::createFromFormat('!m', $circuler->monthcirculer);
                  $monthName = $dateObj->format('F');
                  
                  echo '<h2 style="text-align:left !important">'. $circuler->title .'</h2>';
                  echo '<p style="center; margin:15px 0; font-weight:bold">Date : '. $circuler->daycirculer.'-'. $circuler->monthcirculer.'-'. $circuler->yearcirculer .'</p>';
                  echo stripslashes($circuler->circuler);
                  if($circuler->attachments){
                    $attachments = explode(",",$circuler->attachments);
                    foreach($attachments as $key => $val){
                      echo '<p align="left"><a href="uploads/ciculer-attachement/'.$val.'">'. $val.'</a></p>' ;
                    }
                  }else{
                    if(!empty($circuler->attachement)){
                      echo '<p align="left"><a href="uploads/ciculer-attachement/'.$circuler->attachement.'">'. $circuler->attachement.'</a></p>' ;
                      } 
                      if(!empty($circuler->attachement2)){
                      echo '<p align="left"><a href="uploads/ciculer-attachement/'.$circuler->attachement2.'">'. $circuler->attachement2.'</a></p>' ;
                      }
                      if(!empty($circuler->attachement3)){
                      echo '<p align="left"><a href="uploads/ciculer-attachement/'.$circuler->attachement3.'">'. $circuler->attachement3.'</a></p>' ;
                      }
                      if(!empty($circuler->attachement4)){
                      echo '<p align="left"><a href="uploads/ciculer-attachement/'.$circuler->attachement4.'">'. $circuler->attachement4.'</a></p>' ;
                      }
                      if(!empty($circuler->attachement5)){
                      echo '<p align="left"><a href="uploads/ciculer-attachement/'.$circuler->attachement5.'">'. $circuler->attachement5.'</a></p>' ;
                      }
                      if(!empty($circuler->attachement6)){
                      echo '<p align="left"><a href="uploads/ciculer-attachement/'.$circuler->attachement6.'">'. $circuler->attachement6.'</a></p>' ;
                      }
                      if(!empty($circuler->attachement7)){
                      echo '<p align="left"><a href="uploads/ciculer-attachement/'.$circuler->attachement7.'">'. $circuler->attachement7.'</a></p>' ;
                      }
                      if(!empty($circuler->attachement8)){
                      echo '<p align="left"><a href="uploads/ciculer-attachement/'.$circuler->attachement8.'">'. $circuler->attachement8.'</a></p>' ;
                      }
                      if(!empty($circuler->attachement9)){
                      echo '<p align="left"><a href="uploads/ciculer-attachement/'.$circuler->attachement9.'">'. $circuler->attachement9.'</a></p>' ;
                      }
                      if(!empty($circuler->attachement10)){
                      echo '<p align="left"><a href="uploads/ciculer-attachement/'.$circuler->attachement10.'">'. $circuler->attachement10.'</a></p>' ;
                      }
                  }
              } 
              $decodeArr = json_encode($idArr);
              echo "<script>
                  let id = {$decodeArr}.toString();
                  let subHeading = document.getElementById('subHeading');
                  subHeading.title = id;
                  console.log(id)
                  
                </script>";
              ?>
          </div>
          
      </div>
      <div style="clear:both"></div>
      <br>
      <div style="text-align:right; margin:15px;width:100%; display:none"><input type="button" onclick="printDiv('printableArea')" value="print Circular" /></div>
      
      </div></div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>
  <script>
      function printDiv(divName) {
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;
        
             document.body.innerHTML = printContents;
        
             window.print();
        
             document.body.innerHTML = originalContents;
        }
  </script>