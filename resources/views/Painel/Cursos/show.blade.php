@extends('Site.Template.index')


@section('content')   

<div class="container">

<div class="row col-md-12">
    <div class="col-md-6">
        <div class="form-search">
            {!! Form::open(['route' => 'search-cursos', 'class' => 'form form-inline']) !!}
                {!! Form::text('key-Search', null, ['placeholder' => 'Digite um Nome:', 'class' => 'form-control']) !!}

                <input type="submit" value="Pesquisar" class="btn btn-search">
            {!! Form::close() !!}
        </div>  
    </div>  
    
    <div class="col-md-6">
        <div class="btn-novo-curso">
            <a href="{{ url('cadastrar-curso') }}" class="btn-novo">NOVO CURSO
                <span class="glyphicon glyphicon-plus-sign"></span>
            </a>        
        </div>        
    </div> 
</div>

@if( session('success') )
        <div class="alert alert-success">
            {{session('success')}}
        </div>
@endif
<h1 class="title">MEUS CURSOS</h1>

<div class="courses">
    @foreach($courses as $course)
    <article class="col-md-3 col-sm-6 col-xm-12">
        <div class="course">
            @if( $course->image != null )
            <img src="{{url("uploads/users/{$course->image}")}}" class="img-cursos" alt="{{$course->name}}">
            @else
            <img src="{{url('assets/imgs/courses/no-image.png')}}" alt="{{$course->name}}">
            @endif

            <h2 class="title-course">{{$course->name}}</h2>

            <a href="" class="btn-view-teacher">
                <span class="glyphicon glyphicon-eye-open"></span>
            </a>
            <a href="{{route('edit.cursos', $course->id)}}" class="btn-view-edit">
                <span class="glyphicon glyphicon-edit"></span>
            </a>
            <a href="{{route('modulos.cursos', $course->id)}}" class="btn-module-teacher">
                <span class="glyphicon glyphicon-plus" title="Cadastrar Módulos"></span>
            </a>
        </div>
    </article>
   @endforeach

   <div class="pag">
        @if( isset($dataForm) )
            {!! $courses->appends($dataForm)->links() !!}
        @else
            {!! $courses->links() !!}
        @endif
</div><!--Pagination-->

</div><!--Courses-->


</div>

@endsection