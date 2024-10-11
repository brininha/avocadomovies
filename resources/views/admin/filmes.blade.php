<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
  <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css') }}">
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
              <th>Imagem de capa</th>
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
        <td><img style="width: 100px; height: 80px; object-fit: cover"
        src="{{ asset('storage/images/' . $filme->capaFilme) }}"></td>
        <td>{{ $filme->descFilme }}</td>
        <td>{{ $generos->firstWhere('idGenero', $filme->idGenero)->nomeGenero }}</td>
        <td>
        @if (isset($filme->dataCriacao))
      {{ \Carbon\Carbon::parse($filme->dataCriacao)->format('d/m/Y') }}
    @else
    Indefinida
  @endif
        </td>
        <td>
        @include('admin/partials/modal-edit-filme')
        </td>
        <td>
        @include('admin/partials/modal-exclusao')
        </td>
      </tr>
    @endif
      @endforeach
          </tbody>
        </table>
      </div>
      <button class="btn" id="abrirFilme" style="margin-top: 20px">Adicionar filme</button>
      @include('admin/partials/modal-filme')
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