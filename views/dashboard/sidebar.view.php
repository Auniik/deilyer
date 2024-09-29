<aside class="sidebar">
    <h2>
        <?if(is_admin()):?>
        Admin
        <?elseif(is_manager()):?>
        Manager
        <? elseif (is_delivery_men()): ?>
        Delivery Men
        <? elseif (is_customer()): ?>
        Customer
        <? endif; ?>
        Dashboard</h2>
    <ul class="menu">
        <li>
            <a href="#" class="menu-item">Dashboard</a>
        </li>
        <li>
            <a href="#" class="menu-item">Orders <i class="fa-solid fa-chevron-down"></i></a>
            <ul class="submenu">
                <? if(!is_delivery_men()): ?>
                <li><a href="/orders/create">Add Order</a></li>
                <? endif ?>
                <li><a href="/orders/list">Orders</a></li>
                <li><a href="/orders/track">Track</a></li>
            </ul>
        </li>
        <? if(is_admin()): ?>
        <li>
            <a href="#" class="menu-item">Managers <i class="fa-solid fa-chevron-down"></i></a>
            <ul class="submenu">
                <li><a href="/managers/create">Add Manager</a></li>
                <li><a href="/managers/list">Managers</a></li>
            </ul>
        </li>
        <? endif ?>
        <? if(is_manager()): ?>
        <li>
            <a href="#" class="menu-item">Delivery Mens <i class="fa-solid fa-chevron-down"></i></a>
            <ul class="submenu">
                <li><a href="/delivery-mens/create">Add new</a></li>
                <li><a href="/delivery-mens/list">List</a></li>
            </ul>
        </li>
        <? endif ?>
        <? if(is_manager()): ?>
        <li>
            <a href="#" class="menu-item">Customers <i class="fa-solid fa-chevron-down"></i></a>
            <ul class="submenu">
                <li><a href="/customers">List</a></li>
            </ul>
        </li>
        <? endif ?>
        <li>
            <a href="#" class="menu-item">Settings <i class="fa-solid fa-chevron-down"></i></a>
            <ul class="submenu">
                <li><a href="/order-segments/list">Order Settings</a></li>
                <li><a href="#">Security</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-item">Reports</a>
        </li>
    </ul>
</aside>