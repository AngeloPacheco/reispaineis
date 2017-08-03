@extends('painel.index')
@section('content')

<div class="row painel-row">
    <div class="col-xs-12">
        
        <h1>Vídeos</h1>

           <div class="form-search">
             <form class="form-inline" name="formPesquisa" method="post" role="form" action="{{url('painel/videos/busca')}}">
                 <input class="form-control" type="text" name="descricao" value="" placeholder="Pesquisar"  title='Pesquisa por título do vídeo.' autofocus="" size="20">
                 {!! csrf_field()!!}
                <button class="btn btn-primary painel-btn-pesquisar" type="submit" title="Pesquisar">
                        <span class="fa fa-search"></span>
                </button>
            </form>
        </div>
        
        <h5>{{$msg}}<h5>
        
        <table class="table table-striped">
            <tr class="painel-cabecalho">
                <th>Título</th>
                <th>Descrição</th>
                <th width="150px">Ações</th>
            </tr>
            
            @foreach($videos as $video)
                <tr>
                    <td>{{$video->titulo}}</td>
                    <td>{{$video->descricao}}</td>
                    
                    <td>  
                        <a class="btn-actions btn-edit" href="{{route('videos.edit', $video->id)}}">
                            <span class="fa fa-pencil" title="Editar"></span>
                        </a>
                        <a class="btn-actions btn-eye" href="{{route('videos.show', $video->id)}}">
                           <span class="fa fa-eye" title="Detalhe"></span>
                        </a>
                        <a class="btn-actions btn-delete" href="videos/delete/{{$video->id}}">
                           <span class="fa fa-trash" title="Excluir"></span>
                        </a>

                    </td>
                </tr>
            @endforeach    
        </table>
       
        <hr>       
            
        <a href="{{route('videos.create')}}" class="btn btn-primary form-btns" title="Cadastrar">
            <i class="fa fa-plus"></i>
        </a>

        <div class="paginacao">
            {!! $videos->links() !!}
        </div>
    </div>
</div>
@endsection