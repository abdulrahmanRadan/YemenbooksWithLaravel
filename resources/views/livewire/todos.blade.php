
<div class="  items-center font-semibold text-xl leading-tight grid justify-items-center py-3 px-3  ">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg justify-center px-6 py-10" >
        <h2 class="text-lx first-letter:size-10 bg-green-400 text-gray-200">new todos :</h2>
        <p>Current todos : <span x-text="$wire.todo"></span></p>
        <form wire:submit="add">
            <x-label for="title">title</x-label>
            <x-input type='text'  type="text" name="title" value="{{$todo}}" wire:model="todo" />
            <x-label >Content</x-label>
            <textarea   wire:model="con" ></textarea>
            <br>
            <small class="text-xs py-3 px-3 block items-end right-0">Characters:
                <span  x-text="$wire.con.split(' ').length -1"></span>
            </small>
            <br><br>
            <x-button type="submit">add</x-button>
        </form>
    </div>
    <div class=" flex items-baseline justify-between px-6 py-10">
        <ul>
            @foreach ($todos as $todo)
                <li>{{$todo}} </li>
            @endforeach
        </ul>
    </div>
</div>
