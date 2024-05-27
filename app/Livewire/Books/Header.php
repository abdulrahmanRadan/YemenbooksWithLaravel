<?php

namespace App\Livewire\Books;

use App\Models\Metter;
use App\Models\Term;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

use function PHPUnit\Framework\isNull;

class Header extends Component
{
    public $search ='';
    public $metter  ;
    public $term ;
    

    
    public function render()
    {
        return view('livewire.books.header');
    }
}
