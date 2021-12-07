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

        $QUERY = "SELECT examen.id, examen.estatus, examen.fecha, examen.hora, examen.tipo, pacientes.nombre, pacientes.apellido ";
        $QUERY = $QUERY . "FROM examen ";
        $QUERY = $QUERY . "inner JOIN pacientes ON examen.idPaciente = pacientes.id ";
        $QUERY = $QUERY . "ORDER BY examen.estatus;";

        $rsQUERY = mysqli_query($con, $QUERY) or die('Error: ' . mysqli_error($con));

    ?>

    <br>

    <div class="container">

        <h3>Examenes por revisar</h3>

        <br>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Dia</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Listo</th>
                </tr>
            </thead>

            <tbody>

                <?php

                    while($fileQUERY = mysqli_fetch_array($rsQUERY)){

                        if($fileQUERY['estatus'] == '0'){
                            $status = "table-danger";
                            $check = 'No';
                        } else{
                            $status = "table-success";
                            $check = 'Si';
                        }
                
                ?>

                        <tr class="<?php echo $status; ?>">
                            <td><?php echo $fileQUERY['fecha']; ?></td>
                            <td><?php echo $fileQUERY['hora']; ?></td>
                            <td><?php echo $fileQUERY['nombre'] . ' ' . $fileQUERY['apellido']; ?></td>
                            <td><?php echo $fileQUERY['tipo']; ?></td>
                            <td><?php echo $check; ?></td>
                            <?php
                                if($fileQUERY['estatus'] == '0'){
                            ?>
                                    <td><a style="text-decoration: none;" href="revisar.php?id=<?php echo $fileQUERY['id']; ?>">Revisar</a></td>
                            <?php
                                }
                            ?>
                        </tr>

                <?php 

                    }

                ?>
 
            </tbody>
        </table>




    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>