 
<form method="POST" enctype="multipart/form-data"  action="{{ route('producto.cadastrar') }}">
    @csrf
    
    <!-- Mensagem de Sucesso-->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input class="form-control form-control-lg" type="text" name="nome"
            placeholder="Nome" required/>
    </div>
    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <input class="form-control form-control-lg" type="text" name="descricao"
            placeholder="Descrição" required/>
    </div>
    <div class="mb-3">
        <label class="form-label">Preço</label>
        <input class="form-control form-control-lg" type="number" name="preco"
            placeholder="Preço" required/>
    </div>

    <div class="mb-3">
        <label class="form-label">Quantidade</label>
        <input class="form-control form-control-lg" type="number" name="quantidade"
            placeholder="Quantidade" required/>
    </div>

    <div class="mb-3">
        <label class="form-label">Peso</label>
        <input class="form-control form-control-lg" type="number" name="peso"
            placeholder="Peso" required/>
    </div>

    <div class="mb-3">
        <label class="form-label">Dimensões</label>
        <input class="form-control form-control-lg" type="number" name="dimensoes"
            placeholder="Dimensões" />
    </div>



    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <select class="form-control form-control-lg" name="categoria_id" required>
            @isset($categorias)
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}"> {{ $categoria->nome }}
                    </option>
                @endforeach
            @endisset
        </select>
    </div>
    
    <input type="hidden" name="loja_id" value="{{auth()->user()->loja->id}}">
    <div class="mb-3">
        <label class="form-label">Imagem</label>
        <input class="form-control form-control-lg" type="file" name="foto" required/>
    </div>
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-lg btn-primary">Cadastrar</button>
    </div>
</form>