<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Genero;
use Livewire\Component;

class Generos extends Component
{
    use WithPagination;

    public $nombre, $id_Genero; // campos de la tabla
    public $selected_id;
    public $action = 1; //permite moverse entre tabla y formulario
    private $pagination = 5;

    public function render()
    {
        $data = Genero::paginate($this->pagination);
        return view('livewire.generos.generos',[
            'data' => $data
        ]);
    }

    //permite moverse entre tabla y formulario
    public function doAction($action){
        $this->action = $action;
    }

    public function resetInput(){
        $this->nombre = ''; 
        $this->selected_id = null;
        $this->action = 1;
    }

    public function edit($id){
        $record = Genero::FindOrFail($id);
        $this->nombre = $record->nombre;
        $this->selected_id = $id;
        $this->action = 2;
    }

    public function storeOrUpdate(){
          $this->validate([
              'nombre' => 'required|min:1'
          ]);

          if ($this->selected_id > 0) {
              $exists = Genero::where('nombre', $this->nombre)->select('nombre')->get();
            //   dd($exists);
              if ($exists->count() > 0) {
                  session()->flash('msg-error','Ya existe una Genero con el mismo nombre');
                  $this->resetInput();
                  return;
              }
          }else{
            $exists = Genero::where('nombre', $this->nombre)->select('nombre')->get();
            if ($exists->count() > 0) {
                session()->flash('msg-error','Ya existe una Genero con el mismo nombre');
                $this->resetInput();
                return;
          }
        }

        if ($this->selected_id <= 0) {
            $record = Genero::create([
                'nombre' => $this->nombre
            ]);
        }
        else if($this->selected_id > 0){
            $record = Genero::findOrFail($this->selected_id);

            $record->update([
                'nombre' => $this->nombre
            ]);
        }
        
        // dd($this->selected_id);
        if ($this->selected_id) {
            session()->flash('message','Genero actualizada');
        }else{
            session()->flash('message','Genero creada');
        }

        $this->resetInput();
    }

    public function destroy($id){
         if ($id) {
             $record = Genero::findOrFail($id);
             $record->delete();
             $this->resetInput();
             
         }
    }



    //listeners
    //permiten escuchar eventos y ejecutar acciones
    protected $listeners = [
        'deleteRow' => 'destroy'
    ];
}
