<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Venta;

class Ventas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $operacion, $detalle, $monto, $ticket_ventas, $factura_ventas, $cuit, $cuil;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.ventas.view', [
            'ventas' => Venta::latest()
						->orWhere('operacion', 'LIKE', $keyWord)
						->orWhere('detalle', 'LIKE', $keyWord)
						->orWhere('monto', 'LIKE', $keyWord)
						->orWhere('ticket_ventas', 'LIKE', $keyWord)
						->orWhere('factura_ventas', 'LIKE', $keyWord)
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
		$this->operacion = null;
		$this->detalle = null;
		$this->monto = null;
		$this->ticket_ventas = null;
		$this->factura_ventas = null;
		$this->cuit = null;
		$this->cuil = null;
    }

    public function store()
    {
        $this->validate([
		'operacion' => 'required',
		'detalle' => 'required',
		'monto' => 'required',
		'ticket_ventas' => 'required',
		'factura_ventas' => 'required',
		'cuit' => 'required',
		'cuil' => 'required',
        ]);

        Venta::create([
			'operacion' => $this-> operacion,
			'detalle' => $this-> detalle,
			'monto' => $this-> monto,
			'ticket_ventas' => $this-> ticket_ventas,
			'factura_ventas' => $this-> factura_ventas,
			'cuit' => $this-> cuit,
			'cuil' => $this-> cuil
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Venta Successfully created.');
    }

    public function edit($id)
    {
        $record = Venta::findOrFail($id);
        $this->selected_id = $id;
		$this->operacion = $record-> operacion;
		$this->detalle = $record-> detalle;
		$this->monto = $record-> monto;
		$this->ticket_ventas = $record-> ticket_ventas;
		$this->factura_ventas = $record-> factura_ventas;
		$this->cuit = $record-> cuit;
		$this->cuil = $record-> cuil;
    }

    public function update()
    {
        $this->validate([
		'operacion' => 'required',
		'detalle' => 'required',
		'monto' => 'required',
		'ticket_ventas' => 'required',
		'factura_ventas' => 'required',
		'cuit' => 'required',
		'cuil' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Venta::find($this->selected_id);
            $record->update([
			'operacion' => $this-> operacion,
			'detalle' => $this-> detalle,
			'monto' => $this-> monto,
			'ticket_ventas' => $this-> ticket_ventas,
			'factura_ventas' => $this-> factura_ventas,
			'cuit' => $this-> cuit,
			'cuil' => $this-> cuil
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Venta Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Venta::where('id', $id)->delete();
        }
    }
}
