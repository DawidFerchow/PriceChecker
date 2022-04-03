$('#loginForm').on('submit', function(event){
  event.preventDefault();

  var email = $("#email").val();
  var password = $("#password").val();
  var form = 'login';

  $.ajax({
    type: 'POST',
    url: './php/user/login.php',
    data: {
      email: email,
      password: password,
      form: form
    },
    beforeSend: onLoading,
    success: function (message) {
      onSuccess(message, form)
    },
    error: onError

  });

});