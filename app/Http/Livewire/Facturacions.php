<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Facturacion;

class Facturacions extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo, $producto, $unidad, $precio, $subtotal, $total, $conidicionfrentealiva, $cuit, $cuil;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.facturacions.view', [
            'facturacions' => Facturacion::latest()
						->orWhere('tipo', 'LIKE', $keyWord)
						->orWhere('producto', 'LIKE', $keyWord)
						->orWhere('unidad', 'LIKE', $keyWord)
						->orWhere('precio', 'LIKE', $keyWord)
						->orWhere('subtotal', 'LIKE', $keyWord)
						->orWhere('total', 'LIKE', $keyWord)
						->orWhere('conidicionfrentealiva', 'LIKE', $keyWord)
						->orWhere('cuit', 'LIKE', $keyWord)
						->orWhere('cuil', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->tipo = null;
		$this->producto = null;
		$this->unidad = null;
		$this->precio = null;
		$this->subtotal = null;
		$this->total = null;
		$this->conidicionfrentealiva = null;
		$this->cuit = null;
		$this->cuil = null;
    }

    public function store()
    {
        $this->validate([
		'tipo' => 'required',
		'producto' => 'required',
		'unidad' => 'required',
		'precio' => 'required',
		'subtotal' => 'required',
		'total' => 'required',
		'conidicionfrentealiva' => 'required',
		'cuit' => 'required',
		'cuil' => 'required',
        ]);

        Facturacion::create([
			'tipo' => $this-> tipo,
			'producto' => $this-> producto,
			'unidad' => $this-> unidad,
			'precio' => $this-> precio,
			'subtotal' => $this-> subtotal,
			'total' => $this-> total,
			'conidicionfrentealiva' => $this-> conidicionfrentealiva,
			'cuit' => $this-> cuit,
			'cuil' => $this-> cuil
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Facturacion Successfully created.');
    }

    public function edit($id)
    {
        $record = Facturacion::findOrFail($id);
        $this->selected_id = $id;
		$this->tipo = $record-> tipo;
		$this->producto = $record-> producto;
		$this->unidad = $record-> unidad;
		$this->precio = $record-> precio;
		$this->subtotal = $record-> subtotal;
		$this->total = $record-> total;
		$this->conidicionfrentealiva = $record-> conidicionfrentealiva;
		$this->cuit = $record-> cuit;
		$this->cuil = $record-> cuil;
    }

    public function update()
    {
        $this->validate([
		'tipo' => 'required',
		'producto' => 'required',
		'unidad' => 'required',
		'precio' => 'required',
		'subtotal' => 'required',
		'total' => 'required',
		'conidicionfrentealiva' => 'required',
		'cuit' => 'required',
		'cuil' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Facturacion::find($this->selected_id);
            $record->update([
			'tipo' => $this-> tipo,
			'producto' => $this-> producto,
			'unidad' => $this-> unidad,
			'precio' => $this-> precio,
			'subtotal' => $this-> subtotal,
			'total' => $this-> total,
			'conidicionfrentealiva' => $this-> conidicionfrentealiva,
			'cuit' => $this-> cuit,
			'cuil' => $this-> cuil
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Facturacion Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Facturacion::where('id', $id)->delete();
        }
    }
}
