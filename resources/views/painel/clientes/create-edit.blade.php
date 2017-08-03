@extends('painel.index')
@section('content')

    @if ( isset($cliente))
        
        <h1 class='painel-title'>Clientes - Editar dados</h1>
        
        <div class="row painel-row">
            <div class="col-xs-12"> 
          
                <form class="form-inline" method="post" action="{{route('clientes.update', $cliente->id)}}" enctype="multipart/form-data">    
                {!! method_field('PUT') !!}
   @else
        
        <h1 class='painel-title'>Clientes - Novo cliente</h1>
        <div class="row painel-row">
            <div class="col-xs-12"> 
                <form class="form-inline" method="post" action="{{route('clientes.store')}}" enctype="multipart/form-data">    
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

                            <div class="form-group form-input">
                                <label class="form-label">Nome</label>
                                <input size="35" class="form-control" type='text' name="nome" value="{{$cliente->nome or old('nome')}}" autofocus="">
                            </div>


                        <div class="form-group form-input">  
                            <label class="form-label">Tipo pessoa</label>
                            <select class="form-control" for='tipo_pessoa' id='tipo_pessoa' name ='tipo_pessoa'>    
                                <option></option>
                                <option value="F"   
                                    @if (isset($cliente) && $cliente->tipo_pessoa == "F")
                                        selected 
                                    @endif     
                                >Física</option>
                                
                                <option value="J"
                                    @if (isset($cliente) && $cliente->tipo_pessoa == "J")
                                        selected 
                                    @endif    
                                >Jurídica</option>
                            </select>
                        </div>

                        <div class="form-group form-input">
                            <label class="form-label">CPF/CNPJ</label>
                            <input size="15" class="form-control" type='text' id="cpf_cnpj" name="cpf_cnpj" value="{{$cliente->cpf_cnpj or old('cpf_cnpj')}}">  
                        </div>
            
                        <div class="form-group form-input">
                            <label class="form-label">RG/IE</label>
                            <input size="11" class="form-control" type='text' id="rg_ie" name="rg_ie" value="{{$cliente->rg_ie or old('rg_ie')}}">  
                        </div><br>

                    </div>
                </div>  

                    <div class="panel panel-default">
                        <div class='panel-body'> 
                           
                            <div class="form-group form-input">
                                <label class="form-label">CEP</label>
                                <input size="15" class="form-control" type='text' id="cep" name="cep" value="{{$cliente->cep or old('cep')}}">  
                            </div>

                            <div class="form-group form-input">
                                <label class="form-label">Logradouro</label>
                                <input size="45" class="form-control" type='text' id="logradouro" name="logradouro" value="{{$cliente->logradouro or old('logradouro')}}">  
                            </div>

                            <div class="form-group form-input">
                                <label class="form-label">Número</label>
                                <input size="9" class="form-control" type='text' name="numero" value="{{$cliente->numero or old('numero')}}">  
                            </div>

                            <div class="form-group form-input">
                                <label class="form-label">Complemento</label>
                                <input size="9" class="form-control" type='text' name="complemento" value="{{$cliente->complemento or old('complemento')}}">  
                            </div>

                            <div class="form-group form-input">
                                <label class="form-label">Bairro</label>
                                <input size="15" class="form-control" type='text' id="bairro" name="bairro" value="{{$cliente->bairro or old('bairro')}}">  
                            </div>

                            <div class="form-group form-input">
                                <label class="form-label">Cidade</label>
                                <input size="30" class="form-control" type='text' id="localidade" name="localidade" value="{{$cliente->localidade or old('localidade')}}">  
                            </div>

                            <div class="form-group form-input">
                                <label class="form-label">Estado</label>
                                <input size="6" class="form-control" type='text' id="uf" name="estado" value="{{$cliente->estado or old('estado')}}">  
                            </div>
                        </div>
                    </div>

                     <div class="panel panel-default">
                        <div class='panel-body'> 
                            
                            <div class="form-group form-input">
                                <label class="form-label">Telefone Residencial</label>
                                <input size="15" class="form-control" type='text' id="fone_res" name="fone_res" value="{{$cliente->fone_res or old('fone_res')}}">  
                            </div>

                             <div class="form-group form-input">
                                <label class="form-label">Telefone Comercial</label>
                                <input size="15" class="form-control" type='text' id="fone_com" name="fone_com" value="{{$cliente->fone_com or old('fone_com')}}">  
                            </div>
                           
                            <div class="form-group form-input">
                                <label class="form-label">Celular</label>
                                <input size="15" class="form-control" type='text' id="celular" name="celular" value="{{$cliente->celular or old('celular')}}">  
                            </div>

                            <div class="form-group form-input">
                                <label class="form-label">E-mail</label>
                                <input size="30" class="form-control" type='email' name="email" value="{{$cliente->email or old('email')}}">  
                            </div>
                        </div>  
                    </div>
                     
                    <a href="{{url('/painel/clientes')}}" class="btn btn-primary form-btns" title="Voltar">
                        <span class="fa fa-reply"></span> 
                    </a>
                    <button class="btn btn-primary form-btns" title="Salvar"> <span class="fa fa-save"></span></button>
                </form>  
            </div>
        </div>    
@endsection

@section('post-script')
     <script src="{{url('assets/painel/js/jquery.maskedinput.min.js')}}"></script>
     <script src="{{url('assets/all/js/buscalogradouro.js')}}"></script>
@endsection                          