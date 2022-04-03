    $('#updateRivalURL').on('submit', function(event){
      event.preventDefault();

      var id = $("#id").val();
      var product = $("#productSelect").val();
      var rival = $("#rivalSelect").val();
      var cur_price = $("#cur_price").val();
      var url = $("#url").val();
      var form = 'updateRivalURL';
//      var rival_product_id = $(this).children(":selected").attr("id");
      var rival_product_option = $("#selectFromRival").children(":selected").attr("value");
      var rival_product_id = $("#rival_product_id").attr("value");

      console.log(rival_product_option);
      console.log(rival_product_id);

      $.ajax({
        type: 'POST',
        url: './php/crud/update.php',
        data: {
          id: id,
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
        /*
        beforeSend: function() {
          $("#submit").addClass('is-loading');
        },
        success: loading,
        error: function (message) {
          console.log(message);
        }
        */
      });

    });


    $('#updateProduct').on('submit', function(event){
      event.preventDefault();

      var id = $("#id").val();
      var sku = $("#sku").val();
      var name = $("#name").val();
      var rec_price = $("#rec_price").val();
      var url = $("#url").val();
      var form = 'updateProduct';

      $.ajax({
        type: 'POST',
        url: './php/crud/update.php',
        data: {
          id: id,
          sku: sku,
          name: name,
          rec_price: rec_price,
          url: url,
          form: form
        },
        beforeSend: onLoading,
        success: onSuccess,
        error: onError
        /*
        beforeSend: function() {
          $("#submit").addClass('is-loading');
        },
        success: loading,
        error: function (message) {
          console.log(message);
        }
*/
      });

    });