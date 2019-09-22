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
        $id_dg=$_POST['id_dg2'];
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
        $taller=$_POST['taller'];
    
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
        
        foreach( $taller as $codigo=>$valor){
            $array_taller=$valor;


$sql1="update
datos_generales
  set 
run_alumno='$run_alumno',
nom_alumno='$nom_alumno', 
edad=$edad,
fecha_nac='$fecha_nac',
telefono=$tel_alumno,
direccion_alumno='$direccion',
correo='$correo_alumno',
patologias='$patologia_alumno',
diagnostico='$diagnostico',
ocupacion='$ocupacion',
fecha_ingreso='$fecha_ing',
motivo='$motivo',
actividad_fisica='$actividad_f',
anamnesis='$anamnesis',
id_taller=$array_taller
 
where id_dg=$id_dg ;";
if($conexion -> query($sql1) == True){      
    //echo $sql1;
    echo '<script> alert("Datos modificados. Serás redireccionado a la página.");window.location.href="../fichakinemaso_kine.php";</script>';
}else{
    echo "Error" . $sql1. " " . $conexion ->connect_error;
}};




foreach( $enfermedad as $codigo=>$valor){
    $array_e_m=$valor;
    $array_a_m=$año_mor[$codigo];
    $array_c=$control[$codigo];

$sql2="update
antecedentes_morbidos
set 
enf_mor='$array_e_m',
año_mor='$array_a_m',
control_mor ='$array_c'
where id_dg=$id_dg ;";
if($conexion -> query($sql2) == True){      
  //  echo $sql2;
    echo '<script> alert("Datos modificados. Serás redireccionado a la página.");window.location.href="../fichakinemaso_kine.php";</script>';
}else{
    echo "Error" . $sql2. " " . $conexion ->connect_error;
}};


foreach( $cirujia as $codigo=>$valor){
    $array_c=$valor;
    $array_a_q=$año_quir[$codigo];
    

$sql3="update
antecedentes_quirurjicos
set 
cirujia='$array_c',
año_quir='$array_a_q'

where id_dg=$id_dg ;";
if($conexion -> query($sql3) == True){      
  //  echo $sql3;
    echo '<script> alert("Datos modificados. Serás redireccionado a la página.");window.location.href="../fichakinemaso_kine.php";</script>';
}else{
    echo "Error" . $sql3. " " . $conexion ->connect_error;
}};


foreach( $descripcion as $codigo=>$valor){
    $array_des=$valor;
    $array_ant=$año_ant[$codigo];
    $array_e=$estado[$codigo];

$sql4="update
antecedentes_anteriores
set 
descripcion ='$array_des',
año_ant ='$array_ant',
estado_ant ='$array_e'
where id_dg=$id_dg ;";
if($conexion -> query($sql4) == True){      
 //   echo $sql4;
    echo '<script> alert("Datos modificados. Serás redireccionado a la página.");window.location.href="../fichakinemaso_kine.php";</script>';
}else{
    echo "Error" . $sql4. " " . $conexion ->connect_error;
}};

if (isset($_POST['habito'] )) {
    if (is_array($_POST['habito'])) {
        while(list($key,$valor)=each($_POST['habito'])){
$sql5="update
habitos
set 
nom_habito='$valor',
otros='$otros'

where id_dg=$id_dg ;";
if($conexion -> query($sql5) == True){      
   // echo $sql5;
    echo '<script> alert("Datos modificados. Serás redireccionado a la página.");window.location.href="../fichakinemaso_kine.php";</script>';
}else{
    echo "Error" . $sql5. " " . $conexion ->connect_error;
}}}};


foreach( $medicamento as $codigo=>$valor){
    $array_med=$valor;
    $array_dosis=$dosis[$codigo];

$sql6="update
antecedentes_farmacologicos
set 
medicamento ='$array_med',
dosis ='$array_dosis'


 
where id_dg=$id_dg ;";
if($conexion -> query($sql6) == True){      
   // echo $sql6;
    echo '<script> alert("Datos modificados. Serás redireccionado a la página.");window.location.href="../fichakinemaso_kine.php";</script>';
}else{
    echo "Error" . $sql6. " " . $conexion ->connect_error;
}};



/*


$sql1="update
datos_generales
  set 
run_alumno varchar(12),
nom_alumno varchar(80), 
edad int,
fecha_nac date,
telefono int,
direccion_alumno varchar(80),
correo varchar(80),
patologias varchar(200),
diagnostico varchar(200),
ocupacion varchar(200),
fecha_ingreso date,
motivo varchar(200),
antecedentes_morbidos.id_ant_mor,
antecedentes_morbidos.enf_mor varchar(200),
antecedentes_morbidos.año_mor varchar(200),
antecedentes_morbidos.control_mor varchar(200),
antecedentes_quirurjicos.id_ant_quir,
antecedentes_quirurjicos.cirujia varchar(200),
antecedentes_quirurjicos.año_quir varchar(200),
antecedentes_anteriores.id_ant_ant,
antecedentes_anteriores.descripcion varchar(200),
antecedentes_anteriores.año_ant varchar(200),
antecedentes_anteriores.estado_ant varchar(200),
habitos.nom_habito varchar(50),
otros varchar(200) null,
antecedentes_farmacologicos.id_ant_far,
antecedentes_farmacologicos.medicamento varchar(200),
antecedentes_farmacologicos.dosis varchar(200)
actividad_fisica varchar(200),
anamnesis varchar(200),
talleres.id_taller,
talleres.nom_taller
FROM datos_generales
inner join antecedentes_morbidos on(datos_generales. id_ant_mor=antecedentes_morbidos. id_ant_mor)
inner join antecedentes_quirurjicos on(datos_generales. id_ant_quir=antecedentes_quirurjicos. id_ant_quir)
inner join antecedentes_anteriores on(datos_generales.id_ant_ant= antecedentes_anteriores.id_ant_ant)
inner join habitos on(datos_generales.id_habito= habitos.id_ant_ant)
inner join antecedentes_farmacologicos on(datos_generales.id_evaluacion_kine= antecedentes_farmacologicos.id_evaluacion_kine)
inner join talleres on(datos_generales.id_taller= talleres.id_taller)
 
where id_dg=$id_dg ;";
if($conexion -> query($sql1) == True){      
    echo $sql1;
    //echo '<script> alert("Datos modificados. Serás redireccionado a la página.");window.location.href="../fichakinemaso.php";</script>';
}else{
    echo "Error" . $sql1. " " . $conexion ->connect_error;
};
*/

?>

