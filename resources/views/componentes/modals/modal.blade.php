<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/estilo-home.css">

<!--Modals area -->
<div class="modals-area">

    <div class="modal fade" id="CB1-modal" tabindex="-1" aria-labelledby="modal-title"
     aria-hidden="true"
    >
        <div class="modal-dialog">
             <div class="modal-content">




                @isset($productos)

                @foreach ($productos as $productos)



               <div class="modal-header">
                    <h4 class="modal-title">Comerciante:{{$producto->comerciante_id}}</h4>
                    <button type="button" class="btn-close" data-toggle="modal"
                       data-bs-dismiss="modal" aria-label="Close" data-whatever="@mdo"></button>
               </div>

               <div class="modal-body content-items-center justify-content-center">
               <div class="info">
                  <div class="img1-CB">{{$producto->foto}}</div>
                  <h5>{{$producto->nome}}</h5>
                  <p class="preco_produto  my-4 text-danger fw-bold">{{$producto->preco}}</p>
                  <P class="local lead ">{{$producto->categoria_id}}</P>
                  @csrf
                  <button  class="btn btn-outline-success fw-bold " >Localização Pelo Google</button>
               </div>


                 @endforeach

               @endisset

               </div>


               <div class="footer-modal">
                   <button class="btn btn-danger" id="btn-carrinho"> Adicionar ao carrinho </button>
                    <button class="btn btn-warning" > Fechar </button>
               </div>


             </div>
        </div>
    </div>



</div>
