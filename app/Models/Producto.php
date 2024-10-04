<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable =[
        'nome',
        'descricao',
        'preco',
        'quantidade',
        'peso',
        'dimensoes',
        'foto',
        'loja_id',
        'categoria_id'

    ];

    public function loja()
    {
        return $this->belongsTo(Loja::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
