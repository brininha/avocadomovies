<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/filme.css') }}">
    <link
        href="{{ url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap') }}"
        rel="stylesheet">
    <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css') }}">
    <title>Avocado | {{ $filme->nomeFilme }}</title>
</head>

<body>
    <div class="wrapper">
        @include('partials.menu')
        @include('partials.sidebar')
        <div class="container">
            <div class="content-container">
                <div class="featured-content"
                    style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url({{ asset($filme->capaFilme) }});">
                    <h1 class="featured-movie-title">{{ $filme->nomeFilme }}</h1>
                </div>

                <div class="movie-data">
                    <table class="movie-data-table">
                        <tr>
                            <th colspan="2" class="movie-data-title">Informações do filme</th>
                        </tr>
                        <tr>
                            <th>Título:</th>
                            <td>Nome do Filme</td>
                        </tr>
                        <tr>
                            <th>Duração:</th>
                            <td>120 minutos</td>
                        </tr>
                        <tr>
                            <th>Gênero:</th>
                            <td>Ação</td>
                        </tr>
                        <tr>
                            <th>Faixa Etária:</th>
                            <td>16+</td>
                        </tr>
                        <tr>
                            <th>Diretor:</th>
                            <td>Nome do Diretor</td>
                        </tr>
                        <tr>
                            <th>Elenco:</th>
                            <td>Ator 1, Ator 2, Atriz 1, Atriz 2</td>
                        </tr>
                        <tr>
                            <th>Sinopse:</th>
                            <td>Uma breve descrição do enredo do filme que fornece uma visão geral sem revelar spoilers.
                            </td>
                        </tr>
                    </table>
                    <table class="movie-data-table">
                        <thead>
                            <tr>
                                <th colspan="5" class="movie-data-title">Sessões disponíveis</th>
                            </tr>
                            <tr>
                                <th colspan="5">
                                    <input type="date" name="" id="">
                                    <select name="" id="">
                                        <option value="3D">3D</option>
                                    </select>
                                    <select name="" id="">
                                        <option value="Português">Português</option>
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Sala</th>
                                <th>Idioma</th>
                                <th>Preço</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10/10/2024</td>
                                <td>14:00</td>
                                <td>1</td>
                                <td>Português</td>
                                <td>R$ 40,00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                @include('partials/modal-contato')
                @include('partials/modal-login')
                @include('partials/modal-cadastro')
                @include('partials/modal-mensagem')
            </div>
        </div>
        @include('partials/footer')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>