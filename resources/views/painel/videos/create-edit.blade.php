@extends('painel.index')
@section('content')

    @if ( isset($video))
        
        <h1 class='painel-title'>Editar Vídeo</h1>
        
        <div class="row painel-row">
            <div class="col-xs-12"> 
          
                <form class="form-inline" method="post" action="{{route('videos.update', $video->id)}}" enctype="multipart/form-data">    
                {!! method_field('PUT') !!}
    @else
        
        <h1 class='painel-title'>Novo Vídeo</h1>
        <div class="row painel-row">
            <div class="col-xs-12"> 
                <form class="form-inline" method="post" action="{{route('videos.store')}}" enctype="multipart/form-data">    
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
                                <label class="form-label">Titulo</label>
                                <input size="43" class="form-control" type='text' name="titulo" value="{{$video->titulo or old('titulo')}}" autofocus="">  
                            </div>

                             <div class="form-group form-input">
                                <label class="form-label">URL do vídeo</label>
                                <input size="45" class="form-control" type='text' name="url" value="{{$video->url or old('url')}}" placeholder="https:://">  
                            </div>

                             <label class="form-label">Descrição</label>
                                <textarea class="form-control" type='text' rows="5" cols="100" name="descricao">{{$video->descricao or old('descricao')}}</textarea>

                        </div>  
                    </div>
                     
                    <a href="{{url('/painel/videos')}}" class="btn btn-primary form-btns" title="Voltar">
                        <span class="fa fa-reply"></span> 
                    </a>
                    <button class="btn btn-primary form-btns"> <span class="fa fa-save"></span></button>
                </form>  
            </div>
        </div>    
@endsection
