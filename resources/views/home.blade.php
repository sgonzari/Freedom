<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sebastián González Ríos">
    <title>Freedom / Home</title>
</head>
<body>
    <h1>Bienvenido {{ Auth::user()->username }}</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <input type="submit" value="logout">
    </form>
</body>
</html>