<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
</head>

<body>
  <div class="dashboard">
    @include('admin.partials.sidebar')
    <div class="main-content">
      @include('admin.partials.stats')
      <h2 style="margin-top: 30px">Lista de usuários</h2>
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
                <td><button class="btn btn-normal">✏️</button></td>
                <td>
                  <a class="btn btn-normal abrirExclusao" id="abrirExclusao{{ $usuario->idCliente }}">🗑️</a>
                  <div id="modalExclusao{{ $usuario->idCliente }}" class="modal">
                    <div class="modal-content">
                      <span class="fecharExclusao">&times;</span>
                      <p>Tem certeza que quer excluir esse usuário?</p>
                      <form action="{{ route('usuarios.deletar', $usuario->idCliente) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-modal">Sim</button>
                      </form>
                    </div>
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
              <span class="fecharMensagem">&times;</span>
          </div>
      </div>
  @endif
  </div>

  <script src="{{ asset('js/modalAlert.js') }}"></script>
  <script src="{{ asset('js/modalExclusao.js') }}"></script>
</body>

</html>