@extends('painel.index')
@section('content')

    @if ( isset($usuario))
        
        <h1 class='painel-title'>Usuario - Editar dados</h1>
        
        <div class="row painel-row">
            <div class="col-xs-12"> 
          
                <form class="form-inline" method="post" action="{{route('usuarios.update', $usuario->id)}}" enctype="multipart/form-data">    
                {!! method_field('PUT') !!}
   @else
        
        <h1 class='painel-title'>Novo usuário</h1>
        <div class="row painel-row">
            <div class="col-xs-12"> 
                <form class="form-inline" method="post" action="{{route('usuarios.store')}}" enctype="multipart/form-data">    
    @endif
    
                    @if (isset($errors) && count($errors) > 0)
                        <div class="alert alert-danger">
                             <p>Sistema Informa:</p>
                             @foreach($errors->all() as $error)
                                 <p>{{$error}}</p>
                             @endforeach
                        </div>
                    @endif

                    {!! csrf_field()!!}     
                         
                    <div class="panel panel-default">
                        <div class='panel-body'>
                            
                            <div class="foto-cadastro">
                                @if ( isset ($nm_imagem))
                                   
                                    <h5>Foto do usuário</h5>
                                    <div  id="foto">
                                       <img class="img-thumbnail renderiza-fotos-cadastro" src="{{url('storage/img-usuarios') . '/' . $nm_imagem}}">      
                                    </div>
                                    <hr>
                                    <input class='hide' id="imagem" type="file" name="photos[]" multiple />
                                    <label for='imagem' class='btn btn-primary btn-foto' title="Selecionar em arquivos">Selecionar</label>  
                                    <!--<label for='imagem' class='btn btn-primary btn-foto' title="Foto Webcam"><span class="fa fa-camera"></span></label>-->                         
                
                                @else              
                                        
                                    <h5>Foto do usuário</h5>
                                    <div id="foto"></div>
                                    <hr>
                                    <input class='hide' id="imagem" type="file" name="photos[]" multiple />
                                    <label for='imagem' class='btn btn-primary btn-foto' title="Selecionar em arquivos">Selecionar</label>
                                    <!--<label for='imagem' id="webcam" class='btn btn-primary btn-foto' title="Foto Webcam"><span class="fa fa-camera"></span></label>-->

                                @endif  
                            </div>    
                          
                            <div class="form-group form-input">
                                <label class="form-label">Nome</label>
                                <input size="50" class="form-control" type='text' name="name" value="{{$usuario->name or old('name')}}" autofocus="">
                            </div><br>

                            <div class="form-group form-input">
                                <label class="form-label">E-mail</label>
                                <input size="50" class="form-control" type='text' id="email" name="email" value="{{$usuario->email or old('email')}}">  
                            </div><br>
                
                            <div class="form-group form-input">
                                <label class="form-label">Senha</label>
                                <input size="15" class="form-control" type='password' id="password" name="password" value="{{$usuario->password or old('password')}}">  
                            </div>
                       </div>
                   </div>  

                    <a href="{{url('/painel/usuarios')}}" class="btn btn-primary form-btns" title="Voltar">
                        <span class="fa fa-reply"></span> 
                    </a>
    
                    <button class="btn btn-primary form-btns" title="Salvar"> <span class="fa fa-save"></span></button>

                </form>  
            </div>
        </div>    
@endsection

@section('post-script')
     <script src="{{url('assets/painel/js/uploadFotoCadastro.js')}}"></script>
@endsection                          