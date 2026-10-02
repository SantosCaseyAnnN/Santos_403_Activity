<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Counter</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-slate-100 min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-xl shadow-lg">
            <a href="{{ route('dashboard') }}" class="block mb-6 text-sm text-blue-600 hover:underline">
                &larr; Back to dashboard
            </a>
            <livewire:counter />
        </div>
        @livewireScripts
    </body>
</html>
