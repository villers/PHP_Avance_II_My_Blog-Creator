$('.message .close').on 'click', ->
  $(this).closest('.message').fadeOut()

$('.card .image').dimmer
  on: 'hover'

$('#createcomments').submit (e) ->
  e.preventDefault()
  $form = $(this)
  $.post $form.attr('action'), $($form).serialize(), (response)->
    $('#commentary').children('.comment').last().append(response)
    $('textarea').val('')