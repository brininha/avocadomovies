<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Avocado | Gerenciar gêneros</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
  <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css') }}">
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
            @if ($genero->excluido == 0 && $genero->nomeGenero != 'Indefinido')
              <tr>
                <td>{{ $genero->nomeGenero }}</td>
                <td>
                @if (isset($genero->dataCriacao))
                {{ \Carbon\Carbon::parse($genero->dataCriacao)->format('d/m/Y') }}
                @else
                Indefinida
                @endif
                </td>
                <td><a class="btn btn-normal"><i class="far fa-edit"></i></a></td>
                <td>
                  <a class="btn btn-normal abrirExclusao" id="abrirExclusao{{ $genero->idGenero }}"><i class="far fa-trash-alt"></i></a>
                  <x-modal-exclusao 
                    :modalId="'modalExclusao'.$genero->idGenero" 
                    :url="route('generos.deletar', $genero->idGenero)" 
                    :mensagem="'Tem certeza que quer excluir esse gênero?'"
                  />
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
              <span class="fecharMensagem fecharBtn">&times;</span>
          </div>
      </div>
  @endif
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
            configurarModal('modalGenero', 'abrirGenero', 'fecharGenero');
        });
  </script>
  <script src="{{ asset('js/modais.js') }}"></script>
</body>

</html>