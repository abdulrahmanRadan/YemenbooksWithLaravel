
<div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-6 flex justify-between space-x-8 ">

    <!--  Metter -->
    <div class="relative flex lg:inline-flex items-center  rounded-xl">
        <select wire:click="metter"
        class="appearance-none bg-transparent border-2 border-l-4 flex-1 font-semibold pl-3 pr-9 py-2 rounded-lg text-sm">
            <option value="1"  selected>الفصل الدراسي</option>
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
    <div class="relative flex lg:inline-flex items-center rounded-xl ">
        <select wire:model.live='term'
            class="appearance-none bg-transparent border-2 border-l-4 flex-1 font-semibold pl-3 pr-9 py-2 rounded-lg text-sm">
            <option value="3"  selected>الجزء الاول والثاني
            </option>
            
            <option value="1">الجزء الاول
            </option>
            <option value="2">الجزء الثاني
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

    
    {{-- <div>

        {{'metter : ' . $metter}}
    </div> --}}
</div>