<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Bookings list</title>
</head>
<body>
<table class = "table">
    <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>Varsta</th>
        <th>Pret</th>
        <th>Data creare</th>
        <th>Link</th>
    </tr>
    @foreach($bookings as $booking)
    <tr>
        <td>{{$booking->nume}}</td>
        <td>{{$booking->prenume}}</td>
        <td>{{$booking->age}}</td>
        <td>{{$booking->pret}}</td>
        <td>{{$booking->created_at}}</td>
        <td><a href="{{ route('bookings.show',[$booking->id])}}">view</a></td><!--bookings/show/{{$booking->id}}-->
    </tr>
    @endforeach
</table>
</body>
</html>