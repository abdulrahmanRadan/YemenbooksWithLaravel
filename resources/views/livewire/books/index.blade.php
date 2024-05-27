<div>
    <x-slot name="header">

        <div class="flex px-6 items-center border-b border-gray-400 pt-2 py-6 ">
            <div class="flex lg:justify-between  ">
            </div>
            @livewire('books.header')
            
            @if (Route::has('login'))
            <div class="-mx-3 flex flex-1 justify-end">
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                        >
                            Log in
                        </a>
    
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            </div>
            @endif
        </div>
    </x-slot>
    <!-- Search -->
    <div class="relative  lg:inline-flex  rounded-xl px-6 py-2 pt-6  items-stretch  ">
        <x-input 
        type="text" 
        placeholder="Find something" 
        class="bg-transparent placeholder-black px-6 items-center font-semibold text-sm w-full"
        wire:model.live="search" /> 
    </div>
    <div class="bg-gray-50 text-black/50 py-6">
    
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-2 lg:max-w-7xl">
                <main class="grid grid-cols-2 ">
                    @foreach ($books as $book)  
                    <div class="bg-white px-3  rounded-lg border-2  border-gray-500 ">
                        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                            <h1 class="text-2xl font-bold tracking-tight text-gray-900">{{$book->title}}</h1>
    
                            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                            <div class="group relative">
                                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-40" >
                                <img src="{{url('storage/'. $book->icon) }}" alt="{{ $book->name}}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                </div>
                                <div class="mt-4 flex justify-between">
                                <div>
                                    <h2 class="text-lg text-gray-700 items-center ">
                                    <a href="#">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{$book->descrption}}
                                    </a>
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-500">{{$book->term}}</p>
                                </div>
                                <p class="text-sm font-medium text-gray-900">
                                    <x-secondary-button type="button"  
                                    wire:click="download({{$book->id}})"
                                    >
                                    Download
                                    </x-secondary-button></p>
                                </div>
                            </div>
    
                            <!-- More products... -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                
                </main>
    
                <footer class="py-16 text-center text-sm text-black">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>
        </div>
    </div>
</div>

