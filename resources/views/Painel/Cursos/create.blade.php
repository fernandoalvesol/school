@extends('Site.Template.index')

@section('content')

<section class="pg-form text-center">

    <h1 class="title">CADASTRAR NOVO CURSO</h1>
    
    @if( isset($errors) && count($errors) > 0 )
    <div class="alert alert-danger">
        @foreach( $errors->all() as $error )
        <p>{{$error}}</p>
        @endforeach
    </div>
    @endif

    {!! Form::open(['route' => 'store', 'class' => 'form form-school', 'files' => true]) !!}

        @include('Painel.Cursos.form')

    {{Form::close()}}

</section>

@endsection