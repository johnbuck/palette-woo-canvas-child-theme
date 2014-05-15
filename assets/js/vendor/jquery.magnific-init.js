jQuery(document).ready(function ($) {
  //Initialize for inline images
  $('.pop').magnificPopup({type: 'image' });
  //Initialize for wordpress galleries
  $('.gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery: {
      enabled: true
      }
  });
});