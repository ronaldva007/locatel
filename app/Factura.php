<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
   protected $fillable = ['factura', 'cod_pro', 'f_ingreso', 'carta', 'f_modifica', 'f_verifica', 'migo', 'orden_compra', 'observacion', 'status'];

    protected $guarded = ['id'];

    public function proveedor()
    {
    	return $this->hasMany('Proveedor::class');
    }
}
