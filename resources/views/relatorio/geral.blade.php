<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PokeTeam</title>
</head>
<body>
    <div style="width: 20%; float:left">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pokeball.png'))) }}" width="96" height="96">
    </div>
    <div style="width: 80%; float:right">
        <h1 style="text-align: center;">PokeTeam</h1>
        <h4 style="text-align: center;">Criação de times pokémon</h4>
    </div>    
    <br><br><br><br><br><br><hr>
    <div style="text-align: center;">
        <h2>Relatório de Times</h2>
    </div>
    <br>
    <table>
        <tbody>
            @foreach($data as $item)
            <tr style="text-align: center;">
                <td style="width: 60px; border-style: solid; border-width: 1px; height:30px;">TIME</td>
                <td style="width: 110px;">{{ $item['pokemon1'] }}</td>
                <td style="width: 110px;">{{ $item['pokemon2'] }}</td>
                <td style="width: 110px;">{{ $item['pokemon3'] }}</td>
                <td style="width: 110px;">{{ $item['pokemon4'] }}</td>
                <td style="width: 110px;">{{ $item['pokemon5'] }}</td>
                <td style="width: 110px;">{{ $item['pokemon6'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
