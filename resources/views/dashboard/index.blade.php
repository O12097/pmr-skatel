@if (Auth::check())

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h1>DASHBOARD</h1>
        <marquee behavior="" direction="">Anda sedang berada di halaman dashboard</marquee>

        <button><a href="/logout">Log out</a></button>
</body>
</html>

@endif
