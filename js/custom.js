// Wow Init



new WOW().init();



AOS.init();

// Single Slick Slider
$('.single_slick_slider').slick({
	arrows: false,
	dots: true,	
	autoplay: true,
	autoplaySpeed: 4000
});

// Multi Slick Slider
$('.multi-slider').slick({
	arrows: false,
	dots: true,	
	autoplay: true,
	autoplaySpeed: 4000,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false
      }
    }
  ]
});

// Hedaer



$(document).ready(function () {



    $('.searchimg').click(function () {



        $('.search-form-top').toggleClass('open');



    });







    $('.offcanvas').click(function () {



        $('.header_menu').toggleClass('open');



    });







    $('.submenu-icon').click(function () {



        $(this).parent().toggleClass('open');



    });







});



$(document).ready(function () {



    $('body').click(function () {



        $(".search-form-top").removeClass('open');



    });







    $('.searchimg, .search-form-top').click(function (e) {



        e.stopPropagation();



    });



});



$(document).ready(function () {



    $("button.offcanvas-menu-btn").click(function () {



        $(this).toggleClass("close");



    });



});







// Slick Slider

$('.single_slider').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: false,
  autoplay: true,
  autoplaySpeed: 8000,
  fade: true,
  arrows: true,
  adaptiveHeight: true,
  pauseOnHover: false,
  pauseOnFocus: false,
  responsive: [
    {
      breakpoint: 767,
      settings: {
        arrows: false,
        dots: true
      }
    }
  ]
});



$('.events_slider').slick({



    infinite: true,



    slidesToShow: 1,



    slidesToScroll: 1,



    dots: true,



    autoplay: true,



    autoplaySpeed: 3000,



    fade: true,



    arrows: false,

    adaptiveHeight: true



});



$('.web_slider').slick({



    infinite: true,



    slidesToShow: 1,



    slidesToScroll: 1,



    dots: true,



    autoplay: true,



    autoplaySpeed: 3000,



    fade: true,



    arrows: false



});







// Home Video



$(document).ready(function () {



    $(".video-sec video").click(function(){



        this.paused?this.play():this.pause();



        return false;



    });



});







// Homepage Cookie Popup



$(document).ready(function () {



    $('#home-pop button[aria-label="Close"]').click(function(){



        $("#home-pop").hide();



    });



});

// modal popu

// Get the modal

var modal = document.getElementById('myModal');



// Get the image and insert it inside the modal - use its "alt" text as a caption

var img = document.getElementById('img-text');

var modalImg = document.getElementById("img01");

var captionText = document.getElementById("caption");

img.onclick = function(){

  modal.style.display = "block";

  //modalImg.src = "https://knowpathology.com.au/app/uploads/2018/07/Happy-Test-Screen-01-825x510.png";

  //captionText.innerHTML = this.alt;

}



// Get the <span> element that closes the modal

var span = document.getElementsByClassName("close-1")[0];



// When the user clicks on <span> (x), close the modal

span.onclick = function() { 

  modal.style.display = "none";

}











/*

* Image Zoom

*/





// Settings

let settings = {

  'magnification':3,

  'maskSize': 100

}



// Once our images have loaded let's create the zoom

window.addEventListener("load",()=>{

  // find all the images

  let images = document.querySelectorAll('.image-zoom-available');

  // querySelectorAll produces an array of images that we pull out one by one and create a Zoombini for

  Array.prototype.forEach.call(images,(image)=>{

    new Zoombini(image);

  });

});



// A Zoombini (or whatever you want to call it), is a class that takes an image input and adds the zoomable functionality to it. Let's take a look inside at what it does.

class Zoombini {

  // When we create a new Zoombini we run this function; it's called the constructor and you can see it taking our image in from above

  constructor(targetImage){

    // We don't want the Zoombini to forget about it's image, so let's save that info

    this.image = targetImage;

    // The Zoombini isActive after it has opened up

    this.isActive = false;

    // But as it hasn't been used yet it's maskSize will be 0

    this.maskSize = 0;

    // And we have to start it's coordinates somewhere, they may as well be (0,0)

    this.mousex = this.mousey = 0;



    // Now we're set up let's build the necessary compoonents

    // First let's clone our original image, I'm going to call it imageZoom and save it our Zoombini

    this.imageZoom = this.image.cloneNode();

    // And pop it next to the image target

    this.image.parentNode.insertBefore(this.imageZoom,this.image);

    // Make the zoom image that we'll crop float above it's original sibling

    this.imageZoom.style.zIndex = 2;

    // We don't want to be able to touch it though, we want to reach whats underneat

    this.imageZoom.style.pointerEvents = "none";

    // And so we can translate it let's make it absolute

    this.imageZoom.style.position = "absolute";



    // Now let's scale up our enlarged image and add an event listener so that it resizes whenever the size of the window changes

    this.resizeImageZoom();

    window.addEventListener("resize", this.resizeImageZoom.bind(this), false);



    // Now that we're finishing the constructor we need to addeventlisteners so we can interact with it

    // This function is just below, but still exists within our Zoombini

    this.UI();

    // Finally we'll apply an initial mask at default settings to hide this image

    this.drawMask();

  }



  // resizeImageZoom resizes the enlarged image

  resizeImageZoom(){

    // So let's scale up this version

    this.imageZoom.style.width = this.image.getBoundingClientRect().width*settings.magnification+'px';

  }



  // This could be inside the constructor but it's nicer on it's own I think

  UI(){

    this.image.addEventListener('mousemove',(event)=>{

      // When we move our mouse the x and y coordinates from the event

      // We subtract the left and top coordinates so that we get the (x,y) coordinates of the actualy image, where (0,0) would be the top left

      this.mousex = event.clientX - this.image.getBoundingClientRect().left;

      this.mousey = event.clientY - this.image.getBoundingClientRect().top;



      // if we're not active then don't display anything

      if (!this.isActive) return;

      // The drawMask() function below displays our the portion of the image that we're interested in

      this.drawMask();

    });



    // When they mousedown we open up our mask

    this.image.addEventListener('mousedown',()=>{

      // But it can be opening or closing, so let's pass in that information

      this.isExpanding = true;

      // To do that we start the maskSizer function, which calls itself until it reaches full size

      this.maskSizer();

      // And hide our cursor (we know where it is)

      this.image.classList.add('is-active');

    });

    // if the mouse is released, close the mask

    this.image.addEventListener('mouseup',()=>{

      // if it's not expanding, it's closing

      this.isExpanding = false;

      // if the mask has already expanded we'll need to start another maskSizer to shrink it. We don't run the maskSizer unless the mask is changing

      if (this.isActive) this.maskSizer();

    });

    // same as above, caused by us moving out of the zoom area

    this.image.addEventListener('mouseout',()=>{

      this.isExpanding = false;

      if (this.isActive) this.maskSizer();

    });

  }



  // The drawmask function shows us the piece of the image that we are hovering over

  drawMask(){

    // Let's use getBoundingClientRect to get the location of our images

    let image = this.image.getBoundingClientRect();

    let imageZoom = this.imageZoom.getBoundingClientRect();

    // We'll start by getting the (x,y) of our big image that matches the piece we're mousing over (which we stored from our event listener as this.mousex and this.mousey). This is a clunky bit of code to help the zooms work in a variety of situations.

    let prop_x = this.mousex/image.width*imageZoom.width*(1-1/settings.magnification)-image.x-window.scrollX;

    let prop_y = this.mousey/image.height*imageZoom.height*(1-1/settings.magnification)-image.y-window.scrollY;

    // Shift the large image by that amount

    this.imageZoom.style.left = -prop_x+"px";

    this.imageZoom.style.top = -prop_y+"px";



    // Now we need to create our mask

    // First let's get the coordinates of the point we're hovering over

    let x=this.mousex*settings.magnification;

    let y=this.mousey*settings.magnification;

    // And create and apply our clip

    let clippy = "circle("+this.maskSize+"px at "+x+"px "+y+"px)";

    this.imageZoom.style.clipPath = clippy;

    this.imageZoom.style.webkitClipPath = clippy;

  }



  // We'll use the maskSizer to either expand or shrink the size of our mask

  maskSizer(){

    // We're in maskSizer so we're changing the size of our mask. Let's make the mask radius larger if the Zoombini is expanding, or shrink it if it's closing. The numbers below might need to be adjusted. It closes faster than it opens

    this.maskSize = this.isExpanding ? this.maskSize+35 : this.maskSize-40;

    // It has the form of: condition ? value-if-true : value-if-false

    // Think of the ? as "then" and : as "else"



    // if we've reaached max size, don't make it any larger

    if (this.maskSize >= settings.maskSize) {

      this.maskSize = settings.maskSize;

      // we'll no longer need to change the maskSize so we'll just set this.isActive to true and let our mousemove do the drawing

      this.isActive = true;

    } else if (this.maskSize<0){

      // Our mask is closed

      this.maskSize = 0;

      this.isActive = false;

      this.image.classList.remove('is-active');

    } else {

      // Or else we haven't reached a size that we want to keep yet. So let's loop it on the next available frame

      // We bind(this) here because so that the function remains in context

      requestAnimationFrame(this.maskSizer.bind(this));

    }

    // After we have the appropriate size, draw the mask

    this.drawMask();

  }

}