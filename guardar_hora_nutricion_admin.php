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
$fecha_nut=$_POST['fecha_nutricion'];
$hora_nutricion=$_POST['hora_nutricion'];



$sql_agen_nut="insert into ingreso_nutricion(fecha_ingreso,hora_ingreso,id_alumno)
values('$fecha_nut','$hora_nutricion',$id_alumno);";
if($conexion -> query($sql_agen_nut) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="agendar_hora_nutricion_admin.php";</script>';
}else{
    echo "Error:"  . $sql_agen_nut . " " . $conexion ->connect_error;
};


?>