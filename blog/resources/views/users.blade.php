<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<h1 style="margin-left: 30px">Vartotojai</h1>

<table class="table table-responsive table-hover" style="margin: 20px 30px">
    <thead class="thead-dark">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr>
        <td>
            {{ $user -> id }}
        </td>
        <td>
            {{ $user -> name }}
        </td>
        <td>
            {{ $user -> email }}
        </td>
    </tr>
    </tbody>
    @endforeach
</table>

</body>
</html>