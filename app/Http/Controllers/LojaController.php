<?php

namespace App\Http\Controllers;

use App\Models\Categorias_Lojas;
use App\Models\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class LojaController extends Controller
{
    public function listar()
    {
        $data = [];
        $lojas = Loja::all();
        $data['lojas'] = $lojas;
        return view('loja.listar', $lojas);
    }

    public function dashboard()
    {

        $data = [];
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
        
        $total_de_vendas = 0;
        $vendasConfirmadas = [];
        foreach (auth()->user()->loja->vendas as $venda) {
            
            if($venda->aprovada)
            {
                $total+= $venda->total;
                $total_de_vendas++;
                array_push($vendasConfirmadas,$venda);
            } 
        }
        foreach ($vendasConfirmadas as $venda) {
            
            switch ($venda->created_at->format('M')) {
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
        $data['total_de_vendas'] = $total_de_vendas;
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
        //$data['meses'] = $meses;
        return view('loja.dashboard.index',$data);
    }

    public function cadastrarView()
    {
        $data = [];
        $categorias = DB::select('select * from categorias_lojas');
        $data['categorias'] = $categorias;
        return view('loja.cadastrar', $data);
    }

    public function cadastrar(Request $request)
    {
        $loja = Loja::create($request->all());


        if ($request->hasfile('foto') && $request->file('foto')->isValid()) {



            $data = [];
            $ext = $request->foto->extension();
            $fullname = "{$request->nome}.{$loja->id}.{$ext}";
            $data['foto'] = $fullname;
            $upload = $request->foto->move(public_path('images'), $fullname);
            $loja->update($data);


            if (!$upload) {
                return redirect()->back()->with('error', 'erro ao fazer upload');
            }
        }


        return redirect()->route('loja.dashboard');
    }

    public function mostrar($id)
    {
        $loja = Loja::find($id);

        return view('loja.listar');
    }

    public function remover($id)
    {
        Loja::destroy($id);

        return redirect()->back()->with('message', 'removido com sucesso!');
    }
}
