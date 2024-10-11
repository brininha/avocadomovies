<div id="modalContato" class="modal">
    <div class="modal-content">
        <span class="fecharContato fecharBtn">&times;</span>
        <h2>Entre em contato conosco</h2>
        <form action="{{ url('/enviar-contato') }}" method="post">
            @csrf
            <div class="input-div">
                <input type="text" required name="nomeContato" placeholder="Nome">
            </div>
            <div class="input-div">
                <input type="email" required name="emailContato" placeholder="E-mail">
            </div>
            <div class="input-div">
                <input type="text" required name="telefoneContato" placeholder="Telefone">
            </div>
            <div class="input-div">
                <input type="text" required name="assuntoContato" placeholder="Assunto">
            </div>
            <div class="input-div">
                <textarea type="text" required name="mensagemContato" placeholder="Mensagem"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>

<script src="{{ asset('js/modalContato.js') }}"></script>