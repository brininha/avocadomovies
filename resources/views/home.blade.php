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

            <div id="modalContato" class="modal">
                <div class="modal-content">
                    <span class="fecharContato">&times;</span>
                    <h2>Entre em contato conosco</h2>
                    <form action="{{ url('/enviar-contato') }}" method="post">
                        @csrf
                        <div class="input-div">
                            <input type="text" required name="nomeContato" placeholder="Nome">
                        </div>
                        <div class="input-div">
                            <input type="email" required name="emailContato" placeholder="E-mail">
                        </div>
                        <div class="input-div">
                            <input type="text" required name="telefoneContato" placeholder="Telefone">
                        </div>
                        <div class="input-div">
                            <input type="text" required name="assuntoContato" placeholder="Assunto">
                        </div>
                        <div class="input-div">
                            <textarea type="text" required name="mensagemContato" placeholder="Mensagem"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>

            <div id="modalCadastro" class="modal">
                <div class="modal-content">
                    <span class="fecharCadastro">&times;</span>
                    <h2>Cadastre-se</h2>
                    <form method="post" action="{{url('cadastrar-usuario')}}">
                        @csrf
                        <div class="input-div">
                            <input type="text" required name="nomeCliente" placeholder="Nome">
                        </div>
                        <div class="input-div">
                            <input type="email" required name="emailCliente" placeholder="E-mail">
                        </div>
                        <div class="input-div">
                            <input type="text" required name="telefoneCliente" placeholder="Telefone">
                        </div>
                        <div class="input-div">
                            <input type="password" required name="senhaCliente" placeholder="Senha">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>

            @if (session('message'))
                <div id="modalAlert" class="modal">
                    <div class="modal-content">
                        <p>{{ session('message') }}</p>
                        <span class="fecharMensagem">&times;</span>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div id="modalAlert" class="modal">
                    <div class="modal-content">
                        <p>{{ $errors->first() }}</p>
                        <span class="fecharMensagem">&times;</span>
                    </div>
                </div>
            @endif

            <script src="{{ asset('js/modalAlert.js') }}"></script>
            <script src="{{ asset('js/modalCadastro.js') }}"></script>
            <script src="{{ asset('js/modalContato.js') }}"></script>
            <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>