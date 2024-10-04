<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{

    public function carrinho ()
    {
        return view('venda.carrinho');
    }
    public function Add ($id)
    {
        $producto = Producto::find($id);

        $carrinho = session()->get('carrinho',[]);

        if(isset($carrinho[$id]))
        {
            $carrinho[$id]['quantidade']++;
        }
        else
        {
            $carrinho[$id] = [
                'nome' => $producto->nome,
                'quantidade' => 1,
                'preco' => $producto->preco,
                'foto' => $producto->foto,
            ];
        }
        session()->put('carrinho',$carrinho);
       // return redirect()->back()->with('success','Producto Adicionado com sucesso!');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantidade){
            $carrinho = session()->get('carrinho');
            $carrinho[$request->id]["quantidade"] = $request->quantidade;
            session()->put('carrinho', $carrinho);
            session()->flash('success', 'Carrinho actualizado com sucesso!');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $carrinho = session()->get('carrinho');
            if(isset($carrinho[$request->id])) {
                unset($carrinho[$request->id]);
                session()->put('carrinho', $carrinho);
            }
            session()->flash('success', 'Producto removido com sucesso!');
        }
    }
}
