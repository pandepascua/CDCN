<?php

$servidor="localhost";
$usuario="root";
$password="root";
$bd="cdcn";

    $conexion= new mysqli($servidor,$usuario,$password,$bd);
    if($conexion->connect_error){
        die("error de conexion!".$conexion->connect_error);
    };
        //echo "conexion exitosa";

$id_alumno=$_POST['id_alumno'];
$fecha_acupuntura=$_POST['fecha_acupuntura'];
$hora_acupuntura=$_POST['hora_acupuntura'];



$sql_agen_acupuntura="insert into ingreso_acupuntura(fecha_ingreso,hora_ingreso,id_alumno)
values('$fecha_acupuntura','$hora_acupuntura',$id_alumno);";
if($conexion -> query($sql_agen_acupuntura) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="agendar_hora_acupuntura.php";</script>';
}else{
    echo "Error:"  . $sql_agen_acupuntura . " " . $conexion ->connect_error;
};


?>