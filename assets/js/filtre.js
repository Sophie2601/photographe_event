jQuery(function ($) {
    var page = 1;  // Pagination initiale
  
    $('#filter-category, #filter-format, #filter-sort').change(function () {
      page = 1;  // Réinitialisation de la pagination lors du changement de filtre
  
      var category = $('#filter-category').val();
      var format = $('#filter-format').val();
      var sort = $('#filter-sort').val();
  
      $('#load-more').text("Chargement...").prop("disabled", true);
  
      $.ajax({
        url: frontendajax.ajaxurl,
        type: 'POST',
        data: {
          action: 'filter_photos',
          category: category,
          format: format,
          sort: sort
        },
        success: function (response) {
          $('.gallery').html(response);
  
          if (response.trim() !== "") {
            $('#load-more').text("Charger plus").prop("disabled", false);
          } else {
            $('#load-more').text("Aucune photo trouvée").prop("disabled", true);
          }
          return false;
        }
      });
    });
  
    $('#load-more').click(function () {
      var category = $('#filter-category').val();
      var format = $('#filter-format').val();
      var sort = $('#filter-sort').val();
  
      $('#load-more').text("Chargement...").prop("disabled", true);
  
      // Incrémentation pour charger les prochaines photos
      page++;
  
      $.ajax({
        url: frontendajax.ajaxurl,
        type: 'POST',
        data: {
          action: 'filter_photos',
          category: category,
          format: format,
          sort: sort,
          page: page
        },
        success: function (response) {
          if (response.trim() !== "" && !response.includes("Aucune photo trouvée")) {
            $('.gallery').append(response);
            $('#load-more').text("Charger plus").prop("disabled", false);
          } else {
            $('#load-more').text("Aucune autre photo").prop("disabled", true);
          }
        }
      });
    });
  });
  