<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RepollaPaquetesNombre extends Component{
    
    public $selectedId;
    public $isOpen = false;
    public $RS;

    public function render()    {
 		$RS = RepollaPaquetesNombre::all();
        return view('livewire.repolla-paquetes-nombre.index', compact('RS'));    	
    }
	public function showModal()    {
        $this->isOpen = true;
    }

    public function hideModal(){
        $this->isOpen = false;
    }
    
    public function create()
    {
        $this->resetInputFields();
        $this->showModal();
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required|unique:repolla_paquetes_nombre,nombre',
        ]);

        RepollaPaqueteNombre::create([
            'nombre' => $this->nombre
        ]);

        session()->flash('message', 'Paquete creado exitosamente.');
        $this->hideModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $nombre = RepollaPaqueteNombre::findOrFail($id);
        $this->selectedId = $id;
        $this->nombre = $nombre->nombre;
        $this->showModal();
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required|unique:repolla_paquetes_nombre,nombre,' . $this->selectedId,
        ]);

        if ($this->selectedId) {
            $nombre = RepollaPaqueteNombre::find($this->selectedId);
            $nombre->update([
                'nombre' => $this->nombre
            ]);
        }

        session()->flash('message', 'Paquete actualizado exitosamente.');
        $this->hideModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        RepollaPaqueteNombre::find($id)->delete();
        session()->flash('message', 'Paquete eliminado exitosamente.');
    }

    private function resetInputFields()
    {
        $this->nombre = '';
        $this->selectedId = null;
    }
}
