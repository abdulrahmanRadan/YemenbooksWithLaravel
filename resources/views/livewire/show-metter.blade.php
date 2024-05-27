@props(['metters'])
<div class="content  justify-self-center  lg:px-8 max-w-3xl bg-gray-200 py-3 px-3 mx-auto  items-center" >
    @php
    $active1 = false;
    $active2 = false;
    if(Route::currentRouteName() == 'show-metter'){
        $active1 = true;
    }
    elseif (Route::currentRouteName() == 'create-metter') {
        
        $active2 = true; 
    }
    
@endphp
<div class=" px-4 py-4 flex items-center  justify-between  bg-blue-200">
    <h2 class="font-semibold text-xl leading-tight ">
        <x-nav-link  
        wire:navigate
        active="{{$active1}}"
        href="{{ route('show-metter') }}">
        {{ __('show-metter') }} 
        </x-nav-link>
    </h2>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <x-nav-link 
        wire:navigate
        active="{{$active2}}"
        
        href="{{ route('create-metter') }}">
            {{ __('create-metter ') }}
        </x-nav-link>
    </h2>
</div>

    
    <div>
    {{-- {{var_dump($books)}} --}}
    <br class="w-2 h-2 text-center text-gray-300 bg-gray-300">
    @if (session()->has('message'))
        <x-flash  />
    @endif
    </div>
  <div class="bg-gray-50">
        <ul role="list" class="divide-y divide-gray-100">
        @foreach ($metters as $metter)
            <li class="flex justify-between gap-x-6 py-5 items-center ">
            <div class="flex min-w-0 gap-x-4 py-2 px-6">
                    <div class="min-w-0 flex-auto">
                        <h1 class="text-xl  leading-6 text-gray-900 px-6">{{$metter->name}}</h1>
                    </div>
            </div>
            <p class="mt-1 text-xs leading-5 text-gray-500 px-6">created :  <time datetime="2023-01-23T13:23Z">{{ "  " .  $metter->created_at->diffForHumans()}}</time></p>
            <p class="mt-1 text-xs leading-5 text-gray-500 px-6">Last seen <time datetime="2023-01-23T13:23Z">{{  " " . $metter->created_at->diffForHumans()}}</time></p>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                <div class=" px-2 py-2 text-sm leading-6 text-gray-800 ">
                <x-danger-button type="button"  
                    class=" bg-red-500 "
                    wire:click="delete({{$metter->id}})"
                    wire:confirm="Are you sure to delete this metter , ">
                    DELETE
              </x-danger-button> 
              </div>
  
            </div>
          </li>
        @endforeach
    </ul>
   
  </div>
</div>
