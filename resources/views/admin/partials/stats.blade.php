<div class="header">
    <h1>Dashboard</h1>
    <button class="config-button">Configurações</button>
</div>

<div class="stats">
    <div class="stat-box">
        <h3>Usuários</h3>
        @php
            $i = 0;
        @endphp

        @foreach ($usuarios as $usuario)
            @if ($usuario->excluido == 0)
                @php
                    $i++;
                @endphp
            @endif
        @endforeach
        <p>{{ $i }}</p>
    </div>
    <div class="stat-box">
        <h3>Ingressos vendidos</h3>
        <p>100</p>
    </div>
    <div class="stat-box">
        <h3>Lucro</h3>
        <p>R$ 8,000</p>
    </div>
</div>