<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Avocado | Gerenciar usuários</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
  <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css') }}">
</head>

<body>
  <div class="dashboard">
    @include('admin.partials.sidebar')
    <div class="main-content">
      <h2>Lista de usuários</h2>
      <div class="table-container">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Telefone</th>
              <th>Data de criação</th>
              <th colspan="2">Gerenciar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($usuarios as $usuario)
            @if ($usuario->excluido == 0)
              <tr>
                <td>{{ $usuario->nomeCliente }}</td>
                <td>{{ $usuario->emailCliente }}</td>
                <td>{{ $usuario->telefoneCliente }}</td>
                <td>
                @if (isset($usuario->dataCriacao))
                {{ \Carbon\Carbon::parse($usuario->dataCriacao)->format('d/m/Y') }}
                @else
                Indefinida
                @endif
                </td>
                <td><a class="btn btn-normal"><i class="far fa-edit"></i></a></td>
                <td>
                  <a class="btn btn-normal abrirExclusao" id="abrirExclusao{{ $usuario->idCliente }}"><i class="far fa-trash-alt"></i></a>

                  <x-modal-exclusao 
                      :modalId="'modalExclusao'.$usuario->idCliente" 
                      :url="route('usuarios.deletar', $usuario->idCliente)" 
                      :mensagem="'Tem certeza que quer excluir esse usuário?'"
                  />
                </td>
              </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  @if (session('message'))
      <div id="modalAlert" class="modal">
          <div class="modal-content">
              <p>{{ session('message') }}</p>
              <span class="fecharMensagem fecharBtn">&times;</span>
          </div>
      </div>
  @endif
  </div>

  <script src="{{ asset('js/modais.js') }}"></script>
</body>

</html>