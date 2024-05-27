<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class ShowBook extends Component
{
    public $title;
    public $descrption;
    public $icon;
    public $metterid;
    public $termid;
    public $existingIcon;

    public function delete(Book $book){
        // dd($book);
        session()->forget('message');
        $book->delete();
        
        session()->flash('message', 'This book is  deleted successfully !!! ');
        $this->updated();

    }
    public function updated(){

    }
    public function edit($currencyId){
        // dd($curreny);
        return redirect()->route('book.update', $currencyId);
    }
    public function render()
    {
        return view('livewire.show-book', [
            'books' =>Book::all()
        ]);
    }
}
