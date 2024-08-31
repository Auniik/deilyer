$(document).ready(function() {
    // Toggle the navbar menu on mobile
    $('#navbar-toggler').click(function() {
        $('#navbar-menu').toggleClass('active');
    });


    // Show the track order modal
    $('#track-order-btn').click(function(e) {
        e.preventDefault();
        $('#track-order-modal').show(100);
    });

    // Close the track order modal
    $('.close-btn').click(function() {
        $('#track-order-modal').hide(100);
    });

    $(window).click(function(event) {
        if ($(event.target).is('#track-order-modal')) {
            $('#track-order-modal').hide();
        }
    });



    $('#login-btn').click(function(e) {
        e.preventDefault();
        $('#login-modal').fadeIn(100);
    });

    // Close the login  modal
    $('.close-btn').click(function() {
        $('#login-modal').hide(100);
    });

    $(window).click(function(event) {
        if ($(event.target).is('#login-modal')) {
            $('#login-modal').hide(100);
        }
    });



    $('#register-btn').click(function(e) {
        console.log(e)
        e.preventDefault();
        $('#register-modal').show(100);
    });

    $('.close-btn').click(function() {
        $('#register-modal').hide(100);
    });

    $(window).click(function(event) {
        if ($(event.target).is('#register-modal')) {
            $('#register-modal').hide(100);
        }
    });


});
