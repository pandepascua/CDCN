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

        $ag=$_POST['id_agen_acu'];
        $fe=$_POST['fecha'];
        $h=$_POST['hora'];

        $al=$_POST['nom_alumno'];
        $run=$_POST['run'];
        $edad=$_POST['edad'];
        $tel=$_POST['telefono'];
        $correo=$_POST['correo'];
        $mot=$_POST['motivo'];

        $diag=$_POST['diagnostico'];
        $taller=$_POST['taller'];
        $sesion=$_POST['sesion'];
        $obse=$_POST['observacion'];
        $sala=$_POST['sala'];
        $prof=$_POST['prof'];




if (isset($_POST['asistencia'] )) {
    if (is_array($_POST['asistencia'])) {
        while(list($key,$valor)=each($_POST['asistencia'])){
                $array_check=$valor;
                $array_ag=$ag[$key];
                $array_fe=$fe[$key];
                $array_h=$h[$key];

                $array_al=$al[$key];
                $array_run=$run[$key];
                $array_edad=$edad[$key];
                $array_tel=$tel[$key];
                $array_correo=$correo[$key];
                $array_mot=$mot[$key];

                $array_diag=$diag[$key];
                $array_taller=$taller[$key];
                $array_sesion=$sesion[$key];
                $array_obse=$obse[$key];
                $array_sala=$sala[$key];
                $array_prof=$prof[$key];



           
 $sql_asis="insert into asistencia_control_acu(id_tipo_asis,id_agen_acupuntura ,fecha_acupuntura ,hora_acupuntura,
 run_alumno ,nom_alumno , 
edad , telefono , correo ,
motivo_consulta_acupuntura ,diagnostico_acupuntura ,
observacion_acupuntura,sesion ,id_taller,id_sala,id_profesional)
values($array_check,$array_ag,'$array_fe','$array_h','$array_run','$array_al',$array_edad,$array_tel,
'$array_correo','$array_mot','$array_diag','$array_obse','$array_sesion',$array_taller,$array_sala,$array_prof
);";
  //var_dump($sql_asis);

if($conexion -> query($sql_asis) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="asistencia_control_acu.php";</script>';
}else{
    echo "Error: " . $sql_asis . " " . $conexion ->connect_error;

}
}
    }};









?>