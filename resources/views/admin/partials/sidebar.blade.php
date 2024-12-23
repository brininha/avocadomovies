<div class="sidebar">
    <img class="logo" src="{{ asset('images/logo-dark.png') }}">
    <ul>
        <li><i class="left-menu-icon fas fa-home"></i><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li><i class="left-menu-icon fas fa-user"></i><a href="{{ url('/admin/usuarios') }}">Usuários</a></li>
        <li><i class="left-menu-icon fas fa-film"></i><a href="{{ url('/admin/filmes?view=adminFilmes') }}">Filmes</a>
        </li>
        <li><i class="left-menu-icon fas fa-book"></i><a href="{{ url('/admin/generos') }}">Gêneros</a></li>
        <li><i class="left-menu-icon fas fa-envelope"></i><a href="{{ url('/admin/contatos') }}">Contatos</a></li>
        <li><i class="left-menu-icon fas fa-globe-americas"></i><a href="{{ url('/admin/cinemas') }}">Localizações</a></li>
        <li><i class="left-menu-icon fas fa-couch"></i><a href="{{ url('/admin') }}">Salas</a></li>
        <li><i class="left-menu-icon fas fa-tv"></i><a href="{{ url('/admin') }}">Sessões</a></li>
        <li><i class="left-menu-icon fas fa-ticket-alt"></i><a href="{{ url('/admin') }}">Ingressos</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <li><i class="left-menu-icon fas fa-door-open"></i><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a></li>
    </ul>
</div>