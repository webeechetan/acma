<!--==========================
    Footer
  ============================-->

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
  <script src="js/slick.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>
  <script src="dist/js/lightbox-plus-jquery.min.js"></script>
  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script src="js/doubletaptogo.js"></script>

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
  <script>
    // Single Slick Slider
    $('.single_slick_slider').slick({
        arrows: false,
        dots: true,	
        autoplay: true,
        autoplaySpeed: 4000
    });
</script>
  
</body>
</html>
