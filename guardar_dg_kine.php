<?php


$servidor="localhost";
$usuario="root";
$password="root";
$bd="cdcn";

$conexion= new mysqli($servidor,$usuario,$password,$bd);
    if($conexion->connect_error){
        die("error de conexion!".$conexion->connect_error);
    };

    $run_alumno=$_POST['run'];
    $correo_alumno=$_POST['correo'];
    $patologia_alumno=$_POST['patologia'];
    $fecha_nac=$_POST['fecha_nac'];
    $motivo=$_POST['motivo'];
    $nom_alumno=$_POST['nombre'];
    $edad=$_POST['edad'];
    $tel_alumno=$_POST['celular'];
    $direccion=$_POST['direccion'];
    $actividad_f=$_POST['actividad_fisica'];
    $anamnesis=$_POST['anamnesis'];
    $diagnostico=$_POST['diagnostico'];
    $ocupacion=$_POST['ocupacion'];
    $fecha_ing=$_POST['fecha_ing'];
    //$taller=$_POST['taller'];

    $enfermedad=$_POST['enfermedad'];
    $año_mor=$_POST['año'];
    $control=$_POST['control'];
    $cirujia=$_POST['cirujia'];
    $año_quir=$_POST['año_q'];
    $descripcion=$_POST['descripcion'];
    $año_ant=$_POST['año_ant'];
    $estado=$_POST['estado'];
    $medicamento=$_POST['medicamento'];
    $dosis=$_POST['dosis'];
    $otros=$_POST['otros_habitos'];

    foreach( $_POST['taller'] as $codigo=>$valor){
        $array_taller=$valor;

$sql1="insert into datos_generales( 
run_alumno ,
nom_alumno , 
edad ,
fecha_nac ,
 telefono ,
  direccion_alumno ,
  correo ,
patologias ,
 diagnostico ,
 ocupacion ,
fecha_ingreso ,
 motivo ,
 actividad_fisica ,
 anamnesis ,
 id_taller ) values
 (
'$run_alumno',
'$nom_alumno',
$edad,
'$fecha_nac',
$tel_alumno,
'$direccion',
'$correo_alumno',
'$patologia_alumno',
'$diagnostico',
'$ocupacion',
'$fecha_ing',
'$motivo',
'$actividad_f',
'$anamnesis',
$array_taller
 )";
 //var_dump($sql1);

if($conexion -> query($sql1) == True){   
    $ultimo_id = mysqli_insert_id($conexion); 

    //echo"datos insertados". $sql1;
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="fichakinemaso_kine.php";</script>';
}else{
    echo "Error" . $sql1 . " " . $conexion ->connect_error;
}
/*
mysqli_query($conexion,$sql1);
$ultimo_id = mysqli_insert_id($conexion); 
*/
};

foreach( $cirujia as $codigo=>$valor){
    $array_c=$valor;
    $array_a_q=$año_quir[$codigo];
    


$sql2="insert into antecedentes_quirurjicos(
    id_dg ,
    cirujia ,
 año_quir  
)values($ultimo_id, '$array_c','$array_a_q' )";


//var_dump($sql2);

    $ejecutar2=mysqli_query($conexion,$sql2);
   // echo"datos insertados". $sql2;
     
    //echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="fichakinemaso.php";</script>';


};

foreach( $enfermedad as $codigo=>$valor){
    $array_e_m=$valor;
    $array_a_m=$año_mor[$codigo];
    $array_c=$control[$codigo];


$sql3="insert into antecedentes_morbidos(
    id_dg,
    enf_mor,
    año_mor,
    control_mor
)values ($ultimo_id,'$array_e_m','$array_a_m','$array_c')";

//var_dump($sql3);

    $ejecutar3=mysqli_query($conexion,$sql3);
   // echo"datos insertados". $sql3;
  
    //echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="fichakinemaso.php";</script>';



};


foreach( $descripcion as $codigo=>$valor){
    $array_des=$valor;
    $array_ant=$año_ant[$codigo];
    $array_e=$estado[$codigo];


$sql4="insert into antecedentes_anteriores(
    id_dg ,
    descripcion ,
 año_ant ,
 estado_ant 
)values ($ultimo_id ,'$array_des','$array_ant','$array_e')";

//var_dump($sql4);

    $ejecutar4=mysqli_query($conexion,$sql4);
    
    //echo"datos insertados". $sql4;

    //echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="fichakinemaso.php";</script>';


};

foreach( $medicamento as $codigo=>$valor){
    $array_med=$valor;
    $array_dosis=$dosis[$codigo];


$sql5="insert into antecedentes_farmacologicos(
    id_dg ,
    medicamento ,
 dosis  
) values($ultimo_id, '$array_med','$array_dosis')";

//var_dump($sql5);
    $ejecutar5=mysqli_query($conexion,$sql5);

   // echo"datos insertados". $sql5;
    
   // echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="fichakinemaso.php";</script>';


};

if (isset($_POST['habito'] )) {
    if (is_array($_POST['habito'])) {
        while(list($key,$valor)=each($_POST['habito'])){
  $sql6="insert into habitos(id_dg,nom_habito,otros) values($ultimo_id,'$valor','$otros')";

 // var_dump($sql6);

      $ejecutar6=mysqli_query($conexion,$sql6);

   // echo"datos insertados". $sql6;

    //echo "datos insertados  en tab";
   
    }
        }

            };


            
               
?>
