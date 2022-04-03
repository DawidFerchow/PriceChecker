$('#addProduct').on('submit', function(event){
  event.preventDefault();

  var sku = $("#sku").val();
  var name = $("#name").val();
  var rec_price = $("#rec_price").val();
  var form = 'addProduct';

  $.ajax({
    type: 'POST',
    url: './php/crud/add.php',
    data: {
      sku: sku,
      name: name,
      rec_price: rec_price,
      form: form
    },
    beforeSend: onLoading,
    success: onSuccess,
    error: onError

  });

});


$('#addRival').on('submit', function(event){
  event.preventDefault();

  var name = $("#rival").val();
  var form = 'addRival';

  $.ajax({
    type: 'POST',
    url: './php/crud/add.php',
    data: {
      name: name,
      form: form
    },
    beforeSend: onLoading,
    success: onSuccess,
    error: onError

  });

});


$('#addRivalURL').on('submit', function(event){
  event.preventDefault();


  var product = $("#productSelect").val();
  var rival = $("#rivalSelect").val();
  var cur_price = $("#cur_price").val();
  var url = $("#url").val();
  var form = 'addRivalURL';
//      var rival_product_id = $(this).children(":selected").attr("id");
  var rival_product_option = $("#selectFromRival").children(":selected").attr("value");
  var rival_product_id = $("#rival_product_id").attr("value");

  $.ajax({
    type: 'POST',
    url: './php/crud/add.php',
    data: {
      product: product,
      rival: rival,
      cur_price: cur_price,
      url: url,
      form: form,
      rival_product_option: rival_product_option,
      rival_product_id: rival_product_id

    },
    beforeSend: onLoading,
    success: onSuccess,
    error: onError

  });

});