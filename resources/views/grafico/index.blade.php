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
                        <td>Tipo 1: {{ isset($item['tipo1'])}}</td>
                        <td>Tipo 2: {{ isset($item['tipo2'])}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col text-center" id="pizza" style="width: 640px; height: 480px;">a</div>
</div>
@endsection

@section('script')

<script type="text/javascript">
    let tipos = <?php echo json_encode($total_tipos); ?>;
    
    google.charts.load('current', {'packages':['corechart']})
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Opções de Configuração
        options = {
            title: 'TIPOS DO TIME',
            colors: ['#198754'],
            legend: 'none',
            hAxis: {
                title: 'Quantidade',
                titleTextStyle: {
                    fontSize: 12,
                    bold: true,
                }
            },
            vAxis: {},
        };

        // Dados do Gráfico    
        data = google.visualization.arrayToDataTable(tipos);

        // DESENHA GRÁFICO DE PIZZA
        chart = new google.visualization.PieChart(document.getElementById('pizza'));
        chart.draw(data, options);
    }
</script>

@endsection