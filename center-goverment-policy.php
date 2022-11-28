<?php 
include( "includes/header-new.php");
$conn=mysqli_connect("localhost","techtonic","d#4ab01db3!bT","acma_web");
?>
<!---Banner start -->
<section class="hero-sec inner-banner sec-space d-flex align-items-center" style="background-image: url(images/ev-policy-banner.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="banner-title text-white text-uppercase">Central Government Policy</h2> 
			</div>
		</div>
	</div>
</section>

<section class="ev-policy-sec sec-space pb-0">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="table-res text-right text-md-center">
					<ul class="table-res_head bg-primary text-white d-none d-md-flex">
						<li>Serial No.</li>
						<li>Year</li>
						<li>Policy</li>
						<li>Read & Download</li>
					</ul>
					<?php
						$sql = "SELECT * FROM policies WHERE type='1' ORDER BY year DESC";
						$query = mysqli_query($conn,$sql);
						$i = 1;
						while($row = mysqli_fetch_array($query)){
					?>
					<ul class="table-res_col4">
						<li attr="Serial No :"><?php echo $i;?></li>
						<li attr="Year :"><?php echo $row['year']?></li>
						<li attr="Policy :"><?php echo $row['policy']?></li>
						<li attr="Read & Download :"><a href="uploads/doc/updated-policies/<?php echo $row['file']?>" download="Foreign Trade Policy 2015 to 2020.pdf" class="btn btn-primary">Download</a></li>
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