(function() {
  $('.message .close').on('click', function() {
    return $(this).closest('.message').fadeOut();
  });

  $('.card .image').dimmer({
    on: 'hover'
  });

  $('#createcomments').submit(function(e) {
    var $form;
    e.preventDefault();
    $form = $(this);
    return $.post($form.attr('action'), $($form).serialize(), function(response) {
      $('#commentary').children('.comment').last().append(response);
      return $('textarea').val('');
    });
  });

}).call(this);

//# sourceMappingURL=app.js.map