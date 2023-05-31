<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'facturacions';

    protected $fillable = ['tipo','producto','unidad','precio','subtotal','total','conidicionfrentealiva','cuit','cuil'];

}
