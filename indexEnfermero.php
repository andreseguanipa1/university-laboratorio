<?php
    include_once('config/auth/enfermero.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Document</title>
</head>
<body>

    <?php
        include_once('assets/navbar.php');
    ?>

    <div class="container">

    <br>

    <form class="form" action="process/examenes.php" method="post">
        <div class="form-group">
            <label>Nombre del paciente</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nombre">
        </div>

        <br>

        <div class="form-group">
            <label>Apellido del paciente</label>
            <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="apellido">
        </div>

        <br>

        <div class="form-group">
            <label>Cedula de Identidad del Paciente</label>
            <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="cedula">
        </div>

        <br>

        <div class="form-group">
            <label>Edad del Paciente</label>
            <input type="text" name="age" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="edad">
        </div>

        <br>

        <div class="form-group">
            <label>Peso del Paciente (Kg)</label>
            <input type="text" name="weight" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="peso">
        </div>

        <br>

        <div class="form-group">
            <label>Email del Paciente</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
        </div>

        <br>

        <div class="form-group">
            <label>Tipo de Examen</label>
            <select class="form-control" name="type" id="exampleFormControlSelect1">
                <option value="">---- Selecciona</option>
                <option value="Tipo de Sangre">Tipo de Sangre</option>
                <option value="Hemograma completo">Hemograma completo</option>
                <option value="Urinálisis completo">Urinálisis completo</option>
                <option value="Heces por parásito, sangre oculta">Heces por parásito, sangre oculta</option>
                <option value="Colesterol">Colesterol</option>
                <option value="Glucosa">Glucosa</option>
                <option value="TSH">TSH</option>
                <option value="Bilirrubina">Bilirrubina</option>
            </select>
        </div>

        <br>

        <div class="form-group">
            <label>Fecha del Examen</label>
            <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="fecha">
        </div>

        <br>

        <div class="form-group">
            <label>Hora del Examen</label>
            <input type="time" name="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="fecha">
        </div>

        <br>

        <button type="submit" name="send" value="enviarform" class="btn btn-primary">Submit</button>
    </form>
        
    </div>

    <br>
    <br>
    <br>
    <br>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>