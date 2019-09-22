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
        foreach( $id_taller as $codigo=>$valor){
           $array_taller= $valor;
        
                
//$sql="delete from talleres where id_taller=$valor;";


$sql="call del_taller($array_taller,$array_taller,$array_taller,$array_taller,$array_taller,$array_taller,$array_taller,$array_taller);";
if($conexion -> query($sql) == True ){      
    echo '<script> alert("Datos eliminados.Serás redireccionado a la página.");window.location.href="../admin_datos.php";</script>';
}else{
    echo '<script>alert("Error: " . $sql . " " . $conexion ->connect_error. "serás redireccionado");window.location.href="../admin_datos.php";</script>;';
}
};


?>
