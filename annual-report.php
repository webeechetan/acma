<?php include("includes/header-new.php");
$conn=mysqli_connect("localhost","techtonic","d#4ab01db3!bT","acma_web");

    // Check connection

     if (mysqli_connect_errno())

      {

      echo "Failed to connect to MySQL: " . mysqli_connect_error();

      }

?>

<?php $sql="SELECT *FROM publications WHERE doc_title='Annual-Report' ORDER BY date DESC";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$row['doc_title'];
	$row['event_name'];
	$row['doc_disc'];
	$row['attachment'];
	$row['doc_img'];
?>
<!-- About-banner-start-->
<section class="hero-sec remove-overlay inner-banner sec-space d-flex align-items-center" style="background-image:url(images/auto-banner.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="banner-title text-white text-uppercase">Annual-Report</h2>
			</div>
		</div>
	</div>
</section>

<!-- Main Content -->
<section class="sec-space">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center mb-3 mb-md-4">
				<h2 class="title">Latest Issues</h2>
			</div>
			<div class="col-md-3">
				<a href="uploads/publication/annual-report/<?php echo$row['attachment']?>" target="_blank"><img src="uploads/publication/annual-report/<?php echo$row['doc_img']?>" alt=""></a>
			</div>
			<div class="col-md-9">
				<div class="bg-light_blue p-4 h-100">
					<h5 class="mb-3"><?php echo $row['event_name'];?></h5>
					<div><?php echo $row['doc_disc'];?></div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="sec-space pt-0">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center mb-3 mb-md-4">
				<h2 class="title">Previous Issues</h2>
			</div>
			<div class="col-12">
				<div class="multi-slider-sec bg-light_blue p-4">
					<div class="multi-slider">
						<?php $sql="SELECT * FROM publications where doc_title='Annual-Report' ORDER BY id DESC";

						$row=mysqli_query($conn,$sql);
						while($result= mysqli_fetch_assoc($row)){?>
						<div class="multi-slider-item">
							<a href="uploads/publication/annual-report/<?php echo$result['attachment']?>" target="_blank">
								<img src="uploads/publication/annual-report/<?php echo$result['doc_img']?>">
							</a>
						</div>

						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<hr>

<?php include("includes/footer-new.php");?>