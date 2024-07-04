<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $table = 'cliente';
    protected $primaryKey ='id_cliente';

    public function orden_servicio()
    {
        return $this->hasMany(ordenes::class);
    }

    use HasFactory;
}
