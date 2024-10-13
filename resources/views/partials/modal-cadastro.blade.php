<div id="modalCadastro" class="modal">
    <div class="modal-content" style="min-height: fit-content">
        <span class="fecharCadastro fecharBtn">&times;</span>
        <h2>Cadastre-se</h2>
        <form method="post" action="{{ route('registro.cliente.envio') }}">
            @csrf
            @method('POST')
            <div class="input-div">
                <input type="text" required name="nomeUsuario" placeholder="Nome">
            </div>
            <div class="input-div">
                <input type="email" required name="emailUsuario" placeholder="E-mail">
            </div>
            <div class="input-div">
                <input type="date" required name="dataNascCliente" placeholder="Data de nascimento">
            </div>
            <div class="input-div">
                <input type="text" required name="cpfCliente" placeholder="CPF" maxlength="11">
            </div>
            <div class="input-div">
                <input type="text" required name="telefoneCliente" placeholder="Telefone" maxlength="15" onkeyup="mascaraTelefone(this)">
            </div>
            <div class="input-div">
                <input type="password" required name="senhaUsuario" placeholder="Senha">
            </div>
            <div class="input-div">
                <input type="password" required name="senhaUsuario_confirmation" placeholder="Confirme a senha">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>