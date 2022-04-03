function onSuccess (message, form) {
  $("#submit").removeClass('is-loading');
  $("#success").remove();
  $("#error").remove();
  $("#submit").attr('disabled', false);
  $("#newRow").empty();

  if ((document.querySelector("#openModal")) !== null) {
    mdl.close();
  }
  var html = '';

  // checking if php send any error message. AJAX proper send request and
  // proper get response but php may have error
  if($.isEmptyObject($.trim(message)))
  {

    $("#success").removeClass('is-hidden');
    $("input").removeClass('is-success').val("");

    switch (form) {
      case 'login':
        html+= '<section class="section" id="success">';
        html+= '<div class="container is-max-desktop">';
        html+= '<div class="notification is-success">';
        html+= '<button class="delete"></button>';
        html+= '<p>Wpisałeś poprawne dane do logowania, za chwilę zostaniesz przekierowany na stronę główną. Możesz też kliknąć <a href="'+window.location.href+'">tutaj</a> aby przenieść się od razu.</p>';
        html+= '</div>';
        html+= '</div>';
        html+= '</section>';
        setTimeout(function() {
          window.location = window.location.href;
        }, 3000);
        break;
      default:
        html+= '<section class="section" id="success">';
        html+= '<div class="container is-max-desktop">';
        html+= '<div class="notification is-success">';
        html+= '<button class="delete"></button>';
        html+= '<p>Elegancko! Wszystko poszło super. Kliknij <a href="#" onClick="prevSite();">tutaj</a> aby przenieść się na poprzednią stronę</p>';
        html+= '</div>';
        html+= '</div>';
        html+= '</section>';
    }

    $('#notification').append(html);

  }
  else {
    $("#error").removeClass('is-hidden');

    html+= '<section class="section" id="error">';
    html+= '<div class="container is-max-desktop">';
    html+= '<div class="notification is-danger">';
    html+= '<button class="delete"></button>';
    html+= 'Coś poszło nie tak, nie udało się wykonać czynności.</br></br>';
    html+= '<div id="errorMessage">';
    html+= message;
    html+= '</div>';
    html+= '</div>';
    html+= '</div>';
    html+= '</section>';

    $('#notification').append(html);

  }

}