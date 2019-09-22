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

$sala=$_POST['nom_sala'];






$sql="insert into salas(nom_sala)
values('$sala');";
if($conexion -> query($sql) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="admin_datos.php";</script>';
}else{
    echo '<script>alert("Error: " . $sql . " " . $conexion ->connect_error. "serás redireccionado");window.location.href="admin_datos.php";</script>;';
};






?>