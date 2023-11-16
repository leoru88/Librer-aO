<?php

// app/Models/Libro.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $guarded = ['_token'];
    protected $fillable = ['titulo', 'autor', 'anio_publicacion', 'genero'];

}

