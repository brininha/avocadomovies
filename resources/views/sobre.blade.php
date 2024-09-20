<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css') }}">
    <title>Avocado | Sobre nós</title>
</head>
<body>
    @include('partials.menu')
    <div class="container"> 
        <div class="about-title">
            <h1>Nossa equipe</h1>
            <p>Apresentamos as brilhantes desenvolvedoras que têm liderado o projeto com excelência desde março de 2024.</p>
        </div>
        <div class="card-box">
            <div class="card">
                <img class="card-img" src="{{ asset('images/rapunzel.jpg') }}">
                <h1>Larissa Matos</h1>
                <p>Front-end</p>
            </div>
            <div class="card">
                <img class="card-img" src="{{ asset('images/merida.jpg') }}">
                <h1>Monique de Sousa</h1>
                <p>Front-end</p>
            </div>
            <div class="card">
                <img class="card-img" src="{{ asset('images/bela.jpg') }}">
                <h1>Sabrina Cristan</h1>
                <p>Back-end</p>
            </div>
        </div>
        @include('partials/footer')

        @include('partials/modal-contato')
        @include('partials/modal-login')
        @include('partials/modal-cadastro')
        @include('partials/modal-mensagem')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>