<div id="modalAdmin" class="modal">
    <div class="modal-content">
        <span class="fecharAdmin fecharBtn">&times;</span>
        <h2>Novo administrador</h2>
        <form method="post" action="{{ route('registro.admin.envio') }}">
            @csrf
            @method('POST')
            <div class="input-div">
                <label class="input-label" for="nomeUsuario">Nome de usuário</label>
                <input type="text" required name="nomeUsuario" id="nomeUsuario" placeholder="Digite o seu nome de usuário">
            </div>
            <div class="input-div">
                <label class="input-label" for="emailUsuario">E-mail</label>
                <input type="text" required name="emailUsuario" id="emailUsuario" placeholder="Digite o seu e-mail de usuário">
            </div>
            <div class="input-div">
                <label class="input-label" for="senhaUsuario">Senha</label>
                <input type="password" required name="senhaUsuario" id="senhaUsuario" placeholder="Digite a sua senha de usuário">
            </div>
            <div class="input-div">
                <label class="input-label" for="senhaUsuario_confirmation">Confirme a senha</label>
                <input type="password" required name="senhaUsuario_confirmation" id="senhaUsuario_confirmation" placeholder="Confirme a sua senha">
            </div>
            <button type="submit" class="btn">Adicionar</button>
        </form>
    </div>
</div>
