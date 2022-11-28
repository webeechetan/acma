<!--==========================

    Footer

  ============================-->

  <footer id="footer">

    <div class="footer-top">

      <div class="container">

        <div class="row">

              <div class="col-lg-9 col-md-6">

                  <h4>Contact Us</h4>

                  <div class="row contact-info">

                      <div class="col-lg-3 col-md-6">

                          <i class="fa fa-phone" aria-hidden="true"></i> + 91-11-26160315

                      </div>

                      <div class="col-lg-3 col-md-6">

                          <i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:acma@acma.in">acma@acma.in</a>

                      </div> 

                      <div class="col-lg-6 col-md-6">

                      <i class="fa fa-map-marker" aria-hidden="true"></i> <a target="_blank" href="https://www.google.com/maps/place/ACMA(%E3%82%A4%E3%83%B3%E3%83%89%E8%87%AA%E5%8B%95%E8%BB%8A%E9%83%A8%E5%93%81%E5%B7%A5%E6%A5%AD%E4%BC%9A)/@28.5555631,77.1734338,17z/data=!3m1!4b1!4m5!3m4!1s0x390d1d943cd3bd0b:0x668334713b4a37b6!8m2!3d28.5555584!4d77.1756278">Automotive Component Manufacturers Association of India<br/>The Capital Court, 6th Floor, Olof Palme Marg,<br/>Munirka, New Delhi : 110067<br></a>

                      </div> 

                  </div>

              </div>

              <div class="col-lg-3 col-md-6">

                  <div class="row">

                      <div class="isoclass">

                          <p>ISO 9001:2015 Certified</p>

                          <p><a href="careers.php">Careers</a></p>

                          <p><a href="disclaimer.php">Disclaimer</a></p>

                          <p><a href="privacy-policy.php">Privacy Policy</a></p>

                          <p><a href="terms&conditions.php">Terms & Conditions</a></p>

                      </div>

                  </div>

              </div>      

          </div>

      </div>

    </div>



    <div class="container">

          <div class="row copyright">

              <div class="col-lg-6 col-md-6">

                  &copy; Copyright 2022 ACMA India, All Right Reserved.

              </div>

              <div class="col-lg-6 col-md-6 float-right">

                  Powered by <a href="https://www.webeesocial.com/">Webeesocial</a>

              </div>      

          </div>

    </div>

  </footer><!-- #footer -->



  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Uncomment below i you want to use a preloader -->

  <!-- <div id="preloader"></div> -->



  <!-- JavaScript Libraries -->

  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/jquery/jquery-migrate.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="lib/easing/easing.min.js"></script>

  <script src="lib/mobile-nav/mobile-nav.js"></script>

  <script src="lib/wow/wow.min.js"></script>

  <script src="lib/waypoints/waypoints.min.js"></script>

  <script src="lib/counterup/counterup.min.js"></script>

  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <script src="lib/isotope/isotope.pkgd.min.js"></script>

  <script src="lib/lightbox/js/lightbox.min.js"></script>

  <!-- Contact Form JavaScript File -->

  <script src="contactform/contactform.js"></script>

  <script src="dist/js/lightbox-plus-jquery.min.js"></script>

  <!-- Template Main Javascript File -->

  <script src="js/main.js"></script>

  <script src="js/doubletaptogo.js"></script>

  <script src="js/aos.js"></script>

	<script src="js/slick.min.js"></script>

	<script src="js/wow.min.js"></script>

	<!-- Custom Js -->

	<script src="js/custom.js"></script>

  <!--slick js-->

   <script src="js/slick.min.js"></script>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script> -->

  <script>

    	$( function()

    	{

    		$( '#nav li:has(ul)' ).doubleTapToGo();

    	});

  </script>

  <script>

    $('#myCarousel2').carousel({

        interval: 2500

    });

    $('#carousel').carousel({

        interval: 2500

    });

    $('#mycarousel').carousel({

        interval: 2500

    });

    $(document).ready(function(){

      $(".searchimg").click(function(){

        $(".search-form-top").toggle();

      });

    });

    $('.carousel[data-type="multinews"] .item').each(function() {

    	var next = $(this).next();

    	if (!next.length) {

    		next = $(this).siblings(':first');

    	}

    	next.children(':first-child').clone().appendTo($(this));

    

    	for (var i = 0; i < 3; i++) {

    		next = next.next();

    		if (!next.length) {

    			next = $(this).siblings(':first');

    		}

    

    		next.children(':first-child').clone().appendTo($(this));

    	}

    });

    $('.carousel[data-type="multi"] .item').each(function() {

    	var next = $(this).next();

    	if (!next.length) {

    		next = $(this).siblings(':first');

    	}

    	next.children(':first-child').clone().appendTo($(this));

    

    	for (var i = 0; i < 2; i++) {

    		next = next.next();

    		if (!next.length) {

    			next = $(this).siblings(':first');

    		}

    

    		next.children(':first-child').clone().appendTo($(this));

    	}

    });

    $('.carousel[data-type="multi3"] .item').each(function() {

    	var next = $(this).next();

    	if (!next.length) {

    		next = $(this).siblings(':first');

    	}

    	next.children(':first-child').clone().appendTo($(this));

    

    	for (var i = 0; i < 1; i++) {

    		next = next.next();

    		if (!next.length) {

    			next = $(this).siblings(':first');

    		}

    

    		next.children(':first-child').clone().appendTo($(this));

    	}

    });

    $('.carousel[data-type="multi4"] .item').each(function() {

    	var next = $(this).next();

    	if (!next.length) {

    		next = $(this).siblings(':first');

    	}

    	next.children(':first-child').clone().appendTo($(this));

    

    	for (var i = 0; i < 0; i++) {

    		next = next.next();

    		if (!next.length) {

    			next = $(this).siblings(':first');

    		}

    

    		next.children(':first-child').clone().appendTo($(this));

    	}

    });

    $('.carousel[data-type="multitv"] .item').each(function() {

    	var next = $(this).next();

    	if (!next.length) {

    		next = $(this).siblings(':first');

    	}

    	next.children(':first-child').clone().appendTo($(this));

    

    	for (var i = 0; i < 0; i++) {

    		next = next.next();

    		if (!next.length) {

    			next = $(this).siblings(':first');

    		}

    

    		next.children(':first-child').clone().appendTo($(this));

    	}

    });

    $('.carousel[data-type="multitv2"] .item').each(function() {

    	var next = $(this).next();

    	if (!next.length) {

    		next = $(this).siblings(':first');

    	}

    	next.children(':first-child').clone().appendTo($(this));

    

    	for (var i = 0; i < 0; i++) {

    		next = next.next();

    		if (!next.length) {

    			next = $(this).siblings(':first');

    		}

    

    		next.children(':first-child').clone().appendTo($(this));

    	}

    });

  </script>



  <!-- Popup Cookie Js One time open -->

    <script>

        $(document).ready(function() {   

        //     if ($ .cookie("popup_1_2") == null) {

        //         $('#id0q').modal('show');

        //     $ .cookie("popup_1_2", "2");

        // }



            $('#id0q').addClass('pop_show');

            $("#id0q .close").click(function(){

                $('#id0q').removeClass('pop_show');

            });



        });

    </script>

    <!--slick slider-->

     <script>

    $(document).ready(function () {

        $('.slider-img').slick({

            dots: false,

            infinite: true,

            autoplay: true,

            speed: 800,

            slidesToShow:2,

            arrows: true

        });

    })

</script>

  

</body>

</html>

