@extends('template.main', ['menu' => "home", "submenu" => "Principal"])

@section('conteudo')

<div class="row">
    <div class="col overflow-auto" id="tabela" style="width: 640px; height: 480px;">
        <table class="table align-middle caption-top table-striped">
            <caption>Pokémons Cadastrados</caption>
            <thead>
                <tr>
                    <th scope="col" class="d-none d-md-table-cell">TIPOS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>Tipo 1: {{ $item['tipo']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col text-center" id="pizza" style="width: 640px; height: 480px;"></div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    let tipos = <?php echo $total_tipos ?>; 

    google.charts.load('current', {'packages':['corechart']})
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
     
        data = google.visualization.arrayToDataTable(tipos);

        options = {
            title: 'TIPOS DE POKÉMONS',
            is3D: true
        };

        // DESENHA GRÁFICO DE PIZZA 
        chart = new google.visualization.PieChart(document.getElementById('pizza'));
        chart.draw(data, options);
    }
</script>

<div class="row">
    <div class="col overflow-auto" id="tabela" style="width: 640px; height: 480px;">
        <table class="table align-middle caption-top table-striped">
            <caption>Pokémons Cadastrados</caption>
            <thead>
                <tr>
                    <th scope="col" class="d-none d-md-table-cell">TIPOS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>Tipo 2: {{ $item['tipo']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col text-center" id="pizza" style="width: 640px; height: 480px;"></div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    let tipos = <?php echo $total_tipos ?>; 

    google.charts.load('current', {'packages':['corechart']})
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
     
        data = google.visualization.arrayToDataTable(tipos);

        options = {
            title: 'TIPOS SECUNDÁRIOS DE POKÉMONS',
            is3D: true
        };

        // DESENHA GRÁFICO DE PIZZA 
        chart = new google.visualization.PieChart(document.getElementById('pizza'));
        chart.draw(data, options);
    }
</script>

@endsection
