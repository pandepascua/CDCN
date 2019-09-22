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


        $de=$_POST['de'];
        $para=$_POST['para'];

$f_der=$_POST['fecha_derivacion'];
$nom_t=$_POST['nom_t'];
$run_al=$_POST['run_al'];
$nombre_al=$_POST['nombre_al'];
$f_al=$_POST['f_al'];
$e_al=$_POST['e_al'];
$est_al=$_POST['est_al'];
$curso=$_POST['curso'];
$dir_al=$_POST['dir_al'];
$fono_al=$_POST['fono_al'];
$run_ap=$_POST['run_ap'];

$nom_ap=$_POST['nom_ap'];
$f_ap=$_POST['f_ap'];
$e_ap=$_POST['e_ap'];
$direc_ap=$_POST['direc_ap'];
$par_ap=$_POST['par_ap'];
$problematica_niño=$_POST['problematica_niño'];
$doc=$_POST['doc'];
$nom_inst=$_POST['nom_inst_der'];
$responsable=$_POST['responsable'];
$cargo=$_POST['cargo'];

if (isset($_POST['doc'] )) {
    if (is_array($_POST['doc'])) {
        while(list($key,$valor)=each($_POST['doc'])){
                $array_check=$valor;
                $array_de=$de[$key];
                $array_para=$para[$key];

$sql="insert into ficha_derivacion(
    de ,
    para,
    fecha_derivacion ,
    nom_tratamiento  ,
    run_alumno ,
    nom_alumno , 
   edad ,
   fecha_nac ,
    telefono ,
    direccion_alumno ,
   establecimiento ,
    curso ,
    run_apod ,
    nombre_apod ,
    fech_nac_apod ,
    edad_apod ,
    domicilio_apod ,
    parentesco_apod , 
    descripcion_niño ,
    nom_doc ,
    nombre_institucion , 
    responsable,
    cargo)
values(
    '$array_de',
'$array_para',
'$f_der',
'$nom_t',
'$run_al',
'$nombre_al',
$e_al,
'$f_al',
$fono_al,
'$dir_al',
'$est_al',
'$curso',
'$run_ap',
'$nom_ap',
'$f_ap',
$e_ap,
'$direc_ap',
'$par_ap',
'$problematica_niño',
'$array_check',
'$nom_inst',
'$responsable',
'$cargo');";
if($conexion -> query($sql) == True){      
    //echo $sql;
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="nutricion_admin.php";</script>';
}else{
    echo "Error" . $sql . " " . $conexion ->connect_error;
}}}
};






?>