$(document).ready(function() {

  //allows Resources and About Us header links to work
    $('[data-bs-toggle="dropdown"]').off('click');
    $('[data-bs-toggle="dropdown"]').on('click', function(e) {
      e.preventDefault();
      var link = $(this).attr('href');
      window.location.href = link;
    });

    // back to top button
    $(window).scroll(function(){
      if ($(this).scrollTop() > 100) {
        $('#back-to-top-btn').fadeIn();
      } else {
        $('#back-to-top-btn').fadeOut();
      }
    });
  
    // Scroll to the top of the page when the button is clicked
    $('#back-to-top-btn').click(function(){
      $('html, body').animate({scrollTop : 0},0);
      return false;
    });
});
  