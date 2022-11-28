<?php 
include( "includes/header-new.php");
$conn=mysqli_connect("localhost","techtonic","d#4ab01db3!bT","acma_web");
?>
<!---Banner start -->
<section class="hero-sec inner-banner sec-space d-flex align-items-center" style="background-image: url(images/ev-policy-banner.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="banner-title text-white text-uppercase">State Government Policy</h2>
			</div>
		</div>
	</div>
</section>
<!-- EV Pilocy Content -->
<section class="ev-policy-sec sec-space pb-0">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="table-res text-right text-md-center">
					<ul class="table-res_head bg-primary text-white d-none d-md-flex">
						<li>Year</li>
						<li>State</li>
						<li>Policy</li>
						<li>Read & Download</li>
					</ul>
					<?php
						$sql = "SELECT * FROM policies WHERE type='2' ORDER BY year DESC";
						$query = mysqli_query($conn,$sql);
						$i = 1;
						while($row = mysqli_fetch_array($query)){
					?>
					<ul class="table-res_col4">
						<li attr="Year :"><?php echo $row['year']?></li>
						<li attr="State :"><?php echo $row['state']?></li>
						<li attr="Policy :"><?php echo $row['policy']?></li>
						<li attr="Read & Download :"><a href="uploads/doc/updated-policies/<?php echo $row['file']?>" download="pdf/Electric-Vehicle-policy_2.pdf" class="btn btn-primary">Download</a></li>
					</ul>
					<?php $i++; }?>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<img src="images/ev-policy-btm.jpg" class="w-100" alt="">
</section>
<!-- EV Pilocy Content End -->

<!--Banner end-->
<?php include( 'includes/footer-new.php')?>