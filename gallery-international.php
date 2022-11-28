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
        <img src="img/gallery.png" class="img-fluid">
    </div>
  </section><!-- #intro -->
  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="innerpage2">
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
                      <div class="event-heading">
                      <h2>Event Gallery</h2>
                      </div>
                      <ul class="eventlist">
                          <?php
                
                            $GalleryTables=App\Models\GalleryTable::where('cat_gallery','=','International')->where('status','1')->orderBy("id","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                            
                            $srno = 1; 
            		        foreach($GalleryTables as $GalleryTable){
            			  ?>
                          <li>
                              <a class="example-image-link" href="uploads/gallery/<?php echo $GalleryTable->photo;?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img src="uploads/gallery/<?php echo $GalleryTable->photo;?>" class="img-fluid"></a>
                              <div style="display:none">
                                  <?php if(!empty($GalleryTable->photo2)){?>
                                  <a class="example-image-link" href="uploads/gallery/<?php echo $GalleryTable->photo2;?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img src="uploads/gallery/<?php echo $GalleryTable->photo2;?>" class="img-fluid"></a>
                                  <?php }?>
                                  <?php if(!empty($GalleryTable->photo3)){?>
                                  <a class="example-image-link" href="uploads/gallery/<?php echo $GalleryTable->photo3;?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img src="uploads/gallery/<?php echo $GalleryTable->photo3;?>" class="img-fluid"></a>
                                  <?php }?>
                                  <?php if(!empty($GalleryTable->photo4)){?>
                                  <a class="example-image-link" href="uploads/gallery/<?php echo $GalleryTable->photo4;?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img src="uploads/gallery/<?php echo $GalleryTable->photo4;?>" class="img-fluid"></a>
                                  <?php }?>
                                  <?php if(!empty($GalleryTable->photo5)){?>
                                  <a class="example-image-link" href="uploads/gallery/<?php echo $GalleryTable->photo5;?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img src="uploads/gallery/<?php echo $GalleryTable->photo5;?>" class="img-fluid"></a>
                                  <?php }?>
                                  <?php if(!empty($GalleryTable->photo6)){?>
                                  <a class="example-image-link" href="uploads/gallery/<?php echo $GalleryTable->photo6;?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img src="uploads/gallery/<?php echo $GalleryTable->photo6;?>" class="img-fluid"></a>
                                  <?php }?>
                                  <?php if(!empty($GalleryTable->photo7)){?>
                                  <a class="example-image-link" href="uploads/gallery/<?php echo $GalleryTable->photo7;?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img src="uploads/gallery/<?php echo $GalleryTable->photo7;?>" class="img-fluid"></a>
                                  <?php }?>
                                  <?php if(!empty($GalleryTable->photo8)){?>
                                  <a class="example-image-link" href="uploads/gallery/<?php echo $GalleryTable->photo8;?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img src="uploads/gallery/<?php echo $GalleryTable->photo8;?>" class="img-fluid"></a>
                                  <?php }?>
                                  <?php if(!empty($GalleryTable->photo9)){?>
                                  <a class="example-image-link" href="uploads/gallery/<?php echo $GalleryTable->photo9;?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img src="uploads/gallery/<?php echo $GalleryTable->photo9;?>" class="img-fluid"></a>
                                  <?php }?>
                                  <?php if(!empty($GalleryTable->photo10)){?>
                                  <a class="example-image-link" href="uploads/gallery/<?php echo $GalleryTable->photo10;?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img src="uploads/gallery/<?php echo $GalleryTable->photo10;?>" class="img-fluid"></a>
                                  <?php }?>
                              </div>
                              <h3><?php echo $GalleryTable->title;?> - <?php echo $GalleryTable->photodate;?></h3>
                          </li>
                          <?php } ?>
                      </ul>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12  padding-70" style="display:none">
                  <div class="event-heading">
                      <h2>Event 2017</h2>
                      </div>
                      <ul class="eventlist">
                          <li>
                              <img src="img/p-5.png" class="img-fluid">
                          </li>
                          <li>
                              <img src="img/p-6.png" class="img-fluid">
                          </li>
                      </ul>
              </div>
          </div>
      </div>      
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>