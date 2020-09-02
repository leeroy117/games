<?php

namespace App\Http\Livewire;

use DB;
use Livewire\Component;

class JuegosU extends Component
{
    public function render()
    {
        $data = DB::select('SELECT * FROM vJuegos');
        return view('livewire.juegos-u',[
            'data' => $data,
        ]);
    }
}
