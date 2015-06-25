(function() {
  var selectedId, url;

  selectedId = [];

  url = $('#formurl').data('action');

  $('.message .close').on('click', function() {
    return $(this).closest('.message').fadeOut();
  });

  $('.card .image').dimmer({
    on: 'hover'
  });

  $('.ui.checkbox').checkbox();

  $('.ui.modal').modal();

  $('.dropdown').dropdown({
    transition: 'drop'
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

  $('input[type=checkbox]').change(function() {
    if (this.checked) {
      selectedId[this.value] = this.value;
    } else {
      delete selectedId[this.value];
    }
    return console.log(selectedId);
  });

  $('#delete').click(function() {
    selectedId.forEach(function(element, index) {
      return $.ajax({
        url: url + '/' + element,
        type: 'DELETE',
        success: function() {
          return $('#blog-' + element).fadeOut();
        }
      });
    });
    return selectedId = [];
  });

  $('#add').click(function() {
    return $('#addblog').modal('show');
  });

  if (url) {
    $('.edit').editable(url + '/edit');
    $('.edit_area').editable(url + '/edit', {
      type: 'textarea',
      cancel: 'Cancel',
      submit: 'Valider',
      tooltip: 'Click to edit...'
    });
  }

}).call(this);

//# sourceMappingURL=app.js.map