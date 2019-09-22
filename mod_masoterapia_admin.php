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
$id_masoterapia=$_POST['id_masoterapia'];
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

$sql1="update masoterapia set
run ='$run',
Heridas ='$Heridas',
Hematoma ='$Hematoma',
Hongos ='$Hongos',
Cicatríz ='$Cicatríz',
Lunar ='$Lunar',
Dolor ='$Dolor',
Observaciones ='$Observaciones',
Fecha ='$Fecha',
sesión ='$sesión',
comentario  ='$comentario'
where id_masoterapia=$id_masoterapia;";
  

//var_dump($sql1);

if($conexion -> query($sql1) == True){   
    $ultimo_id1=mysqli_insert_id($conexion); 

   echo"datos insertados". $sql1;
   echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="modificacion_maso_admin_kine.php";</script>';
}else{
   echo "Error" . $sql1 . " " . $conexion ->connect_error;
};

?>