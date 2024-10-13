<div id="modalLogin" class="modal">
    <div class="modal-content">
        <span class="fecharLogin fecharBtn">&times;</span>
        <h2>Login</h2>
        <form method="post" action="{{ route('login.envio') }}">
            @csrf
            <div class="input-div">
                <input type="email" required name="emailUsuario" placeholder="E-mail">
            </div>
            <div class="input-div">
                <input type="password" required name="senhaUsuario" placeholder="Senha">
            </div>
            <button type="submit" class="btn btn-primary">Acessar</button>
        </form>
    </div>
</div>