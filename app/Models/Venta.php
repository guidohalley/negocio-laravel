<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'ventas';

    protected $fillable = ['operacion','detalle','monto','ticket_ventas','factura_ventas','cuit','cuil'];
	
}
