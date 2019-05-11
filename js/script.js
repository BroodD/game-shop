$(".preloader-js").delay(800).slideUp(550, function() {
  $(this).remove();
});

var navOffset = $('.nav').offset().top;

$(function(){
  $(window).scroll(function() {
    if($(this).scrollTop() >= navOffset) {
      $('body').addClass('fixed-nav');
    }
    else{
      $('body').removeClass('fixed-nav');
    } 
  });
});

var granimInstance = new Granim({
  element: '#progress',
  name: 'basic-gradient',
  direction: 'left-right', // 'diagonal', 'top-bottom', 'radial'
  opacity: [1, 1],
  isPausedWhenNotInView: true,
  states : {
      "default-state": {
          gradients: [
              ['#FF7E00', '#E65100'],
              ['#DA22FF', '#9733EE'],
              ['#455A64', '#37474F'],
              ['#02AAB0', '#00CDAC']
          ]
      }
  }
});
var granimInstance = new Granim({
  element: '#canvas-header',
  name: 'basic-gradient',
  direction: 'left-right', // 'diagonal', 'top-bottom', 'radial'
  opacity: [1, 1],
  isPausedWhenNotInView: true,
  states : {
      "default-state": {
          gradients: [
              ['#104449', '#003E44'],
              ['#02AAB0', '#00CDAC'],
              ['#DA22FF', '#9733EE']
          ]
      }
  }
});
var granimInstance = new Granim({
  element: '#canvas-footer',
  name: 'basic-gradient',
  direction: 'left-right', // 'diagonal', 'top-bottom', 'radial'
  opacity: [1, 1],
  isPausedWhenNotInView: true,
  states : {
      "default-state": {
          gradients: [
              ['#104449', '#003E44'],
              ['#02AAB0', '#00CDAC'],
              ['#DA22FF', '#9733EE']
          ]
      }
  }
});

$('.hamburger').click(function(event) {
  $('body').toggleClass('nav-active');
  $('.nav__menu .menu').slideToggle();
});

// $("#progress").attr('width', '100');
$(window).scroll (function () {
  var ratio = $(document).scrollTop () / (($(document).height () - $(window).height ()) / 100);
  $("#progress").width(ratio + "%");
});

