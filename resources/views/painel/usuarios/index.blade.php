@extends('painel.index')
@section('content')

<div class="row painel-row">
    <div class="col-xs-12"> 
        <h1>Usuários</h1>
        <table class="table table-striped">
            <tr class="tabela-cabecalho">
                <th>Nome</th>
                <th>E-mail</th>
                <th width="100px">Ações</th>
            </tr>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->name}}</td> 
                    <td>{{$usuario->email}}</td> 
                    <td>  
                        <a class="btn-actions btn-edit"  title="Editar" href="{{route('usuarios.edit', $usuario->id)}}">
                           <i class="fa fa-pencil" ></i>
                        </a>
                        <a class="btn-actions btn-eye"  title="Editar" href="{{route('usuarios.show', $usuario->id)}}">
                           <i class="fa fa-eye" ></i>
                        </a>
                        <a class="btn-actions btn-delete"  title="Excluir" href="usuarios/delete/{{$usuario->id}}">
                           <i class="fa fa-trash"></i>
                    </a>
                    </td>
                </tr>
            @endforeach
        </table>
         <hr>
        <a href="{{route('usuarios.create')}}" class="btn btn-primary form-btns" title="Cadastrar">
            <i class="fa fa-plus"></i>
        </a>
        <div class="paginacao">
            {!! $usuarios->links() !!}
        </div>
    </div>
</div>        
@endsection