<?php include( "includes/header-new.php")?>
<!---Banner start -->
<section class="hero-sec inner-banner sec-space d-flex align-items-center" style="background-image: url(images/about-banner.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="banner-title text-white text-uppercase">National EVENTS</h2>
			</div>
		</div>
	</div>
</section>
<!-- EV Pilocy Content -->
<section class="ev-policy-sec sec-space pb-0">
    <div class="container">
        <div class="row">
           <div class="col-md-12 mb-4">
				<h3 class="text-center title-big text-center"><b>NATIONAL EVENTS</b></h3>	
			</div>
            <div class="col-12">
               <div class="table-res text-right text-md-center">
                   <ul class="table-res_head bg-primary text-white d-none d-md-flex">
						<li>Date</li>
						<li>PROGRAMME DESCRIPTION</li>
						<li>VENUE/TARGET AUDIENCE</li>
					</ul>
					<?php
                		$EventsTables=App\Models\EventsTable::where('cat','=',1)->orderBy("id","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                
						$srno = 1; 
						foreach($EventsTables as $EventsTable){
                	?>
					<ul class="table-res_col3">
						<li attr="Date :"><?php echo $EventsTable->eventdate;?></li>
						<li attr="Programme Description :"><?php echo $EventsTable->title;?></li>
						<li attr="Venue/Target Audience :"><?php echo $EventsTable->location;?></li>
					</ul>
                <?php }?>                
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