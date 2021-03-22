<!DOCTYPE html>
<html>
<head>
    <title>{{ $details['title'] }}</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>

    @foreach ($users as $item)
        <h5>Hola {{$item->name}}</h5>
        <h5>Tu vehiculo con placas: {{$item->Automovil->placas}}</h5>
    @endforeach

    <p>{{ $details['body'] }}</p>

    <p>Thank you</p>
</body>
</html>
