
$('#ca_banner').carousel({
    fullWidth: true,
    indicators: true
});

setInterval(function () {
    $('#ca_banner').carousel('next');
}, 8500);

// move next carousel
$('.moveNextCarousel').click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    $('#ca_banner').carousel('next');
});

// move prev carousel
$('.movePrevCarousel').click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    $('#ca_banner').carousel('prev');
});

$('#ca_aboutus').carousel();

setInterval(function () {
    $('#ca_aboutus').carousel('next');
}, 4500);


$(document).ready(function () {
  $("#ca_services").owlCarousel({
    autoplay: true,
    autoplayTimeout: 2500,
    autoplayHoverPause: false,
    loop: true,
    dots: false,
    nav: true,
    margin: 0,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true,
        loop: true
      },
      600: {
        items: 3,
        nav: false,
        loop: true
      },
      1000: {
        items: 4,
        nav: true,
        loop: true
      },
    },
  });
});
