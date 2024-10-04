<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telefone;
use Illuminate\Support\Facades\DB;


class TelefoneController extends Controller
{
    public static function cadastrar($data)
    {

        $contacto = Telefone::create($data);
        return $contacto;
    }

    public static function mostrar($user_id)
    {

        $Telefone = DB::table('Telefone')
            ->where('user_id', '=',$user_id)->get();
        return $Telefone;
    }

    public static function remover($id)
    {
       return Telefone::destroy($id);
    }

    public static function editar($id,$data)
    {
        $contacto= Telefone::find($id);
        $contacto->update($data);
        return $contacto;
    }
}
