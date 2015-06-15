$('.message .close').on 'click', ->
  $(this).closest('.message').fadeOut()

$('.card .image').dimmer
  on: 'hover'