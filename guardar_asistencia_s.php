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

$id_alumno=$_POST['id_alumno'];
$id_taller=$_POST['id_taller'];
$fecha=$_POST['fecha_asistencia'];
$obs=$_POST['observacion'];



if (isset($_POST['asistencia'] )) {
    if (is_array($_POST['asistencia'])) {
        while(list($key,$valor)=each($_POST['asistencia'])){
                $array_check=$valor;
                $array_obs=$_POST['observacion'][$key];
                $array_al=$_POST['id_alumno'][$key];
                $array_t=$_POST['id_taller'][$key];
           
 $sql_asis="insert into asistencia_taller(id_tipo_asis,fecha_asistencia,id_alumno,
                id_taller,observacion)
values($array_check,'$fecha',$array_al,$array_t,'$array_obs');";
  //var_dump($sql_asis);

if($conexion -> query($sql_asis) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="asistencia_alumnos_s.php";</script>';
}else{
    echo "Error" . $sql_asis . " " . $conexion ->connect_error;

}
}
    }};









?>