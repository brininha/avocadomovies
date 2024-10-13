<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Avocado | Gerenciar filmes</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
  <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css') }}">
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
              <th>Data de lançamento</th>
              <th>Duração</th>
              <th>Diretor</th>
              <th>Elenco</th>
              <th>Idioma original</th>
              <th>Faixa etária</th>
              <th>Trailer</th>
              <th>Data de entrada em cartaz</th>
              <th>Data de saída em cartaz</th>
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
        {{ \Carbon\Carbon::parse($filme->dataLancamento)->format('d/m/Y') }}
        </td>
        <td>{{ $filme->duracaoFilme }} min</td>
        <td>{{ $filme->diretorFilme }} min</td>
        <td>{{ $filme->elencoFilme }}</td>
        <td>{{ $idiomas->firstWhere('idIdioma', $filme->idIdioma)->nomeIdioma }}</td>
        <td>
          @if ($filme->faixaEtariaFilme == 'L')
              <span style="background-color: green" class="faixa-etaria">L</span>
          @elseif ($filme->faixaEtariaFilme == '10')
              <span style="background-color: deepskyblue" class="faixa-etaria">10</span>
          @elseif ($filme->faixaEtariaFilme == '12')
              <span style="background-color: gold" class="faixa-etaria">12</span>
          @elseif ($filme->faixaEtariaFilme == '14')
              <span style="background-color: orange" class="faixa-etaria">14</span>
          @elseif ($filme->faixaEtariaFilme == '16')
              <span style="background-color: red" class="faixa-etaria">16</span>
          @elseif ($filme->faixaEtariaFilme == '18')
              <span style="background-color: black; border: 1px solid #ffffffac" class="faixa-etaria">18</span>
          @endif
        </td>
        <td>
          <iframe width="224" height="126" 
            src="{{ $filme->trailerFilme }}" 
            title="YouTube video player" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
          </iframe>
        </td>
        <td>
        {{ \Carbon\Carbon::parse($filme->dataEntradaCartaz)->format('d/m/Y') }}
        </td>
        <td>
        {{ \Carbon\Carbon::parse($filme->dataSaidaCartaz)->format('d/m/Y') }}
        </td>
        <td>
        {{ \Carbon\Carbon::parse($filme->dataCriacao)->format('d/m/Y') }}
        </td>
        <td>
        @include('admin/partials/modal-edit-filme')
        <a class="btn btn-normal abrirEditFilme" id="abrirEditFilme{{ $filme->idFilme }}"><i class="far fa-edit"></i></a>
        </td>
        <td>
          <a class="btn btn-normal abrirExclusao" id="abrirExclusao{{ $filme->idFilme }}"><i class="far fa-trash-alt"></i></a>
          <x-modal-exclusao :modalId="'modalExclusao' . $filme->idFilme" :url="route('filmes.deletar', $filme->idFilme)" :mensagem="'Tem certeza que quer excluir esse filme?'" />
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
      <span class="fecharMensagem fecharBtn">&times;</span>
    </div>
    </div>
  @endif
  </div>

  <script src="{{ asset('js/modais.js') }}"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      configurarModal("modalFilme", "abrirFilme", "fecharFilme");
    });
  </script>
</body>

</html>