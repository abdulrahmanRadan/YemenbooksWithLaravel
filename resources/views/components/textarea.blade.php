@props(['name'])
<div mb-6>
    <x-input-label 
        class="uppercase font-bold  " 
        for="{{$name }}">
        {{ucwords($name )}}
    </x-input-label>
    <textarea 
        class="border border-gray-200 p-2 w-full rounded "
        name="{{$name }}"
        id="{{$name }}"
        wire:model.lazy="{{$name}}"
    >
        {{$slot ?? old($name)}}
    </textarea>
    <x-input-error for="{{$name}}"/>
</div>