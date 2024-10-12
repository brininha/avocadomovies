<div id="{{ $modalId }}" class="modal modal-exclusao">
    <div class="modal-content">
        <span class="fecharExclusao fecharBtn">&times;</span>
        <p>{{ $mensagem }}</p>
        <form action="{{ $url }}" method="POST" style="display:inline;">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-modal">Sim</button>
        </form>
    </div>
</div>
