<div class="lg:px-8 max-w-2xl bg-gray-200 py-3 px-3 mx-auto  items-center">
    <div class="mt-5 md:mt-0 md:col-span-2">
        <h2>create new current :</h2>
        <form wire:submit="save">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="grid grid-cols-4 gap-6 ">
                    <x-label for="name">name</x-label>
                    <x-input name="name" type="text" wire:model.live="name"/>
                    @error('name')
                        <p class="text-sm text-red-600">{{$message}} </p>
                    @enderror
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
                            <img src="{{ Storage::url($existingIcon) }}" alt="{{ $name }}" 
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
                    <x-label for="rate">rate</x-label>
                    <x-input  name="rate" type="number" wire:model="rate"/>
                    @error('rate')
                        <p class="text-sm text-red-600">{{$message}} </p>
                    @enderror
                    <x-button type="submit" class="text-xs flex justify-center">save</x-button>
                    <br>
                </div>
            </div>
        </form>
        @if (session()->has('message'))
        <div class="grid grid-cols-4 gap-6  px-2 py-2"
         id="success-message">{{ session('message') }}</div>
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