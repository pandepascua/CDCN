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
        $id_ev_k=$_POST['id_ev_k'];
        $id_ev_k2=$_POST['id_ev_k'];
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

        
$sql1="update
dolor
  set 
  zona_dolor='$zona_dolor',
  eva_dolor=  '$eva1',
  tipo=  '$tipo1',
  localizacion=  '$localizacion1',
  generador= '$generador1',
  atenuante =  '$atenuante1',
  otros_dolor=  '$nota1',
  eva_dolor2=  '$eva2',
  tipo_2 =  '$tipo2',
  localizacion_2 =  '$localizacion2',
  generador_2 =  '$generador2',
  atenuante_2 =  '$atenuante2',
  otros_dolor_2 =  '$nota2',
   superficial =  '$superficial',
  profundidad =  '$profunda',
   dimension =  '$dimension',
   estado =  '$estado',
   segmento1 =  '$seg1',
  der1 =  '$der1',
  izq1 =  '$izq1',
  segmento2 =  '$seg2',
  der2  =  '$der2',
  izq2=  '$izq2',
  segmento3=  '$seg3',
  der3=  '$der3',
  izq3=  '$izq3'
 
where id_evaluacion_kine=$id_ev_k ;";
if($conexion -> query($sql1) == True){      
  //  echo $sql1;
    echo '<script> alert("Datos modificados. Serás redireccionado a la página.");window.location.href="../fichakinemaso_kine.php";</script>';
}else{
    echo "Error" . $sql1. " " . $conexion ->connect_error;
};




        
$sql2="update ficha_ev_kine set 
   fecha_evaluacion =  '$f_e',
   diagnostico_medico =  '$diagnostico',
   plano_frontal =   '$plano_frontal',
  plano_sagital =  '$plano_s',
   plano_posterior =  '$plano_p',
   articulacion =  '$articulacion',
  activo_der =  '$activoder',
   activo_izq =  '$activoizq',
   pasivo_der =  '$pasivoder',
   pasivo_izq =  '$pasivoizq',
   edfeal_der =  '$endfealder',
   endfeal_izq =  '$endfealizq',
   articulacion1 =  '$articulacion1',
   articulacion2 =  '$articulacion2',
   articulacion3 =  '$articulacion3',
   flexion_der =  '$flexionder',
   flexion_izq =  '$flexionizq',
   extencion_der =  '$extensionder',
   extencion_izq =  '$extensionizq',
   abd_der =   '$abdder',
   abd_izq =  '$abdizq',
   add_der =  '$addder',
  add_izq =  '$addizq',
  rot_int_der =   '$rotintder',
  rot_int_izq =  '$rotintizq',
   rot_ext_der =  '$rotextder',
  rot_ext_izq=  '$rotextizq',
   pruebas_funcionales=  '$prueba_funcional',
   fecha_sesiones=  '$fecha_sesion',
   atendido =  '$atendido',
   n_sesion =  '$num_sesion',
   otro=  '$otro_sesion'

where id_evaluacion_kine=$id_ev_k2 ;";
if($conexion -> query($sql2) == True){     
  //  echo $sql2; 
    echo '<script> alert("Datos modificados. Serás redireccionado a la página.");window.location.href="../fichakinemaso_kine.php";</script>';
}else{
    echo "Error" . $sql2. " " . $conexion ->connect_error;
};



?>
