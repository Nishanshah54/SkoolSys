<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
        <body class="bg-[#4c7cd4] dark:bg-[#0a0a0a] text-[#eeeee9] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
      
        {{ $slot }}

    </body>
</html>
        