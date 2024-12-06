<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
    <body class="font-sans antialiased dark:bg-orange-200 dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-orange-200 dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
