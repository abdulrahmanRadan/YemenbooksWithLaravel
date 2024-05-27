
<div class="lg:px-8 max-w-2xl bg-gray-200 py-3 px-3 mx-auto  items-center">
    @include('books')
    <div class="mt-5 md:mt-0 md:col-span-2">
        <h2>update book :</h2>
        <form wire:submit="save">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="flex gap-6 flex-col justify-center ">
                    <div class="content flex flex-col">
                        <x-label for="title">title</x-label>
                        <x-input name="title" type="text" wire:model.live="title"/>
                        @error('title')
                        <p class="text-sm text-red-600">{{$message}} </p>
                        @enderror
                    </div>
                    <div>
                        <x-label for="descrption">descrption</x-label>
                        <x-textarea name="descrption" />
                        @error('descrption')
                        <p class="text-sm text-red-600">{{$message}} </p>
                        @enderror
                    </div>
                    <div x-data="{iconName: null, iconPreview: null}" class="col-span-6 sm:col-span-4">

                        <!-- Profile Photo File Input -->
                        <input  type="file" id="icon" class="hidden"
                        x-ref="icon"
                        x-on:change="
                        iconName = $refs.icon.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            iconPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.icon.files[0]);
                        " 
                        wire:model.live="icon"/>
                        
                        <x-label for="icon" value="{{ __('icon') }}" />
                        <!-- Current Profile Photo -->
                        <div class="mt-2" x-show="! iconPreview">
                            <img src="{{ Storage::url($existingIcon) }}" alt="{{ $title }}" 
                            class="rounded-full h-20 w-20 object-cover">
                        </div>
                        <!-- New Profile Photo Preview -->
                        <div class="mt-2" x-show="iconPreview" style="display: none;">
                            <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                                x-bind:style="'background-image: url(\'' + iconPreview + '\');'">
                            </span>
                        </div>
                        
                    
                        <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.icon.click()">
                            {{ __('Select A New icon') }}
                        </x-secondary-button>
                        @if ($icon)
                            <x-secondary-button type="button" class="mt-2" wire:click="x-show='! iconPreview'">
                                {{ __('Remove icon') }}
                            </x-secondary-button>
                        @endif

                        <x-input-error for="icon" class="mt-2" />
                    </div>
                    
                    <x-button type="submit" class="text-xs flex justify-center">Edit</x-button>
                    <br>
                </div>
            </div>
        </form>
        @if (session()->has('message'))
            <x-flash />
            {{-- <div x-data="{show : true}"  
                x-init="setTimeout(() => show =false, 4000)"
                x-show="show"
                class="bg-blue-500 bottom-3 fixed px-4 right-3 rounded-xl text-sm text-black "
                id="success-message">
            {{ session('message') }}
            </div> --}}
        @endif
    </div>
    
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