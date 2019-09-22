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

$id_alumno=$_POST['id_alumno5'];

$edad=$_POST['edad_alumno'];




        
$sql="update alumnos set edad=$edad where id_alumno=$id_alumno ;";
if($conexion -> query($sql) == True){      
    echo '<script> alert("Datos modificados. Serás redireccionado a la página.");window.location.href="../lista_talleres_p.php";</script>';
}else{
    echo "Error" . $sql. " " . $conexion ->connect_error;
};


?>
