<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\MoradaController;
use App\Http\Controllers\TelefoneController;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\EmailManager;
use App\Models\Comerciante;
use App\Models\Comerciantes_Usuarios;
use App\Models\Venda;
use Illuminate\Http\JsonResponse;

class UserController extends Controller

{

    public function create()
    {
        return view('usuarios.cadastrar');
    }
    static function verificarUsername($username)
    {

        $users =  User::all();

        foreach ($users as $user) {
            if ($username==$user->username) {
                return true;
            }
        }

        return false;
    }
    public function cadastrar(Request $req)
    {
       if (EmailManager::EmailValido($req->email) || UserController::verificarUsername($req->username)) {

        }



        $user = User::create([
            'name' => $req->name,
            'username' => $req->username,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'sobrenome' => $req->sobrenome,
            'genero' => $req->genero,
            'nif' => $req->nif,
            'data_nascimento' => $req->data_nascimento,
            //'foto',
            'id_tipo' => 2
        ]);
        MoradaController::cadastrar([
            'provincia' => $req->provincia,
            'municipio' => $req->municipio,
            'bairro' => $req->bairro,
            'rua' => $req->rua,
            'residencia' => $req->residencia,
            'user_id' => $user->id
        ]);

        TelefoneController::cadastrar([
            'telefone' => $req->telefone,
            'user_id' => $user->id
        ]);
        return redirect('login');
    }

    public function listar()
    {
        $data = [];
        
        $users = User::all();

        $data['users'] = $users;
        return view('admin.users',$data);


    }

   
    public function mostrar($id)
    {
        $data = [];
        $user = User::find($id);
        $morada = MoradaController::mostrar($id);
        $telefones = TelefoneController::mostrar($id);

        $data['user'] = $user;
        $data['morada'] = $morada;
        $data['telefones'] = $telefones;

        return $data;
    }


    public function editar($id, Request $req)
    {

        $aluno = User::find($id);
        $aluno->update($req->all());
        return $aluno;
    }

    public function remover($id)
    {

        return User::destroy($id);
    }

    public function dashboard()
    {

        //Meses Var

        $total = 0;

        $mes =  date('M');
        $me_count = 0;
        $jan = 0;
        $feb = 0;
        $march = 0;
        $april = 0;
        $may = 0;
        $june = 0;
        $july = 0;
        $aug = 0;
        $sept = 0;
        $oct = 0;
        $nov = 0;
        $dec = 0;

        $tjan = 0;
        $tfeb = 0;
        $tmarch = 0;
        $tapril = 0;
        $tmay = 0;
        $tjune = 0;
        $tjuly = 0;
        $taug = 0;
        $tsept = 0;
        $toct = 0;
        $tnov = 0;
        $tdec = 0;

        //Meses VarF


        $encomendas = Venda::where('aprovada',false)->get();
        $totalLucro = 0.00;
        $vendas = Venda::where('aprovada',true)->get();
        foreach ($vendas as $venda) {
            $totalLucro+= $venda->total;
        }
        $totalLucro *= 0.02;

        // Vendas de Cada Mes
        

        foreach ($vendas as  $venda) {
            switch($venda->created_at->format('M')) {
            case 'Jan':
                    $jan++;
                    $tjan+=$venda->total;
                    break;
                case 'Feb':
                    $feb++;
                    $tfeb+=$venda->total;
                    break;
                case 'March':
                    $march++;
                    $tmarch+=$venda->total;
                    break;

                case 'Apr':
                    $april++;
                    $tapril+=$venda->total;
                    break;


                case 'May':
                    $may++;
                    $tmay+=$venda->total;
                    break;
                case 'June':
                    $june++;
                    $tjune+=$venda->total;
                    break;

                case 'July':
                    $july++;
                    $tjuly+=$venda->total;
                    break;
                case 'Aug':
                    $aug++;
                    $taug+=$venda->total;
                    break;
                case 'Sept':
                    $sept++;
                    $tsept+=$venda->total;
                    break;
                case 'Oct':
                    $oct++;
                    $toct+=$venda->total;
                    break;
                case 'Nov':
                    $nov++;
                    $tnov+=$venda->total;
                    break;
                case 'Dec':
                    $dec++;
                    $tdec+=$venda->total;
                    break;
                default:
                    # code...
                    break;
            }
            $me_count++;
            if($venda->created_at->format('M') == $mes)
            {
                break;
            }
        }

        $data['encomendas'] = $encomendas;
        $data['vendas'] = $vendas;
        $data['totalLucro'] = $totalLucro;

        // Vendas Data Var
        $data['jan'] = $jan;
        $data['feb'] = $feb;
        $data['march'] = $march;
        $data['april'] = $april;
        $data['may'] = $may;
        $data['june'] = $june;
        $data['july'] = $july;
        $data['aug'] = $aug;
        $data['sept'] = $sept;
        $data['oct'] = $oct;
        $data['nov'] = $nov;
        $data['dec'] = $dec;
        
        $data['tjan'] = $tjan;
        $data['tfeb'] = $tfeb;
        $data['tmarch'] = $tmarch;
        $data['tapril'] = $tapril;
        $data['tmay'] = $tmay;
        $data['tjune'] = $tjune;
        $data['tjuly'] = $tjuly;
        $data['taug'] = $taug;
        $data['tsept'] = $tsept;
        $data['toct'] = $toct;
        $data['tnov'] = $tnov;
        $data['tdec'] = $tdec;
        
        $data['total'] = $total;
        $data['me_count'] = 3;
        // Vendas Data VarF
        return view('admin.index',$data);
    }
}
