<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Inicia Sesion para acceder a este contenido.<br>";
   echo "<br><a href='login.html'>Login</a>";
   echo "<br><br><a href='index.html'>Registrarme</a>";
   header('Location: http://localhost/cdcn/login.html');//redirige a la página de login si el usuario quiere ingresar sin iniciar sesion


exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();
header('Location: http://localhost/cdcn/login.html');//redirige a la página de login, modifica la url a tu conveniencia
echo "Tu sesion a expirado,
<a href='login.html'>Inicia Sesion</a>";
exit;
}

?>
<?php
include "conecta.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos.css">
    <script src="js/direccion_taller.js"></script>
    <script src="js/cargar_agendamiento_acup.js"></script>
    <script src="js/cargar_alumno_fecha_acu.js"></script>
    <script src="js/carga_alumno_elim_acu.js"></script>
    
    <script src="js/carga_alumno_hora_acu.js"></script>
        <script src="js/carga_alumno_sesion_acu.js"></script>
        <script src="js/carga_alumno_sala_acu.js"></script>
        <script src="js/carga_alumno_prof_acu.js"></script>
    <script src="js/cargar_sala.js"></script>
    <script src="js/cargar_profesional.js"></script>
    <script src="js/valida_rut.js"></script>


    <title>Registro ficha masoterapia</title>
</head>
<body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>
        <div style="float:right" >
        <h6>Bienvenido <?php echo  $_SESSION['username'];?></h6>
        <a href=logout.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
        <p></p>
        </div> 
        <p></p>
            <a class="btn btn-primary" href="fichakinemaso_kine.php" role="button">Ir Atrás</a>    
            <a class="btn btn-primary" href="menu.php" role="button">Ir al menú</a> 
        </p>
    
  
</div> 
<form id="formulario_maso" name="formulario_maso"  action="guardar_masoterapia_kine.php" method="post">   

<center>
                            <h6>Ficha masoterapia</h6>
                            <table  id="tablamenu" class="table table-hover" style="width:100px; height:100px" >
                                    <tbody>

                                        <tr class="table-info">
                                                <td>run</td>
                                                <td><input type="text" name="run" id="run" class="form-control" placeholder=""></td>
                                                <td>Heridas</td>
                                                <td><textarea name="Heridas" id="Heridas" cols="40" rows="3" placeholder=""></textarea></td>
                                        </tr>

                                        <tr class="table-info">
                                                                               
                                                <td>Hematoma</td>
                                                <td><textarea name="Hematoma" id="Hematoma" cols="40" rows="3" placeholder=""></textarea></td>
                                                <td>Hongos</td>
                                                <td><textarea name="Hongos" id="Hongos" cols="40" rows="3" placeholder=""></textarea></td>
                                                
                                            </tr>
                            
      
                                            <tr class="table-info">
                                            <td>Cicatríz</td><td>
                                                <textarea name="Cicatríz" id="Cicatríz" cols="40" rows="3" placeholder=""></textarea></td>                                                        
                                                <td>Lunar</td>
                                                <td><textarea name="Lunar" id="Lunar" cols="40" rows="3" placeholder=""></textarea></td>                                                                      
                                                
                                                
                                            </tr>
                                                  
                                            <tr class="table-info">
                                            <td>Dolor</td>
                                                <td><textarea name="Dolor" id="Dolor" cols="40" rows="3" placeholder=""></textarea></td>                                                 
                                                    <td>Observaciones</td>
                                                    <td><textarea name="Observaciones" id="Observaciones" cols="40" rows="3" placeholder=""></textarea></td>                                                                      

                                                    
                                                </tr>

                                    </tbody>
                            </table>   
                            <p></p>
                            <h6>Sesiones</h6>
                            <table id="tablamenu" class="table table-hover" style="width:100px; height:200px" >
                                <tr class="table-info">
                                    <td>
                                        <span>Fecha</span>
                                        <input type="date" name="Fecha" id="Fecha" class="form-control" placeholder="aaaa/mm/dd">
                                    </td>
                                </tr>
                                
                                <tr class="table-info">
                                <td>
                                        <span>Nº sesión</span>
                                        <input type="text" name="sesión" id="sesión" class="form-control" placeholder="">
                                    </td>
                                </tr>
                                
                                <tr class="table-info">
                                    <td>
                                    <textarea  name="comentario" id="comentario" cols="30" rows="2"name="sesion"></textarea> 
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <script type="text/javascript">
                //*******************ALERT DE ENVIO*******************/
                        function pregunta(e){ 
                        if (confirm('Estas seguro de enviar los datos de este formulario?'))
                                {       
                                        document.formulario_maso.submit();                             

                        }else   {
                                        e.preventDefault();
                                }
       
                        };

                        
    </script>
</table>
<button type="button" class="btn btn-success" style="width: 200px" onclick="pregunta();">Enviar</button>
                        





</body>
</html>