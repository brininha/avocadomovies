@if (session('message'))
<div id="modalAlert" class="modal">
    <div class="modal-content">
        <p style="text-align: center">{{ session('message') }}</p>
        <span class="fecharMensagem fecharBtn">&times;</span>
    </div>
</div>
@endif

@if($errors->any())
<div id="modalAlert" class="modal">
    <div class="modal-content">
        <p>{{ $errors->first() }}</p>
        <span class="fecharMensagem fecharBtn">&times;</span>
    </div>
</div>
@endif