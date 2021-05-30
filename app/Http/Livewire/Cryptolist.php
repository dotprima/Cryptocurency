<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;

use Livewire\Component;

class Cryptolist extends Component
{
    public $assets;
    public function render()
    {
        return view('livewire.cryptolist');
    }
}