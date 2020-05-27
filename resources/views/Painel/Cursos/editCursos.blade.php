@extends('Site.Template.index')

@section('content')

<section class="pg-form text-center">

    <h1 class="title">EDITAR CURSO: {{ $courses->name }}</h1>
    
    @if( isset($errors) && count($errors) > 0 )
    <div class="alert alert-danger">
        @foreach( $errors->all() as $error )
        <p>{{$error}}</p>
        @endforeach
    </div>
    @endif

    {!! Form::model($courses, ['route' => ['update.cursos', $courses->id], 'class' => 'form form-school', 'files' => true]) !!}

        @include('Painel.Cursos.updatecursos')

    {{Form::close()}}

</section>

@endsection