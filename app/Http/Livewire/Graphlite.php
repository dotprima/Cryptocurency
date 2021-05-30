<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Graphlite extends Component
{
    public $assets;
    public function render()
    {
        return view('livewire.graphlite');
    }
}