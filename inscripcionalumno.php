
<?php
/*
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
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>

    <script src="js/direccion_taller.js"></script>
    <script src="js/llamado_taller.js"></script>

    <title>Agendamiento Masoterapia</title>
</head>
<body style="margin: 25px 50px 75px">
    
    
  
                <img src="images/logocor.png" width="100px" height="100px"/>
                <div style="float:right" >
                <h6>Bienvenido <?php echo  $_SESSION['username'];?></h6>
                <a href=logout_admin.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
                <p></p>
                </div> 
                <p></p>
                <a class="btn btn-primary" href="menu_talleres.php" role="button">Ir Atrás</a>     
                <a class="btn btn-primary" href="menu.php" role="button">Ir al Menú</a> 
                <p></p>  
<center>
        
    <h3>Inscripción del alumno</h3>
    <br>
    <form name='formulario_inscripcion' action="guardar_datos.php" method="post" target="_self" ONSUBMIT="return pregunta();" >

<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
<thead>

</thead>
<tbody>
  
    <tr class="table-info">
        <td><span>Nombre del taller</span></td>
        <td> 
                    <div class="row">
                        <div class="col">
                            <input type="text" id="nom_taller" name="nom_taller" class="form-control" placeholder="">
                            <input type="text" id="token_taller" name="id_taller" class="form-control" placeholder="">

                        </div>
                    </div>
        </td>
        <td><span>RUN.</span></td>
        <td>                                                             
            <div class="row">
                <div class="col">
                    <input type="text" name="run_alumno"class="form-control" placeholder="">
                </div>
            </div>
        </td>

    </tr>
    <tr class="table-info">
            <td><span>Nombre del Alumno.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text" name="nom_alumno" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
            <td><span>Edad.</span></td>
            <td>                                                             
                <div class="row">
                    <div class="col">
                        <input type="text" name="edad_alumno" class="form-control" placeholder="">
                    </div>
                </div>
            </td>
    </tr>

    <tr class="table-info">
            <td><span>Fecha nacimiento</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text" name="fecha_nac" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
            <td><span>Nombre Apoderado.</span></td>
            <td>                                                             
                <div class="row">
                    <div class="col">
                        <input type="text" name="nom_apod" class="form-control" placeholder="">
                    </div>
                </div>
            </td>
    </tr>
    <tr class="table-info">
            <td><span>Teléfono Apoderado.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text" name="tel_apod" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
            <td><span>Dirección.</span></td>
            <td>                                                             
                <div class="row">
                    <div class="col">
                        <input type="text" name="direc_alumno" class="form-control" placeholder="">
                    </div>
                </div>
            </td>
    </tr>
    <tr class="table-info">
            <td><span>Comuna</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text" name="comuna_alumno" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
            <td><span>Correo.</span></td>
            <td>                                                             
                <div class="row">
                    <div class="col">
                        <input type="text" name="correo_alumno" class="form-control" placeholder="">
                    </div>
                </div>
            </td>
    </tr>
    <tr class="table-info">
            <td><span>Patologías.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text" name="patologia_alumno" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
            <td><span>Teléfono alumno</span></td>
        <td> 
            <div class="row">
            <div class="col">
                <input type="text" name="tel_alumno" class="form-control" placeholder="">
            </div>
            </div>
        </td>
    </tr>                
    
</tbody>


<script type="text/javascript">
                //*******************ALERT DE ENVIO*******************/
                        function pregunta(e){ 
                        if (confirm('Estas seguro de enviar los datos de este formulario?'))
                                {       
                                        document.formulario_inscripcion.submit();                             

                        }else   {
                                        e.preventDefault();
                                }
       
                        };

                        
    </script>
</table>
<button type="submit" class="btn btn-success" style="width: 200px" value="enviar" onclick="pregunta();">Enviar</button>

</form>
</center>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp



<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<center>

</center>
</body>
</html>