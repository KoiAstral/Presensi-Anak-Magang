<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit</title>
</head>
<body>
    <form method="POST" action="{{route('users.update', $)}}">
        @csrf
        @method('PUT')
        nama : <input type="text" name="nama" required value="{{old('nama')}}">
    </form>
</body>
</html>