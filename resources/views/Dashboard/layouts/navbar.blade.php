<div class="vanila_navbar">
    <div class="nav_icon">
        <i class="fa-solid fa-bars" onclick="sidebarToggle()"></i>
    </div>
    <div class="navbar_left">
        <a href="/" class="{{ (Request::is('dashboard')) ? 'active_link' : '' }}">Home</a>
        <!-- <a href="/settings">Settings</a>
        <a href="/profile">Profile</a> -->
    </div>
    <div class="navbar_right">
        <!-- <a href="">
                    <i class="fa-solid fa-search"></i>
                </a>
                <a href="">
                    <i class="fa-solid fa-clock"></i>
                </a> -->
        <a href="javascript:void(0)">
            <span>{{ auth()->user()->name }}</span>
            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="">
            <!-- <i class="fa-solid fa-user"></i> -->
        </a>
    </div>
</div>