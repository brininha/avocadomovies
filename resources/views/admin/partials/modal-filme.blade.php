<div id="modalFilme" class="modal">
    <div class="modal-content">
        <span class="fecharFilme fecharBtn">&times;</span>
        <h2>Novo filme</h2>
        <form method="post" action="{{ url('adicionar-filme') }}" enctype="multipart/form-data">
            @csrf
            <div class="input-div">
                <label class="input-label" for="nomeFilme">Título do filme</label>
                <input type="text" required name="nomeFilme" id="nomeFilme" placeholder="Digite o título do filme">
            </div>
            <div class="input-div">
                <label class="input-label" for="descFilme">Sinopse</label>
                <input type="text" required name="descFilme" id="descFilme" placeholder="Digite a sinopse">
            </div>
            <div class="input-div">
                <label class="input-label" for="idGenero">Gênero</label>
                <select class="select-div" name="idGenero" id="idGenero" required>
                    @foreach ($generos as $contato)
                        @if ($contato->excluido == 0)
                            <option value="{{ $contato->idGenero }}">{{ $contato->nomeGenero }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="input-div">
                <label class="input-label" for="dataLancamento">Data de lançamento</label>
                <input type="date" required name="dataLancamento" id="dataLancamento">
            </div>
            <div class="input-div">
                <label class="input-label" for="duracaoFilme">Duração em minutos</label>
                <input type="number" required name="duracaoFilme" id="duracaoFilme" min="1" placeholder="Ex: 120">
            </div>
            <div class="input-div">
                <label class="input-label" for="diretorFilme">Diretor</label>
                <input type="text" required name="diretorFilme" id="diretorFilme" placeholder="Nome do diretor">
            </div>
            <div class="input-div">
                <label class="input-label" for="elencoFilme">Elenco</label>
                <input type="text" required name="elencoFilme" id="elencoFilme" placeholder="Principais atores">
            </div>
            <div class="input-div">
                <label class="input-label" for="idIdioma">Idioma original</label>
                <select class="select-div" name="idIdioma" id="idIdioma" required>
                    @foreach ($idiomas as $idioma)
                        <option value="{{ $idioma->idIdioma }}">{{ $idioma->nomeIdioma }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-div">
                <label class="input-label" for="faixaEtariaFilme">Faixa etária</label>
                <select class="select-div" name="faixaEtariaFilme" id="faixaEtariaFilme" required>
                    <option value="L">Livre</option>
                    <option value="10">10+</option>
                    <option value="12">12+</option>
                    <option value="14">14+</option>
                    <option value="16">16+</option>
                    <option value="18">18+</option>
                </select>
            </div>
            <div class="input-div">
                <label class="input-label" for="dataEntradaCartaz">Data de entrada em cartaz</label>
                <input type="date" required name="dataEntradaCartaz" id="dataEntradaCartaz">
            </div>
            <div class="input-div">
                <label class="input-label" for="dataSaidaCartaz">Data de saída em cartaz</label>
                <input type="date" required name="dataSaidaCartaz" id="dataSaidaCartaz">
            </div>
            <div class="input-div">
                <label class="input-label" for="trailerFilme">URL do trailer</label>
                <input type="url" required name="trailerFilme" id="trailerFilme" placeholder="https://exemplo.com/trailer">
                <span class="btn-info">?</span>
                <span class="text-info">Certifique-se de que a URL do vídeo esteja no formato incorporado do YouTube. O formato correto deve ser algo como: https://www.youtube.com/embed/VIDEO_ID.</span>
            </div>
            <div class="input-div">
                <label class="input-label" for="file-upload">Imagem de capa</label>
                <div class="file-upload-wrapper">
                    <label for="file-upload" class="custom-file-upload">Selecionar cartaz do filme</label>
                    <input id="file-upload" class="file-upload" type="file" name="capaFilme" required accept="image/*">
                    <span id="file-name" class="file-name">Nada selecionado</span>
                </div>
            </div>
            <button type="submit" class="btn">Adicionar</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('file-upload').addEventListener('change', function () {
        var fileName = this.files[0] ? this.files[0].name : 'Nada selecionado';
        document.getElementById('file-name').textContent = fileName;
    });
</script>
