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

$id_alumno=$_POST['id_alumno10'];
        
$sql="delete from alumnos where id_alumno=$id_alumno ;";
if($conexion -> query($sql) == True){      
    echo '<script> alert("Datos eliminados.Serás redireccionado a la página.");window.location.href="../lista_talleres_p.php";</script>';
}else{
    echo '<script>alert("Error: " . $sql . " " . $conexion ->connect_error. "serás redireccionado");window.location.href="../lista_talleres_p.php";</script>;';
};


?>
