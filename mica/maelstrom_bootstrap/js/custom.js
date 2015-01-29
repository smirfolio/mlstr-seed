jQuery(document).ready(function () {
  App.init();
  App.initSliders();
  RevolutionSlider.initRSfullWidth();
  /* Write here your custom javascript codes */
  jQuery('a[data-slide="prev"][href="#ProjectsCarousel"]').click(function () {
    jQuery('#ProjectsCarousel').carousel('prev');
  });

  jQuery('a[data-slide="next"][href="#ProjectsCarousel"]').click(function () {
    jQuery('#ProjectsCarousel').carousel('next');
  });

});
