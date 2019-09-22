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

$run=$_POST['run'];
$nombre=$_POST['nombre'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$edad=$_POST['edad'];
$fecha_ingreso=$_POST['fecha_ingreso'];
$parentesco=$_POST['parentesco'];
$telefono=$_POST['telefono'];
$diagnostico=$_POST['diagnostico'];
$motivo=$_POST['motivo'];
$sala=$_POST['sala2'];
$a_prenatales=$_POST['a_prenatales'];
$a_perinatales=$_POST['a_perinatales'];
$a_clinicos=$_POST['a_clinicos'];
$control_cabeza=$_POST['control_cabeza'];
$primeras_palabras=$_POST['primeras_palabras'];
$gateo=$_POST['gateo'];
$primeras_frases=$_POST['primeras_frases'];
$marcha_indepediente=$_POST['marcha_indepediente'];
$control_esfinter=$_POST['control_esfinter'];
$edad_ingreso_sistema_escolar=$_POST['edad_ingreso_sistema_escolar'];
$asistio_jardin=$_POST['asistio_jardin'];
$nombre_colegio_actual=$_POST['nombre_colegio_actual'];
$curso=$_POST['curso'];
$n_establecimiento_educacionales=$_POST['n_establecimiento_educacionales'];
$motivo_cambios=$_POST['motivo_cambios'];
$observaciones=$_POST['observaciones'];
$genograma=$_POST['genograma'];
$red_apoyo=$_POST['red_apoyo'];
$otros_antecedentes_revelantes=$_POST['otros_antecedentes_revelantes'];
$impresion_general=$_POST['impresion_general'];
$avdb=$_POST['avdb'];
$avdi=$_POST['avdi'];
$participacion_social=$_POST['participacion_social'];
$juego=$_POST['juego'];
$descanso_sueño=$_POST['descanso_sueño'];
$comunicacion_pares=$_POST['comunicacion_pares'];
$adaptarse_situaciones=$_POST['adaptarse_situaciones'];
$regulacion_emocional=$_POST['regulacion_emocional'];
$cumplir_rutinas=$_POST['cumplir_rutinas'];
$aceptar_cumplir=$_POST['aceptar_cumplir'];
$participar_actividades=$_POST['participar_actividades'];
$dificultades=$_POST['dificultades'];
$otros1=$_POST['otros1'];
$otros2=$_POST['otros2'];
$expectativas=$_POST['expectativas'];


   
$sql1="update t_ocupacional set 
fecha_ingreso='$fecha_ingreso',
parentesco='$parentesco',
diagnostico='$diagnostico',
motivo_consulta='$motivo',

antecedentes_pre_natales='$a_prenatales',
antecedentes_peri_natales='$a_perinatales',
antecedentes_clinicos='$a_clinicos',
control_cabeza='$control_cabeza',
primeras_palabras='$primeras_palabras',
gateo='$gateo', 
primeras_frases='$primeras_frases',
marcha_independiente='$marcha_indepediente',
control_esfinter='$control_esfinter',
edad_escolar='$edad_ingreso_sistema_escolar',
asistio_jardin='$asistio_jardin',
nombre_colegio='$nombre_colegio_actual', 
curso='$curso',
n_establecimiento='$n_establecimiento_educacionales',
motivo_cambio='$motivo_cambios',
observaciones='$observaciones', 
genograma_familiar='$genograma', 
red_apoyo='$red_apoyo',
otros_antecedentes='$otros_antecedentes_revelantes',
impresion_general='$impresion_general', 
avdb='$avdb',
avdi='$avdi', 
participacion_social='$participacion_social', 
juego='$juego',
descanso_sueño='$descanso_sueño', 
comunicacion='$comunicacion_pares', 
adaptarce_situacion='$adaptarse_situaciones',
regulacion_emocional='$regulacion_emocional',
cumplir_rutinas='$cumplir_rutinas', 
aceptar_cumplir='$aceptar_cumplir',
participar_actividades='$participar_actividades',
dificultades_sensoriales='$dificultades',
otros1='$otros1',
otros2='$otros2',
expectativas_prioridades='$expectativas'
where run='$run' ;";

if($conexion -> query($sql1) == True){ 
    
     //echo $sql1;
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="menu_terapia.php";</script>';
}else{
    echo "Error:"  . $sql1 . " " . $conexion ->connect_error;
};

foreach( $sala as $codigo=>$valor){
    $array_sala=$valor;
$sql2="update t_ocupacional set id_sala=$array_sala where run='$run' ;";;

if($conexion -> query($sql2) == True){ 
    
    echo $sql2;
   echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="menu_terapia.php";</script>';
}else{
   echo "Error:"  . $sql2 . " " . $conexion ->connect_error;
}};
?>