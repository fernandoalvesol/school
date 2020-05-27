@extends('Site.Template.index')

@section('content')

<section class="pg-form text-center">

    <a href="{{URL::previous()}}"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>

    <h1 class="title">CADASTRAR NOVO MODULO</h1>
    
    @if( isset($errors) && count($errors) > 0 )
    <div class="alert alert-danger">
        @foreach( $errors->all() as $error )
        <p>{{$error}}</p>
        @endforeach
    </div>
    @endif

    {!! Form::open(['route' => 'modulos.store', 'class' => 'form form-school']) !!}

        @include('Painel.Modulos.form')

    {{Form::close()}}

</section>

@endsection