<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('layouts.meta')
        <title>@yield('title') | {{ env('APP_NAME') }}</title>
        @include('partials.css')
    @yield('header')
    <meta name="p:domain_verify" content="15443de08218d316c37d51c296778b77"/>
</head>
<body>
    <!-- Header -->
    <div class="main-wrapper">
        @include('partials.header')
        @yield('breadcrumbs')
       
        @yield('content')
        

        <!-- Footer -->
        @hasSection('no-footer')
            @else
                @include('partials.footer')
        @endif
        @yield('footer')
        @include('partials.scripts')
    </div>
</body>
</html>