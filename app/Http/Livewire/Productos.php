<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;

class Productos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $descripcion, $precio, $neto, $bruto, $iva, $mayorista, $online, $stock;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.productos.view', [
            'productos' => Producto::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('precio', 'LIKE', $keyWord)
						->orWhere('neto', 'LIKE', $keyWord)
						->orWhere('bruto', 'LIKE', $keyWord)
						->orWhere('iva', 'LIKE', $keyWord)
						->orWhere('mayorista', 'LIKE', $keyWord)
						->orWhere('online', 'LIKE', $keyWord)
						->orWhere('stock', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->descripcion = null;
		$this->precio = null;
		$this->neto = null;
		$this->bruto = null;
		$this->iva = null;
		$this->mayorista = null;
		$this->online = null;
		$this->stock = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'descripcion' => 'required',
		'precio' => 'required',
		'neto' => 'required',
		'bruto' => 'required',
		'iva' => 'required',
		'mayorista' => 'required',
		'online' => 'required',
		'stock' => 'required',
        ]);

        Producto::create([ 
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'precio' => $this-> precio,
			'neto' => $this-> neto,
			'bruto' => $this-> bruto,
			'iva' => $this-> iva,
			'mayorista' => $this-> mayorista,
			'online' => $this-> online,
			'stock' => $this-> stock
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Producto Successfully created.');
    }

    public function edit($id)
    {
        $record = Producto::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->descripcion = $record-> descripcion;
		$this->precio = $record-> precio;
		$this->neto = $record-> neto;
		$this->bruto = $record-> bruto;
		$this->iva = $record-> iva;
		$this->mayorista = $record-> mayorista;
		$this->online = $record-> online;
		$this->stock = $record-> stock;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'descripcion' => 'required',
		'precio' => 'required',
		'neto' => 'required',
		'bruto' => 'required',
		'iva' => 'required',
		'mayorista' => 'required',
		'online' => 'required',
		'stock' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Producto::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'precio' => $this-> precio,
			'neto' => $this-> neto,
			'bruto' => $this-> bruto,
			'iva' => $this-> iva,
			'mayorista' => $this-> mayorista,
			'online' => $this-> online,
			'stock' => $this-> stock
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Producto Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Producto::where('id', $id)->delete();
        }
    }
}