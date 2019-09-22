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

$sala=$_POST['sala'];
$prof=$_POST['prof'];
$fecha_maso=$_POST['fecha'];
$hora_maso=$_POST['hora'];
$atencion=$_POST['atencion_maso'];
$sesion=$_POST['sesion_maso'];
$observacion=$_POST['observacion_maso'];
$estado=$_POST['estado_maso'];
$ejercicio=$_POST['ejercicio_maso'];
$proced_tens=$_POST['tens_maso'];
$proced_us=$_POST['us_maso'];
$proced_chc=$_POST['chc_maso'];
$proced_ir=$_POST['ir_maso'];

$run_alumno=$_POST['run'];
$id_taller=$_POST['taller'];
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

        
$sql_agen_maso="insert into agen_masoterapia(fecha_maso,hora_maso,run_alumno ,nom_alumno , 
edad ,fecha_nac, telefono, nombre_apoderado,
telefono_apod , direccion_alumno ,
 comuna , correo,
patologias ,
                atencion_maso,observacion_maso,sesion_maso,estado_maso,ejercicio_maso,
                proced_tens_maso,proced_us_maso,proced_chc_maso,proced_ir_maso,id_sala,id_taller,id_profesional)
values('$fecha_maso','$hora_maso','$run_alumno','$nom_alumno',$edad,'$fecha_nac',
$tel_alumno,'$nom_apod',$telefono_apod,'$direccion_alum','$comuna_alum','$correo_alumno','$patologia_alumno','$atencion','$observacion',$sesion,'$estado',
    '$ejercicio','$proced_tens','$proced_us','$proced_chc','$proced_ir',$array_sala,$array_taller,$array_profe);";
if($conexion -> query($sql_agen_maso) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="masoterapia.php";</script>';
}else{
    echo "Error: " . $sql_agen_maso . " " . $conexion ->connect_error;
}
};


?>