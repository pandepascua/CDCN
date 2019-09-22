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

$prof=$_POST['prof'];

$taller=$_POST['taller'];

foreach( $prof as $codigo=>$valor){
    $array_prof=$valor;
    $array_taller=$taller[$codigo];


        
$sql="update profesionales set id_taller=$array_taller where id_profesional=$array_prof ;";
if($conexion -> query($sql) == True){      
    echo '<script> alert("Datos modificados. Serás redireccionado a la página.");window.location.href="../admin_datos_admin.php";</script>';
}else{
    echo "Error" . $sql. " " . $conexion ->connect_error;
}
};


?>
