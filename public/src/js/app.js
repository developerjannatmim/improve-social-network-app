var postId = 0;
var postBodyElement = null;

$('.post').find('.interaction').find('.edit').on('click', function(event) {
  event.preventDefault();

  postBodyElement = event.target.parentNode.parentNode.childNodes[1]
  var postBody = postBodyElement.textContent;
  postId = event.target.parentNode.parentNode.dataset['postid'];
  //console.log(postBody);
  $('#post-body').val(postBody);

  //console.log('hello');
  $('#edit-modal').modal();
});

$('#modal-save').on('click', function() {
  $.ajax({
    method: 'POST',
    url: url,
    data: {body: $('#post-body').val(), postId: postId, _token: token}
  })
  .done(function (msg) {
      //console.log(JSON.stringify(msg));
      $(postBodyElement).text(msg['new-body']);
      $('#edit-modal').modal('hide');

  });
});