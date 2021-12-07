<?php
    include_once('../config/cnx/conexion.php');
    require 'PHPMailer/PHPMailerAutoload.php';

    if(isset($_POST['send'])){
        if($_POST['send'] === 'enviarform'){

            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $age = $_POST['age'];
            $id = $_POST['id'];
            $weight = $_POST['weight'];
            $email = $_POST['email'];
            // ... hasta aqui
            $type = $_POST['type'];
            $date = $_POST['date'];
            $time = $_POST['time'];

            $query2 = "SELECT * FROM pacientes WHERE cedula='$id'";
            $rsQUERYLog2 = mysqli_query($con, $query2) or die('Error: ' . mysqli_error($con));
            $countQUERY = mysqli_num_rows($rsQUERYLog2);

            if($countQUERY > 0){

                $fileQUERYLog2 = mysqli_fetch_array($rsQUERYLog2);
                $idpaciente = $fileQUERYLog2['id'];

                $QUERYInt2 = "Insert Into examen (estatus, fecha, hora, tipo, resultado,
                idPaciente, idUser) ";
    
                $QUERYInt2 .= "values ('0', '$date', '$time', '$type', '', '$idpaciente', '1')";

                $rsQUERYInt2 = mysqli_query($con, $QUERYInt2) or die('Error: ' . mysqli_error($con));

                if($rsQUERYInt2 == true){

                    header('Location: ../indexEnfermero.php');

                }else{

                    header('Location: ../indexEnfermero.php');
                }

            } else {

                $QUERYInt = "Insert Into pacientes (nombre, apellido, edad, email, cedula,
                peso) ";
    
                $QUERYInt .= "values ('$name', '$lastname', '$age', '$email', '$id', '$weight')";
    
                $rsQUERYInt = mysqli_query($con, $QUERYInt) or die('Error: ' . mysqli_error($con));
    
                if($rsQUERYInt == true){
    
                    $QUERYLog2 = "SELECT * FROM pacientes WHERE cedula='$id'";
                    $rsQUERYLog2 = mysqli_query($con, $QUERYLog2) or die('Error: ' . mysqli_error($con));
                    $fileQUERYLog2 = mysqli_fetch_array($rsQUERYLog2);
                    $idpaciente = $fileQUERYLog2['id'];
    
                    $QUERYInt2 = "Insert Into examen (estatus, fecha, hora, tipo, resultado,
                    idPaciente, idUser) ";
        
                    $QUERYInt2 .= "values ('0', '$date', '$time', '$type', '', '$idpaciente', '1')";
    
                    $rsQUERYInt2 = mysqli_query($con, $QUERYInt2) or die('Error: ' . mysqli_error($con));
    
                    if($rsQUERYInt2 == true){
    
                        header('Location: ../indexEnfermero.php');
    
                    }else{
    
                        header('Location: ../indexEnfermero.php');
                    }
    
    
                } else {
                    echo 'Error no se pudo registrar el usuario';
                }

            }

        }

    } else if (isset($_POST['actualizar'])){

        if($_POST['actualizar'] == "actualizarexamen"){

            $result = $_POST['resultado'];
            $id = $_POST['id'];
            $pacienteid = $_POST['pacienteid'];
            $fecha = $_POST['fecha'];
            $tipo = $_POST['tipo'];

            $QUERYInt = "UPDATE examen ";
            $QUERYInt .= "SET resultado = '$result', estatus = '1' ";
            $QUERYInt .= "WHERE id = '$id'";

            $QUERYLog2 = "SELECT * FROM pacientes WHERE id='$pacienteid'";
            $rsQUERYLog2 = mysqli_query($con, $QUERYLog2) or die('Error: ' . mysqli_error($con));
            $fileQUERYLog2 = mysqli_fetch_array($rsQUERYLog2);

            $rsQUERYInt2 = mysqli_query($con, $QUERYInt) or die('Error: ' . mysqli_error($con));

            if($rsQUERYInt2 == true){

                require('../fpdf/fpdf.php');

                $pdf = new FPDF();
                $pdf->AddPage();
                $pdf->SetFont('Arial','B',20);
                $pdf->SetRightMargin('4');
                $pdf->Cell(50,15, utf8_decode('Laboratorio Clinico'));
                $pdf->SetFont('Arial','B',18);
                $pdf->Ln(15);
                $pdf->Cell(50,15, utf8_decode('Datos del paciente'));
                $pdf->SetFont('Arial','B',15);
                $pdf->Ln(9);
                $pdf->Cell(50,15, utf8_decode('Nombre: '.$fileQUERYLog2['nombre'].' '.$fileQUERYLog2['apellido']));
                $pdf->Ln(9);
                $pdf->Cell(50,15, utf8_decode('Cedula: '.$fileQUERYLog2['cedula']));
                $pdf->Ln(9);
                $pdf->Cell(50,15, utf8_decode('Edad: '.$fileQUERYLog2['edad']));
                $pdf->Ln(9);
                $pdf->Cell(50,15, utf8_decode('Peso: '.$fileQUERYLog2['peso'].'Kgs'));

                $pdf->Ln(15);
                $pdf->SetFont('Arial','B',18);
                $pdf->Cell(50,15, utf8_decode('Datos del examen'));
                $pdf->SetFont('Arial','B',15);
                $pdf->Ln(9);
                $pdf->Cell(50,15, utf8_decode('Fecha: '.$fecha));
                $pdf->Ln(9);
                $pdf->Cell(50,15, utf8_decode('Tipo de examen: '.$tipo));
                $pdf->Ln(9);
                $pdf->Cell(50,15, utf8_decode('Resultado: '.$result));

                $mt = explode(' ', microtime());
                $tiempo = ((int)$mt[1]) * 1000 + ((int)round($mt[0] * 1000));

                $namedocument = $_SERVER['DOCUMENT_ROOT'] . '/pdf/doc-'.$fileQUERYLog2['nombre'].'-'.$fileQUERYLog2['apellido'].'-'.str_replace(' ','-',$tipo).'-'.$tiempo.'.pdf';
                $pdf->Output("F", $namedocument);

                $pdfdoc = $pdf->Output("", "S");
    
                $name = $fileQUERYLog2['nombre'];
                $email = $fileQUERYLog2['email'];

                // Email Functionality

                date_default_timezone_set('Etc/UTC');
        
                $mail = new PHPMailer();
        
                $mail->setFrom($email);
                $mail->addAddress('mayrarincon04@gmail.com');
        
                // The subject of the message.
                $mail->Subject = 'Received Message From Client ' . $name;
        
                $message = '<html><body>';
        
                $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        
                $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($name) . "</td></tr>";
        
                $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($email) . "</td></tr>";

                $message .= "<tr><td><strong>Message</strong> </td><td>Resultado del examen del laboratorio</td></tr>";
        
                $message .= "</table>";
                $message .= "</body></html>";
                
                $mail->AddStringAttachment($pdfdoc, 'file.pdf');
        
                $mail->Body = $message;
        
                $mail->isHTML(true);
        
                header("Location: ../indexBioanalista.php");

                //email sending status

            }else{

                header('Location: ../indexBioanalista.php');
            }

        }
    }