<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'gastos';

    protected $fillable = ['operacion','detalle','monto','ticket_gastos','factura_gastos','cuit','cuil'];
	
}
