<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laboratorio Clinico</title>
</head>

<body>
    <form name="form1" class="form" action="process/proceLogin.php" method="post">
        <h1>Laboratorio Clinico</h1>
        <hr>
        <h2>Inicio de Sesion</h2>

        <label>User:</label><br />
        <input type="text" name="username"><br />
        <label>Password:</label><br />
        <input type="password" name="pwd"><br />

        <br />
        <button type="submit" name="btn" class="btn btn-default">Entrar</button>
    </form>
</body>

</html>