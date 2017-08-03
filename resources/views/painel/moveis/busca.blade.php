@extends('painel.index')
@section('content')

<div class="row painel-row">
    <div class="col-xs-12">
        
        <h1>Móveis</h1>

           <div class="form-search">
             <form class="form-inline" name="formPesquisa" method="post" role="form" action="{{url('painel/moveis/busca')}}">
                 <input class="form-control" type="text" name="descricao" value="" placeholder="Pesquisar"  title='Pesquisa por descrição.' autofocus="" size="20">
                 {!! csrf_field()!!}
                <button class="btn btn-primary painel-btn-pesquisar" type="submit" title="Pesquisar">
                        <span class="fa fa-search"></span>
                </button>
            </form>
        </div>
        
        <h5>{{$msg}}<h5>
        
        <table class="table table-striped">
            <tr class="painel-cabecalho">
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Estoque</th>
                <th>Custo</th>
                <th>Venda</th>
                <th width="150px">Ações</th>
            </tr>
            
            @foreach($moveis as $movel)
                <tr>
                    <td>{{$movel->descricao}}</td>
                    <td>{{$movel->categoria}}</td>
                    <td>{{$movel->qtde}}</td>
                    <td>{{$movel->custo}}</td>
                    <td>{{$movel->venda}}</td>
                    
                    <td>  
                        <a class="btn-actions btn-edit" href="{{route('moveis.edit', $movel->id)}}">
                            <span class="fa fa-pencil" title="Editar"></span>
                        </a>
                        <a class="btn-actions btn-eye" href="{{route('moveis.show', $movel->id)}}">
                           <span class="fa fa-eye" title="Detalhes"></span>
                        </a>
                        <a class="btn-actions btn-delete" href="moveis/delete/{{$movel->id}}">
                           <span class="fa fa-trash" title="Excluir"></span>
                        </a>

                    </td>
                </tr>
            @endforeach    
        </table>
       
        <hr>       
            
        <a href="{{route('moveis.create')}}" class="btn btn-primary form-btns" title="Cadastrar">
            <i class="fa fa-plus"></i>
        </a>

        <div class="paginacao">
            {!! $moveis->links() !!}
        </div>
    </div>
</div>
@endsection