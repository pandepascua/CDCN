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
$fecha_masoterapia=$_POST['fecha_masoterapia'];
$hora_masoterapia=$_POST['hora_masoterapia'];



$sql_agen_masoterapia="insert into ingreso_masoterapia(fecha_ingreso,hora_ingreso,id_alumno)
values('$fecha_masoterapia','$hora_masoterapia',$id_alumno);";
if($conexion -> query($sql_agen_masoterapia) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="agendar_hora_masoterapia_admin.php";</script>';
}else{
    echo "Error:"  . $sql_agen_masoterapia . " " . $conexion ->connect_error;
};


?>