<div class="content py-2 px-2 justify-self-center items-baseline" >
  <div class=" lg:px-8 max-w-2xl bg-gray-200 py-5 px-5 mx-auto  items-center rounded-lg ">
    <div class="mt-5 md:mt-0 md:col-span-2">
      <h1 class="text-lg font-blod uppercase bg-gray-50 flex justify-center size-4 ">Currency List</h1>
      <form wire:submit.prevent="convertCurrency" >
          <div class="grid grid-cols-4 gap-6  px-2 py-2">
              <label for="amount">Amount</label>
              <x-input type="number" id="amount" wire:model="amount" />
              @error('amount') <span class="error text-red-400">{{ $message }}</span> @enderror

          </div>
    
          <div class="grid grid-cols-4 gap-6  px-2 py-2">
            <label for="fromCurrency">From Currency</label>
            <select id="fromCurrency" wire:model="fromCurrency" class=" flex justify-center rounded-full items-center">
                <option value="" class="flex-1 justify-center text-center">Select Currency</option>
                @foreach($currencies as $currency)
                    <option class="text-center" value="{{ $currency->id }}">{{ $currency->name }}</option>
                @endforeach
            </select>
            @error('fromCurrency') <span class="error">{{ $message }}</span> @enderror
        </div>
    
        <div class="grid grid-cols-4 gap-6  px-2 py-2">
          <label for="toCurrency">To Currency</label>
          <select id="toCurrency" wire:model="toCurrency" class=" flex justify-center rounded-full items-center">
              <option class="flex-1 justify-center text-center" value="">Select Currency</option>
              @foreach($currencies as $currency)
                  <option class="text-center" value="{{ $currency->id }}">{{ $currency->name }}</option>
              @endforeach
          </select>
          @error('toCurrency') <span class="error">{{ $message }}</span> @enderror
      </div>
    
          <x-button class=" mt-3  py-3 px-2  items-center justify-center w-full " type="submit">Add Currency</x-button>
      </form>

      @if (session()->has('message'))
        <div class="grid grid-cols-4 gap-6  px-2 py-2"
         id="success-message">{{ session('message') }}</div>
    @endif
    </div>
    
    @if ($convertedAmount)
      
      <div class="grid grid-cols-4 gap-6  px-2 py-2">
        
          <h2>Converted Amount: {{ $convertedAmount }}</h2>
      </div>
    @endif

  
  </div>
  <div>
    <br class="w-2 h-2 text-center text-gray-300 bg-gray-300">
  </div>
  <div>
    <ul role="list" class="divide-y divide-gray-100">
      @foreach ($currencies as $currency)
        <li class="flex justify-between gap-x-6 py-5 items-center ">
          <div class="flex min-w-0 gap-x-4 py-2 px-6">
                <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{url('storage/'. $currency->icon) }}" alt="{{ $currency->name}}" alt="">
                <div class="min-w-0 flex-auto">
                <p class="text-sm font-semibold leading-6 text-gray-900 px-6">{{$currency->name}}</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500 px-6">1{{$currency->name}} = {{$currency->rate}} MRY</p>
                </div>
          </div>
          <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p class="text-sm leading-6 text-green-900">
               <x-button type="button"  
                wire:click="edit({{$currency->id}})"
                class=" items-center text-green-600 px-5 space-x-6 py-2 bg-green-400 border border-transparent rounded-md font-semibold  uppercase tracking-widest hover:bg-green-600 focus:bg-green-500 active:bg-green-500  ">
                Edit
              </x-button>
            </p>
            
            <p class="text-sm leading-6 text-gray-800"> <x-button type="button"  
              wire:click="delete({{$currency->id}})"
              wire:confirm="Are you sure to delete this currency , "
               class="bg-red-300"> DELETE</x-button> </p>

            <p class="mt-1 text-xs leading-5 text-gray-500 px-6">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
          </div>
        </li>
      @endforeach
  </ul>
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
