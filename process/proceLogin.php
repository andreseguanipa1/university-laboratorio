<?php
include_once('../config/cnx/conexion.php');
session_start();
$email = null;
$pwd = null;

if(isset($_POST['btn'])){

    if(isset($_POST['username']) && isset($_POST['pwd']) && !empty($_POST['username']) && !empty($_POST['pwd'])){

        echo 'Recibio del POST', '<br />';
        $email = $_POST['username'];
        $pwd = md5($_POST['pwd']);

        echo $email, '<br />';
        echo $pwd, '<br />';

        $QUERYLog = "SELECT * FROM users WHERE username='$email' AND password='$pwd'";

        $rsQUERYLog = mysqli_query($con, $QUERYLog) or die('Error: ' . mysqli_error($con));

        $fileQUERYLog = mysqli_fetch_array($rsQUERYLog);

        $NofileQUERYLog = mysqli_num_rows($rsQUERYLog);

        echo $QUERYLog;

        if($NofileQUERYLog > 0){
            
            $_SESSION['id'] = $fileQUERYLog['id'];
            $_SESSION['fullName'] = $fileQUERYLog['nombre'] . ' ' .$fileQUERYLog['apellido'];
            $_SESSION['role'] = $fileQUERYLog['role'];

            echo '<br />';

            if($fileQUERYLog['role'] === "Enfermero"){
                header('Location: ../indexEnfermero.php');

            } else {
                header('Location: ../indexBioanalista.php');

            }


        } else{
            session_destroy();
            header('Location: ../index.php');
        }

    } else{
        session_destroy();
        header('Location: ../index.php');
    }

}else{
    session_destroy();
    header('Location: ../index.php');
}

mysqli_close($con);
?>
