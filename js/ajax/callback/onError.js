function onError(message) {

  var html = '';
  html+= '<section class="section" id="error">';
  html+= '<div class="container is-max-desktop">';
  html+= '<div class="notification is-danger">';
  html+= '<button class="delete"></button>';
  html+= 'Coś poszło nie tak, nie udało się wykonać czynności.</br></br>';
  html+= '<div id="errorMessage">';
  html+= message.responseText;
  html+= '</div>';
  html+= '</div>';
  html+= '</div>';
  html+= '</section>';

  $('#notification').append(html);

}