$('#favoriteButton').click(function() {
    var adId = $(this).data('ad-id');
    
    $.ajax({
        url: '/favorites', 
        data: { ad_id: adId },
        success: function(response) {
            // Maneja la respuesta del servidor si es necesario
        },
        error: function(xhr, status, error) {
            // Maneja el error si es necesario
        }
    });
});