<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index user</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>no</th>
                <th>nama</th>
                <th>nomor induk</th>
                <th>email</th>
                <th>status</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )
            <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->nama}}</td>
                    <td>{{$user->nomor_induk}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->status}}</td>
                </tr>
            @endforeach>
        </tbody>
    </table>
</body>
</html>