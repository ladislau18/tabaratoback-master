 <form method="POST" enctype="multipart/form-data" action="{{route('user.cadastrar')}}">
     @csrf

     <!-- Mensagem de Sucesso-->
     @if (session()->has('message'))
         <div class="alert alert-success">
             {{ session()->get('message') }}
         </div>
     @endif
     <div id="stepform">
         <h3>Conta</h3>
         <section>
             <div class="mb-3">
                 <label class="form-label">Nome</label>
                 <input class="form-control form-control-lg" type="text" name="name" placeholder="Nome" required />
             </div>

             <div class="mb-3">
                 <label class="form-label">Sobrenome</label>
                 <input class="form-control form-control-lg" type="text" name="sobrenome" placeholder="Sobrenome"
                     required />
             </div>

             <div class="mb-3">
                 <label class="form-label">Username</label>
                 <input class="form-control form-control-lg" type="text" name="username" placeholder="Username"
                     required />
             </div>


             <div class="mb-3">
                 <label class="form-label">Email</label>
                 <input class="form-control form-control-lg" type="email" name="email" placeholder="Email" required />
             </div>

             <div class="mb-3">
                 <label class="form-label">Password</label>
                 <input class="form-control form-control-lg" type="password" name="password" placeholder="Password"
                     required />
             </div>
             <div class="mb-3">
                <label class="form-label">Género</label>
                <select class="form-control form-control-lg" name="genero" placeholder="Género" required>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
            </div>

             <div class="mb-3">
                 <label class="form-label">Data de Nascimento</label>
                 <input class="form-control form-control-lg" type="date" name="data_nascimento" placeholder=""
                     required />
             </div>


         </section>
         <section>
             <h3>Morada</h3>
             <div class="mb-3">
                 <label class="form-label">Província</label>
                 <select class="form-control form-control-lg" name="provincia" placeholder="Província" required>
                     <option value="Luanda">Luanda</option>
                 </select>
             </div>

             <div class="mb-3">
                 <label class="form-label">Município</label>
                 <select class="form-control form-control-lg" name="municipio" placeholder="Município" required>
                     <option value="Cazenga">Cazenga</option>
                 </select>
             </div>
             <div class="mb-3">
                 <label class="form-label">Bairro</label>
                 <input class="form-control form-control-lg" type="text" name="bairro" placeholder="Bairro" required />
             </div>

             <div class="mb-3">
                 <label class="form-label">Rua</label>
                 <input class="form-control form-control-lg" type="text" name="rua" placeholder="Rua" required />
             </div>

             <div class="mb-3">
                 <label class="form-label">Residência</label>
                 <input class="form-control form-control-lg" type="text" name="residencia" placeholder="Residencia"
                     required />
             </div>

             <div class="mb-3">
                 <label class="form-label">NIF</label>
                 <input class="form-control form-control-lg" type="text" name="nif" placeholder="NIF" required />
             </div>

         </section>
         <section>
             <h3>Contactos</h3>
             <div class="mb-3">
                 <label class="form-label">Telefone</label>
                 <input class="form-control form-control-lg" type="number" name="numero" placeholder="Telefone" required />
             </div>
         </section>


     </div>



     <div class="text-center mt-3">
         <button type="submit" class="btn btn-lg btn-primary">Criar Conta</button>
     </div>
 </form>
