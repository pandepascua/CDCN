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

$run=$_POST['run'];
$Heridas=$_POST['Heridas'];
$Hematoma=$_POST['Hematoma'];
$Hongos=$_POST['Hongos'];
$Cicatríz=$_POST['Cicatríz'];
$Lunar=$_POST['Lunar'];
$Dolor=$_POST['Dolor'];
$Observaciones=$_POST['Observaciones'];
$Fecha=$_POST['Fecha'];
$sesión=$_POST['sesión'];
$comentario=$_POST['comentario'];

$sql1="insert into masoterapia(
    run ,
    Heridas,
    Hematoma,
    Hongos,
    Cicatríz,
    Lunar,
    Dolor,
    Observaciones,
    Fecha,
    sesión,
    comentario
)values(
'$run ',
'$Heridas',
'$Hematoma',
'$Hongos',
'$Cicatríz',
'$Lunar',
'$Dolor',
'$Observaciones',
'$Fecha',
'$sesión',
'$comentario'
)";
 
//var_dump($sql1);

if($conexion -> query($sql1) == True){   
    $ultimo_id1=mysqli_insert_id($conexion); 

  // echo"datos insertados". $sql1;
   echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="registro_ficha_maso_admin_kine.php";</script>';
}else{
   echo "Error " . $sql1 . " " . $conexion ->connect_error;
};





?>