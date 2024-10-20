<div id="modalEditFilme{{ $filme->idFilme }}" class="modal">
    <div class="modal-content">
        <span class="fecharEditFilme fecharBtn">&times;</span>
        <h2>Editar filme</h2>
        <form method="post" action="{{ url('editar-filme/' . $filme->idFilme) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-div">
                <label class="input-label" for="nomeFilme">Título do filme</label>
                <input type="text" required name="nomeFilme" id="nomeFilme" value="{{ $filme->nomeFilme }}">
            </div>
            <div class="input-div">
                <label class="input-label" for="descFilme">Sinopse</label>
                <input type="text" required name="descFilme" id="descFilme" value="{{ $filme->descFilme }}">
            </div>
            <div class="input-div">
                <label class="input-label" for="idGenero">Gênero</label>
                <select class="select-div" name="idGenero" id="idGenero" required>
                    @foreach ($generos as $genero)
                        @if ($genero->excluido == 0)
                            @if ($genero->idGenero == $filme->idGenero)
                                <option value="{{ $genero->idGenero }}" selected>{{ $genero->nomeGenero }}</option>
                            @else
                                <option value="{{ $genero->idGenero }}">{{ $genero->nomeGenero }}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="input-div">
                <label class="input-label" for="dataLancamento">Data de lançamento</label>
                <input type="date" required name="dataLancamento" id="dataLancamento"
                    value="{{ $filme->dataLancamento }}">
            </div>
            <div class="input-div">
                <label class="input-label" for="duracaoFilme">Duração em minutos</label>
                <input type="number" required name="duracaoFilme" id="duracaoFilme" min="1"
                    value="{{ $filme->duracaoFilme }}">
            </div>
            <div class="input-div">
                <label class="input-label" for="diretorFilme">Diretor</label>
                <input type="text" required name="diretorFilme" id="diretorFilme" value="{{ $filme->diretorFilme }}">
            </div>
            <div class="input-div">
                <label class="input-label" for="elencoFilme">Elenco</label>
                <input type="text" required name="elencoFilme" id="elencoFilme" value="{{ $filme->elencoFilme }}">
            </div>
            <div class="input-div">
                <label class="input-label" for="idIdioma">Idioma original</label>
                <select class="select-div" name="idIdioma" id="idIdioma" required>
                    @foreach ($idiomas as $idioma)
                        @if ($idioma->idIdioma == $filme->idIdioma)
                            <option value="{{ $idioma->idIdioma }}" selected>{{ $idioma->nomeIdioma }}</option>
                        @else
                            <option value="{{ $idioma->idIdioma }}">{{ $idioma->nomeIdioma }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="input-div">
                <label class="input-label" for="faixaEtariaFilme">Faixa etária</label>
                <select class="select-div" name="faixaEtariaFilme" id="faixaEtariaFilme" required>
                    <option value="L" {{ $filme->faixaEtariaFilme == 'L' ? 'selected' : '' }}>Livre</option>
                    <option value="10" {{ $filme->faixaEtariaFilme == '10' ? 'selected' : '' }}>10+</option>
                    <option value="12" {{ $filme->faixaEtariaFilme == '12' ? 'selected' : '' }}>12+</option>
                    <option value="14" {{ $filme->faixaEtariaFilme == '14' ? 'selected' : '' }}>14+</option>
                    <option value="16" {{ $filme->faixaEtariaFilme == '16' ? 'selected' : '' }}>16+</option>
                    <option value="18" {{ $filme->faixaEtariaFilme == '18' ? 'selected' : '' }}>18+</option>
                </select>
            </div>
            <div class="input-div">
                <label class="input-label" for="dataEntradaCartaz">Data de entrada em cartaz</label>
                <input type="date" required name="dataEntradaCartaz" id="dataEntradaCartaz"
                    value="{{ $filme->dataEntradaCartaz }}">
            </div>
            <div class="input-div">
                <label class="input-label" for="dataSaidaCartaz">Data de saída em cartaz</label>
                <input type="date" required name="dataSaidaCartaz" id="dataSaidaCartaz"
                    value="{{ $filme->dataSaidaCartaz }}">
            </div>
            <div class="input-div">
                <label class="input-label" for="trailerFilme">URL do trailer</label>
                <input type="url" required name="trailerFilme" id="trailerFilme" value="{{ $filme->trailerFilme }}">
                <span class="btn-info">?</span>
                <span class="text-info">Certifique-se de que a URL do vídeo esteja no formato incorporado do YouTube. O formato correto deve ser algo como: https://www.youtube.com/embed/VIDEO_ID.</span>
            </div>
            <div class="input-div">
                <label class="input-label" for="edit-filme-file-upload{{$filme->idFilme}}">Imagem de capa</label>
                <div class="file-upload-wrapper">
                    <label for="edit-filme-file-upload{{$filme->idFilme}}" class="custom-file-upload">Selecionar cartaz do filme</label>
                    <input id="edit-filme-file-upload{{$filme->idFilme}}" class="file-upload" type="file" name="capaFilme"
                        accept="image/*">
                    <span id="edit-filme-file-name{{$filme->idFilme}}" class="file-name">Nada selecionado</span>
                </div>
                <span class="btn-info">?</span>
                <span class="text-info">Se nenhuma imagem for selecionada, a imagem anteriormente escolhida permanecerá.</span>
            </div>
            <button type="submit" class="btn">Alterar</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('edit-filme-file-upload{{$filme->idFilme}}').addEventListener('change', function () {
        var fileName = this.files[0] ? this.files[0].name : 'Nada selecionado';
        document.getElementById('edit-filme-file-name{{$filme->idFilme}}').textContent = fileName;
    });
</script>