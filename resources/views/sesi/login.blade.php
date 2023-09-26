<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in page</title>
    <link rel="stylesheet" href="resource/css/app.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        * {
            background: #ff1d1d;        
        }
    </style>
</head>
<body>
    <section id="box-login">
        <form action="/login/proses" method="post">
            @csrf 
            <label for="e">E-mail</label>
            <input type="email" name="email" id="e">
            
            <label for="p">Password</label>
            <input type="password" name="password" id="p">
            <br>
            <button type="submit" name="submit">LOGIN</button>
        </form>
    </section>
</body>
</html>