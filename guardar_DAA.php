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

$run_alumno=$_POST['run_acupuntura'];
$id_taller=$_POST['taller'];
$fecha=$_POST['fecha_acu'];
$hora=$_POST['hora_acu'];
$motivo=$_POST['motivo_acu'];
$diagnostico=$_POST['diagnostico'];
$observacion=$_POST['observacion'];
$sala=$_POST['sala'];
$prof=$_POST['prof'];
$sesion=$_POST['sesion'];
$nom_alumno=$_POST['nom_alumno'];
$edad=$_POST['edad'];
$tel_alumno=$_POST['tel_alumno'];
$nom_apod=$_POST['nom_apod'];
$telefono_apod=$_POST['tel_apod'];
$direccion_alum=$_POST['direc_alumno'];
$comuna_alum=$_POST['comuna_alumno'];
$correo_alumno=$_POST['correo_alumno'];
$patologia_alumno=$_POST['patologia_alumno'];
$fecha_nac=$_POST['fecha_nac'];

foreach( $sala as $codigo=>$valor){
    $array_sala=$valor;
    $array_taller=$id_taller[$codigo];
    $array_profe=$prof[$codigo];

$sql_agen_acup="insert into agen_acupuntura(fecha_acupuntura,hora_acupuntura,
run_alumno,nom_alumno , 
edad ,fecha_nac , telefono , nombre_apoderado ,telefono_apod , 
direccion_alumno ,
 comuna, correo,
patologias,motivo_consulta_acupuntura,diagnostico_acupuntura,observacion_acupuntura,sesion,id_taller,id_sala,id_profesional)
values('$fecha','$hora','$run_alumno','$nom_alumno',$edad,'$fecha_nac',
$tel_alumno,'$nom_apod',$telefono_apod,'$direccion_alum','$comuna_alum','$correo_alumno','$patologia_alumno','$motivo','$diagnostico','$observacion','$sesion',$array_taller,
$array_sala,$array_profe);";
if($conexion -> query($sql_agen_acup) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="acupuntura.php";</script>';
}else{
    echo "Error" . $sql_agen_acup . " " . $conexion ->connect_error;
}
};






?>