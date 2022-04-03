    function AJAXcheckExist (id, value, from, where) {
        $.ajax({
          type: 'POST',
          url: './php/checkExist.php',
          data: { value: value,
            from: from,
            where: where
          },
            success: function(response){

              if(response == "1")
              {
                //Exists
                //$("#uname_response").html("Username already exists");
                $(id).addClass("is-danger");
                $(id).removeClass("is-success");
                $("#help").text("Już istnieje w bazie danych!")
                $("#submit").attr("disabled", true);
              }else {
                //Doesn't exist
                //$("#uname_response").html("Username available!");
                $(id).addClass("is-success");
                $(id).removeClass("is-danger");
                $("#help").text(help)
                $("#submit").attr("disabled", false);
                if (value === "") {
                    $(id).removeClass("is-success");
                  }
              }

            }
        });
    }


    let help = $('#help').text();

    $("#rival").keyup(function(){

        var id = '#rival';
        var value = $('#rival').val();
        var from = 'rivals';
        var where = 'name';

        AJAXcheckExist(id, value, from, where);
    });


    $("#sku").keyup(function(){

        var id = '#sku';
        var value = $('#sku').val();
        var from = 'products';
        var where = 'sku';

        AJAXcheckExist(id, value, from, where);
    });

    $("#name").keyup(function(){

        var id = '#name';
        var value = $('#name').val();
        var from = 'products';
        var where = 'name';

        AJAXcheckExist(id, value, from, where);
    });