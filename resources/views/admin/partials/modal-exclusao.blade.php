<a class="btn btn-normal abrirExclusao" id="abrirExclusao{{ $filme->idFilme }}">🗑️</a>
<div id="modalExclusao{{ $filme->idFilme }}" class="modal modal-exclusao">
    <div class="modal-content">
        <span class="fecharExclusao fecharBtn">&times;</span>
        <p>Tem certeza que quer excluir esse filme?</p>
        <form action="{{ route('filmes.deletar', $filme->idFilme) }}" method="POST" style="display:inline;">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-modal">Sim</button>
        </form>
    </div>
</div>