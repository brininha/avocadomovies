<div id="modalCadastro" class="modal">
    <div class="modal-content">
        <span class="fecharCadastro">&times;</span>
        <h2>Cadastre-se</h2>
        <form method="post" action="{{url('cadastrar-usuario')}}">
            @csrf
            <div class="input-div">
                <input type="text" required name="nomeCliente" placeholder="Nome">
            </div>
            <div class="input-div">
                <input type="email" required name="emailCliente" placeholder="E-mail">
            </div>
            <div class="input-div">
                <input type="text" required name="telefoneCliente" placeholder="Telefone">
            </div>
            <div class="input-div">
                <input type="password" required name="senhaCliente" placeholder="Senha">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>

<script src="{{ asset('js/modalCadastro.js') }}"></script>