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

$id_alumno=$_POST['run_acu'];
$id_taller=$_POST['id_taller'];
$fecha=$_POST['fecha_acu'];
$hora=$_POST['hora_acu'];
$motivo=$_POST['motivo_acu'];
$diagnostico=$_POST['diagnostico'];
$observacion=$_POST['observacion'];
$sala=$_POST['sala'];
$prof=$_POST['prof'];
$sesion=$_POST['sesion'];



foreach( $sala as $codigo=>$valor){
    $array_sala=$valor;
    $array_profe=$prof[$codigo];

$sql_agen_acup="insert into agen_acupuntura(fecha_acupuntura,hora_acupuntura,id_alumno,motivo_consulta_acupuntura,diagnostico_acupuntura,observacion_acupuntura,sesion,id_sala,id_taller,id_profesional)
values('$fecha','$hora',$id_alumno,'$motivo','$diagnostico','$observacion','$sesion',$array_sala,$id_taller,$array_profe);";
if($conexion -> query($sql_agen_acup) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="acupuntura_admin.php";</script>';
}else{
    echo "Error" . $sql_agen_acup . " " . $conexion ->connect_error;
}
};






?>