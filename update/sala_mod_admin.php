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

$sala=$_POST['sala'];

$nueva_sala=$_POST['nueva_sala'];

foreach( $sala as $codigo=>$valor){
    $array_sala=$valor;


        
$sql="update salas set nom_sala='$nueva_sala' where id_sala=$array_sala ;";
if($conexion -> query($sql) == True){      
    echo '<script> alert("Datos modificados. Serás redireccionado a la página.");window.location.href="../admin_datos_admin.php";</script>';
}else{
    echo "Error" . $sql. " " . $conexion ->connect_error;
}
};


?>
