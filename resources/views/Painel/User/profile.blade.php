@extends('Site.Template.index')

@section('content')
<section class="pg-form text-center">
    <h1 class="title">Perfil do Usuário </h1><br>
    <h1 class="title">{{ Auth()->user()->name}}</h1>
    {{Form::model(auth()->user(), ['route' => 'profile.update', 'class' => 'form-horizontal', 'files' => true])}}

    @include('Painel.User.form')

    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-form">
                Atualizar Perfil
            </button>
        </div>
    </div>

    {{Form::close()}}
</section>
@endsection