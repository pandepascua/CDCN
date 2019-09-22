<?php
$servidor="localhost";
$usuario="root";
$password="root";
$bd="cdcn";

$conexion= new mysqli($servidor,$usuario,$password,$bd);
    if($conexion->connect_error){
        die("error de conexion!".$conexion->connect_error);
    };


$run=$_POST['run_ek2'];
$nombre=$_POST['nombre2'];
$f_e=$_POST['fecha_ek2'];
$diagnostico=$_POST['diag_ek2'];
$plano_frontal=$_POST['plano_frontal2'];
$plano_s=$_POST['plano_sagital2'];
$plano_p=$_POST['plano_posterior2'];


//************************canvas********************************* */

$zona_dolor=$_POST['zona_afectada'];
$eva1=$_POST['eva1'];
$tipo1=$_POST['tipo1'];
$localizacion1=$_POST['localizacion1'];
$generador1=$_POST['generador1'];
$atenuante1=$_POST['atenuante1'];
$nota1=$_POST['nota1'];

$eva2=$_POST['eva2'];
$tipo2=$_POST['tipo2'];
$localizacion2=$_POST['localizacion2'];
$generador2=$_POST['generador2'];
$atenuante2=$_POST['atenuante2'];
$nota2=$_POST['nota2'];
$superficial=$_POST['superficial'];
$profunda=$_POST['profunda'];
$dimension=$_POST['dimension'];
$estado=$_POST['estado'];
$seg1=$_POST['seg1'];
$der1=$_POST['der1'];
$izq1=$_POST['izq1'];
$seg2=$_POST['seg2'];
$der2=$_POST['der2'];
$izq2=$_POST['izq2'];
$seg3=$_POST['seg3'];
$der3=$_POST['der3'];
$izq3=$_POST['izq3'];


//*************************************************************** */

//************************ROM************************************ */

$articulacion=$_POST['articulacion'];
$activoder=$_POST['activoder'];
$activoizq=$_POST['activoizq'];
$pasivoder=$_POST['pasivoder'];
$pasivoizq=$_POST['pasivoizq'];
$endfealder=$_POST['endfealder'];
$endfealizq=$_POST['endfealizq'];
//*************************FUERZA********************************************* */
$articulacion1=$_POST['articulacion1'];
$articulacion2=$_POST['articulacion2'];
$articulacion3=$_POST['articulacion3'];
$flexionder=$_POST['flexionder'];
$flexionizq=$_POST['flexionizq'];
$extensionder=$_POST['extensionder'];
$extensionizq=$_POST['extensionizq'];
$abdder=$_POST['abdder'];
$abdizq=$_POST['abdizq'];
$addder=$_POST['addder'];
$addizq=$_POST['addizq'];
$rotintder=$_POST['rotintder'];
$rotintizq=$_POST['rotintizq'];
$rotextder=$_POST['rotextder'];
$rotextizq=$_POST['rotextizq'];
/*************************pruebas funcionales¡'******************************* */
$prueba_funcional=$_POST['prueba_funcional'];
$fecha_sesion=$_POST['fecha_sesion'];
$atendido=$_POST['atendido'];
$num_sesion=$_POST['num_sesion'];
$otro_sesion=$_POST['otro_sesion'];

//*************************************************************** */


$sql="insert into ficha_ev_kine(
    run_alumno ,
nom_alumno ,
 fecha_evaluacion ,
 diagnostico_medico ,
 plano_frontal , 
plano_sagital ,
 plano_posterior ,

 articulacion , 
activo_der ,
 activo_izq ,
 pasivo_der ,
 pasivo_izq ,
 edfeal_der ,
 endfeal_izq ,
 articulacion1 ,
 articulacion2 ,
 articulacion3 ,
 flexion_der , 
 flexion_izq ,
 extencion_der ,
 extencion_izq ,
 abd_der , 
 abd_izq ,
 add_der ,
add_izq , 
rot_int_der , 
rot_int_izq ,
 rot_ext_der ,
rot_ext_izq ,
 pruebas_funcionales ,
 fecha_sesiones, 
 atendido ,
 n_sesion ,
 otro )values(
'$run',
'$nombre',
'$f_e',
'$diagnostico',
'$plano_frontal',
'$plano_s',
'$plano_p',
'$articulacion',
'$activoder',
'$activoizq',
'$pasivoder',
'$pasivoizq',
'$endfealder',
'$endfealizq',
'$articulacion1',
'$articulacion2',
'$articulacion3',
'$flexionder',
'$flexionizq',
'$extensionder',
'$extensionizq',
'$abdder',
'$abdizq',
'$addder',
'$addizq',
'$rotintder',
'$rotintizq',
'$rotextder',
'$rotextizq',
'$prueba_funcional',
'$fecha_sesion',
'$atendido',
'$num_sesion',
'$otro_sesion'
 )";
 
 //var_dump($sql);

if($conexion -> query($sql) == True){   
    $ultimo_id = mysqli_insert_id($conexion); 

  //  echo"datos insertados". $sql;
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="fichakinemaso_kine_admin.php";</script>';
}else{
    echo "Error" . $sql . " " . $conexion ->connect_error;
};




$sql2="insert into dolor (
zona_dolor ,
eva_dolor ,
tipo ,
localizacion ,
generador ,
atenuante ,
otros_dolor ,
eva_dolor2,
tipo_2 ,
localizacion_2 ,
generador_2 ,
atenuante_2 ,
otros_dolor_2 ,
 superficial ,
profundidad ,
 dimension ,
 estado ,
 segmento1 ,
der1 ,
izq1 ,
segmento2 ,
der2  ,
izq2 ,
segmento3 ,
der3 ,
izq3 ,
id_evaluacion_kine )
values(
'$zona_dolor',
'$eva1',
'$tipo1',
'$localizacion1',
'$generador1',
'$atenuante1',
'$nota1',
'$eva2',
'$tipo2',
'$localizacion2',
'$generador2',
'$atenuante2',
'$nota2',
'$superficial',
'$profunda',
'$dimension',
'$estado',
'$seg1',
'$der1',
'$izq1',
'$seg2',
'$der2',
'$izq2',
'$seg3',
'$der3',
'$izq3',
$ultimo_id 
    );"; 
     //   var_dump($sql2);

        $ejecutar2=mysqli_query($conexion,$sql2);
     //   echo"datos insertados". $sql2;
   //echo $ultimo_id;    

?>