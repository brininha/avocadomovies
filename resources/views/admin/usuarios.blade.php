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
              <th>Tipo</th>
              <th>Data de criação</th>
              <th colspan="2">Gerenciar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($usuarios as $usuario)
            @if ($usuario->excluido == 0)
              <tr>
                <td>{{ $usuario->nomeUsuario }}</td>
                <td>{{ $usuario->emailUsuario }}</td>
                <td style="text-transform: capitalize">{{ $usuario->tipoUsuario }}</td>
                <td>
                @if (isset($usuario->dataCriacao))
                {{ \Carbon\Carbon::parse($usuario->dataCriacao)->format('d/m/Y') }}
                @else
                Indefinida
                @endif
                </td>
                <td><a class="btn btn-normal"><i class="far fa-edit"></i></a></td>
                <td>
                  <a class="btn btn-normal abrirExclusao" id="abrirExclusao{{ $usuario->idUsuario }}"><i class="far fa-trash-alt"></i></a>

                  <x-modal-exclusao 
                      :modalId="'modalExclusao'.$usuario->idUsuario" 
                      :url="route('usuarios.deletar', $usuario->idUsuario)" 
                      :mensagem="'Tem certeza que quer excluir esse usuário?'"
                  />
                </td>
              </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <button class="btn" id="abrirFilme" style="margin-top: 20px">Adicionar cliente</button>
      <button class="btn" id="abrirAdmin" style="margin-top: 20px">Adicionar administrador</button>
      @include('admin/partials/modal-admin')
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
      configurarModal("modalAdmin", "abrirAdmin", "fecharAdmin");
    });
  </script>
</body>

</html>