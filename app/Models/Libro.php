<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    
    protected $fillable = ['titulo', 'descripcion', 'fecha_publicacion', 'autor_id'];
    
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}