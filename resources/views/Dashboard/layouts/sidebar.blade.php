<div id="sidebar">
    <div class="sidebar_title">
        <div class="sidebar_img">
            <h1>myApp</h1>
        </div>
        <i class="fa-solid fa-times" onclick="closeSidebar()"></i>
    </div>

    <div class="sidebar_menu">
        <h2>Features</h2>
        <div class="sidebar_link {{ (Request::is('dashboard')) ? 'active_menu_link' : '' }}">
            <i class="fa-solid fa-chart-pie"></i>
            <a href="/dashboard">Dashboard</a>
        </div>
        <div class="sidebar_link {{ (Request::is('product') || Request::is('product/create') || Request::is('product/*')) ? 'active_menu_link' : '' }}">
            <i class="fa-solid fa-cart-shopping"></i>
            <a href="/product">Product</a>
        </div>
        <div class="sidebar_logout">
            <i class="fa-solid fa-sign-out"></i>
            <a href="/logout">Logout</a>
        </div>
    </div>
</div>