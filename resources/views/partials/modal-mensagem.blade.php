@if (session('message'))
<div id="modalAlert" class="modal">
    <div class="modal-content">
        <p>{{ session('message') }}</p>
        <span class="fecharMensagem">&times;</span>
    </div>
</div>
@endif

@if($errors->any())
<div id="modalAlert" class="modal">
    <div class="modal-content">
        <p>{{ $errors->first() }}</p>
        <span class="fecharMensagem">&times;</span>
    </div>
</div>
@endif

<script src="{{ asset('js/modalAlert.js') }}"></script>