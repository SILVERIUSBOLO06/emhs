<?php

namespace App\Http\Livewire;

use App\Artikel;
use Livewire\Component;

class IndexArtikel extends Component
{
    protected $listeners = [
        'indexArtikel'
    ];
    public function render()
    {
        $art = Artikel::orderBy('id' , 'desc')->limit(1)->get();
        return view('livewire.index-artikel' , ['art' => $art]);
    }

    public function indexArtikel($artikel){

    }
}
