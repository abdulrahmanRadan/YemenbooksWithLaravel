<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between bg-blue-200">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                <a href="currency">
                {{ __('currency') }}
                </a>
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{ route('create-currency') }}">
                    {{ __('create new ') }}
                </a>
            </h2>
        </div>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">  
                @if (Route::currentRouteName() == 'currency')   
                      
                    @livewire('show-currency')
                    
                @elseif(Route::currentRouteName() == 'create-currency')
                    @livewire('create-currency')
                @endif
                
            </div>
        </div>
    </div>
</x-app-layout>
