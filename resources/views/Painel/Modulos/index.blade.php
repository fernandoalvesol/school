@extends('Site.Template.index')


@section('content')   

<div class="container">

    <h1 class="title">Módulos do Curso: {{$cursos->name}}</h1>

    <div class="btn-btn-modulo">
    
            <a href="{{route('modulos.create')}}" class="btn-cad-modulo">
                <span class="glyphicon glyphicon-edit"></span>
                CADASTRAR
            </a>
            
    </div>
    <br>

    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th width="100px">Ação</th>
        </tr>
        
        @foreach($modulos as $modulo)
        <tr>
            <td>{{$modulo->name}}</td>
            <td>{{$modulo->description}}</td>
            <td>
                <a href="{{route('modulos.edit', $modulo->id)}}" class="edit">
                    <span class="glyphicon glyphicon-edit" title="Editar Módulo"></span>
                </a>
                <a href="{{route('aulas.modulos', $modulo->id)}}" class="edit">
                    <span class="glyphicon glyphicon-facetime-video" title="Cadastrar Aulas"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
    
    <div class="pag">
        {!! $modulos->links() !!}
    </div>
    


</div>



@endsection