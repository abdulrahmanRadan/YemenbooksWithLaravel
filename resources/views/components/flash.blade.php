@props(['value'])
<div {{ $attributes->merge(['class' => ' inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end bg-none' ]) }}
    x-data="{show : true}"  
    x-init="setTimeout(() => show =false, 4000)"
    x-show="show">
    <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ">
        <div class="rounded-lg shadow-xs overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-green-400 " fill="none" viewBox="0 0 24 24" stroke="currentColor" >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1212 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5 ">
                        <p class="text-sm leading-5 text-gray-500 ">{{session('message') }}</p>
                        <p class="mt-1 text-sm  leading-5 text-gray-500 ">AnyOne with a Link can now a view this  file </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 