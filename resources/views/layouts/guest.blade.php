<!DOCTYPE html>
<html lang="en">
<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6RYMDQ1QH5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6RYMDQ1QH5');
</script>
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