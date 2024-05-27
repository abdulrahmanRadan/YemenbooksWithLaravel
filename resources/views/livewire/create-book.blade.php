
<div class="lg:px-8 max-w-2xl bg-gray-200 py-3 px-3 mx-auto  items-center">
    @include('books')
    <div class="mt-5 md:mt-0 md:col-span-2">
        <h2>create new book :</h2>
        <form wire:submit="save">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="flex gap-6 flex-col justify-center ">
                    <div class="content flex flex-col">
                        <x-label for="title">title</x-label>
                        <x-input name="title" type="text" wire:model.lazy="title"/>
                        @error('title')
                        <p class="text-sm text-red-600">{{$message}} </p>
                        @enderror
                    </div>
                    <div>
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
                        @if ($existingIcon)
                            
                        <div class="mt-2" x-show="! iconPreview">
                            <img src="{{ Storage::url($existingIcon) }}" alt="{{ $title }}" 
                            class="rounded-full h-20 w-20 object-cover">
                        </div>
                        @endif
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
                    <!--  Metter -->
                    <div class="relative flex lg:inline-flex items-center  rounded-xl">
                        <select wire:model="metter"
                            class="appearance-none bg-transparent border-2 border-l-4 flex-1 font-semibold pl-3 pr-9 py-2 rounded-lg text-sm">
                            <option value="1" disabled selected>الفصل الدراسي
                            </option>
                            @foreach (\App\Models\Metter::all() as $metter)
                                <option value="{{ $metter->id }}">{{ $metter->name }}</option>
                            @endforeach
                        </select>

                        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22" height="22" viewBox="0 0 22 22">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                            </g>
                        </svg>
                    </div>
                    <!--  Metter -->
                    <div class="relative flex lg:inline-flex items-center  rounded-xl">
                        <select wire:model="term"
                            class="appearance-none bg-transparent border-2 border-l-4 flex-1 font-semibold pl-3 pr-9 py-2 rounded-lg text-sm">
                            <option value="3" disabled selected>الترم الاول والثاني
                            </option>
                            <option value="1" disabled >الترم الأول
                            </option>
                            <option value="2" disabled >الترم الثاني
                            </option>
                        </select>

                        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22" height="22" viewBox="0 0 22 22">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                            </g>
                        </svg>
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