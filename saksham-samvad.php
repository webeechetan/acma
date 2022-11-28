<?php include("includes/head.php");
$conn=mysqli_connect("localhost","acmaig3n_live","%%3e3d3c","acmaig3n_acmalive");
    // Check connection
     if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
?>
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
        <img src="img/SakshamSamvad1.jpg" class="img-fluid" width=100%>
    </div>
  </section><!-- #intro -->
  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <?php $sql="SELECT *FROM publications WHERE doc_title='Saksham-Samvad' ORDER BY date DESC";

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);
$row['doc_title'];
$row['event_name'];
$row['doc_disc'];
$row['attachment'];
$row['doc_img'];

  ?>
    <section id="innerpage" class="whitebg">
      <div class="container">
          <div class="row">
          <div class="col-sm-12">
          <h3 class="aligncenter cpas"><?php echo $row['event_name'];?></h3>
          </div></div>
          <div class="row">
          <div class="col-sm-3">
              <a href="uploads/publication/saksham-samvad/<?php echo$row['attachment']?>
"><img src="uploads/publication/saksham-samvad/<?php echo$row['doc_img']?>"  class="img-fluid"></a>
          </div>            
          <div class="col-sm-9">
          <div class="greybg bigfont">
<p><?php echo $row['doc_disc'];?></p>  
          
</div>
      </div></div>
  <!--    <div class="row">-->
  <!--        <div class="col-sm-12 padding-top-15">-->
  <!--<p><img src="img/blue-content-bottom-border.jpg"  class="img-fluid"></p>-->
  <!--    </div></div>   -->
  <!--    <div class="row">-->
  <!--        <div class="col-sm-12">-->
  <!--        <h2>PREVIOUS ISSUES</h2>-->
          
  <!--        <div id="carousel" class="carousel slide scroll-2" data-ride="carousel" data-type="multi" data-interval="100">-->
		<!--		<div class="carousel-inner">-->
              
    
		<!--			<div class="item active">-->
		<!--				<div class="carousel-col">-->
		<!--				    <a href="uploads/publication/Research-Studies/<?php //echo$row['attachment']?>">-->
		<!--					<img src="uploads/publication/Research-Studies/<?php //echo$row['doc_img']?>">-->
		<!--					</a>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--			 <?php //$sql="SELECT * FROM publications where doc_title='Reaserch-Studies'";-->
                               // $row=mysqli_query($conn,$sql);-->
                               // while($result= mysqli_fetch_assoc($row)){?>-->
		<!--				<div class="item">-->
		<!--				<div class="carousel-col">-->
		<!--				    <a href="uploads/publication/Research-Studies/<?php //echo$result['attachment']?>">-->
		<!--					<img src="uploads/publication/Research-Studies/<?php // echo$result['doc_img']?>">-->
		<!--					</a>-->
		<!--				</div>-->
		<!--			</div>-->
  <!--             <?php // }?>-->
  
		<!--		</div>-->

				<!-- Controls -->
		<!--		<div class="left carousel-control">-->
		<!--			<a href="#carousel" role="button" data-slide="prev">-->
		<!--				<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>-->
		<!--			</a>-->
		<!--		</div>-->
		<!--		<div class="right carousel-control">-->
		<!--			<a href="#carousel" role="button" data-slide="next">-->
		<!--				<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>-->
		<!--			</a>-->
		<!--		</div>-->
		<!--	</div>-->
          
  <!--    </div></div>    -->
  <!--    <div class="row">-->
  <!--        <div class="col-sm-12 padding-top-15">-->
  <!--<p><img src="img/blue-content-bottom-border.jpg"  class="img-fluid"></p>-->
  <!--    </div></div>    -->
  <!--    </div>-->
    </section><!-- #about -->

  </main>
<?php include("includes/footer.php");?>