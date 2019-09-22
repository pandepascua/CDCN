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

$id_alumno=$_POST['token_run'];
$sala=$_POST['sala'];
$prof=$_POST['prof'];
$id_taller=$_POST['id_taller'];
$fecha_maso=$_POST['fecha_maso'];
$hora_maso=$_POST['hora_maso'];
$atencion=$_POST['atencion_maso'];
$sesion=$_POST['sesion_maso'];
$observacion=$_POST['observacion_maso'];
$estado=$_POST['estado_maso'];
$ejercicio=$_POST['ejercicio_maso'];
$proced_tens=$_POST['tens_maso'];
$proced_us=$_POST['us_maso'];
$proced_chc=$_POST['chc_maso'];
$proced_ir=$_POST['ir_maso'];




foreach( $sala as $codigo=>$valor){
    $array_sala=$valor;
    $array_profe=$prof[$codigo];

        
$sql_agen_maso="insert into agen_masoterapia(fecha_maso,hora_maso,id_alumno,
                atencion_maso,observacion_maso,sesion_maso,estado_maso,ejercicio_maso,
                proced_tens_maso,proced_us_maso,proced_chc_maso,proced_ir_maso,id_sala,id_taller,id_profesional)
values('$fecha_maso','$hora_maso',$id_alumno,'$atencion','$observacion',$sesion,'$estado',
    '$ejercicio','$proced_tens','$proced_us','$proced_chc','$proced_ir',$array_sala,$id_taller,$array_profe);";
if($conexion -> query($sql_agen_maso) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="masoterapia_admin.php";</script>';
}else{
    echo '<script>alert("Error: " . $sql_agen_maso . " " . $conexion ->connect_error. "serás redireccionado");window.location.href="masoterapia_admin.php";</script>;';
}
};


?>