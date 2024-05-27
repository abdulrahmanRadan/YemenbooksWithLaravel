@php
    $active1 = false;
    $active2 = false;
    if(Route::currentRouteName() == 'show-book'){
        $active1 = true;
    }
    elseif (Route::currentRouteName() == 'create-book') {
        
        $active2 = true; 
    }
    
@endphp
<div class=" px-4 py-4 flex items-center  justify-between  bg-blue-200">
    <h2 class="font-semibold text-xl leading-tight ">
        <x-nav-link  
        wire:navigate
        active="{{$active1}}"
        href="{{ route('show-book') }}">
        {{ __('show-book') }} 
        </x-nav-link>
    </h2>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <x-nav-link 
        wire:navigate
        active="{{$active2}}"
        
        href="{{ route('create-book') }}">
            {{ __('create-book ') }}
        </x-nav-link>
    </h2>
</div>
