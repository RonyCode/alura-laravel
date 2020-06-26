<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css"
        integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
    <title>Controle de Series</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex justify-content-between">
        <a class="navbar-brand" href="{{route('listar_series')}}">Home</a>
        @auth
        <a href="/sair" class="text-danger">Sair</a>
        @endauth

        @guest
        <a href="/entrar">Entrar</a>
        @endguest
    </nav>
    <div class="container">
        <div class="jumbotron">
            <h1>@yield('header')</h1>
        </div>
        @yield('body')

    </div>
</body>

</html>
