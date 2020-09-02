<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Desarrolladora;
use Livewire\Component;

class Desarrolladoras extends Component
{
    use WithPagination;

    public $nombre, $id_desarrolladora; // campos de la tabla
    public $selected_id;
    public $action = 1; //permite moverse entre tabla y formulario
    private $pagination = 5;

    public function mount(){
        
    }

    public function render()
    {
     
        $data = Desarrolladora::paginate($this->pagination);
        return view('livewire.desarrolladoras.desarrolladoras',[
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
        $record = Desarrolladora::FindOrFail($id);
        $this->nombre = $record->nombre;
        $this->selected_id = $id;
        $this->action = 2;
    }

    public function storeOrUpdate(){
          $this->validate([
              'nombre' => 'required|min:1'
          ]);

          if ($this->selected_id > 0) {
              $exists = Desarrolladora::where('nombre', $this->nombre)->select('nombre')->get();
            //   dd($exists);
              if ($exists->count() > 0) {
                  session()->flash('msg-error','Ya existe una desarrolladora con el mismo nombre');
                  $this->resetInput();
                  return;
              }
          }else{
            $exists = Desarrolladora::where('nombre', $this->nombre)->select('nombre')->get();
            if ($exists->count() > 0) {
                session()->flash('msg-error','Ya existe una desarrolladora con el mismo nombre');
                $this->resetInput();
                return;
          }
        }

        if ($this->selected_id <= 0) {
            $record = Desarrolladora::create([
                'nombre' => $this->nombre
            ]);
        }
        else if($this->selected_id > 0){
            $record = Desarrolladora::findOrFail($this->selected_id);

            $record->update([
                'nombre' => $this->nombre
            ]);
        }
        
        $this->doAction(1);
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
             $record = Desarrolladora::findOrFail($id);
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