<?php
        
        $servidor="localhost";
        $usuario="root";
        $password="root";
        $bd="cdcn";
        
         $conexion= new mysqli($servidor,$usuario,$password,$bd);
        if($conexion->connect_error){
        die("error de conexion!".$conexion->connect_error);
            };

            $de=$_POST['de'];
            $para=$_POST['para'];
    
    $f_der=$_POST['fecha_derivacion'];
    $nom_t=$_POST['nom_t'];
    $run_al=$_POST['run_al'];
    $nombre_al=$_POST['nombre_al'];
    $f_al=$_POST['f_al'];
    $e_al=$_POST['e_al'];
    $est_al=$_POST['est_al'];
    $curso=$_POST['curso'];
    $dir_al=$_POST['dir_al'];
    $fono_al=$_POST['fono_al'];
    $run_ap=$_POST['run_ap'];
    
    $nom_ap=$_POST['nom_ap'];
    $f_ap=$_POST['f_ap'];
    $e_ap=$_POST['e_ap'];
    $direc_ap=$_POST['direc_ap'];
    $par_ap=$_POST['par_ap'];
    $problematica_niño=$_POST['problematica_niño'];
    $doc=$_POST['doc'];
    $nom_inst=$_POST['nom_inst_der'];
    $responsable=$_POST['responsable'];
    $cargo=$_POST['cargo'];

    $id_der=$_POST['id_derivacion_al'];


    if (isset($_POST['doc'] )) {
        if (is_array($_POST['doc'])) {
            while(list($key,$valor)=each($_POST['doc'])){
                    $array_check=$valor;
                    $array_de=$de[$key];
                    $array_para=$para[$key];

            



        $sql1="update
        ficha_derivacion
          set 
          de='$array_de',
          para='$array_para',
          fecha_derivacion='$f_der',
          nom_tratamiento='$nom_t',           
          run_alumno='$run_al',           
          nom_alumno='$nombre_al',          
          edad=$e_al,           
          fecha_nac='$f_al',           
          telefono=$fono_al,        
          direccion_alumno='$dir_al',           
          establecimiento='$est_al',           
          curso='$curso',
          run_apod='$run_ap',
          nombre_apod='$nom_ap',
          fech_nac_apod='$f_ap',
          edad_apod=$e_ap,
          domicilio_apod='$direc_ap',
          parentesco_apod='$par_ap',
          descripcion_niño='$problematica_niño',
          nom_doc='$array_check',
          nombre_institucion='$nom_inst',
          responsable='$responsable',
          cargo='$cargo'
        where id_derivacion=$id_der;";
        if($conexion -> query($sql1) == True){      
          //  echo $sql1;
            echo '<script> alert("Datos modificados. Serás redireccionado a la página.");window.location.href="../acupuntura.php";</script>';
        }else{
            echo "Error" . $sql1. " " . $conexion ->connect_error;
        }}}};

?>