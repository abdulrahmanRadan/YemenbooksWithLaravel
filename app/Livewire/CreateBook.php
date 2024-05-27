<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithFileUploads;


class CreateBook extends Component
{
    use WithFileUploads;

    public $title;
    public $descrption;
    public $icon;
    public $metterid;
    public $termid;
    public $existingIcon;
    public $metters=1;
    public $term =3;

    //

    protected $rules = [
        'title' => 'required|string',
        'icon' => 'nullable|image|max:1024', // التأكد من أن الملف صورة وبحد أقصى 1 ميغابايت
        'descrption' => 'required|string',
    ];
 
    public function save()
    {
        // dd($this->metter);
        $this->validate();
        
        $iconPath = $this->icon ? $this->icon->store('books', 'public') : null;
        
            
        $book = Book::create([
            'title' => $this->title,
            'descrption' => $this->descrption,
            'icon' => $iconPath,
            'metters' => $this->metters,
            'term' => $this->term,
            
        ]);
    
        $this->reset(['title', 'icon', 'descrption','metters', 'term']);
        // $this->currencies = Currency::all();
        
        // session()->flash('message', 'Book added successfully.');
        redirect('show-book')->with('message', 'Book added successfully.');
        
        // إرسال الإشعار للمستخدم الحالي
        
        // Clear the form inputs
        $this->title = '';
        $this->icon = '';
        $this->descrption = '';
        
        // $this->emit('currencyAdded');
    
    }
    public function render()
    {
        return view('livewire.create-book');
    }
    
}
