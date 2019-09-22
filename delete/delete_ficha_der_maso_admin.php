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

$run_alumno=$_POST['run'];
        
$sql="delete from ficha_derivacion where run_alumno='$run_alumno'";
if($conexion -> query($sql) == True){   
    //echo $sql;   
    echo '<script> alert("Datos eliminados.Serás redireccionado a la página.");window.location.href="../masoterapia_admin.php";</script>';
}else{
    echo"Error: " . $sql . " " . $conexion ->connect_error;
};


?>
