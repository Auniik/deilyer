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
