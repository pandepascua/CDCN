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

$id_alumno=$_POST['id_alumno2'];

$fecha2=$_POST['fecha'];




        
$sql="update agen_acupuntura set fecha_acupuntura='$fecha2' where run_alumno='$id_alumno' ;";
if($conexion -> query($sql) == True){      
    echo '<script> alert("Datos modificados. Serás redireccionado a la página.");window.location.href="../acupuntura.php";</script>';
}else{
    echo "Error" . $sql. " " . $conexion ->connect_error;
};


?>
