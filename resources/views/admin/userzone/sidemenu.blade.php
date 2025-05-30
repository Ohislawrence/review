<ul class="sidebar-menu">
    <li><a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}"><i class="fas fa-home"></i> Dashboard</a></li>
    <li><a href="" class="{{ Request::is('profile') ? 'active' : '' }}"><i class="fas fa-user"></i> Profile</a></li>
    <li><a href="" class="{{ Request::is('orders') ? 'active' : '' }}"><i class="fas fa-shopping-bag"></i> Orders</a></li>
    <li><a href="" class="{{ Request::is('favorites') ? 'active' : '' }}"><i class="fas fa-heart"></i> Favorites</a></li>
    <li><a href="" class="{{ Request::is('settings') ? 'active' : '' }}"><i class="fas fa-cog"></i> Settings</a></li>
    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </li>
</ul>