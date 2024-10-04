<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Morada;
use Illuminate\Support\Facades\DB;


class MoradaController extends Controller
{
    public static function cadastrar($data)
    {

        $morada = Morada::create($data);
        return $morada;
    }

    public static function mostrar($user_id)
    {

        $Morada = DB::table('Morada')
            ->where('user_id', '=',$user_id)->first();
        return $Morada;
    }

    public static function remover($id)
    {
       return Morada::destroy($id);
    }

    public static function editar($id,$data)
    {
        $morada= Morada::find($id);
        $morada->update($data);
        return $morada;
    }
}
