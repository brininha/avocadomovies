<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contato.css') }}">
    <link
        href="{{ url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap') }}"
        rel="stylesheet">
    <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css') }}">
    <title>Avocado | Contato</title>
</head>

<body>
    @include('partials.menu')
    <div class="container">
        <h1>Entre em contato conosco</h1>
        <form action="{{ url('/enviar-contato') }}" method="post">
            @csrf
            <div class="input-div">
                <label class="form-label">Nome</label>
                <input type="text" required name="nomeContato">
            </div>
            <div class="input-div">
                <label class="form-label">E-mail</label>
                <input type="email" required name="emailContato">
            </div>
            <div class="input-div">
                <label class="form-label">Telefone</label>
                <input type="text" required name="telefoneContato">
            </div>
            <div class="input-div">
                <label class="form-label">Assunto</label>
                <input type="text" required name="assuntoContato">
            </div>
            <div class="input-div">
                <label class="form-label">Mensagem</label>
                <input type="text" required name="mensagemContato">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @include('partials/footer')
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>