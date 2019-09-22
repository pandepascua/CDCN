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

$prof=$_POST['prof'];



foreach( $prof as $codigo=>$valor){
    $array_prof=$valor;


        
$sql="update agen_psicomotricidad set id_profesional='$array_prof' where run_alumno='$id_alumno';";
if($conexion -> query($sql) == True){      
    echo '<script> alert("Datos modificados.Serás redireccionado a la página.");window.location.href="../psicomotricidad.php";</script>';
}else{
    echo "Error" . $sql. " " . $conexion ->connect_error;
}
};


?>
