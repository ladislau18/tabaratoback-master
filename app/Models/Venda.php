<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin_id',
        'aprovada',
        'pagamento', 
        'total',
        'endereco' ,
        'loja_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class,'admin_id');
    }

    public function loja()
    {
        return $this->belongsTo(Loja::class);
    }


    
}
