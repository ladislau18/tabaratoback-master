<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = [
        'telefone',
        'user_id'
    ];
    use HasFactory;
}
