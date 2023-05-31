<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Gasto;

class Gastos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $operacion, $detalle, $monto, $ticket_gastos, $factura_gastos, $cuit, $cuil;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.gastos.view', [
            'gastos' => Gasto::latest()
						->orWhere('operacion', 'LIKE', $keyWord)
						->orWhere('detalle', 'LIKE', $keyWord)
						->orWhere('monto', 'LIKE', $keyWord)
						->orWhere('ticket_gastos', 'LIKE', $keyWord)
						->orWhere('factura_gastos', 'LIKE', $keyWord)
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
		$this->ticket_gastos = null;
		$this->factura_gastos = null;
		$this->cuit = null;
		$this->cuil = null;
    }

    public function store()
    {
        $this->validate([
		'operacion' => 'required',
		'detalle' => 'required',
		'monto' => 'required',
		'ticket_gastos' => 'required',
		'factura_gastos' => 'required',
		'cuit' => 'required',
		'cuil' => 'required',
        ]);

        Gasto::create([ 
			'operacion' => $this-> operacion,
			'detalle' => $this-> detalle,
			'monto' => $this-> monto,
			'ticket_gastos' => $this-> ticket_gastos,
			'factura_gastos' => $this-> factura_gastos,
			'cuit' => $this-> cuit,
			'cuil' => $this-> cuil
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Gasto Successfully created.');
    }

    public function edit($id)
    {
        $record = Gasto::findOrFail($id);
        $this->selected_id = $id; 
		$this->operacion = $record-> operacion;
		$this->detalle = $record-> detalle;
		$this->monto = $record-> monto;
		$this->ticket_gastos = $record-> ticket_gastos;
		$this->factura_gastos = $record-> factura_gastos;
		$this->cuit = $record-> cuit;
		$this->cuil = $record-> cuil;
    }

    public function update()
    {
        $this->validate([
		'operacion' => 'required',
		'detalle' => 'required',
		'monto' => 'required',
		'ticket_gastos' => 'required',
		'factura_gastos' => 'required',
		'cuit' => 'required',
		'cuil' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Gasto::find($this->selected_id);
            $record->update([ 
			'operacion' => $this-> operacion,
			'detalle' => $this-> detalle,
			'monto' => $this-> monto,
			'ticket_gastos' => $this-> ticket_gastos,
			'factura_gastos' => $this-> factura_gastos,
			'cuit' => $this-> cuit,
			'cuil' => $this-> cuil
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Gasto Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Gasto::where('id', $id)->delete();
        }
    }
}