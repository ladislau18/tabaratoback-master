<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morada extends Model
{
    protected $fillable = [
        'provincia',
        'municipio',
        'bairro',
        'rua',
        'residencia',
        'user_id'
    ];
    use HasFactory;
}
