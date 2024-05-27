<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateBook extends Component
{
    use WithFileUploads;
    public $id;
    public $title;
    public $descrption;
    public $icon;
    public $metterid;
    public $termid;
    public $existingIcon;

    protected $rules = [
        'title' => 'required|string',
        'icon' => 'nullable|image|max:1024', // التأكد من أن الملف صورة وبحد أقصى 1 ميغابايت
        'descrption' => 'required|string',
    ];

    public function save()
    {
        $this->validate();
        
        $iconPath = $this->icon ? $this->icon->store('books', 'public') : null;
        if($this->id){
            Book::find($this->id)->update([
                'title' => $this->title,
                'icon' => $iconPath,
                'descrption' => $this->descrption,
            ]);
            // session()->flash('message', 'Book update successfully.');
            redirect('show-book')->with('message', 'Book update successfully.');
        }
       
    }

    public function mount( )
    {
      
        if($this->id){

            $book = Book::findOrFail($this->id);
            $this->id = $book->id;
            $this->title = $book->title;
            $this->descrption = $book->descrption;
            $this->existingIcon = $book->icon;
        }
        
        
    }
    public function render( )
    {
        // dd($this->id);
        return view('livewire.update-book');
    }
}
