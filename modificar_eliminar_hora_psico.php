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
        <link rel="stylesheet" href="estilos.css">
        <script src="js/cargar_agendamiento_psi.js"></script>
        <script src="js/carga_alumno_hora_psico.js"></script>
        <script src="js/carga_alumno_sesion_psico.js"></script>
        <script src="js/carga_alumno_sala_psico.js"></script>
        <script src="js/carga_alumno_prof_psico.js"></script>
        <script src="js/carga_alumno_elim.js"></script>

        <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>




        <script src="js/cargar_sala.js"></script>
    <script src="js/cargar_profesional.js"></script>

    <title>Modificar Hora Paciente</title>
</head>
<body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>

<div style="float:right" >
  <h6>Bienvenido <?php echo  $_SESSION['nombre']." ". $_SESSION['apellido'];?></h6>
   
  <a href=logout.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
  
  <p></p>
</div> 
        <p></p>
        <a class="btn btn-primary" href="psicomotricidad.php" role="button">Ir Atrás</a>     
        <a class="btn btn-primary" href="menu.php" role="button">Ir al Menú</a> 
        <p></p>
        <center>
        
                <h3>Modificar Hora Agendamiento Psicomotricidad</h3>
                <p></p>
           
                        <form name="mod_fecha_psico" action="update/mod_fecha_psi.php" method="post" target="_self" ONSUBMIT="return pregunta();">

                        <table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >

                        <tr class="table-info">
                        <td><span>R.U.N</span></td>
                            <td> 
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="run_alumno" class="form-control" placeholder="Ej:11111111-k">
                                            </div>
                                        </div>
                            </td>
                            <td><span></span></td>

                            <td> 
                                   <input type="hidden" name="" id="">

                            </td>
                                <td><span>Fecha nueva.</span></td>
                                <td>
                                        <!-- Campo de entrada de fecha -->
                                        
                                        <input type="date" name="fecha_psi_mod" min="2019-01-01"
                                                                        max="2030-01-01" step="1">
                                       
                                </td>
                                <td>                                                             
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="token_alumno" name="id_alumno" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                                <script type="text/javascript">
                                        //*******************ALERT DE ENVIO*******************/
                                 function pregunta(e){ 
                                 if (confirm('Estas seguro de enviar los datos?'))
                                     {       
                                        document.mod_fecha_psico.submit();                             

                                    }else   {
                                        e.preventDefault();
                                    }
       
                                    };

                        
                                </script>
                                <td> 
                                <button type="button" class="btn btn-success" style="width: 200px" onclick="pregunta();">Modificar</button>
    
                                </td>
                        </tr>
                        </table>
                        </form>


                        <form name="mod_hora"action="update/mod_hora_psi.php" method="post" target="_self" ONSUBMIT="return pregunta2();">
                        <table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >

                        <tr class="table-info">
                        <td><span>R.U.N</span></td>
                            <td> 
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="run_alumno2" class="form-control" placeholder="Ej:11111111-k">
                                            </div>
                                        </div>
                            </td>
                            <td><span></span></td>

                            <td> 
                                   <input type="hidden" name="" id="">

                            </td>
                                <td><span>Hora nueva.</span></td>
                                <td>  <!-- Campo de entrada de hora -->
                            
                                    <input type="time" name="hora" min="09:00"
                                                                   max="12:00" step="450">
                                </td>
                                <td>                                                             
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="token_alumno2" name="id_alumno" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                            <script type="text/javascript">
                                        //*******************ALERT DE ENVIO*******************/
                                 function pregunta2(e){ 
                                 if (confirm('Estas seguro de enviar los datos?'))
                                     {       
                                        document.mod_hora.submit();                             

                                    }else   {
                                        e.preventDefault();
                                    }
       
                                    };

                        
                                </script>
                                <td> 
                                <button type="button" class="btn btn-success" style="width: 200px" onclick="pregunta2();">Modificar</button>
    
                                </td>
                        </tr>
                        </table>
                        </form>


                        <form name="mod_sala" action="update/mod_sala_psi.php" method="post" target="_self" ONSUBMIT="return pregunta3();">
                        <table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >

                        <tr class="table-info">
                        <td><span>R.U.N</span></td>
                            <td> 
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="run_alumno3" class="form-control" placeholder="Ej:11111111-k">
                                            </div>
                                        </div>
                            </td>
                            <td><span></span></td>

                            <td> 
                                   <input type="hidden" name="" id="">

                            </td>
                                <td><span>Sala nueva.</span></td>
                                <td>                                                             
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" id="nom_sala" class="form-control" placeholder="">
                                            <input type="text" id="token_sala" name="sala" class="form-control" placeholder="">

                                        </div>
                                    </div>
                                </td>
                                <td>                                                             
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="token_alumno3" name="id_alumno" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                            <script type="text/javascript">
                                        //*******************ALERT DE ENVIO*******************/
                                 function pregunta3(e){ 
                                 if (confirm('Estas seguro de enviar los datos?'))
                                     {       
                                        document.mod_sala.submit();                             

                                    }else   {
                                        e.preventDefault();
                                    }
       
                                    };

                        
                                </script>
                                <td> 
                                <button type="button" class="btn btn-success" style="width: 200px" onclick="pregunta3();">Modificar</button>
    
                                </td>
                        </tr>
                        </table>
                        </form>

                        <form name="mod_sesion" action="update/mod_sesion_psi.php" method="post" target="_self" ONSUBMIT="return pregunta4();">
                        <table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >

                        <tr class="table-info">
                        <td><span>R.U.N</span></td>
                            <td> 
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="run_alumno4" class="form-control" placeholder="Ej:11111111-k">
                                            </div>
                                        </div>
                            </td>
                            <td><span></span></td>

                            <td> 
                                   <input type="hidden" name="" id="">

                            </td>
                                <td><span>Sesión nuevo.</span></td>
                                <td>                                                             
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="sesion"class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </td>
                                <td>                                                             
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="token_alumno4" name="id_alumno" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                            <script type="text/javascript">
                                        //*******************ALERT DE ENVIO*******************/
                                 function pregunta4(e){ 
                                 if (confirm('Estas seguro de enviar los datos?'))
                                     {       
                                        document.mod_sesion.submit();                             

                                    }else   {
                                        e.preventDefault();
                                    }
       
                                    };

                        
                                </script>
                                <td> 
                                <button type="button" class="btn btn-success" style="width: 200px" onclick="pregunta4();">Modificar</button>
    
                                </td>
                        </tr>
                        </table>
                        </form>
                        <form name="mod_prof"action="update/mod_prof_psi.php" method="post" target="_self" ONSUBMIT="return pregunta5();">
                        <table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >

                        <tr class="table-info">
                        <td><span>R.U.N</span></td>
                            <td> 
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="run_alumno5" class="form-control" placeholder="Ej:11111111-k">
                                            </div>
                                        </div>
                            </td>
                            <td><span></span></td>

                            <td> 
                                   <input type="hidden" name="" id="">

                            </td>
                                <td><span>Profesional nuevo.</span></td>
                                <td>                                                             
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" id="nom_prof" class="form-control" placeholder="">
                                            <input type="text" id="token_profesional" name="prof"class="form-control" placeholder="">

                                        </div>
                                    </div>
                                </td>
                                <td>                                                             
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="token_alumno5" name="id_alumno" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                            <script type="text/javascript">
                                        //*******************ALERT DE ENVIO*******************/
                                 function pregunta5(e){ 
                                 if (confirm('Estas seguro de enviar los datos?'))
                                     {       
                                        document.mod_prof.submit();                             

                                    }else   {
                                        e.preventDefault();
                                    }
       
                                    };

                        
                                </script>
                                <td> 
                                <button type="button" class="btn btn-success" style="width: 200px" onclick="pregunta5();">Modificar</button>
    
                                </td>
                        </tr>
                       
                    </table>
                    </form>
            <p></p>
            <br>
            <h3>Eliminar Paciente de Agendamiento Psicomotricidad</h3>
            <p></p>
            <form name="eliminar_alumno"action="delete/delete_alumno_psi.php" method="post" target="_self" ONSUBMIT="return pregunta5();">
                        <table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >

                        <tr class="table-info">
                        <td><span>R.U.N</span></td>
                            <td> 
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="run_alumno6" class="form-control" placeholder="Ej:11111111-k">
                                            </div>
                                        </div>
                            </td>
                            <td><span></span></td>

                            <td> 
                                   <input type="hidden" name="" id="">

                            </td>
                                <td>                                                             
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="token_alumno6" name="id_alumno" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                            <script type="text/javascript">
                                        //*******************ALERT DE ENVIO*******************/
                                 function pregunta5(e){ 
                                 if (confirm('Estas seguro de enviar los datos?'))
                                     {       
                                        document.eliminar_alumno.submit();                             

                                    }else   {
                                        e.preventDefault();
                                    }
       
                                    };

                        
                                </script>
                                <td> 
                                <button type="button" class="btn btn-success" style="width: 200px" onclick="pregunta5();">Eliminar</button>
    
                                </td>
                        </tr>
                       
                    </table>
                    </form>
        </center>
</body>
</html>