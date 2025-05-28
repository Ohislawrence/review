<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('layouts.meta')
        <title>@yield('headername') | {{ env('APP_NAME') }}</title>
        <link rel="icon" href="{{ asset('admin/assets/media/logos/logo_fade.png') }}" type="image/x-icon">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('layouts.admininclude.css')
    @yield('header')
</head>
<body>
    <!-- Header -->
    @include('layouts.admininclude.sidebar')
    <!-- Main Content -->
    <div class="main-content" id="main-content">
    
        @include('layouts.admininclude.nav')
        @include('layouts.admininclude.alert')
        <!-- Content -->
        @yield('content')

        <!-- Footer -->
        @include('layouts.admininclude.footer')
        @yield('footer')
    </div>
    @include('layouts.admininclude.js')
    <!-- Bootstrap JS + Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>