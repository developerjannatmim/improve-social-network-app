$('.post').find('.interaction').find('a').eq(2).on('click', function(event) {
  event.preventDefault();
  var postBody = event.target.parentNode.parentNode.childNodes[1].textContent;
  //console.log(postBody);
  $('#post-body').val(postBody);

  //console.log('hello');
  $('#edit-modal').modal();
});