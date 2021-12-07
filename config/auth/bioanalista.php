<?php
include_once('config/cnx/conexion.php');
session_start();

if(isset($_SESSION['role']) && isset($_SESSION['id'])){

    $ID = $_SESSION['id'];
    $ROLE = $_SESSION['role'];

    if($ROLE === 'Bioanalista'){

        $QUERY = "SELECT * FROM users WHERE id='$ID' AND role='$ROLE'";
        $rsQUERY = mysqli_query($con, $QUERY) or die('Error: ' . mysqli_error($con));
        $countQUERY = mysqli_num_rows($rsQUERY);
        $ver = 'indexBioanalista.php';
        $navbar = 'Bioanalista';
    
        if($countQUERY <= 0){
            header('Location: index.php');
        }    

    } else {

        include_once('../../process/proceLogout.php');

    }


}else{

    header('Location: index.php');

}