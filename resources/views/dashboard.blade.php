@extends('layouts.guest')

@section('title', 'Dashboard')
@section('type', 'website')
@section('url', url()->current())
@section('image', asset('publicassets/images/ogimg.jpg'))
@section('description', 'Access your personal dashboard to manage orders, update your profile, and more on DealsIntel.')
@section('imagealt', 'Learn about what we do')

@section('header')
@include('admin.userzone.css')
@endsection

@section('footer')
<footer class="footer-area-v1">
<div class="footer-copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="copyright-text">
                    <p>&copy; DealsIntel {{ date('Y') }} | All Rights Reserved</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="copyright-link">
                    <ul>
                        <li><a href="{{ route('privacy') }}">Privacy</a></li>
                        <li><a href="{{ route('tos') }}">Terms</a></li>
                        <li><a href="{{ route('sitemap') }}">Sitemap</a></li>
                        <li><a href="">Help</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
@endsection

@section('breadcrumbs')
@endsection

@section('content')
<div class="dashboard-container">
    <!-- Desktop Sidebar -->
    <div class="dashboard-sidebar" id="dashboardSidebar">
        <div class="sidebar-header text-center mb-4">
            <h4 class="sidebar-title text-white">Dashboard</h4>
        </div>
        @include('admin.userzone.sidemenu')
    </div>

   

    <!-- Main Content -->
    <div class="dashboard-content">
        <div class="dashboard-card">
            <h3>Welcome, {{ auth()->user()->name }}</h3>
            <p>Here you can manage your account, view orders, and update your preferences.</p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="dashboard-card">
                    <h3>Recent Activity</h3>
                    <p>No recent activity</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="dashboard-card">
                    <h3>Quick Actions</h3>
                    <a href="" class="main-btn">View Orders</a>
                    <a href="" class="main-btn btn-outline">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

    @include('admin.userzone.mobilemenu')
</div>


@endsection
@section('no-footer')
    <!-- This empty section will prevent footer from showing -->
@endsection
