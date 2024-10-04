<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'categoria_id',
        'email',
        'foto',
        'user_id',
    ];

    public function productos ()
    {
        return $this->hasMany(Producto::class);
    }

    public function vendas ()
    {
        return $this->hasMany(Venda::class);
    }

}
