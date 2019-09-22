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
        
$sql="delete from ficha_eva_func_1 where run='$run';";

if($conexion -> query($sql) == True){     
    //echo $sql; 
    echo '<script> alert("Datos eliminados.Serás redireccionado a la página.");window.location.href="../evaluacion_funcional_eliminar_admin.php";</script>';
}else{
echo "Error:". $sql .'' . $conexion ->connect_error;

    echo '<script>alert("Error: " . $sql . " " . $conexion ->connect_error. "serás redireccionado");window.location.href="../evaluacion_funcional_eliminar_admin.php";</script>;';
};


?>
