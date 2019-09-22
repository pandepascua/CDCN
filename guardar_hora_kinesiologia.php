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
$fecha_kinesiologia=$_POST['fecha_kinesiologia'];
$hora_kinesiologia=$_POST['hora_kinesiologia'];



$sql_agen_kinesiologia="insert into ingreso_kinesiologia(fecha_ingreso,hora_ingreso,id_alumno)
values('$fecha_kinesiologia','$hora_kinesiologia',$id_alumno);";
if($conexion -> query($sql_agen_kinesiologia) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="agendar_hora_kinesiologia.php";</script>';
}else{
    echo "Error:"  . $sql_agen_kinesiologia . " " . $conexion ->connect_error;
};


?>