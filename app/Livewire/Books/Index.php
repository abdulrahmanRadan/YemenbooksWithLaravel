<?php

namespace App\Livewire\Books;

use App\Models\Book;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\With\Url;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    public  $search ='';
    public $metter ='';

    

    public function render()
    {
        return view('livewire.books.index',[
            'books' => Book::search('title' , $this->search)->paginate(6)
        ]);
    }
}
