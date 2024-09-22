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
      <h2>Lista de filmes</h2>
      <div class="table-container">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Capa</th>
              <th>Descrição</th>
              <th>Gênero</th>
              <th>Data de criação</th>
              <th colspan="2">Gerenciar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($filmes as $filme)
            @if ($filme->excluido == 0)
              <tr>
                <td>{{ $filme->nomeFilme }}</td>
                <td><img style="width: 100px; height: 80px; object-fit: cover" src="{{ asset($filme->capaFilme) }}"></td>
                <td>{{ $filme->descFilme }}</td>
                <td>{{ $generos[$filme->idGenero]->nomeGenero ?? "Indefinido" }}</td>
                <td>
                @if (isset($filme->dataCriacao))
                {{ \Carbon\Carbon::parse($filme->dataCriacao)->format('d/m/Y') }}
                @else
                Indefinida
                @endif
                </td>
                <td><button class="btn btn-normal">✏️</button></td>
                <td>
                  <a class="btn btn-normal abrirExclusao" id="abrirExclusao{{ $filme->idFilme }}">🗑️</a>
                  <div id="modalExclusao{{ $filme->idFilme }}" class="modal">
                    <div class="modal-content">
                      <span class="fecharExclusao">&times;</span>
                      <p>Tem certeza que quer excluir esse filme?</p>
                      <form action="{{ route('filmes.deletar', $filme->idFilme) }}" method="POST" style="display:inline;">
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