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
$fecha_psicomotricidad=$_POST['fecha_psicomotricidad'];
$hora_psicomotricidad=$_POST['hora_psicomotricidad'];



$sql_agen_psicomotricidad="insert into ingreso_psicomotricidad(fecha_ingreso,hora_ingreso,id_alumno)
values('$fecha_psicomotricidad','$hora_psicomotricidad',$id_alumno);";
if($conexion -> query($sql_agen_psicomotricidad) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="agendar_hora_psicomotricidad_admin.php";</script>';
}else{
    echo "Error:"  . $sql_agen_psicomotricidad . " " . $conexion ->connect_error;
};


?>