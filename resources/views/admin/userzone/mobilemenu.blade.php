<!-- Mobile Bottom Menu -->
<div class="mobile-bottom-menu">
    <ul class="sidebar-menu">
        <li><a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}"><i class="fas fa-home"></i> <span>Home</span></a></li>
        <li><a href="" class="{{ Request::is('profile') ? 'active' : '' }}"><i class="fas fa-user"></i> <span>Profile</span></a></li>
        <li><a href="" class="{{ Request::is('orders') ? 'active' : '' }}"><i class="fas fa-shopping-bag"></i> <span>Orders</span></a></li>
        <li><a href="" class="{{ Request::is('settings') ? 'active' : '' }}"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
    </ul>
</div>