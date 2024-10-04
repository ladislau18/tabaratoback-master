<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias_Lojas extends Model
{
    use HasFactory;
    protected $table =['categorias_lojas'];
    protected $fillable = [
        'nome'
    ];
}
