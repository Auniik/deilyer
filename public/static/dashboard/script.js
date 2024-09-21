document.addEventListener("DOMContentLoaded", function() {
    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            const submenu = this.nextElementSibling;

            if (submenu && submenu.classList.contains('submenu')) {
                e.preventDefault();
                submenu.classList.toggle('open');
            }
        });
    });
});

$(document).on('change', 'input[type="radio"]', function() {
    // Remove the box shadow from all radio button labels
    $('input[type="radio"]').parent().css('box-shadow', '4px 4px 8px #c5c5c5, -4px -4px 8px #ffffff');

    // Add box shadow to the selected radio button's parent label
    if ($(this).is(':checked')) {
        $(this).parent().css('box-shadow', 'inset 4px 4px 8px #c5c5c5, inset -4px -4px 8px #ffffff');
    }

    $('input[type="radio"]').parents('label').each(function() {
        if (!$(this).find('input[type="radio"]').is(':checked')) {
            $(this).css('box-shadow', '4px 4px 8px #c5c5c5, -4px -4px 8px #ffffff');
        }
    });
});
$(document).on('change', 'input[type="checkbox"]', function() {
    if ($(this).is(':checked')) {
        $(this).parent().css('box-shadow', 'inset 4px 4px 8px #c5c5c5, inset -4px -4px 8px #ffffff');
    } else {
        $(this).parent().css('box-shadow', '4px 4px 8px #c5c5c5, -4px -4px 8px #ffffff');
    }
});

