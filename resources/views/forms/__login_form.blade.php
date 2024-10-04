 <form method="POST" enctype="multipart/form-data" action="{{ route('login') }}">
     @csrf

     <!-- Mensagem de Sucesso-->
     @if (session()->has('message'))
         <div class="alert alert-danger">
             {{ session()->get('message') }}
         </div>
     @endif


     <div class="mb-3">
         <label class="form-label">Username</label>
         <input class="form-control form-control-lg" type="text" name="username" placeholder="Username" required />
     </div>


     <div class="mb-3">
         <label class="form-label">Password</label>
         <input class="form-control form-control-lg" type="password" name="password" placeholder="Password" required />
     </div>





     <div class="text-center mt-3">
         <button type="submit" class="btn btn-lg btn-primary">Login</button>
     </div>
 </form>
