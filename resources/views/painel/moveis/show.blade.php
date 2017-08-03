@extends('painel.index')
@section('content')

<div class="row painel-row">
    <div class="col-xs-12">
        <h1>Detalhes</h1>
        <div class="panel panel-default painel-panel">
            <div class="panel-body">

               

                <p><b>Descrição : </b> {{$movel->descricao}}</p>
                <p><b>Categoria : </b> {{$descricaoCategoria}}</p>
                <p><b>Estoque : </b> {{$movel->estoque}}</p>
                <p><b>Custo R$ : </b> {{$movel->custo}}</p>
                <p><b>Lucro % :</b> {{$movel->lucro}}</p>
                <p><b>Venda R$ : </b> {{$movel->venda}}</p>
                
                @if (isset($movel->cor))
                    <p><b>Cor :</b> {{$movel->cor}}</p>
                @endif
                
                @if (isset($movel->dimensoes))
                    <p><b>Cor</b> {{$movel->dimensoes}}</p>
                @endif

                @if ($movel->ativo == 1)
                    <p><b>Ativo : </b>Sim</p>
                @else    
                    <p><b>Ativo : </b>Não</p>
                @endif

                @if ($movel->novidade == 1)
                    <p><b>Ativo : </b>Sim</p>
                @else    
                    <p><b>Ativo : </b>Não</p>
                @endif

                @if (isset($movel->anotacoes))
                    <p><b>Anotações</b> {{$movel->anotacoes}}</p>
                @endif

                <hr>

                <p><b>Data de cadastro : </b> {{date_format($movel->created_at,'d/m/Y')}}</p>
                <p><b>Últma atualização :</b>  {{date_format($movel->updated_at,'d/m/Y')}}</p>
                  
            </div>
        </div>
            
        <a href="{{url('/painel/moveis')}}" class="btn btn-primary form-btns" title="Voltar">
                    <span class="fa fa-reply"></span> 
         </a>
        
        <a href="{{route('moveis.edit', $movel->id)}}" class="btn btn-primary form-btns" title="Editar">
           <span class="fa fa-edit"></span>
        </a>
    </div>
</div>                
@endsection