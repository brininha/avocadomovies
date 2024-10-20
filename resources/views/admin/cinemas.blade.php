<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Avocado | Gerenciar cinemas</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css') }}">
</head>

<body>
    <div class="dashboard">
        @include('admin.partials.sidebar')
        <div class="main-content">
            <h2>Lista de localizações de cinemas</h2>
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Núm. do logradouro</th>
                            <th>Logradouro</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>CEP</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Data de inauguração</th>
                            <th colspan="2">Gerenciar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cinemas as $cinema)
                            @if ($cinema->excluido == 0)
                                <tr>
                                    <td>{{ $cinema->nomeCinema }}</td>
                                    <td style="white-space: nowrap">{{ $cinema->telefoneCinema }}</td>
                                    <td>{{ $cinema->numLogradouroCinema }}</td>
                                    <td style="white-space: nowrap">{{ $cinema->logradouroCinema }}</td>
                                    <td style="white-space: nowrap">{{ $cinema->bairroCinema }}</td>
                                    <td style="white-space: nowrap">{{ $cinema->cidadeCinema }}</td>
                                    <td>{{ $cinema->estadoCinema }}</td>
                                    <td>{{ $cinema->cepCinema }}</td>
                                    <td>{{ $cinema->latitudeCinema }}</td>
                                    <td>{{ $cinema->longitudeCinema }}</td>
                                    <td>
                                        @if (isset($cinema->dataInauguracao))
                                            {{ \Carbon\Carbon::parse($cinema->dataInauguracao)->format('d/m/Y') }}
                                        @else
                                            Indefinida
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-normal abrirEmail" id="abrirEmail{{ $cinema->idCinema }}"><i
                                                class="far fa-envelope"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-normal abrirExclusao" id="abrirExclusao{{ $cinema->idCinema }}"><i
                                                class="far fa-trash-alt"></i></a>
                                        <x-modal-exclusao :modalId="'modalExclusao' . $cinema->idCinema"
                                            :url="route('cinemas.deletar', $cinema->idCinema)" :mensagem="'Tem certeza que quer excluir esse cinema?'" />
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button class="btn" id="abrirCinema" style="margin-top: 20px">Adicionar cinema</button>
            @include('admin/partials/modal-cinema')
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
        document.addEventListener("DOMContentLoaded", function () {
            configurarModal('modalCinema', 'abrirCinema', 'fecharCinema');
        });
    </script>
    <script src="{{ asset('js/modais.js') }}"></script>
    <script src="{{ asset('js/localizacao.js') }}"></script>
    <script>
        document.getElementById('cinemaForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const cep = document.getElementById('cepCinema').value;
            const numero = document.getElementById('numLogradouroCinema').value;
            const nome = document.getElementById('nomeCinema').value;
            const telefone = document.getElementById('telefoneCinema').value;
            const dataInauguracao = document.getElementById('dataInauguracao').value;
            const createCinemaUrl = "{{ route('cinemas.criar') }}";

            getGeolocationAndSend(cep, numero, nome, telefone, dataInauguracao, createCinemaUrl);
        });
    </script>
    <script src="{{ asset('js/telefone.js') }}"></script>
</body>

</html>