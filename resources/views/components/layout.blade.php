<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} - Controle suas Series</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a href="{{ route('series.index') }}" class="navbar-brand"> Home </a>
        <a class="nav-link" href="{{ route('deslogar') }}">Sair</a>
      </li>
    </ul>
  </div>
</nav>
<body>
    <h1>{{$title}}</h1>

     <!-- $errors, criada automaticamente pelo laravel quando uma validate falha -->
     @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    {{$slot}}  <!-- $slot == é tudo o que está dentro do arquivo de views-->    
 
</body>
</html> 