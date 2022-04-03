
$('#removeProduct').click(function(){

  var id = getUrlParameter('id');
  var form = 'removeProduct';

  $.ajax({
    type: 'POST',
    url: './php/crud/delete.php',
    data: {
      id: id,
      form: form
    },

    beforeSend: onLoading,
    success: onSuccess,
    error: onError

//
//    beforeSend: function() {
//      $("#removeProduct").addClass('is-loading');
//    },
//    success: function (message) {
//      	mdl.close()
//        $("#success").removeClass('is-hidden');
//        setTimeout(function() {
//          window.location = document.referrer;
//        }, 5000);
//    },
//    error: function (message) {
//        mdl.close()
//        $("#success").removeClass('is-hidden');
//        setTimeout(function() {
//          $("#success").addClass('is-hidden');
//        }, 5000);
//    }

  });

});

$('#removeRival').click(function(){

//  <?php if(isset($rival_id)){echo "var id =  $rival_id";}?>;
  var id = getUrlParameter('id');
  var form = 'removeRival';

  $.ajax({
    type: 'POST',
    url: './php/crud/delete.php',
    data: {
      id: id,
      form: form
    },

    beforeSend: onLoading,
    success: onSuccess,
    error: onError

//    beforeSend: function() {
//      $("#removeRival").addClass('is-loading');
//    },
//    success: function(message) {
//      loading(message),
//      mdl.close();
//  },

//    error: function (message) {
//        mdl.close()
//        console.log(message);
//        $("#error").removeClass('is-hidden');
//        $("#errorMessage").html(message.responseText);
//    }

  });

});

$('#removeURL').click(function(){

  var id = $("#removeURL").attr("data-urlid");
  var form = 'removeURL';

  $.ajax({
    type: 'POST',
    url: './php/crud/delete.php',
    data: {
      id: id,
      form: form
    },

    beforeSend: onLoading,
    success: onSuccess,
    error: onError

  });

});