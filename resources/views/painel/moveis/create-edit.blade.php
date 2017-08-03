@extends('painel.index')
@section('content')

    @if ( isset($movel))
        <div class="row painel-row">
            <div class="col-xs-12">
                <h1>Editar Móvel</h1>
                <form class="form-inline" method="post" action="{{route('moveis.update', $movel->id)}}" enctype="multipart/form-data">    
                {!! method_field('PUT') !!}
   @else
        <div class="row painel-row">
            <div class="col-xs-12">
                <h1>Novo Móvel </h1>
                <form class="form-inline" method="post" action="{{route('moveis.store')}}" enctype="multipart/form-data">    
    @endif
    
                    @if (isset($errors) && count($errors) > 0)
                        <div class="alert alert-danger">
                             <p>Sistema informa:<p>
                             @foreach($errors->all() as $error)
                                 <p>{{$error}}</p>
                             @endforeach
                        </div>
                    @endif

                    {!! csrf_field()!!} 
                    <div class="panel panel-default">
                        <div class='panel-body'>
                            
                            <div class="form-group form-input">
                                <label class="form-label">Descrição</label>
                                <input size="70" class="form-control" type='text' name="descricao" value="{{$movel->descricao or old('descricao')}}"" autofocus="">  
                            </div> 

                            <div class="form-group form-input">  
                                <label class="form-label">Categoria</label>
                                <select class="form-control" name ='categoria_id'>    
                                    <option></option>
                                     @foreach($categorias as $categoria)
                                        <option value="{{$categoria->id}}"
                                            @if (isset($movel) && $movel->categoria_id == $categoria->id)
                                              selected
                                           @endif               
                                        > {{$categoria->descricao}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                     </div>

                    <div class="panel panel-default">
                        <div class='panel-body'>
                            <div class="form-group form-input">
                                <label class="form-label">Estoque</label>
                                <input class="form-control placeholder-right" type='text' name="qtde" value="{{$movel->qtde or old('qtde')}}"  placeholder="0" size="15">  
                            </div> 
                            <div class="form-group form-input">
                                <label class="form-label">Custo R$</label>
                                <input class="preco_custo form-control placeholder-right" type='text' id="preco_custo" name="custo" value="{{$movel->custo or old('usto')}}" placeholder="0,00" onfocus="calcular()"  size="15">   
                            </div> 
                            <div class="form-group form-input">
                                <label class="form-label">Lucro %</label>
                                <input class="margem_lucro form-control placeholder-right" type='text' id="margem_lucro" name="lucro"  preco_venda="preco_venda" value="{{$movel->lucro or old('lucro')}}" placeholder="0,00%" onblur="calcular()"  size="15">  
                            </div> 
                            <div class="form-group form-input">
                                <label class="form-label">Venda R$</label>
                                <input class="preco_venda form-control placeholder-right" type='text' id="preco_venda" name="venda" margem_lucro="margem_lucro" value="{{$movel->venda or old('venda')}}" placeholder="0,00"  size="15">  

                            </div> 
                        </div>      
                    </div>    

                  
                    <div class="panel panel-default">
                        <div class='panel-body'>
                            <div class="form-group form-input">
                                <label class="form-label">Cor</label>
                                <input class="form-control" type='text' name="cor" value="{{$movel->cor or old('cor')}}">  
                            </div>
                            <div class="form-group form-input">
                                <label class="form-label">Dimensões</label>
                                <input class="form-control  placeholder-right" type='text' name="dimensoes" value="{{$movel->dimensoes or old('dimensoes')}}" placeholder="0,00 x 0,00">  
                            </div>

                            <div class="form-group  painel-checkbox-produtos">
                                <labe><input type='checkbox'  checked="checked" name="ativo" value="1"> Ativo</label>
                            </div> 

                            <div class="form-group painel-checkbox-produtos">
                                <label><input type='checkbox' name="novidade" value="0">Novidade</label>
                            </div>     
                        </div>     
                    </div>     
                  
                    <div class="panel panel-default">
                        <div class='panel-body'>
                             <div class="form-group form-input">
                                <label class="form-label">Anotações</label>
                                <textarea class="form-control" type='text' rows="5" cols="100" name="informacoes">{{$movel->informacoes or old('informacoes')}}</textarea>
                             </div>
                        </div>      
                    </div>

          
                    <div class="panel panel-default">
                        <h4> Imagens do Produto</h4>
                        <div class='panel-body'>
                            <input class="hide" id="imagem" type="file" name="photos[]" multiple />
                        </div>
                        <div class="panel-footer">
                          <label for='imagem' class='btn btn-primary fa fa-folder-open-o'> </label>  
                        </div> 
                    </div>
                        
                     <a href="{{url('painel/moveis')}}" class="btn btn-primary form-btns" title="Voltar">
                      <span class="fa fa-list"></span>
                   </a>

                    <button class="btn btn-primary form-btns" title="Salvar"> <span class="fa fa-save"></span></button>
                
                   
                
                </form>
            </div>
        </div>        
@endsection

@section('scripts-moveis')
     
        <script src="{{url('assets/painel/js/uploadImagensProdutos.js')}}"></script> 
        <script src="{{url('assets/painel/js/CalculoPrecoProduto.js')}}"></script> 
        
 
@endsection