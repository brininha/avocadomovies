<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Avocado | Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
  <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css') }}">
</head>

<body>
  <div class="dashboard">
    @include('admin.partials.sidebar')
    <div class="main-content">
      @include('admin.partials.stats')
      <div id="piechart_div"></div>
      <div class="row">
        <div id="geochart_div"></div>
        <div id="columnchart_div"></div>
      </div>
    </div>
  </div>

  @if (session('message'))
      <div id="modalAlert" class="modal">
          <div class="modal-content">
              <p>{{ session('message') }}</p>
              <span class="fecharMensagem">&times;</span>
          </div>
      </div>
  @endif
  </div>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="{{ asset('js/columnChart.js') }}"></script>
  <script src="{{ asset('js/geoChart.js') }}"></script>
  <script src="{{ asset('js/pieChart.js') }}"></script>
</body>

</html>