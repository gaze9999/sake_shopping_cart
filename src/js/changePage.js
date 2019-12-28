let navbarnav = $('.navbar-nav');
let frame = $('#view_frame');
// console.log(navBtn);
navbarnav.on('click', '.nav-link', function() {
  clickedPage = $(this).data('page');
  $.ajax({
    url: clickedPage + '.php',
    context: document.body,
    statusCode: {
      404: function() {
        // $('main').html(data[1]);
      }
    }
  }) .done((data) => {
    $('.main_frame').html(data);
  }) .fail ((data) => {
    $('.main_frame').html(data);
  })
});