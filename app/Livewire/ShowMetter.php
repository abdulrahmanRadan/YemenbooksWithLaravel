<?php

namespace App\Livewire;

use App\Models\Metter;
use Livewire\Component;

class ShowMetter extends Component
{
    public function delete(Metter $metter){
        // dd($book);
        session()->forget('message');
        $metter->delete();
        
        session()->flash('message', 'This Metter is  deleted successfully !!! ');

    }
    public function render()
    {
        return view('livewire.show-metter',[
            'metters' => Metter::all()
        ] );
    }
}
