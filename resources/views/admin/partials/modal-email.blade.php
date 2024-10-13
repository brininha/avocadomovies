<div id="modalEmail{{ $contato->idContato }}" class="modal">
    <div class="modal-content">
        <span class="fecharEmail fecharBtn">&times;</span>
        <h2>Responder mensagem</h2>
        <form method="post" action="{{ url('responder-mensagem') }}" enctype="multipart/form-data">
            @csrf
            <div class="input-div">
                <label class="input-label">Texto da mensagem</label>
                <textarea name="mensagemEmail"></textarea>
            </div>
            <input type="hidden" name="emailDestinatario" value="{{ $contato->emailContato }}">
            <button type="submit" class="btn">Enviar</button>
        </form>
    </div>
</div>