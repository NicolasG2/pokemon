@extends('template.main', ['menu' => "home", "submenu" => "Principal"])

@section('conteudo')

<div class="row">
    <div class="col overflow-auto" id="tabela" style="width: 640px; height: 480px;">
        <table class="table align-middle caption-top table-striped">
            <caption>Pokémons Cadastrados</caption>
            <thead>
            <tr>
                <th scope="col" class="d-none d-md-table-cell">TIPO1</th>
                <th scope="col">TIPO2</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item['tipo1'] }} - {{ $item['pokemon'] }}</td>
                        <td>{{ $item['tipo2'] }} - {{ $item['pokemon'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col text-center" id="barra" style="width: 640px; height: 480px;"></div>
</div>
<div class="row">
    <div class="col text-center" id="pizza" style="width: 640px; height: 480px;"></div>
    <div class="col text-center" id="coluna" style="width: 640px; height: 480px;"></div>
</div>

@endsection

@section('script')

    <script type="text/javascript">

    let pokemons = <?php echo json_encode($total_pokemons); ?>;
    let tipos1 = <?php echo json_encode($total_tipos1); ?>;
    let tipos2 = <?php echo json_encode($total_tipos2); ?>;


        google.charts.load('current', {'packages':['corechart']})
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            // POKÉMONS
            // Dados do Gráfico    
            let data = google.visualization.arrayToDataTable(pokemons);

            // Opções de Configuração
            options = {
                title: 'POKÉMONS DO TIME',
                colors: ['#198754'],
                legend: 'none',
                hAxis: {
                    title: 'Quantidade',
                    titleTextStyle: {
                        fontSize: 12,
                        bold: true,
                    }
                },
                vAxis: {
                },
            };

            // TIPOS
            // Dados do Gráfico    
            data = google.visualization.arrayToDataTable(tipos1);
            data = google.visualization.arrayToDataTable(tipos2);

            // DESENHA GRÁFICO DE PIZZA
            chart = new google.visualization.PieChart(document.getElementById('pizza'));
            chart.draw(data, options);

        }


</script>

@endsection

