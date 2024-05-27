@props(['books'])
<div class="content  justify-self-center  lg:px-8 max-w-3xl bg-gray-200 py-3 px-3 mx-auto  items-center" >
  @include('books')
  <div>
    {{-- {{var_dump($books)}} --}}
    <br class="w-2 h-2 text-center text-gray-300 bg-gray-300">
    @if (session()->has('message'))
        <x-flash  />
    @endif
  </div>
  <div class="bg-gray-50">
      <ul role="list" class="divide-y divide-gray-100">
        @foreach ($books as $book)
        @dd($book)
          <li class="flex justify-between gap-x-6 py-5 items-center ">
            <div class="flex min-w-0 gap-x-4 py-2 px-6">
                  <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{url('storage/'. $book->icon) }}" alt="{{ $book->name}}" >
                  <div class="min-w-0 flex-auto">
                  <h1 class="text-xl  leading-6 text-gray-900 px-6">{{$book->name}}</h1>
                  <p class="mt-1 truncate text-xs leading-5 text-gray-500 px-6"> {{$book->descrption}} </p>
                  <p class="mt-1 truncate text-xs leading-5 text-gray-500 px-6"> {{$book->metters}} </p>
                  <p class="mt-1 truncate text-xs leading-5 text-gray-500 px-6"> {{$book->term}} </p>
                  </div>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
              <p class="px-2 py-2 text-sm leading-6 text-green-900">
                  <x-secondary-button type="button"  
                  wire:click="edit({{$book->id}})"
                  class=" bg-yellow-500  ">
                  Edit
                </x-secondary-button>
              </p>
              
              <div class=" px-2 py-2 text-sm leading-6 text-gray-800 ">
                <x-danger-button type="button"  
                class=" bg-red-500 "
                wire:click="delete({{$book->id}})"
                wire:confirm="Are you sure to delete this book , ">
                  DELETE
              </x-danger-button> 
              </div>
  
              <p class="mt-1 text-xs leading-5 text-gray-500 px-6">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
            </div>
          </li>
        @endforeach
    </ul>
   
  </div>
</div>
