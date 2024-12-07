<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
    <body class="flex flex-col font-sans antialiased w-full h-full bg-dark text-white">
        @include('partials.header')
        <div class="flex flex-1 items-center justify-center">
            @yield('content')
        </div>
        @include('partials.footer')
    </body>
</html>
