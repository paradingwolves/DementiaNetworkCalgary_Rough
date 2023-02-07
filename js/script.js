$(document).ready(function() {
    $('[data-bs-toggle="dropdown"]').off('click');
    $('[data-bs-toggle="dropdown"]').on('click', function(e) {
      e.preventDefault();
      var link = $(this).attr('href');
      // Your custom code for the dropdown toggle behavior
      window.location.href = link;
    });
  });
  