<?php
    include_once('config/auth/bioanalista.php');
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

        $id = $_GET['id'];
        $QUERY = "SELECT examen.id, examen.fecha, examen.hora, examen.tipo, pacientes.id AS pacienteid, pacientes.nombre, pacientes.apellido ";
        $QUERY = $QUERY . "FROM examen ";
        $QUERY = $QUERY . "inner JOIN pacientes ON examen.idPaciente = pacientes.id ";
        $QUERY = $QUERY . "WHERE examen.id='$id';";
        
        $rsQUERYLog = mysqli_query($con, $QUERY) or die('Error: ' . mysqli_error($con));
        $fileQUERYLog = mysqli_fetch_array($rsQUERYLog);

    ?>

        <br>

        <form class="form" method="post" action="process/examenes.php">
            <fieldset disabled>
                <div class="form-group">
                    <label for="disabledTextInput">Nombre</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $fileQUERYLog['nombre'] . ' ' . $fileQUERYLog['apellido']; ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="disabledTextInput">Fecha</label>
                    <input type="text" id="disabledTextInput" value="<?php echo $fileQUERYLog['fecha'] . ' a las ' . $fileQUERYLog['hora']; ?>" class="form-control" placeholder="<?php echo $fileQUERYLog['fecha'] . ' a las ' . $fileQUERYLog['hora']; ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="disabledTextInput">Tipo de examen</label>
                    <input type="text" id="disabledTextInput" value="<?php echo $fileQUERYLog['tipo']; ?>" class="form-control" placeholder="<?php echo $fileQUERYLog['tipo']; ?>">
                </div>

                <br>

            </fieldset>

            <div class="form-group">
                <label>Resultado</label><br>
                <textarea style="resize: none; width: 400px; height: 300px;" class="resultado" name="resultado" id="" cols="30" rows="8"></textarea>
            </div>

            <br>

            <input type="hidden" name="id" value="<?php echo $fileQUERYLog['id']; ?>">
            <input type="hidden" name="pacienteid" value="<?php echo $fileQUERYLog['pacienteid']; ?>">
            <input type="hidden" name="tipo" value="<?php echo $fileQUERYLog['tipo']; ?>">
            <input type="hidden" name="fecha" value="<?php echo $fileQUERYLog['fecha'] . ' a las ' . $fileQUERYLog['hora']; ?>">


            <button type="submit" name="actualizar" value="actualizarexamen" class="btn btn-primary">Submit</button>

        </form>

        <br>
        <br>

    
</body>
</html>