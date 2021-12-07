<?php

    include_once('config/auth/general.php');

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

    <br>

    <div class="container">

        <br>
        <h1>Examenes realizados recientemente</h1>
        <br>

        <ul>

        <?php

            $directorio = $_SERVER['DOCUMENT_ROOT'] . '/pdf';
            $ficheros2  = scandir($directorio, 1);

            for($i = 0; $i < count($ficheros2); $i++){
                if($ficheros2[$i] != '.' && $ficheros2[$i] != '..'){

        ?>

                    <li><a target="_blank" href="pdf/<?php echo $ficheros2[$i]; ?>"><?php echo $ficheros2[$i]; ?></a></li>

        <?php
                }
            }
    
        ?>

        </ul>

    </div>


    
</body>
</html>