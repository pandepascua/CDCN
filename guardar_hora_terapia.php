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
$fecha_terapia=$_POST['fecha_terapia'];
$hora_terapia=$_POST['hora_terapia'];



$sql_agen_terapia="insert into ingreso_terapia(fecha_ingreso,hora_ingreso,id_alumno)
values('$fecha_terapia','$hora_terapia',$id_alumno);";
if($conexion -> query($sql_agen_terapia) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="agendar_hora_terapia.php";</script>';
}else{
    echo "Error:"  . $sql_agen_terapia . " " . $conexion ->connect_error;
};


?>