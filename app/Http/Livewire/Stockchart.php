<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Stockchart extends Component
{
    public $assets;
    public function render()
    {
        return view('livewire.stockchart');
    }
}