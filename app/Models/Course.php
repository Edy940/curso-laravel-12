<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Indicar o nome da tabela
    protected $table = 'courses';

    // Indicar os campos que podem ser preenchidos
    protected $fillable = [
        'name',
    ];
}
