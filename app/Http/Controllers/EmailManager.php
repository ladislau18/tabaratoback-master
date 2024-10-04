<?php

namespace App\Http\Controllers;

use App\Mail\MudarSenha;
//use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UserController;
use App\Models\User;


class EmailManager extends Controller
{
    public static function EmailValido($email)
    {
        $u = new UserController;
        $users = $u->listar();

        foreach ($users as $user) {
            if ($email == $user->email) {
                return true;
            }
        }

        return false;
    }
    
    public static function Password($email, $codigo)
    {
        $user = User::where('email',$email)->first();

        Mail::to($email)->send(new MudarSenha($codigo));
        return new JsonResponse(
            [
                'success' => true,
                'id' => $user->id,
                'message' => "Foi enviado um código de recuperação para o seu email!"
            ],
            200
        );
    }
}
