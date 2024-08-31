$(document).ready(function() {
    // Toggle the navbar menu on mobile
    $('#navbar-toggler').click(function() {
        $('#navbar-menu').toggleClass('active');
    });

    // Show the track order modal
    $('#track-order-btn').click(function(e) {
        e.preventDefault();
        $('#track-order-modal').show();
    });

    // Close the track order modal
    $('.close-btn').click(function() {
        $('#track-order-modal').hide();
    });

    $(window).click(function(event) {
        if ($(event.target).is('#track-order-modal')) {
            $('#track-order-modal').hide();
        }
    });
});
