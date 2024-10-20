<div id="modalCinema" class="modal">
    <div class="modal-content">
        <span class="fecharCinema fecharBtn">&times;</span>
        <h2>Cadastrar novo cinema</h2>
        <form method="post" id="cinemaForm">
            @csrf
            <div class="input-div">
                <label class="input-label" for="nomeCinema">Nome do cinema</label>
                <input type="text" required name="nomeCinema" id="nomeCinema" placeholder="Digite o nome do cinema">
            </div>
            <div class="input-div">
                <label class="input-label" for="telefoneCinema">Telefone</label>
                <input type="text" required name="telefoneCinema" id="telefoneCinema" placeholder="Digite o telefone do cinema" onkeyup="mascaraTelefone(this)" maxlength="15">
            </div>
            <div class="input-div">
                <label class="input-label" for="cepCinema">CEP</label>
                <input type="text" required name="cepCinema" id="cepCinema" placeholder="Digite o CEP do cinema" maxlength="8">
            </div>
            <div class="input-div">
                <label class="input-label" for="numLogradouroCinema">Nº do logradouro</label>
                <input type="text" required name="numLogradouroCinema" id="numLogradouroCinema" placeholder="Digite o número do logradouro">
            </div>
            <div class="input-div">
                <label class="input-label" for="dataInauguracao">Data de inauguração</label>
                <input type="date" required name="dataInauguracao" id="dataInauguracao" placeholder="Digite a data de inauguração">
            </div>
            <button type="submit" class="btn">Adicionar</button>
        </form>
    </div>
</div>