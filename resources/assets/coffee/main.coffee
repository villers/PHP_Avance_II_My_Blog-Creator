$('.message .close').on 'click', ->
  $(this).closest('.message').fadeOut()