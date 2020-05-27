@extends('Site.Template.index')


@section('content')   

<div class="container">

<a href="{{URL::previous()}}"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
    <h1 class="title">AULAS do MÓDULO: {{$modulo->description}}</h1>

    <div class="btn-btn-modulo">
    
            <a href="{{route('aulas.create')}}" class="btn-cad-modulo">
                <span class="glyphicon glyphicon-edit"></span>
                CADASTRAR
            </a>
            
    </div>
    <br>

    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>URL</th>
            <th>Descrição</th>
            <th>FREE</th>
            <th>VIDEO</th>
            <th width="100px">Ação</th>
        </tr>
        
        @foreach($lessons as $lesson)
        <tr>
            <td>{{$lesson->name}}</td>
            <td>{{$lesson->url}}</td>
            <td>{{$lesson->description}}</td>
            <td>{{$lesson->free}}</td>
            <td>{{$lesson->video}}</td>
            <td>
                <a href="{{route('aulas.edit', $modulo->id)}}" class="edit">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
    
    <div class="pag">
        {!! $lessons->links() !!}
    </div>
    


</div>



@endsection