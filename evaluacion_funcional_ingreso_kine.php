
<?php
         include "conecta.php"; 

        ?>
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script src="js/cargar_sala.js"></script>
    <script src="js/cargar_profesional.js"></script>
    <link rel="stylesheet" href="estilos.css">
<script  src="js/datos_generales.js"></script>
<script src="js/valida_rut.js"></script>
<script src="js/ev_k.js"></script>
<script src="js/carga_mod_dg.js"></script>
<script  src="js/carga_el_dg.js"></script>

<link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>


    <title>Ingreso Ficha evaluación funcional</title>
</head>
<body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>

<div style="float:right" >
  <h6>Bienvenido <?php echo  $_SESSION['nombre']." ". $_SESSION['apellido'];?></h6>
   
  <a href=logout.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
  
  <p></p>
</div>
        <p></p>
            <a class="btn btn-primary" href="fichakinemaso_kine.php" role="button">Ir Atrás</a>    
        </p>
    


        <form name="formulario_evaluacion" action="guardar_evaluacion_kine.php" method="post" target="_self" ONSUBMIT="return pregunta();">
<center>
<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr class="table-info">
                                                <td><span>Run</span></td>
                                                <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="run" id="run" class="form-control" placeholder=""  required oninput="checkRut(this)">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span>Fecha de evaluación</span></td>
                                                <td> 
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="date" name="fecha_eva" class="form-control" placeholder="aaaa/mm/dd">
                                                                </div>
                                                            </div>
                                                </td>
                                                
                                
                                            </tr>
                                            <tr class="table-info">
                                                    <td><span>FC.</span></td>
                                                    <td> 
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" name="fc" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                                    <td><span>PA.</span></td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="pa" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>

                                            <tr class="table-info">
                                            <td><span>Peso.</span>
                                                </td>
                                                <td>                                                             
                                                    <div class="row">
                                                        <div class="col">
                                                            <input id="id_peso" type="text" name="peso" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                                    <td><span>TALLA.</span></td>
                                                    <td> 
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input id="id_talla" type="text" name="talla" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                                    </tr>
                                                   <script type="text/javaScript">
                                                       function calcular(){
                                                        var talla=parseFloat(document.getElementById("id_talla").value);
                                                        var peso=parseFloat(document.getElementById("id_peso").value);
                                                        
                                                        var paso1=(peso/(talla*talla)).toFixed(2);
                                                        
                                                        //alert(paso1);
                                                        document.getElementById("imc").value=paso1;


                                                       };

                                                       function limpiar1() {
                                                     document.getElementById("id_talla").value = "";
                                                     document.getElementById("id_peso").value = "";
                                                     document.getElementById("imc").value = "";

                                                        };
                                                       </script>
                                            <tr class="table-info">
                                                    <td><span>IMC.</span></td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input id="imc" type="text" name="imc" readonly="readonly">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><input type="button" onclick="calcular();" class="btn btn-primary" value="Calcular IMC"></td>
                                                    <td><input type="button" onclick="limpiar1();" class="btn btn-primary" value="Limpiar"></td>

                                            </tr>
                                        </tbody>
                                </table>
                                <table class="table">
                                                       <thead>
                                                           <th scope="col"> Composicion corporal</th>
                                                           <th scope="col">Indice de masa corporal(IMC)</th>
                                                       </thead>
                                                       <tbody>
                                                           <tr>
                                                               <td>
                                                                   peso inferior a lo normal.
                                                               </td>
                                                               <td>
                                                                   menos de 18,5.
                                                               </td>
                                                           </tr>
                                                           <tr>
                                                               <td>
                                                                   Normal
                                                               </td>
                                                               <td>
                                                                   18.5-24.9
                                                               </td>
                                                           </tr>
                                                           <tr>
                                                               <td>
                                                                    Obesidad
                                                               </td>
                                                               <td>
                                                                   Más de 30.0
                                                               </td>
                                                           </tr>
                                                       </tbody>

                                </table>
                                <br>
                                <br>
                                            <h5>Observación general</h5>
                                            <table  id="tablamenu" class="table table-hover" style="width:100px; height:100px" >
                                                    <tbody>
                                                        <tr class="table-info">
                                                            <td rowspan="8"><img src="images/evf.JPG" width="300PX" height="500px" ></td>
                                                        </tr>
                                                        <tr class="table-info">
                                                                                                                      
                                                                <td>PLANO FRONTAL</td>
                                                            </tr>
                                                        <tr class="table-info">
                                                                <h6>PLANO FRONTAL</h6>
                                                                <td><textarea name="plano_frontal" id="plano_frontal" cols="50" rows="2" placeholder=""></textarea></td>
                                                        </tr>
                                                        <tr class="table-info">
                                                                                                                      
                                                                <td>PLANO SAGITAL</td>
                                                            </tr>

                                                        <tr class="table-info">
                                                                                                                      
                                                            <td><textarea name="plano_sagital" id="plano_sagital" cols="50" rows="2" placeholder=""></textarea></td>
                                                        </tr>
                                                        <tr class="table-info">
                                                                                                                      
                                                                <td>PLANO POSTERIOR</td>
                                                            </tr>
                                                        <tr class="table-info">
                                                                <td><textarea name="plano_posterior" id="plano_posterior" cols="50" rows="2" placeholder=""></textarea></td>
                                                            </tr>
                                                    </tbody>
                                            </table>   
                                   
                                <p> <h4>PATRONES DE JANDA </h4></p>
                                <h6>SCS</h6>
                                <table  id="tablamenu" class="table table-hover" style="width:200px; height:200px" >
                                        <tbody>
                                            <tr class="table-info">
                                                    <td></td>
                                                    <td>ACTIVADOS</td>
                                                    <td>INHIBIDOS</td>
                                                    <td></td>
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>Trapecio superior</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="trapecio_superior" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="trapecio_medio" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Trapecio medio</td>
                                            </tr>

                                            <tr class="table-info">
                                                    <td>Elevador E.</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="elevador_e" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="trapecio_inf" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Trapecio inf.</td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td>P. Mayor</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="p_mayor" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="serrato_ant" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Serrato ant.</td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td>ECOM</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="ecom" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="romboides" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Romboides.</td>
                                            </tr>
                                        </tbody>
                                </table>
                                   <p><h6>SCI</h6></p>
                                <table  id="tablamenu" class="table table-hover" style="width:100px; height:100px" >
                                        <tbody>
                                            <tr class="table-info">
                                                    <td></td>
                                                    <td>ACTIVADOS</td>
                                                    <td>INHIBIDOS</td>
                                                    <td></td>
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>Psoas</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="psoas" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="gluteos" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Glúteos</td>
                                            </tr>

                                            <tr class="table-info">
                                                    <td>R.Anterior</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="r_anterior" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="abdominales" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Abdominales.</td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td>TFL</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="tfl" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td>Extensores</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="extensores" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                            </tr>                                            <tr class="table-info">
                                                    <td>Aductores</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="aductores" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                            </tr>
                                        </tbody>
                                </table>   
                                <p><h4>FLEXIBILIDAD</h4></p>
                                <table  id="tablamenu" class="table table-hover" style="width:100px; height:100px" >
                                        <tbody>
                                            <tr class="table-info">
                                                    <td></td>
                                                    <td>ACTIVADOS</td>
                                                    <td>INHIBIDOS</td>
                                                    <td>N</td>
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>Cuadriceps</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="cuadriceps" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="cuadriceps_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>>120</td>
                                            </tr>

                                            <tr class="table-info">
                                                    <td>Gluteos/isqui</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="gluteos_isqui" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="gluteos_isqui_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>>100.</td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td>isqui(AKE)</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="isqui_ake" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="isqui_ake_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>180</td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td>Psoas</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="psoas_1"class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="psoas_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>>20</td>
                                            </tr>                                            
                                            <tr class="table-info">
                                                    <td>Piramidal</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="piramidal" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="test" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>TEST</td>
                                            </tr>
                                            
                                            <tr class="table-info">
                                                    <td>TFL</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="tfl_1" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="t_ober" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>T.OBER</td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td>Aductores</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="aductores_1" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="aductores_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>>60</td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td>Gastronemios</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="gastronemios" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="gastronemios_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>>20</td>
                                            </tr>                                            
                                            <tr class="table-info">
                                                    <td>Soleo</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="soleo" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="soleo_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>>20</td>
                                            </tr>
                                        </tbody>
                                </table>
                                <table  id="tablamenu" class="table table-hover" style="width:200px; height:200px" >
                                        <tbody>
                                            <tr class="table-info">                                                                                                         
                                                    <td>Test Wells</td>
                                                    <td>  <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="test_wells" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>

                                            <tr class="table-info">                                                                                                         
                                                    <td>Test Schobert</td>
                                                    <td>  <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="test_schobert" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>
                                            
                                        </tbody>
                                </table>
                                <table  id="tablamenu" class="table table-hover" style="width:100px; height:100px" >
                                        <tbody>
                                            <tr class="table-info">
                                                    <td></td>
                                                    <td>DERECHA</td>
                                                    <td>IZQUIERDA</td>
                                                    <td></td>
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>Rot.hombro</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="rot_hombro" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="rot_hombro_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>    
                                            </tr>
                                        </tbody>
                                </table>
                             
                                <p><h4>SEBT(Start Excursion Balance Test )</h4></p>
                                <table  id="tablamenu" class="table table-hover" style="width:100px; height:100px" >
                                        <tbody>
                                            <tr class="table-info">
                                                    <td>SEBT</td>
                                                    <td>DERECHA</td>
                                                    <td>IZQUIERDA</td>
                                                    <td>DIFERENCIA</td>
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>A</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="a" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="a_2"class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>0</td>
                                            </tr>

                                            <tr class="table-info">
                                                    <td>AL</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="al" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="al_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>0</td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td>L</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="l" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="l_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>0</td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td>PL</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="pl" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><div class="row">
                                                            <div class="col">
                                                                <input type="text" name="pl_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>0</td>
                                            </tr>                                            
                                            <tr class="table-info">
                                                    <td>P</td>
                                                    <td><div class="row">
                                                            <div class="col">
                                                                <input type="text" name="p" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><div class="row">
                                                            <div class="col">
                                                                <input type="text" name="p_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>0</td>
                                            </tr>
                                            
                                            <tr class="table-info">
                                                    <td>PM</td>
                                                    <td><div class="row">
                                                            <div class="col">
                                                                <input type="text" name="pm" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><div class="row">
                                                            <div class="col">
                                                                <input type="text" name="pm_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>0</td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td>M</td>
                                                    <td><div class="row">
                                                            <div class="col">
                                                                <input type="text" name="m" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><div class="row">
                                                            <div class="col">
                                                                <input type="text" name="m_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>0</td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td>AM</td>
                                                    <td><div class="row">
                                                            <div class="col">
                                                                <input type="text" name="am" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><div class="row">
                                                            <div class="col">
                                                                <input type="text" name="am_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>0</td>
                                            </tr>                                            
                                        </tbody>
                                </table> 
                                <table  id="tablamenu" class="table table-hover" style="width:400px; height:10px" >
                                        <tbody>
                                            <tr class="table-info">                                                                                                         
                                                    <td>Unipodal</td>
                                                    <td>  
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="unipodal" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>  <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="unipodal_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>    
                                            </tr>
                                        </tbody>
                                </table>

                                <p><h6>Reproduccion de la posicion activa</h6></p>
                                <table  id="tablamenu" class="table table-hover" style="width:200px; height:100px" >
                                        <thead>
                                            <tr class="table-info">
                                                    <th>SEGMENTO</th>
                                                    <th>DERECHA</th>
                                                    <th>IZQUIERDA</th>
                                                    <th>ANGULO</th>
                                            </tr>
                                                
                                        </thead>
                                        <tbody>
                                        <tr class="table-info">                                                                                                         
                                                    <td>
                                                    <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="segmento" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>  
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="derecha" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>  <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="izquierda" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>  <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="angulo" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>       
                                            </tr>

                                        </tbody>
                                </table> 

                                <p><h6>Reproduccion de la posicion pasiva</h6></p>
                                <table  id="tablamenu" class="table table-hover" style="width:200px; height:100px" >
                                        <thead>
                                            <tr class="table-info">
                                                    <th>SEGMENTO</th>
                                                    <th>DERECHA</th>
                                                    <th>IZQUIERDA</th>
                                                    <th>ANGULO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="table-info">                                                                                                         
                                                    <td>
                                                    <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="segmento_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>  
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="derecha_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>  <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="izquierda_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>  <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="angulo_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>       
                                            </tr>

                                        </tbody>
                                </table> 

                                <p><h4>FUERZA EXTREMIDADES</h4></p>
                                <table  id="tablamenu" class="table table-hover" style="width:400px; height:10px" >
                                    <thead>
                                            <tr class="table-info">
                                                    <th>EESS</th>
                                                    <th>DERECHA</th>
                                                    <th>IZQUIERDA</th>
                                            </tr>
                                    </thead>
                                        <tbody>
                                            <tr class="table-info">                                                                                                         
                                                    <td>Rot.Int.Hombro</td>
                                                    <td>  
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="rot_int" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>  <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="rot_int_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>    
                                            </tr>
                                        </tbody>
                                </table>
                                <table  id="tablamenu" class="table table-hover" style="width:400px; height:100px" >
                                        <thead>
                                            <tr class="table-info">
                                                    <th>EEII</th>
                                                    <th>DERECHA</th>
                                                    <th>IZQUIERDA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="table-info">                                                                                                         
                                                    <td>

                                                        <input type="text" name="eeii" class="form-control" placeholder="">

                                                    </td>
                                                    <td>  

                                                        <input type="text" name="derecha_3" class="form-control" placeholder="">

                                                    </td>
                                                    <td>  
                                                        <input type="text" name="izquierda_3" class="form-control" placeholder="">

                                                    </td>
       
                                            </tr>

                                        </tbody>
                                </table>
                                 <P><h4>ZONA MEDIA</h4></P>
                                 <table  id="tablamenu" class="table table-hover" style="width:400px; height:100px" >
                                        <thead>
                                                <tr class="table-info">
                                                    
                                                        <td></td>
                                                        <td colspan="2">VALOR</td>
                                                        <td>N</td>
                                                </tr>
                                        </thead>
                                    <tbody>

                                            <tr class="table-info">                                                                                                         
                                                    <td>puente prono</td>
                                                    <td colspan="2">  
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" name="puente_prono" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>72 seg</td>  
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>puente lateral</td>
                                                    <td>  
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" name="puente" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td >  
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" name="puente_2" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <td>20-30 seg</td>  
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>Extensores</td>
                                                    <td colspan="2">  
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" name="extensores_2" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>60 seg</td>  
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>Abdominales</td>
                                                    <td colspan="2">  
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" name="abdominales_1" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                    </td>
                                                    <td>>2min</td>
                                            </tr>
                                        </tbody>
                                </table>
                                <P><h4>CARDIOVASCULAR</h4></P>
                                <table  id="tablamenu" class="table table-hover" style="width:400px; height:100px" >
                                       <thead>
                                            <tr class="table-info">      
                                                    <th></th>
                                                    <th>PULSO1</th>
                                                    <th>PULSO2</th>
                                                    <th>PULSO3</th>
                                            </tr>
                                       </thead>
                                    <tbody>

                                           <tr class="table-info">                                                                                                         
                                                   <td>Test de Ruffiere</td>
                                                        <td >  
                                                           <div class="row">
                                                               <div class="col">
                                                                   <input id="id_valor1" type="text" name="pulso1" class="form-control" placeholder="">
                                                               </div>
                                                           </div>
                                                       </td>
                                                       <td >  
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input id="id_valor2" type="text" name="pulso2" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td >  
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input id="id_valor3" type="text" name="pulso3" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                        </td> 
                                           </tr>
                                           <tr class="table-info">                                                                                                         
                                            <script type="text/javaScript">
                                                       function calcularCardio(){
                                                        var valor1=parseInt(document.getElementById("id_valor1").value);
                                                        var valor2=parseInt(document.getElementById("id_valor2").value);
                                                        var valor3=parseInt(document.getElementById("id_valor3").value);


                                                        
                                                        var res=((valor1+valor2+valor3)-200)/10;
                                                    
                                                        
                                                       // alert(res);
                                                        document.getElementById("valorC").value=res;

                                                       };
                                                       function limpiar() {
                                                     document.getElementById("id_valor1").value = "";
                                                     document.getElementById("id_valor2").value = "";
                                                     document.getElementById("id_valor3").value = "";
                                                     document.getElementById("valorC").value = "";



                                                        };
                                                       </script>

                                                    <td><span>valor.</span></td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input id="valorC" type="text" name="valorC" readonly="readonly">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><input type="button" onclick="calcularCardio();" class="btn btn-primary" value="Calcular"></td>
                                                    <td><button type="button" onclick="limpiar();" class="btn btn-primary" value="Calcular">Limpiar</button></td>

                                            </tr>
                                       </tbody>
                               </table>
                             
                                            
                                        </
                                <P><h4>Test Opcionales criterios de alta</h4></P>
                                <P><h6>FMS(Functional movement screen)</h6></P>
                                <table  id="tablamenu" class="table table-hover" style="width:500px; height:10px" >
                                        <tbody>
                                            <tr class="table-info">                                                                                                         
                                                    <td>DS(sentadilla profunda)</td>
                                                    <td>  
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="ds" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>FMS</td>
                                                    <td>  
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="fms" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>    
                                            </tr>
                                        </tbody>
                                </table>
                                <table  id="tablamenu" class="table table-hover" style="width:100px; height:100px" >
                                        <tbody>
                                            <tr class="table-info">
                                                    <td></td>
                                                    <td>DERECHA</td>
                                                    <td>IZQUIERDA</td>
                                                    <td>VALOR</td>
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>HS(Paso de valla)</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="hs" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="hs_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                            <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" name="hs_3" class="form-control" placeholder="">
                                                                    </div>
                                                            </div>
                                                    </td>
                                            </tr>

                                            <tr class="table-info">
                                                    <td>IL(Estocada lineal)</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="in_0" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="in_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                            <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" name="in_3" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td>SM(Mobilidad de hombros).</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="sm" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="sm_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                            <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" name="sm_3" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td>ASLR(tepe)</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="aslr" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="aslr_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                            <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" name="aslr_3" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                            </tr>                                            
                                            <tr class="table-info">
                                                    <td>TSPU(Est.tronco)</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="tspu" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="tspu_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                            <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" name="tspu_3" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                            </tr>
                                            
                                            <tr class="table-info">
                                                    <td>RS(Est rotatoria)</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="rs" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="rs_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                            <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" name="rs_3" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                            </tr>
                                        </tbody>
                                </table>
                                    <p><h4>CKCUEST(closed kinetic chain upper extrimity s.t.)</h4></p>
                                <table  id="tablamenu" class="table table-hover" style="width:700px; height:100px" >
                                        <tbody>
                                            <tr class="table-info">
                                                    
                                                    <td>QC</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="qc" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    <td>72/85seg 36/45</td>
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>Triple Salto horizontal monoPodal</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="triple_salto" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        10%dif
                                                    </td>

                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>Core 3min</td>
                                                    <td> <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="core" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>
                                        </tbody>
                                </table>
                                <p><h4>SPPB (short phisical performance battery)</h4></p>
                                <table  id="tablamenu" class="table table-hover" style="width:200px; height:10px" >
                                        <tbody>
                                            <tr class="table-info">                                                                                                         
                                                    <td>Funcion física</td>
                                                    <td>  
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="funcion" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>   
                                            </tr>
                                        </tbody>
                                </table>
                                                                
                                <table  id="tablamenu" class="table table-hover" style="width:200px; height:10px" >
                                        <thead>
                                                <tr class="table-info">
                                                        <th>Rangos</th>
                                                        <th>Funcion física</th>
                                                </tr>
                                        </thead>
                                    <tbody>
                                            <tr class="table-info">                                                                                                         
                                                    <td>0 a 3</td>
                                                    <td>Muy baja</td>  
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>4 a 6</td>
                                                    <td>Baja</td>  
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>7 a 9</td>
                                                    <td>Moderada</td>  
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>10 a 12</td>
                                                    <td>Alta</td>  
                                            </tr>
                                        </tbody>
                                </table>
                                <p><h6>1. Chair Stand Test</h6></p>
                                <table  id="tablamenu" class="table table-hover" style="width:200px; height:10px" >
                                        <tbody>
                                            <tr class="table-info">                                                                                                         
                                                    <td>Tiempo</td>
                                                    <td>  
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="tiempo" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>   
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>Valor</td>
                                                    <td>  
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="valor" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>   
                                            </tr>
                                        </tbody>
                                </table>
                                <table  id="tablamenu" class="table table-hover" style="width:200px; height:10px" >
                                        <tbody>
                                            <tr class="table-info">                                                                                                         
                                                    <td>0</td>
                                                    <td>  
                                                            <span> no logrado</span> 
                                                    </td>   
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>1</td>
                                                    <td>  
                                                            <span>> 16.7 seg.</span>  
                                                    </td>   
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>2</td>
                                                    <td>  
                                                            <span>16.6 - 13.17 seg.</span>  
                                                    </td>   
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>3</td>
                                                    <td>  
                                                            <span>13.6 - 11.2 seg.</span> 
                                                    </td>   
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>4</td>
                                                    <td>  
                                                    <span>11.1 seg.</span> 
                                                    </td>   
                                            </tr>

                                            
                                        </tbody>
                                </table>
                                <p><h6>2. BALANCE TEST</h6></p>

                                <table  id="tablamenu" class="table table-hover" style="width:400px; height:200px" >
                                        <tbody>
                                            <tr class="table-info">
                                                <td rowspan="4"><img src="images/pies1.JPG" WIDTH="100PX" height="200px" ></td>
                                                                                                          
                                                    <td>BIPODAL</td>
                                                    <td>  
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" name="bipodal" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                        </td> 
                                                </tr>
                                                <tr class="table-info">
                                                        <td><span>0</span></td>
                                                        <td><span><10 seg. </span></td>                                               
                                                </tr>
                                            <tr class="table-info">
                                                    <td><span>1</span></td>
                                                    <td><span>10 seg. </span></td>                                               
                                            </tr>
                                
                                        </tbody>
                                </table>
                                <table  id="tablamenu" class="table table-hover" style="width:400px; height:200px" >
                                        <tbody>
                                            <tr class="table-info">
                                                <td rowspan="4"><img src="images/pies2.JPG" WIDTH="100PX" height="200px" ></td>
                                                                                                          
                                                    <td>SEMI TANDEM</td>
                                                    <td>  
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" name="semi_tandem" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                        </td> 
                                                </tr>
                                                <tr class="table-info">
                                                        <td><span>0</span></td>
                                                        <td><span><10 seg. </span></td>                                               
                                                </tr>
                                            <tr class="table-info">
                                                    <td><span>1</span></td>
                                                    <td><span>10 seg. </span></td>                                               
                                            </tr>
                                
                                        </tbody>
                                </table>
                                <table  id="tablamenu" class="table table-hover" style="width:400px; height:200px" >
                                        <tbody>
                                            <tr class="table-info">
                                                <td rowspan="5"><img src="images/pies3.JPG" WIDTH="100PX" height="300px" ></td>
                                                                                                          
                                                    <td>TANDEM</td>
                                                    <td>  
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" name="tandem" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                        </td> 
                                                </tr>
                                                <tr class="table-info">
                                                        <td><span>0</span></td>
                                                        <td><span><3 seg. </span></td>                                               
                                                </tr>
                                            <tr class="table-info">
                                                    <td><span>1</span></td>
                                                    <td><span>3 9.9 seg. </span></td>                                               
                                            </tr>
                                            <tr class="table-info">
                                                    <td><span>2</span></td>
                                                    <td><span>10 seg. </span></td>                                               
                                            </tr>
                                
                                        </tbody>
                                </table>         




                                <p><h6>3. GATE SPEED</h6></p>
                                <table  id="tablamenu" class="table table-hover" style="width:200px; height:10px" >
                                        <tbody>
                                            <tr class="table-info">                                                                                                         
                                                    <td>Tiempo</td>
                                                    <td>  
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" name="tiempo_2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>   
                                            </tr>
                                        </tbody>
                                </table>
                                <table  id="tablamenu" class="table table-hover" style="width:200px; height:10px" >
                                        <tbody>
                                            <tr class="table-info">                                                                                                         
                                                    <td>0</td>
                                                    <td>  
                                                            <span> no logrado</span> 
                                                    </td>   
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>1</td>
                                                    <td>  
                                                            <span>> 5.7 seg.</span>  
                                                    </td>   
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>2</td>
                                                    <td>  
                                                            <span>4.1 - 6.5 seg.</span>  
                                                    </td>   
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>3</td>
                                                    <td>  
                                                            <span>3.2 - 4.0 seg.</span> 
                                                    </td>   
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td>4</td>
                                                    <td>  
                                                    <span> < 3.1 seg. </span> 
                                                    </td>   
                                            </tr>
                                        </tbody>
                                </table>
                                <p><h6>Conclusiones</h6></p>
                                <table id="tablamenu" class="table table-hover" style="width:200px; height:10px">
                                    <tbody>
                                        <tr class="table-info">                                                                                                         
                                                <td><textarea name="conclusiones" id="conclusiones" cols="50" rows="2" placeholder=""></textarea></td>
                                                
                                        </tr>
                                    </tbody>
                                </table>

                                <p><h6>Sesiones</h6></p>

                                <table id="tablamenu" class="table table-hover" style="width:200px; height:200px">
                                        <tbody>
                                                <tr class="table-info">                                                                                                         
                                                    <td>Fecha</td>
                                                    </tr>
                                                    <tr class="table-info">   
                                                    <td>  
                                                                    
                                                        <input type="date" name="fecha" class="form-control" placeholder="aaaa/mm/dd">

                                                    </td>
                                                    </tr>
                                                    <tr class="table-info">  
                                                    <td>Atendido</td>
                                                    </tr>
                                                    <tr class="table-info">   
                                                    <td>  
                                                        <input type="text" name="antendido"  class="form-control" placeholder="">
                                                    </td>   
                                            </tr>
                                            <tr class="table-info">                                                                                                         
                                                    <td><textarea name="comentario" id="" cols="30" rows="4" placeholder=""></textarea></td>                                                    
                                            </tr>
                                        </tbody>
                                    </table>
                                     
                        </form>
                        <script type="text/javascript">
                //*******************ALERT DE ENVIO*******************/
                        function pregunta(e){ 
                        if (confirm('Estas seguro de enviar los datos de este formulario?'))
                                {       
                                        document.formulario_evaluacion.submit();                             

                        }else   {
                                        e.preventDefault();
                                }
       
                        };

                        
    </script>
</table>
<button type="button" class="btn btn-success" style="width: 200px" onclick="pregunta();">Enviar</button>
                        





</body>
</html>