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

        $ag=$_POST['id_agen_maso'];
        $fe=$_POST['fecha'];
        $h=$_POST['hora'];
        $al=$_POST['nom_alumno'];
        $run=$_POST['run'];
        $edad=$_POST['edad'];
        $tel=$_POST['telefono'];
        $correo=$_POST['correo'];
        $at=$_POST['atencion'];
        $obs=$_POST['obs'];
        $estado=$_POST['estado'];
        $taller=$_POST['taller'];
        $sesion=$_POST['sesion'];
        $ej=$_POST['ejercicio'];
        $pt=$_POST['proced_tens'];
        $us=$_POST['proced_us'];

        $pc=$_POST['proced_chc'];
        $pi=$_POST['proced_ir'];
        $sala=$_POST['sala'];
        $prof=$_POST['prof'];




if (isset($_POST['asistencia'] )) {
    if (is_array($_POST['asistencia'])) {
        while(list($codigo,$valor)=each($_POST['asistencia'])){
            $array_check=$valor;
            $array_ag=$ag[$codigo];
            $array_fe=$fe[$codigo];
            $array_h=$h[$codigo];
            $array_al=$al[$codigo];
            $array_run=$run[$codigo];
            $array_edad=$edad[$codigo];
            $array_tel=$tel[$codigo];
            $array_correo=$correo[$codigo];
            $array_at=$at[$codigo];
            $array_ej=$ej[$codigo];
            $array_obs=$obs[$codigo];
            $array_es=$estado[$codigo];
            $array_taller=$taller[$codigo];
            $array_sesion=$sesion[$codigo];
            $array_pt=$pt[$codigo];
            $array_us=$us[$codigo];
            $array_pc=$pc[$codigo];
            $array_pi=$pi[$codigo];
            $array_sala=$sala[$codigo];
            $array_prof=$prof[$codigo];



            $sql_asis="insert into asistencia_control_maso(
                fecha_maso ,
                 hora_maso ,
                 run_alumno ,
                 nom_alumno , 
                edad ,
                 telefono, 
                  correo ,
                  atencion_maso ,
                  observacion_maso ,
                  sesion_maso , 
                 estado_maso ,
                 ejercicio_maso ,
                 proced_tens_maso,
                proced_us_maso ,
                proced_chc_maso ,
                proced_ir_maso ,
                id_tipo_asis ,
                id_agen_masoterapia  ,
                id_sala ,
                id_taller,
                id_profesional)values('$array_fe','$array_h','$array_run','$array_al',$array_edad,$array_tel,
               '$array_correo','$array_at','$array_obs',$array_sesion,'$array_es','$array_ej','$array_pt','$array_us','$array_pc','$array_pi',$array_check,$array_ag,$array_sala,$array_taller,$array_prof);";
               //  var_dump($sql_asis);
               
               if($conexion -> query($sql_asis) == True){      
                   echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="asistencia_control_maso_admin.php";</script>';
               }else{
                   echo "Error: " . $sql_asis . " " . $conexion ->connect_error;
               
               }
               }
                   }};
               






?>