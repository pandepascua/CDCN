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
        
$sql="delete from agen_masoterapia where run_alumno='$id_alumno' ;";
if($conexion -> query($sql) == True){      
    echo '<script> alert("Datos eliminados.Serás redireccionado a la página.");window.location.href="../masoterapia.php";</script>';
}else{
    echo "Error: " . $sql . " " . $conexion ->connect_error;

    //echo '<script>alert("Error: " . $sql . " " . $conexion ->connect_error. "serás redireccionado");window.location.href="../masoterapia.php";</script>;';
};


?>
