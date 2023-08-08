<?php

namespace App\Http\Livewire;


use App\Models\RepollaPaquetesNombre;
//use Livewire\WithPagination;
use Livewire\Component;


class RpPaquetes extends Component{
	//use WithPagination;

	public $crear_pq = false;

	public $bandera = "Empezando";
	public $view = 'create';

	public $nombre;


    public function render(){
    	$paquetes = RepollaPaquetesNombre::paginate(10);
        return view('livewire.rp-paquetes',compact('paquetes'));
    }
	public function crear(){
		dd("creando");
		// // \Log::debug('Voy por aca');
		// $insertar = array();
		// $insertar['nombre'] = "algo";
		// $insertar['veces'] = 1;
		// $insertar['cantidad'] = 100;
		// $insertar['cifras'] = 4;
		// $insertar['vence'] = "2024-01-01";
		// //dd($insertar);
		// $this->bandera = "por aca";
		// RepollaPaquetesNombre::create($insertar);

	}    
}
