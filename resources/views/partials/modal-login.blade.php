<div id="modalLogin" class="modal">
    <div class="modal-content">
        <span class="fecharLogin">&times;</span>
        <h2>Login</h2>
        <form method="post" action="{{url('login')}}">
            @csrf
            <div class="input-div">
                <input type="email" required name="emailCliente" placeholder="E-mail">
            </div>
            <div class="input-div">
                <input type="password" required name="senhaCliente" placeholder="Senha">
            </div>
            <button type="submit" class="btn btn-primary">Acessar</button>
        </form>
    </div>
</div>

<script src="{{ asset('js/modalLogin.js') }}"></script>