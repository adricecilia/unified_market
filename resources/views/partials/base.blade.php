<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
    <body class="font-sans antialiased w-full h-full bg-white text-dark">
    @include('partials.header')
        <div class="relative min-h-screen flex flex-col items-center justify-center">
            @yield('content')
        </div>
    @include('partials.footer')
    </body>
</html>
