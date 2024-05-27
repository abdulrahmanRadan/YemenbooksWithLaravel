<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            @if (Route::currentRouteName() == 'currency' || Route::currentRouteName() == 'create-currency')   
                @include('layouts.notification')
            @elseif (Route::currentRouteName() == 'dashboard')
                <nav class="text-lx uppercase size-6  px-3  py-2 justify-around">
                    <x-nav-link wire:navigate href="{{ route('todos') }}" :active="request()->routeIs('todos')">
                        {{ __('Todos') }}
                    </x-nav-link>
                    <x-nav-link wire:navigate href="{{ route('counter') }}" :active="request()->routeIs('counter')">
                        {{ __('counter') }}
                    </x-nav-link>
                    
                </nav>
            @endif   
            
            
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                        
                    </div>
                </header>
            @endif
            
            
            {{-- @include('header') --}}
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
