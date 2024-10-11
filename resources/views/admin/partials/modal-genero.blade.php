<div id="modalGenero" class="modal">
    <div class="modal-content">
        <span class="fecharGenero fecharBtn">&times;</span>
        <h2>Novo gênero</h2>
        <form method="post" action="{{url('adicionar-genero')}}">
            @csrf
            <div class="input-div">
                <input type="text" required name="nomeGenero" placeholder="Nome do gênero">
            </div>
            <button type="submit" class="btn">Adicionar</button>
        </form>
    </div>
</div>

<script src="{{ asset('js/modalGenero.js') }}"></script>