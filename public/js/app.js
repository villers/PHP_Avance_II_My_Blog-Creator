(function() {
  $('.message .close').on('click', function() {
    return $(this).closest('.message').fadeOut();
  });

  $('.card .image').dimmer({
    on: 'hover'
  });

}).call(this);

//# sourceMappingURL=app.js.map