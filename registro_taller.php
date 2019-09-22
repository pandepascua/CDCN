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

$taller=$_POST['nom_taller'];
$recinto=$_POST['recinto'];
$descripcion=$_POST['descripcion'];





$sql="insert into talleres(nom_taller,recinto,descripcion)
values('$taller','$recinto','$descripcion');";
if($conexion -> query($sql) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="admin_datos.php";</script>';
}else{
    echo '<script>alert("Error: " . $sql . " " . $conexion ->connect_error. "serás redireccionado");window.location.href="admin_datos.php";</script>;';
};






?>