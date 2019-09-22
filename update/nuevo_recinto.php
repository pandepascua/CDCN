
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

$id_taller=$_POST['taller'];

$nuevo_recinto=$_POST['nuevo_recinto'];

foreach( $id_taller as $codigo=>$valor){
    $array_taller=$valor;


        
$sql="update talleres set recinto='$nuevo_recinto' where id_taller=$array_taller ;";
if($conexion -> query($sql) == True){      
    echo '<script> alert("Datos modificados. Serás redireccionado a la página.");window.location.href="../admin_datos.php";</script>';
}else{
    echo "Error" . $sql. " " . $conexion ->connect_error;
}
};


?>
