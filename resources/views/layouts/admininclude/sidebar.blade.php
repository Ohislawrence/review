<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <i class="fas fa-fw fa-cog"></i>
        <span>Admin Panel</span>
    </div>
    
    <hr class="sidebar-divider my-0">
    
    <ul class="sidebar-nav">
        <li class="">
            <a href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        <hr class="sidebar-divider">
        
        <li class="{{ request()->routeIs('admin.deals.index') ? 'active fw-bold' : '' }}">
            <a href="{{ route('admin.deals.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Deals</span>
            </a>
        </li>
        
        <li class="{{ request()->routeIs('admin.faq.index') ? 'active fw-bold' : '' }}">
            <a href="{{ route('admin.faq.index') }}">
                <i class="fas fa-fw fa-box"></i>
                <span>FAQ</span>
            </a>
        </li>
        
        <li class="{{ request()->routeIs('admin.blogs.index') ? 'active fw-bold' : '' }}">
            <a href="{{ route('admin.blogs.index') }}">
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>Blogs</span>
            </a>
        </li>
        
        <li>
            <a href="#">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>Reports</span>
            </a>
        </li>
        
        <hr class="sidebar-divider">
        
        <li>
            <a href="#">
                <i class="fas fa-fw fa-cog"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</div>