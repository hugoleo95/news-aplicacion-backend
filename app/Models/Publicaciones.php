<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'texto',
        'cod_categoria',
        'cod_pais',
        'etiquetas'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class);
    }

    public function pais()
    {
        return $this->belongsTo(Paises::class);
    }
}
