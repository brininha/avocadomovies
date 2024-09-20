<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link
        href="{{ url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap') }}"
        rel="stylesheet">
    <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css') }}">
    <title>Avocado | Home</title>
</head>

<body>
    @include('partials.menu')
    <div class="sidebar">
        <i class="left-menu-icon fas fa-search"></i>
        <i class="left-menu-icon fas fa-home"></i>
        <i class="left-menu-icon fas fa-bookmark"></i>
        <i class="left-menu-icon fas fa-hourglass-start"></i>
        <i class="left-menu-icon fas fa-shopping-cart"></i>
    </div>
    <div class="container">
        <div class="content-container">
            <div class="featured-content"
                style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url({{ asset('images/filme1.jpg') }});">
                <h1 class="logo2">DUNA</h1>
                <p class="featured-desc">Em um futuro distópico, o espaço se tornou um império intergalático.
                    O sistema é comandado pelos nobres, enquanto o árido planeta Arrakis, também conhecido como Duna,
                    possui a substância mais importante do cosmos que permite longas viagens entre os mundos.</p>
                <button class="featured-button">Ingresso</button>
            </div>
            <div id="movie-container" class="movie-list-container">
                <h1 class="movie-list-title">Filmes em cartaz</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        @foreach ($filme as $f)
                            @if ($f->statusFilme == 0)
                                <div class="movie-list-item">
                                    <img class="movie-list-item-img" src="{{ asset($f->capaFilme) }}">
                                    <span class="movie-list-item-title">{{$f->nomeFilme}}</span>
                                    <p class="movie-list-item-desc"> {{$f->descFilme}}</p>
                                    <button class="movie-list-item-button">Ingresso</button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
            </div>
            <div class="movie-list-container">
                <h1 class="movie-list-title">Próximos lançamentos</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        @foreach ($filme as $f)
                            @if ($f->statusFilme == 1)
                                <div class="movie-list-item">
                                    <img class="movie-list-item-img" src="{{ asset($f->capaFilme) }}">
                                    <span class="movie-list-item-title">{{$f->nomeFilme}}</span>
                                    <p class="movie-list-item-desc"> {{$f->descFilme}}</p>
                                    <button class="movie-list-item-button">Ingresso</button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
            </div>
            <div class="featured-content"
                style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url({{ asset('images/combo.jpg') }});">
                <h1 class="logo2">COMBOS</h1>
                <p class="featured-desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto illo dolor
                    deserunt nam assumenda ipsa eligendi dolore, ipsum id fugiat quo enim impedit, laboriosam omnis
                    minima voluptatibus incidunt. Accusamus, provident.</p>
                <button class="featured-button">Comprar</button>
            </div>
            <div class="movie-list-container">
                <h1 class="movie-list-title">Próximo mês</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        @foreach ($filme as $f)
                            @if ($f->statusFilme == 2)
                                <div class="movie-list-item">
                                    <img class="movie-list-item-img" src="{{ asset($f->capaFilme) }}">
                                    <span class="movie-list-item-title">{{$f->nomeFilme}}</span>
                                    <p class="movie-list-item-desc"> {{$f->descFilme}}</p>
                                    <button class="movie-list-item-button">Ingresso</button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
            </div>
            @include('partials/footer')

            @include('partials/modal-contato')
            @include('partials/modal-login')
            @include('partials/modal-cadastro')
            @include('partials/modal-mensagem')
            
            <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>