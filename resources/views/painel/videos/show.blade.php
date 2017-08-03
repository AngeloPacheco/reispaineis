@extends('painel.index')
@section('content')

<div class="row painel-row">
    <div class="col-xs-12">
        <h1>Detalhes</h1>
        <div class="panel panel-default painel-panel">
            <div class="panel-body">

                <p><b>Título : </b> {{$video->titulo}}</p>
                <p><b>Descrição : </b> {{$video->descricao}}</p>
                <p><b>Video : </b> {{$video->url}}</p>
                
                <hr>

                <p><b>Data de cadastro : </b> {{date_format($video->created_at,'d/m/Y')}}</p>
                <p><b>Últma atualização :</b>  {{date_format($video->updated_at,'d/m/Y')}}</p>
                  
            </div>
        </div>
            
        <a href="{{url('/painel/videos')}}" class="btn btn-primary form-btns" title="Voltar">
                    <span class="fa fa-reply"></span> 
         </a>
        
        <a href="{{route('videos.edit', $video->id)}}" class="btn btn-primary form-btns" title="Editar">
           <span class="fa fa-edit"></span>
        </a>
    </div>
</div>                
@endsection