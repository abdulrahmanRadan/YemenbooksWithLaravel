<?php

namespace App\Livewire;

use App\Models\Currency;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Livewire;
use App\Livewire\CreateCurrency;

class ShowCurrency extends Component
{
    #[Rule('required', message:'Yo, add a title')]
    public $amount;

    public $fromCurrency;
    public $toCurrency;
    public $convertedAmount;
    public $curreny;
    public ?CreateCurrency $form;
    public bool $currencymodel = false;

    public function edit($currencyId){
        // dd($curreny);
        return redirect()->route('currencies.edit', $currencyId);
    }

    public function render()
    {
        return view('livewire.show-currency',[
            'currencies' =>Currency::all()
        ]);
    }
    public function convertCurrency()
    {
        $this->validate([
            'amount' => 'required|numeric',
            'fromCurrency' => 'required|exists:currencies,id',
            'toCurrency' => 'required|exists:currencies,id',
        ]);

        $fromCurrency = Currency::find($this->fromCurrency);
        $toCurrency = Currency::find($this->toCurrency);

        $this->convertedAmount = ($this->amount * $fromCurrency->rate) / $toCurrency->rate;
        
    }
    public function delete(Currency $curreny){
        $curreny->delete();
    }
    
}
