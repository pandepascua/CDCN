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

$run_alumno=$_POST['run_ek2'];
        
$sql="delete from ficha_ev_kine where run_alumno='$run_alumno' ;";
if($conexion -> query($sql) == True){      
    echo '<script> alert("Datos eliminados.Serás redireccionado a la página.");window.location.href="../fichakinemaso_kine.php";</script>';
}else{
    echo '<script>alert("Error: " . $sql . " " . $conexion ->connect_error. "serás redireccionado");window.location.href="../fichakinemaso_kine.php";</script>;';
};


?>
