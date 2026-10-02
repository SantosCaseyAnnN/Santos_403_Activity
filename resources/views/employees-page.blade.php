<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Employee Management</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body>
        <a href="{{ route('dashboard') }}" style="display: inline-block; margin: 12px 18px; color: #2864e8; font: 14px Arial, sans-serif; text-decoration: none;">
            &larr; Back to dashboard
        </a>
        <livewire:employees />
        @livewireScripts
    </body>
</html>
