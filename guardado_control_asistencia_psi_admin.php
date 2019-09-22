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

        $ag=$_POST['id_agen_psico'];
        $fe=$_POST['fecha'];
        $h=$_POST['hora'];
        $al=$_POST['nom_alumno'];
        $run=$_POST['run'];
        $edad=$_POST['edad'];
        $tel=$_POST['telefono'];
        $correo=$_POST['correo'];
        $diag=$_POST['diagnostico'];
        $taller=$_POST['taller'];
        $sesion=$_POST['sesion'];
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

                $array_diag=$diag[$key];
                $array_taller=$taller[$key];
                $array_sesion=$sesion[$key];
                $array_sala=$sala[$key];
                $array_prof=$prof[$key];



           
 $sql_asis="insert into asistencia_control_psi(
 fecha_psico ,
 hora_psico ,
 run_alumno ,
 nom_alumno , 
 edad ,
 telefono, 
 correo ,
 sesion ,
  diagnostico ,
 id_tipo_asis ,
 id_agen_psico ,
 id_sala ,
 id_taller ,
 id_profesional)
values('$array_fe','$array_h','$array_run','$array_al',$array_edad,$array_tel,
'$array_correo','$array_sesion','$array_diag',$array_check,$array_ag,$array_sala,$array_taller,$array_prof
);";
 // var_dump($sql_asis);

if($conexion -> query($sql_asis) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="asistencia_control_psi_admin.php";</script>';
}else{
    echo "Error: " . $sql_asis . " " . $conexion ->connect_error;

}
}
    }};









?>