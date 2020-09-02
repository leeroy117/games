<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Juego;
use App\Genero;
use App\Desarrolladora;
use App\Clasificacion;
use Livewire\WithPagination;
use Livewire\Component;

class Juegos extends Component
{
    use WithPagination;

    public $nombre, $precio_pc, $precio_xbox, $precio_ps, $sinopsis, $imagen, 
    $generos_id_genero, $clasificaciones_id_clasificacion, $desarrolladoras_id_desarrolladora, $video;
    public $selected_id;
    public $action = 1; //permite moverse entre tabla y formulario
    private $pagination = 5;

    public function render()
    {
        $generos = Genero::all();
        $desarrolladoras = Desarrolladora::all();
        $clasificaciones = Clasificacion::all();
        $data = DB::select('SELECT * FROM vJuegos');
        return view('livewire.juegos.juegos',[
            'data' => $data,
            'generos' => $generos,
            'clasificaciones' => $clasificaciones,
            'desarrolladoras' => $desarrolladoras
        ]);
    }
    
    public function handleFileUpload($imageData){
        $this->imagen =  $imageData;
    }

     //permite moverse entre tabla y formulario
     public function doAction($action){
        $this->action = $action;
        $this->resetInput();
    }

    public function resetInput(){
        $this->nombre = ''; 
        $this->precio_pc ='';
        $this->precio_xbox='';
        $this->precio_ps ='';
        $this->sinopsis ='';
        $this->imagen = null;
        $this->desarrolladoras_id_desarrolladora = '';
        $this->clasificaciones_id_clasificacion = '';
        $this->generos_id_genero = '';
        $this->selected_id = null;
        $this->video = '';
    }

    public function edit($id){
        $record = Juego::FindOrFail($id);
        $this->nombre = $record->nombre;
        $this->precio_pc = $record->precio_pc;
        $this->precio_xbox = $record->precio_xbox;
        $this->precio_ps = $record->precio_ps;
        $this->sinopsis = $record->sinopsis;
        $this->imagen = $record->imagen;
        $this->desarrolladoras_id_desarrolladora = $record->desarrolladoras_id_desarrolladora;
        $this->clasificaciones_id_clasificacion = $record->clasificaciones_id_clasificacion;
        $this->generos_id_genero = $record->generos_id_genero;
        $this->video = $record->video;
        
        $this->selected_id = $id;
        $this->action = 2;
    }

    public function storeOrUpdate(){
          $rules =[
              'nombre' => 'required',
              'precio_pc' => 'required',
              'precio_xbox' => 'required',
              'precio_ps' => 'required',
              'sinopsis' => 'required',
            //   'imagen' => 'required',
              'generos_id_genero' => 'required',
              'clasificaciones_id_clasificacion' => 'required',
              'desarrolladoras_id_desarrolladora' => 'required'
            ];

          $customMessages =[
              'nombre.required' => 'El campo nombre es requerido',
              'precio_pc.required' => 'El campo precio pc es requerido',
              'precio_xbox.required' => 'El campo precio xbox es requerido',
              'precio_ps.required' => 'El campo precio play station es requerido',
              'sinopsis.required' => 'El campo sinopsis es requerido',
            //   'imagen.required' => 'El campo imagen es requerido',
              'generos_id_genero.required' => 'El campo genero es requerido',
              'clasificaciones_id_clasificacion.required' => 'El campo clasificacion es requerido',
              'desarrolladoras_id_desarrolladora.required' => 'El campo desarrolladora es requerido'
          ];

          $imagen = $this->storeImage();
           
          $this->validate($rules, $customMessages);

        //   if ($this->selected_id > 0) {
        //       $exists = Juego::where('nombre', $this->nombre)->select('nombre')->get();
        //     //   dd($exists);
        //       if ($exists->count() > 0) {
        //           session()->flash('msg-error','Ya existe un juego con el mismo nombre');
        //           $this->resetInput();
        //           return;
        //       }
        //   }else{
        //     $exists = Juego::where('nombre', $this->nombre)->select('nombre')->get();
        //     if ($exists->count() > 0) {
        //         session()->flash('msg-error','Ya existe un juego con el mismo nombre');
        //         $this->resetInput();
        //         return;
        //   }
        // }
        //  dd($this->video);
        if ($this->selected_id <= 0) {
            $record = Juego::create([
                'nombre' => $this->nombre,
                'precio_pc' => $this->precio_pc,
                'precio_xbox' => $this->precio_xbox,
                'precio_ps' => $this->precio_pc,
                'sinopsis' => $this->sinopsis,
                'imagen' => $imagen,
                'generos_id_genero' => $this->generos_id_genero,
                'clasificaciones_id_clasificacion' => $this->clasificaciones_id_clasificacion,
                'desarrolladoras_id_desarrolladora' => $this->desarrolladoras_id_desarrolladora,
                'video' => $this->video
            ]);
        }
        else if($this->selected_id > 0){
            $record = Juego::findOrFail($this->selected_id);

            $record->update([
                'nombre' => $this->nombre,
                'precio_pc' => $this->precio_pc,
                'precio_xbox' => $this->precio_xbox,
                'precio_ps' => $this->precio_pc,
                'sinopsis' => $this->sinopsis,
                'imagen' => $imagen,
                'generos_id_genero' => $this->generos_id_genero,
                'clasificaciones_id_clasificacion' => $this->clasificaciones_id_clasificacion,
                'desarrolladoras_id_desarrolladora' => $this->desarrolladoras_id_desarrolladora,
                'video' => $this->video
            ]);
        }
        
        
        // dd($this->selected_id);
        if ($this->selected_id) {
            session()->flash('message','Juego actualizado');
        }else{
            session()->flash('message','Juego creado');
        }
        $this->doAction(1);
        $this->resetInput();
 }

    public function storeImage(){
        if(!$this->imagen){
            return null;
        }   
       
        $name = Str::random(). '.jpg';
        $img = ImageManagerStatic::make($this->imagen)->encode('jpg');
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    // public function getImagePathAttribute(){
    //     return Storage::disk('public')->url($this->imagen);
    // }

    public function destroy($id){
         if ($id) {
             $record = Juego::findOrFail($id);
             $record->delete();
             $this->resetInput();
             
         }
    }



    //listeners
    //permiten escuchar eventos y ejecutar acciones
    protected $listeners = [
        'deleteRow' => 'destroy',
        'fileUpload' =>'handleFileUpload'
    ];
}
