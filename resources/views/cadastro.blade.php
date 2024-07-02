<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avocado | Cadastro</title>
</head>
<body>
    <form method="post" action="{{url('cadastrar')}}">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nomeCliente">
        <br><br>
        <label>E-mail:</label>
        <input type="email" name="emailCliente">
        <br><br>
        <label>Telefone:</label>
        <input type="text" name="telefoneCliente">
        <br><br>
        <label>Senha:</label>
        <input type="password" name="senhaCliente">
        <br><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>