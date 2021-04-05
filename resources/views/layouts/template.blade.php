<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Framework de paginação com a estrutura LARAVEL e que automaticamente detecta e personaliza a paginação-->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!--Folha de estilos Data table-->
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!--Scripts para Data table-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="  crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <title>@yield('title') - Welcome</title>
</head>

<body style="background-color: white;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LARAVEL Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('/') ? 'active' : ''}}" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('produtos*') ? 'active' : ''}}" href="{{route('produtos')}}">Products</a>
                    </li>
                </ul>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('utilizadores*') ? 'active' : ''}}" href="{{route('utilizador.registo')}}">Signin</a>
                    </li>
                    <?php
                    @session_start();
                    if(@$_SESSION["cod_util"]==null){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">Login</a>
                        </li>
                        <?php
                    }else{
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('utilizador.logout')}}">Logout</a>
                        </li>
                        <li class="nav-item">
                            <p class="nav-link">Hi <?=@$_SESSION["nome"];?>!</p>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid position-absolute top-50 start-50 translate-middle">
        @yield('content')
    </div>
    <footer class="footer mt-auto py-3 bg-light fixed-bottom text-center" style="background-color: gray;">
        &copy; Fábio Silva
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!--O yield tem de estar após o JS porque é necessário que o script seja carregado primeiro-->
    @yield('modal')
</body>

</html>