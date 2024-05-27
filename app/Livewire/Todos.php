<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('todos')]
class Todos extends Component
{
    public $todo ='';
    public $todos = ['who cars'];


    public function updated($property, $value){
        // $this->todos[] = $this->todo;
        $todo = $this->todo;
    }
    public function add(){
        $this->todos[] = $this->todo;
        $this->reset('todo');
    }
    public function render()
    {
        return view('livewire.todos',[
            'todos' =>$this->todos
        ]);
    }
    
}
