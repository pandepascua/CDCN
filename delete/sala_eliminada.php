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

        $id_sala=$_POST['sala'];  
        
        
        foreach( $id_sala as $codigo=>$valor){
           $array_sala= $valor;
        
                
$sql="delete from salas where id_sala=$array_sala;";

if($conexion -> query($sql) == True ){      
    echo '<script> alert("Datos eliminados.Serás redireccionado a la página.");window.location.href="../admin_datos.php";</script>';
}else{
    echo '<script>alert("Error: " . $sql . " " . $conexion ->connect_error. "serás redireccionado");window.location.href="../admin_datos.php";</script>;';
}
};


?>
