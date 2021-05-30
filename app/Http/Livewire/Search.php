<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $search ='';
    public $assets;
    public $result;
    public $temp = 0;
    public function render()
    {
        for($i = 0; $i < count($this->assets); $i++){
            if(preg_match("/{$this->search}/i", $this->assets[$i]['name'])) {
                $this->result[$this->temp][1] = $this->assets[$i]['name'];
                $this->result[$this->temp][2] = $this->assets[$i]['id'];
                $this->result[$this->temp][4] = $this->assets[$i]['symbol'];
                $this->result[$this->temp][3] = $this->assets[$i]['priceUsd'];
                $this->result[$this->temp][5] = $this->assets[$i]['changePercent24Hr'];
                $this->temp++;
            }
        }
        unset($this->temp);
        return view('livewire.search', [
            'result' => $this->result,
        ]);
    }
}