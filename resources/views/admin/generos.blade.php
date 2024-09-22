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
      <h2>Lista de gêneros</h2>
      <div class="table-container">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Data de criação</th>
              <th colspan="2">Gerenciar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($generos as $genero)
            @if ($genero->excluido == 0)
              <tr>
                <td>{{ $genero->nomeGenero }}</td>
                <td>
                @if (isset($genero->dataCriacao))
                {{ \Carbon\Carbon::parse($genero->dataCriacao)->format('d/m/Y') }}
                @else
                Indefinida
                @endif
                </td>
                <td><button class="btn btn-normal">✏️</button></td>
                <td>
                  <a class="btn btn-normal abrirExclusao" id="abrirExclusao{{ $genero->idGenero }}">🗑️</a>
                  <div id="modalExclusao{{ $genero->idGenero }}" class="modal">
                    <div class="modal-content">
                      <span class="fecharExclusao">&times;</span>
                      <p>Tem certeza que quer excluir esse gênero?</p>
                      <form action="{{ route('generos.deletar', $genero->idGenero) }}" method="POST" style="display:inline;">
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
      <button class="btn" id="abrirGenero" style="margin-top: 20px">Adicionar gênero</button>
      @include('admin/partials/modal-genero')
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