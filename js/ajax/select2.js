function showSuggestions (id, from, where) {

  $(id).select2({
    minimumInputLength: 3,
    ajax: {
      url: "./php/select.php",
      type: "post",
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
          searchTerm: params.term,
          from: from,
          where: where
        };
      },
      processResults: function (response) {
        return {
          results: response
        };
      },
    }
  });

}