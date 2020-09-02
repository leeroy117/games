<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Clasificacion;
use Livewire\Component;

class Clasificaciones extends Component
{
    use WithPagination;

    public $nombre, $id_clasificacion; // campos de la tabla
    public $selected_id;
    public $action = 1; //permite moverse entre tabla y formulario
    private $pagination = 5;

    public function render()
    {
        $data = Clasificacion::paginate($this->pagination);
        return view('livewire.clasificaciones.clasificaciones',[
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
        $record = Clasificacion::FindOrFail($id);
        $this->nombre = $record->nombre;
        $this->selected_id = $id;
        $this->action = 2;
    }

    public function storeOrUpdate(){
          $this->validate([
              'nombre' => 'required|min:1'
          ]);

          if ($this->selected_id > 0) {
              $exists = Clasificacion::where('nombre', $this->nombre)->select('nombre')->get();
            //   dd($exists);
              if ($exists->count() > 0) {
                  session()->flash('msg-error','Ya existe una desarrolladora con el mismo nombre');
                  $this->resetInput();
                  return;
              }
          }else{
            $exists = Clasificacion::where('nombre', $this->nombre)->select('nombre')->get();
            if ($exists->count() > 0) {
                session()->flash('msg-error','Ya existe una desarrolladora con el mismo nombre');
                $this->resetInput();
                return;
          }
        }

        if ($this->selected_id <= 0) {
            $record = Clasificacion::create([
                'nombre' => $this->nombre
            ]);
        }
        else if($this->selected_id > 0){
            $record = Clasificacion::findOrFail($this->selected_id);

            $record->update([
                'nombre' => $this->nombre
            ]);
        }
        
        // dd($this->selected_id);
        if ($this->selected_id) {
            session()->flash('message','Desarrolladora actualizada');
        }else{
            session()->flash('message','Desarrolladora creada');
        }

        $this->resetInput();
 }

    public function destroy($id){
         if ($id) {
             $record = Clasificacion::findOrFail($id);
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
