@extends('Site.Template.index')

@section('content')

<section class="pg-form text-center">

<a href="{{URL::previous()}}"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>

    <h1 class="title">EDITAR MÓDULO: {{$modulos->name}}</h1>
    
    @if( isset($errors) && count($errors) > 0 )
    <div class="alert alert-danger">
        @foreach( $errors->all() as $error )
        <p>{{$error}}</p>
        @endforeach
    </div>
    @endif

    {!! Form::model($modulos, ['route' => ['modulos.update', $modulos->id], 'class' => 'form form-school', 'method' => 'PUT']) !!}

        @include('Painel.Modulos.form')

    {{Form::close()}}

    {!! Form::open(['route' => ['modulos.destroy', $modulos->id], 'class' => 'form form-school', 'method' => 'DELETE']) !!}

        {!! Form::hidden('course_id', $modulos->course_id)!!}

        {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}

    {{Form::close()}}

</section>

@endsection