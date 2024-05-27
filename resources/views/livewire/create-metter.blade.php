
<div class="lg:px-8 max-w-2xl bg-gray-200 py-3 px-3 mx-auto  items-center">
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
    <div class="mt-5 md:mt-0 md:col-span-2">
        <h2>create new metter :</h2>
        <form wire:submit="save">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="flex gap-6 flex-col justify-center ">
                    <div class="content flex flex-col">
                        <x-label for="name">name</x-label>
                        <x-input name="name" type="text" wire:model.lazy="name"/>
                        @error('name')
                        <p class="text-sm text-red-600">{{$message}} </p>
                        @enderror
                    </div>
                    <x-button type="submit" class="text-xs flex justify-center">save</x-button>
                    <br>
                </div>
            </div>
        </form>
    </div>
    @if (session()->has('message'))
        <x-flash />
    @endif
    
</div>
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('currencyAdded', () => {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 5000);
            }
        });
    });
</script>