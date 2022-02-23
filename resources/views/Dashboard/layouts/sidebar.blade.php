<div id="sidebar">
    <div class="sidebar_title">
        <div class="sidebar_img">
            <h1>myApp</h1>
        </div>
        <i class="fa-solid fa-times" onclick="closeSidebar()"></i>
    </div>

    <div class="sidebar_menu">
        <h2>Features</h2>

        @can('adminOnly')
        <div class="sidebar_link {{ (Request::is('admin/dashboard') || Request::is('admin')) ? 'active_menu_link' : '' }}">
            <i class="fa-solid fa-chart-pie"></i>
            <a href="/admin/dashboard">Dashboard</a>
        </div>

        <div class="sidebar_link {{ (Request::is('admin/product') || Request::is('admin/product/create') || Request::is('admin/product/*')) ? 'active_menu_link' : '' }}">
            <i class="fa-solid fa-cart-shopping"></i>
            <a href="/admin/product">Product</a>
        </div>
        @endcan

        @can('memberOnly')
        <div class="sidebar_link {{ (Request::is('dashboard')) ? 'active_menu_link' : '' }}">
            <i class="fa-solid fa-chart-pie"></i>
            <a href="/dashboard">Dashboard</a>
        </div>

        <div class="sidebar_link {{ (Request::is('product') || Request::is('product/*')) ? 'active_menu_link' : '' }}">
            <i class="fa-solid fa-cart-shopping"></i>
            <a href="/product">Product</a>
        </div>
        @endcan

        <div class="sidebar_logout">
            <i class="fa-solid fa-sign-out"></i>
            <a href="/logout">Logout</a>
        </div>
    </div>
</div>