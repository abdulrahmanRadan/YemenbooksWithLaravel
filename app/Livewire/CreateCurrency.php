<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Currency;
use App\Notifications\CurrencyAddedNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;

use function PHPUnit\Framework\returnSelf;

class CreateCurrency extends Component
{
    
    use WithFileUploads;

    public $currencyId;
    public $name;
    public $icon;
    public $rate;
    public $id;

    public $existingIcon;
    public $currencies;
    protected $rules = [
        'name' => 'required|string',
        'icon' => 'nullable|image|max:1024', // التأكد من أن الملف صورة وبحد أقصى 1 ميغابايت
        'rate' => 'required|numeric',
    ];
 
    public function save()
    {
        $this->validate();
        
        $iconPath = $this->icon ? $this->icon->store('icons', 'public') : null;
        if($this->id){
            Currency::find($this->id)->update([
                'name' => $this->name,
                'icon' => $iconPath,
                'rate' => $this->rate,
            ]);
            session()->flash('message', 'Currency update successfully.');
        }
        else{

            
            $currency = Currency::create([
            'name' => $this->name,
            'icon' => $iconPath,
            'rate' => $this->rate,
            ]);
        
            $this->reset(['name', 'icon', 'rate']);
            // $this->currencies = Currency::all();
            
            session()->flash('message', 'Currency added successfully.');
            
            // إرسال الإشعار للمستخدم الحالي
            Auth::user()->notify(new CurrencyAddedNotification($currency));
            
            // Clear the form inputs
            $this->name = '';
            $this->icon = '';
            $this->rate = '';
            
            // $this->emit('currencyAdded');
        }
    }
    public function mount( )
    {
      
        if($this->id){

            $currency = Currency::findOrFail($this->id);
            $this->currencyId = $currency->id;
            $this->name = $currency->name;
            $this->rate = $currency->rate;
            $this->existingIcon = $currency->icon;
        }
        
        
    }
    public function render()
    {
        return view('livewire.create-currency');
    }
    
    
}
