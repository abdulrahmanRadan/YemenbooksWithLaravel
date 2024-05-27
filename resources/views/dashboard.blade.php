<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between bg-blue-200">

            
            <a href="{{ route('show-book') }}">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('show-book') }}
                </h2>
            </a>
            <a href="{{ route('create-book') }}">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('create-book') }}
                </h2>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- @include('header') --}}
                <x-welcome  />
                {{-- @livewire('todos') --}}
            </div>
        </div>
    </div>
</x-app-layout>
