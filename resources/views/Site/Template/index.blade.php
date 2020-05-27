<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <!--Fonts Google-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <!--Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!--Fonts-->
        <link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}">

        <!--CSS Person-->
        <link rel="stylesheet" href="{{url('assets/css/style.css')}}">

        <!--CSS Reset-->
        <link rel="stylesheet" href="{{url('assets/css/reset.css')}}">

        <!--Favicon da Página-->
        <link rel="icon" type="image/png" href="{{url('assets/imgs/favicon.png')}}">

    </head>
    <body>
        <!-- Menu Principal-->  
        <nav class="navbar navbar-expand-lg nav-header">
            <ul>
                <a class="navbar-brand" href="#">
                    <img src="{{url('assets/imgs/logo-laraschool.png')}}" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>	

            </ul>
            <!--Apenas visualiza o menu principal se estive logado-->         
            @if( auth()->check() )  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
                <ul class="navbar-nav mr-auto navcenter">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Área do Aluno
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="nav-link" href="#">Meus Cursos <span class="sr-only">(current)</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="nav-link" href="#">Meus Certificados <span class="sr-only">(current)</span></a>
                    </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administrativo
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('exibir-cursos') }}">Gestão de Cursos</a>
                            <a class="dropdown-item" href="#">Gestão de Aulas</a>
                            <a class="dropdown-item" href="?pg=students">Gestão de Módulos</a>                            
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="?pg=students">Gestão de Alunos</a> 
                            <a class="dropdown-item" href="{{url( 'cadastrar' )}}">Gestão de Usuários</a>
                            <a class="dropdown-item" href="#">Relatórios</a>
                        </div>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                @endif
                <!--Viwes Menu Principal-->
                    
                <!--Carrega a Imagem do usuário depois de logado-->
                @if( auth()->check() ) 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if( auth()->user()->image != '')

                                <img src="{{url("uploads/users/" .auth()->user()->image)}}" class="profile-img">

                            @else

                                <img src="{{url('assets/imgs/profile.png')}}" class="profile-img">

                            @endif
                            
                            
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('perfil') }}">Meu Perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{url('logout')}}">Sair</a>
                        </div>
                    </li>
                    @else

                        <a href="{{url('/login')}}">Entrar</a>

                    @endif
                </ul>
            </div>
        </nav>
        <!-- End Menu Principal-->

        <section class="content">

            @yield('content')
            
        </section><!--Section Content-->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="imgs/logo.png" class="logo-footer">
                    </div>
                    <div class="col-md-6">

                        </di>
                    </div>
                </div>
        </footer>
        <div class="copy text-center">
            <p>Todos os Direitos Reservados - 2019</p>

        </div>

        <!--JS-->

        <!--jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!--Bootstrap-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
         integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
         crossorigin="anonymous"></script>
         
    </body>
</html>
