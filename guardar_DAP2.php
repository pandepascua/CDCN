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
        $run_alumno=$_POST['run'];
        $id_taller=$_POST['taller'];
        $fecha_psi=$_POST['fecha'];
        $hora_psi=$_POST['hora'];
        $diagnostico=$_POST['diagnostico'];
        $sala=$_POST['sala'];
        $prof=$_POST['prof'];
        $sesion=$_POST['sesion'];
        $nom_alumno=$_POST['nom_alumno'];
        $edad=$_POST['edad'];
        $tel_alumno=$_POST['tel_alumno'];
        $nom_apod=$_POST['nom_apod'];
        $telefono_apod=$_POST['tel_apod'];
        $direccion_alum=$_POST['direc_alumno'];
        $comuna_alum=$_POST['comuna_alumno'];
        $correo_alumno=$_POST['correo_alumno'];
        $patologia_alumno=$_POST['patologia_alumno'];
        $fecha_nac=$_POST['fecha_nac'];
        
        foreach( $sala as $codigo=>$valor){
            $array_sala=$valor;
            $array_taller=$id_taller[$codigo];
            $array_profe=$prof[$codigo];
        


$sql="insert into agen_psicomotricidad(
fecha_psico ,
hora_psico ,
run_alumno ,
nom_alumno , 
edad ,
fecha_nac ,
telefono ,
 nombre_apoderado ,
telefono_apod ,
 direccion_alumno ,
 comuna ,
 correo ,
patologias , 
sesion ,
 diagnostico ,
 id_sala ,
 id_taller ,
 id_profesional )
values('$fecha_psi','$hora_psi','$run_alumno','$nom_alumno',$edad,'$fecha_nac',
$tel_alumno,'$nom_apod',$telefono_apod,'$direccion_alum','$comuna_alum','$correo_alumno','$patologia_alumno','$sesion','$diagnostico ',$array_sala,$array_taller,$array_profe);";
if($conexion -> query($sql) == True){      
    echo '<script> alert("Datos Registrados. Serás redireccionado a la página.");window.location.href="psicomotricidad_admin.php";</script>';

}else{
   echo '<script> alert("Error:  '. $sql .'  '.$conexion ->connect_error.',serás redireccionado");window.location.href="psicomotricidad_admin.php";</script>';
   //echo "Error" . $sql . " " . $conexion ->connect_error;

}
};


?>