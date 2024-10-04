<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public static function Add(Request $request)
    {
        if ($request->pagamento == 'COD') {
            Venda::create([
                'user_id' => auth()->user()->id,
                'pagamento'  => $request->pagamento,
                'total' => $request->total,
            ]);
        }
    }

    public function listarEncomendas()
    {
        $ecos = Venda::where('aprovada',false)->get();
        $data = [];
        $data['ecos'] = $ecos;

        return view('admin.encomendas',$data);
    }
    public function listarVendas()
    {
        $vendas = Venda::where('aprovada',true)->get();
        $data = [];
        $data['vendas'] = $vendas;

        return view('admin.vendas',$data);
    }

    public function checkout()
    {
        return view('venda.checkout');
    }

    public function encomendar (Request $request)
    {
        $dados = [
            'user_id' => auth()->user()->id,
            'loja_id' => 1,
            'pagamento' => 'COD',
            'total' => $request->total, 
            'endereco' => '0'
        ];
        try {
            Venda::create($dados);
            session()->forget('carrinho');
            return redirect()->back()->with('success', 'Encomenda Finalizada');
        } catch (\Throwable $th) {
            throw $th;
        }

       
    }

    public function finalizar($id)
    {   $venda = Venda::find($id);
        $venda->update(['aprovada' => true,
                        'admin_id' => auth()->user()->id    ]);

        return redirect()->back()->with('success','Venda finalizada com sucesso!');
    }
}
