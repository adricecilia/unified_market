<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
    <body class="flex flex-col font-sans antialiased w-full h-full bg-dark text-white">
        @include('partials.header')
        @yield('content')
        @include('partials.footer')
    </body>
</html>
