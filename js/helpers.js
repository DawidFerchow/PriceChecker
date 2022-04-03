function prevSite () {
  window.location = document.referrer;
}

$(document).ready(function() {

  var table = $('#table').DataTable({
    dom: 'Bfrtip',
    select: true,
    pageLength: 10
  });

});

$(document).ready(function() {

  var listTable = $('#listTable').DataTable({
    dom: 'Bfrtip',
    select: true,
    pageLength: 20,
    stateSave: true
  });

});

$(document).ready(function(){

  var id = '#productSelect';
  var from = 'products';
  var where = 'name';

  showSuggestions(id, from, where);

});

$(document).ready(function(){

  var id = '#rivalSelect';
  var from = 'rivals';
  var where = 'name';

  showSuggestions(id, from, where);

});

$(document).ready(function(){
    // Check if the user already accepted it
  if (window.localStorage.getItem('close_notification') === null) {
    $('.is-info').show();
  }

  $(".delete").click(function(){
    // Save on LocalStorage
    window.localStorage.setItem('close_notification', true);
    $('.is-info').hide();
  });

});
