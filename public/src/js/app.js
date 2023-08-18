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
    url: urlEdit,
    data: {body: $('#post-body').val(), postId: postId, _token: token}
  })
  .done(function (msg) {
      //console.log(JSON.stringify(msg));
      $(postBodyElement).text(msg['new-body']);
      $('#edit-modal').modal('hide');

  });
});

$('.like').on('click', function(event){
  event.preventDefault();
  postId = event.target.parentNode.parentNode.dataset['postId'];
  $.ajax({
    method: "POST",
    url: urlLike,
    data: {isLike : isLike, _toke : toke, postId: postId},
  });
  var isLike = event.target.previousElementSibling == null;
  //console.log(isLike);
  .done(function () {
    //change the page
  });
});









