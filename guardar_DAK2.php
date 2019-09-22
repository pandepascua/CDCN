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

$id_alumno=$_POST['run'];
$id_taller=$_POST['taller'];
$sala=$_POST['sala'];
$prof=$_POST['prof'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$atencion=$_POST['atencion_kine'];
$sesion=$_POST['sesion_kine'];
$observacion=$_POST['observacion_kine'];
$estado=$_POST['estado_kine'];
$ejercicio=$_POST['ejercicio_kine'];
$proced_tens=$_POST['tens_kine'];
$proced_us=$_POST['us_kine'];
$proced_chc=$_POST['chc_kine'];
$proced_ir=$_POST['ir_kine'];
$nom_alumno=$_POST['nom_alumno'];
$edad=$_POST['edad'];
$telefono=$_POST['tel_alumno'];
$nom_apod=$_POST['nom_apod'];
$tel_apod=$_POST['tel_apod'];
$fecha_nac=$_POST['fecha_nac'];
$direc_alumno=$_POST['direc_alumno'];
$comuna=$_POST['comuna_alumno'];
$correo=$_POST['correo_alumno'];
$patologia=$_POST['patologia_alumno'];





foreach( $sala as $codigo=>$valor){
    $array_sala=$valor;
    $array_profe=$prof[$codigo];
    $array_taller=$id_taller[$codigo];

        
$sql_agen_kine="insert into agen_kinesiologia(fecha_kin,hora_kine,run_alumno,nom_alumno,edad,fecha_nac,telefono,
nombre_apoderado,telefono_apod,direccion_alumno,comuna,correo,patologias,
                atencion_kine,observacion_kine,sesion_kine,estado_kine,ejercicio_kine,
                proced_tens_kine,proced_us_kine,proced_chc_kine,proced_ir_kine,id_sala,id_taller,id_profesional)
values('$fecha','$hora','$id_alumno','$nom_alumno',$edad,'$fecha_nac',$telefono,'$nom_apod',$tel_apod,'$direc_alumno','$comuna','$correo','$patologia','$atencion','$observacion',$sesion,'$estado',
    '$ejercicio','$proced_tens','$proced_us','$proced_chc','$proced_ir',$array_sala,$array_taller,$array_profe);";
if($conexion -> query($sql_agen_kine) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="kinesiologia_admin.php";</script>';
}else{
    echo '<script>alert("Error: " . $sql_agen_kine . " " . $conexion ->connect_error. "serás redireccionado");window.location.href="kinesiologia_admin.php";</script>;';
}
};


?>