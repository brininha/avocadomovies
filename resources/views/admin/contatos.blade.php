<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Avocado | Gerenciar contatos</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
  <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css') }}">
</head>

<body>
  <div class="dashboard">
    @include('admin.partials.sidebar')
    <div class="main-content">
      <h2>Lista de mensagens</h2>
      <div class="table-container">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Telefone</th>
              <th>Assunto</th>
              <th>Mensagem</th>
              <th>Data de envio</th>
              <th colspan="2">Gerenciar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($contatos as $contato)
            @if ($contato->excluido == 0)
              <tr>
                <td>{{ $contato->nomeContato }}</td>
                <td>{{ $contato->emailContato }}</td>
                <td style="white-space: nowrap;">{{ $contato->telefoneContato }}</td>
                <td>{{ $contato->assuntoContato }}</td>
                <td>{{ $contato->mensagemContato }}</td>
                <td>
                @if (isset($contato->dataContato))
                {{ \Carbon\Carbon::parse($contato->dataContato)->format('d/m/Y') }}
                @else
                Indefinida
                @endif
                </td>
                <td>
                  @include('admin/partials/modal-email')
                  <a class="btn btn-normal abrirEmail" id="abrirEmail{{ $contato->idContato }}"><i class="far fa-envelope"></i></a>
                </td>
                <td>
                  <a class="btn btn-normal abrirExclusao" id="abrirExclusao{{ $contato->idContato }}"><i class="far fa-trash-alt"></i></a>
                  <x-modal-exclusao 
                      :modalId="'modalExclusao'.$contato->idContato" 
                      :url="route('contatos.deletar', $contato->idContato)" 
                      :mensagem="'Tem certeza que quer excluir esse contato?'"
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