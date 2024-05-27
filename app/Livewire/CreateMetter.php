<?php

namespace App\Livewire;

use App\Models\Metter;
use Livewire\Component;

class CreateMetter extends Component
{
    public $name;
    protected $rules = [
        'name' => 'required|string'
    ];
 
    public function save()
    {
        $this->validate();
        
        
            
        $book = Metter::create([
            'name' => $this->name
        ]);
    
        $this->reset(['name']);
        redirect('show-metter')->with('message', 'Metter added successfully.');
        
        $this->name = '';
        
    
    }
    
    public function render()
    {
        return view('livewire.create-metter');
    }
}
