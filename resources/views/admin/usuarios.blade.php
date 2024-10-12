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
            @foreach ($usuarios as $filme)
            @if ($filme->excluido == 0)
              <tr>
                <td>{{ $filme->nomeCliente }}</td>
                <td>{{ $filme->emailCliente }}</td>
                <td>{{ $filme->telefoneCliente }}</td>
                <td>
                @if (isset($filme->dataCriacao))
                {{ \Carbon\Carbon::parse($filme->dataCriacao)->format('d/m/Y') }}
                @else
                Indefinida
                @endif
                </td>
                <td><button class="btn btn-normal">✏️</button></td>
                <td>
                  <a class="btn btn-normal abrirExclusao" id="abrirExclusao{{ $filme->idCliente }}">🗑️</a>
                  <div id="modalExclusao{{ $filme->idCliente }}" class="modal modal-exclusao">
                    <div class="modal-content">
                      <span class="fecharExclusao">&times;</span>
                      <p>Tem certeza que quer excluir esse usuário?</p>
                      <form action="{{ route('usuarios.deletar', $filme->idCliente) }}" method="POST" style="display:inline;">
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