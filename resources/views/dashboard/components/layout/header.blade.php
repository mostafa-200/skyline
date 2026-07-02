<header class="header">
    <div class="toggle-btns">
        <a id="toggle-sidebar" href="#">
            <i class="icon-list"></i>
        </a>
        <a id="pin-sidebar" href="#">
            <i class="icon-list"></i>
        </a>
    </div>
    <div class="header-items">
        <!-- Custom search start -->
        <div class="custom-search">
            <input type="text" class="search-query" placeholder="Search here ...">
            <i class="icon-search1"></i>
        </div>
        <!-- Custom search end -->

        <!-- Header actions start -->
        <ul class="header-actions">
            <li class="dropdown">
                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                    <span class="user-name">{{ auth()->user()->name }}</span>
                    <span class="avatar">
                        <img src="{{ asset('img/user24.png') }}" alt="avatar">
                        <span class="status busy"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                    <div class="header-profile-actions">
                        <div class="header-user-profile">
                            <div class="header-user">
                                <img src="{{ asset('img/user24.png') }}" alt="User Profile">
                            </div>
                            <h5>{{ auth()->user()->name }}</h5>
                            <p>{{ auth()->user()->isSuperAdmin() ? 'Super Admin' : 'Admin' }}</p>
                        </div>
                        <a href="{{ route('dashboard.profile.edit') }}"><i class="icon-user1"></i> My Profile</a>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-log-out1"></i> Sign Out
                        </a>
                        <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
        </ul>
        <!-- Header actions end -->
    </div>
</header>
