<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('layouts.meta')
        <title>@yield('headername') | {{ env('APP_NAME') }}</title>
        @include('partials.css')
    @yield('header')
</head>
<body>
    <!-- Header -->
    <div class="main-wrapper">
        @include('partials.header')
        @yield('breadcrumbs')
       
        @yield('content')
        

        <!-- Footer -->
        @include('partials.footer')
        @yield('footer')
        @include('partials.scripts')
    </div>
</body>
</html>