<div class="navbar">
    <div class="navbar-container">
        <div class="logo-container">
        </div>
        <div class="menu-container">
            <ul class="menu-list">
                <li class="menu-list-item">
                    <a class="menu-list-item-text" href="/">Home</a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-item-text" href="/#movie-container">Filmes</a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-item-text" href="/">Combos</a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-item-text" id="abrirContato">Contato</a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-item-text" id="abrirLogin">Login</a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-item-text" id="abrirCadastro">Cadastro</a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-item-text" href="/sobre">Sobre nós</a>
                </li>
            </ul>
        </div>
        <div class="profile-container">
            <div class="toggle">
                <i class="fas fa-moon toggle-icon"></i>
                <i class="fas fa-sun toggle-icon"></i>
                <div class="toggle-ball"></div>
            </div>
        </div>
    </div>
</div>

@include('partials/modal-contato')
@include('partials/modal-login')
@include('partials/modal-cadastro')
@include('partials/modal-mensagem')
<script src="{{ asset('js/modais.js') }}"></script>
<script src="{{ asset('js/telefone.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        configurarModal("modalLogin", "abrirLogin", "fecharLogin");
        configurarModal("modalContato", "abrirContato", "fecharContato");
        configurarModal("modalCadastro", "abrirCadastro", "fecharCadastro");
    });
</script>