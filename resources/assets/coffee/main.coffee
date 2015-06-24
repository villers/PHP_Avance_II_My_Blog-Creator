selectedId = []
url = $('#formurl').data('action')

$('.message .close').on 'click', ->
  $(this).closest('.message').fadeOut()

$('.card .image').dimmer
  on: 'hover'

$('.ui.checkbox').checkbox()

$('.ui.modal').modal()


$('#createcomments').submit (e) ->
  e.preventDefault()
  $form = $(this)
  $.post $form.attr('action'), $($form).serialize(), (response)->
    $('#commentary').children('.comment').last().append(response)
    $('textarea').val('')

$('input[type=checkbox]').change () ->
  if(this.checked)
    selectedId[this.value] = this.value;
  else
    delete selectedId[this.value]
  console.log(selectedId)

$('#delete').click ()->
  selectedId.forEach (element, index) ->
    $.ajax
      url: url+'/'+element
      type: 'DELETE'
      success: () ->
        $('#blog-'+element).fadeOut()
  selectedId = []

$('#add').click ()->
  $('#addblog').modal('show')

if url
  $('.edit').editable url+ '/edit'
  $('.edit_area').editable url+ '/edit',
    type      : 'textarea',
    cancel    : 'Cancel',
    submit    : 'Valider',
    tooltip   : 'Click to edit...'