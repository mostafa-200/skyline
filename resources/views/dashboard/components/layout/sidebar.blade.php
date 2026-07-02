<nav id="sidebar" class="sidebar-wrapper">
    <!-- Sidebar brand start  -->
    <div class="sidebar-brand">
        <a href="{{ route('dashboard.index') }}" class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="CCESS Logo" />
        </a>
    </div>
    <!-- Sidebar brand end  -->

    <!-- Sidebar content start -->
    <div class="sidebar-content">
        <!-- sidebar menu start -->
        <div class="sidebar-menu">
            <ul>
                <li class="header-menu">General</li>
                <li class="{{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="icon-devices_other"></i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('dashboard.profile.edit') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.profile.edit') }}">
                        <i class="icon-user1"></i>
                        <span class="menu-text">My Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">
                        <i class="icon-log-out1"></i>
                        <span class="menu-text">Logout</span>
                    </a>
                    <form id="sidebar-logout-form" action="{{ route('dashboard.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end -->
    </div>
    <!-- Sidebar content end -->
</nav>
