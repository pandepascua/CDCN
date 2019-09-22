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
$id_evaluacion_1=$_POST['id_evaluacion_1'];
$run=$_POST['run'];
$fecha_eva=$_POST['fecha_eva'];
$peso=$_POST['peso'];
$fc=$_POST['fc'];
$pa=$_POST['pa'];
$peso=$_POST['peso'];
$talla=$_POST['talla'];
$imc=$_POST['imc'];
$plano_frontal=$_POST['plano_frontal'];
$plano_sagital=$_POST['plano_sagital'];
$plano_posterior=$_POST['plano_posterior'];
$trapecio_superior=$_POST['trapecio_superior'];
$trapecio_medio=$_POST['trapecio_medio'];
$elevador_e=$_POST['elevador_e'];
$trapecio_inf=$_POST['trapecio_inf'];
$p_mayor=$_POST['p_mayor'];
$serrato_ant=$_POST['serrato_ant'];
$ecom=$_POST['ecom'];
$romboides=$_POST['romboides'];
$psoas=$_POST['psoas'];
$gluteos=$_POST['gluteos'];
$r_anterior=$_POST['r_anterior'];
$abdominales=$_POST['abdominales'];
$tfl=$_POST['tfl'];
$extensores=$_POST['extensores'];
$aductores=$_POST['aductores'];
$cuadriceps=$_POST['cuadriceps'];
$cuadriceps_2=$_POST['cuadriceps_2'];
$gluteos_isqui=$_POST['gluteos_isqui'];
$gluteos_isqui_2=$_POST['gluteos_isqui_2'];
$isqui_ake=$_POST['isqui_ake'];
$isqui_ake_2=$_POST['isqui_ake_2'];
$psoas_1=$_POST['psoas_1'];
$psoas_2=$_POST['psoas_2'];
$piramidal=$_POST['piramidal'];
$test=$_POST['test'];
$tfl_1=$_POST['tfl_1'];
$t_ober=$_POST['t_ober'];
$aductores_1=$_POST['aductores_1'];
$aductores_2=$_POST['aductores_2'];
$gastronemios=$_POST['gastronemios'];
$gastronemios_2=$_POST['gastronemios_2'];
$soleo=$_POST['soleo'];
$soleo_2=$_POST['soleo_2'];
$test_wells=$_POST['test_wells'];
$test_schobert=$_POST['test_schobert'];

$rot_hombro=$_POST['rot_hombro'];
$rot_hombro_2=$_POST['rot_hombro_2'];
$a=$_POST['a'];
$a_2=$_POST['a_2'];
$al=$_POST['al'];
$al_2=$_POST['al_2'];
$l=$_POST['l'];
$l_2=$_POST['l_2'];
$pl=$_POST['pl'];
$pl_2=$_POST['pl_2'];
$p=$_POST['p'];
$p_2=$_POST['p_2'];
$pm=$_POST['pm'];
$pm_2=$_POST['pm_2'];
$m=$_POST['m'];
$m_2=$_POST['m_2'];
$am=$_POST['am'];
$am_2=$_POST['am_2'];
$unipodal=$_POST['unipodal'];
$unipodal_2=$_POST['unipodal_2'];
$segmento=$_POST['segmento'];
$derecha=$_POST['derecha'];
$izquierda=$_POST['izquierda'];
$angulo=$_POST['angulo'];
$segmento_2=$_POST['segmento_2'];
$derecha_2=$_POST['derecha_2'];
$izquierda_2=$_POST['izquierda_2'];
$angulo_2=$_POST['angulo_2'];
$rot_int=$_POST['rot_int'];
$rot_int_2=$_POST['rot_int_2'];
$eeii=$_POST['eeii'];
$derecha_3=$_POST['derecha_3'];
$izquierda_3=$_POST['izquierda_3'];
$puente_prono=$_POST['puente_prono'];
$puente=$_POST['puente'];
$puente_2=$_POST['puente_2'];
$extensores_2=$_POST['extensores_2'];
$abdominales_1=$_POST['abdominales_1'];
$pulso1=$_POST['pulso1'];
$pulso2=$_POST['pulso2'];
$pulso3=$_POST['pulso3'];
$valorC=$_POST['valorC'];
$ds=$_POST['ds'];
$fms=$_POST['fms'];
$hs=$_POST['hs'];
$hs_2=$_POST['hs_2'];
$hs_3=$_POST['hs_3'];
$in_0=$_POST['in_0'];
$in_2=$_POST['in_2'];
$in_3=$_POST['in_3'];
$sm=$_POST['sm'];
$sm_2=$_POST['sm_2'];
$sm_3=$_POST['sm_3'];
$aslr=$_POST['aslr'];
$aslr_2=$_POST['aslr_2'];
$aslr_3=$_POST['aslr_3'];
$tspu=$_POST['tspu'];
$tspu_2=$_POST['tspu_2'];
$tspu_3=$_POST['tspu_3'];
$rs=$_POST['rs'];
$rs_2=$_POST['rs_2'];
$rs_3=$_POST['rs_3'];
$qc=$_POST['qc'];
$triple_salto=$_POST['triple_salto'];
$core=$_POST['core'];
$funcion=$_POST['funcion'];
$tiempo=$_POST['tiempo'];
$valor=$_POST['valor'];
$bipodal=$_POST['bipodal'];
$semi_tandem=$_POST['semi_tandem'];
$tandem=$_POST['tandem'];
$tiempo_2=$_POST['tiempo_2'];
$conclusiones=$_POST['conclusiones'];
$fecha=$_POST['fecha'];
$antendido=$_POST['antendido'];
$comentario=$_POST['comentario'];







$sql1="update ficha_eva_func_1 set
run='$run',
fecha_eva='$fecha_eva',
fc='$fc',
pa='$pa',
peso='$peso',
talla='$talla',
imc='$imc',
plano_frontal='$plano_frontal',
plano_sagital='$plano_sagital', 
plano_posterior='$plano_posterior',
trapecio_superior='$trapecio_superior',
trapecio_medio='$trapecio_medio',
elevador_e='$elevador_e',
trapecio_inf='$trapecio_inf',
p_mayor='$p_mayor', 
serrato_ant='$serrato_ant',
ecom='$ecom', 
romboides='$romboides', 
psoas='$psoas',
gluteos='$gluteos',
r_anterior='$r_anterior',
abdominales='$abdominales',
tfl='$tfl',
extensores='$extensores',
aductores='$aductores',
cuadriceps='$cuadriceps',
cuadriceps_2='$cuadriceps_2', 
gluteos_isqui='$gluteos_isqui',
gluteos_isqui_2='$gluteos_isqui_2', 
isqui_ake='$isqui_ake',
isqui_ake_2='$isqui_ake_2',
psoas_1='$psoas_1',
psoas_2='$psoas_2',
piramidal='$piramidal',
test='$test',
tfl_1='$tfl_1', 
t_ober='$t_ober', 
aductores_1='$aductores_1', 
aductores_2='$aductores_2', 
gastronemios='$gastronemios',
gastronemios_2='$gastronemios_2',
soleo='$soleo',
soleo_2='$soleo_2',
test_wells='$test_wells',
test_schobert='$test_schobert'
where id_evaluacion_1=$id_evaluacion_1;";
  

//var_dump($sql1);

if($conexion -> query($sql1) == True){   
    $ultimo_id1=mysqli_insert_id($conexion); 

   echo"datos insertados". $sql1;
   echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="evaluacion_funcional_ingreso_admin_kine.php";</script>';
}else{
   echo "Error" . $sql1 . " " . $conexion ->connect_error;
};


/*
mysqli_query($conexion,$sql);
$ultimo_id = mysqli_insert_id($conexion); 
echo $ultimo_id; 
*/
       
$sql2="update ficha_eva_func_2 set 
rot_hombro ='$rot_hombro',
rot_hombro_2 ='$rot_hombro_2',
a ='$a',
a_2 ='$a_2',
al ='$al',
al_2 ='$al_2',
l ='$l',
l_2 ='$l_2',
pl ='$pl',
pl_2 ='$pl_2',
p ='$p',
p_2 ='$p_2',
pm ='$pm',
pm_2 ='$pm_2',
m ='$m',
m_2 ='$m_2',
am ='$am',
am_2 ='$am_2',
unipodal ='$unipodal',
unipodal_2 ='$unipodal_2',
segmento ='$segmento',
derecha ='$derecha',
izquierda ='$izquierda',
angulo ='$angulo',
segmento_2 ='$segmento_2',
derecha_2 ='$derecha_2',
izquierda_2 ='$izquierda_2',
angulo_2 ='$angulo_2',
rot_int ='$rot_int',
rot_int_2 ='$rot_int_2',
eeii ='$eeii',
derecha_3 ='$derecha_3',
izquierda_3 ='$izquierda_3',
puente_prono ='$puente_prono',
puente ='$puente',
puente_2 ='$puente_2',
extensores_2='$extensores_2',
abdominales_1 ='$abdominales_1',
pulso1 ='$pulso1',
pulso2 ='$pulso2',
pulso3 ='$pulso3',
valorC ='$valorC',
ds ='$ds',
fms ='$fms',
hs ='$hs',
hs_2 ='$hs_2',
hs_3 ='$hs_3',
in_0 ='$in_0',
in_2 ='$in_2',
in_3 ='$in_3',
sm ='$sm',
sm_2 ='$sm_2',
sm_3 ='$sm_3',
aslr ='$aslr',
aslr_2 ='$aslr_2',
aslr_3 ='$aslr_3',
tspu ='$tspu',
tspu_2 ='$tspu_2',
tspu_3 ='$tspu_3',
rs ='$rs',
rs_2 ='$rs_2',
rs_3 ='$rs_3',
qc='$qc',
triple_salto ='$triple_salto',
core ='$core',
funcion ='$funcion',
tiempo ='$tiempo',
valor ='$valor',
bipodal ='$bipodal',
semi_tandem ='$semi_tandem',
tandem ='$tandem',
tiempo_2 ='$tiempo_2',
conclusiones='$conclusiones',
fecha ='$fecha',
antendido ='$antendido',
comentario ='$comentario',
 id_evaluacion_1='$id_evaluacion_1'

where id_evaluacion_1=$id_evaluacion_1 ;";




//var_dump($sql2);

$ejecutar2=mysqli_query($conexion,$sql2);
echo"datos insertados". $sql2;


?>