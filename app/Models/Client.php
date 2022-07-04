<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    //Dentro de este array se pueden especificar cuáles de los campos de la tabla pueden ser llenados con asignación masiva (que es el caso cuando enviamos un formulario creando un array asociativo para ser guardado).
    protected $fillable = ['sku','name', 'amount', 'price', 'description'];
  
}
