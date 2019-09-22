
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

$taller=$_POST['taller'];
$run=$_POST['run_prof'];
$nombre=$_POST['nombre_prof'];

foreach( $taller as $codigo=>$valor){
    $array_taller=$valor;

$sql="insert into profesionales(run_profesional,nom_profesional,id_taller)
values('$run','$nombre',$array_taller);";
if($conexion -> query($sql) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="admin_datos.php";</script>';
}else{
    echo '<script>alert("Error: " . $sql . " " . $conexion ->connect_error. "serás redireccionado");window.location.href="admin_datos.php";</script>;';
}
};



?>



