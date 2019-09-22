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
$run_alumno=$_POST['run_alumno'];
$nombre_alumno=$_POST['nom_alumno'];
$edad_alumno=$_POST['edad_alumno'];
$telefono_alumno=$_POST['tel_alumno'];
$nom_apod=$_POST['nom_apod'];
$telefono_apod=$_POST['tel_apod'];
$direccion_alum=$_POST['direc_alumno'];
$comuna_alum=$_POST['comuna_alumno'];
$correo_alumno=$_POST['correo_alumno'];
$patologia_alumno=$_POST['patologia_alumno'];
$fecha_nac=$_POST['fecha_nac'];
        

foreach( $id_taller as $codigo=>$valor){
    $array_taller=$valor;
$sql="insert into alumnos(run_alumno,nom_alumno,edad,fecha_nac,telefono,nombre_apoderado,telefono_apod,direccion_alumno,comuna,correo,patologias,id_taller)
values('$run_alumno','$nombre_alumno',$edad_alumno,'$fecha_nac',$telefono_alumno,'$nom_apod',$telefono_apod,'$direccion_alum','$comuna_alum','$correo_alumno','$patologia_alumno',$array_taller);";
if($conexion -> query($sql) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="lista_talleres.php";</script>';
}else{
    echo '<script>alert("Error: " . $sql . " " . $conexion ->connect_error. "serás redireccionado");window.location.href="lista_talleres.php";</script>;';
}
};


?>