<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $data = [];
        $productos = Producto::all();
        $data['productos'] = $productos;

        return view('home', $data); // Colocar aqui a View

    }
    public function listarAdmin()
    {
        $data = [];
        $productos = Producto::all();
        $data['productos'] = $productos;

        return view('producto.listarProductos', $data); // Colocar aqui a View

    }


    public function listarProductosCategoria($id)
    {
        $data = [];
        $productos = Producto::where('categoria_id', $id)->get();
        $data['productos'] = $productos;


        return view('', $data); // Colocar aqui a View

    }

    public function listarProductosLoja()
    {
       
        $productos = auth()->user()->loja->productos;
        $data['productos'] = $productos;
        

        return view('producto.listarProductosLoja', $data);
    }

    public function listarProductosEstabelecimento($comerciante_id, $estabelecimento_id)
    {
        $data = [];
        $productos = Producto::where('comerciante_id', $comerciante_id)->get();
        $data['productos'] = $productos;
        $data['estabelecimento_id'] = $estabelecimento_id;
        $data['comerciante_id'] = $comerciante_id;

        return view('producto.listarestabelecimento', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cadastrarView()
    {
        $data = [];
        $categorias = Categoria::all();
        $data['categorias'] = $categorias;

        return view('producto.cadastrar',$data);

    }
    public function cadastrar(Request $request)
    {
        try {
            $producto = Producto::create($request->all());


            if ($request->hasfile('foto') && $request->file('foto')->isValid()) {



                $data = [];
                $ext = $request->foto->extension();
                $fullname = "{$request->nome}.{$producto->id}.{$ext}";
                $data['foto'] = $fullname;
                $upload = $request->foto->move(public_path('images'), $fullname);
                $producto->update($data);


                if (!$upload) {
                    return redirect()->back()->with('error', 'erro ao fazer upload');
                }
            }
            return redirect()->back()->with('message', 'Producto cadastrado com sucesso!');
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remover($id)
    {
        $producto = Producto::find($id);
        $producto->destroy();

        return redirect()->back();


        
    }


}
