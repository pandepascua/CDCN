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

$run=$_POST['run'];
        
$sql="delete from t_ocupacional where run='$run';";

if($conexion -> query($sql) == True){     
   // echo $sql; 
    echo '<script> alert("Datos eliminados.Serás redireccionado a la página.");window.location.href="../eli_terapia.php";</script>';
}else{
echo "Error:". $sql .'' . $conexion ->connect_error;

echo '<script> alert("Datos eliminados.Serás redireccionado a la página.");window.location.href="../eli_terapia.php";</script>';
};


?>
