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
    <td>{{$booking->nume}}</td>
    </tr>
    <tr>
    <th>Prenume</th>
    <td>{{$booking->prenume}}</td>
    </tr>
    <tr>
    <th>Varsta</th>
    <td>{{$booking->age}}</td>
    </tr>
    <tr>
    <th>Pret</th>
    <td>{{$booking->pret}}</td>
    </tr>
</table>
</body>
</html>