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
    <script src="js/ficha_ev_k.js"></script>
    <script src="js/valida_rut.js"></script>

    <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>


  
    <title>Registro ficha evaluación kinésica</title>
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
        <p></p> 
        <center>

    <form id="form_ek2" name="form_ek2" method="post" action="guardado_formulario_ek_kine.php">
    <table  id="tablamenu" class="table table-hover" style="width:700px; height:100px" >
                                    <thead>
                                    </thead>
                                    <tbody>
                                    <tr class="table-info">
                                                <td><span>R.U.N</span></td>
                                                <td> 
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" id="run_ev_k2" name="run_ek2"class="form-control"   maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                                                                    <input type="hidden" id="token_run_ev_k" name="run" class="form-control">
                                                                    <input type="hidden" id="token_id_ek" name="id_ev_k" class="form-control">


 
                                                                </div>
                                                            </div>
                                                </td>
                                                <td><span>Nombre.</span></td>
                                                <td>                                                             
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="nom_alumno_ev_k" name="nombre2"  class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                
                                            </tr>
                                        <tr class="table-info">
                                            <td><span>Fecha de evaluación</span></td>
                                            <td> 
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="fech_eva"name="fecha_ek2"  class="form-control" placeholder="aaaa/mm/dd">
                                                            </div>
                                                        </div>
                                            </td>
                                            <td><span>Diagnostico medico.</span>
                                            </td>
                                            <td>                                                             
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" id="diag_medico" name="diag_ek2"class="form-control" placeholder="sin datos"  >
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        

                                    </tbody>
                            </table>
                                        <h6>Observación general</h6>
                                        <table  id="tablamenu" class="table table-hover" style="width:100px; height:100px" >
                                                <tbody>
                                                    <tr class="table-info">
                                                        <td rowspan="8"><img src="images/evf.JPG" width="300PX" height="500px" ></td>
                                                    </tr>
                                                    <tr class="table-info">
                                                                                                                  
                                                            <td>PLANO FRONTAL</td>
                                                        </tr>
                                                    <tr class="table-info">
                                                            <td><textarea  id="plano_frontal" name="plano_frontal2" id="" cols="50" rows="2" placeholder=""  >  </textarea></td>
                                                    </tr>
                                                    <tr class="table-info">
                                                                                                                  
                                                            <td>PLANO SAGITAL</td>
                                                        </tr>

                                                    <tr class="table-info">
                                                                                                                  
                                                        <td><textarea id="plano_sagital" name="plano_sagital2" id="" cols="50" rows="2" placeholder=""   ></textarea></td>
                                                    </tr>
                                                    <tr class="table-info">
                                                                                                                  
                                                            <td>PLANO POSTERIOR</td>
                                                        </tr>
                                                    <tr class="table-info">
                                                            <td><textarea id="plano_posterior" name="plano_posterior2" id="" cols="50" rows="2" placeholder=""  ></textarea></td>
                                                        </tr>
                                                </tbody>
                                        </table> 
                                        <center>
 <h6>Indique lugar del dolor en el cuadro de texto. </h6>
    <img src="images/dolor_ev_kine.JPG" width="300PX" height="500px" >

                       <textarea name="zona_afectada" id="zona_dolor" cols="30" rows="10" placeholder="Ej-. zona afectada 1 y 5 debido..." ></textarea>                       
     

                                        </center>
   

        <table  id="tablamenu" class="table table-hover" style="width:700px; height:100px" >
             <thead>
                </thead>
                    <tbody>
                        <tr class="table-info">
                            <td><span>Eva</span></td>
                            <td> 
                               <div class="row">
                                    <div class="col">
                                        <input type="text"  name="eva1"  id="eva_dolor"   class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                                                    <td><span>Tipo.</span>
                                                    </td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="tipo" name="tipo1" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="table-info">
                                                    <td><span>Localizacion</span></td>
                                                    <td> 
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" id="localizacion" name="localizacion1" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                                    <td><span>Generador.</span>
                                                    </td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="generador" name="generador1" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="table-info">
                                                    <td><span>Atenuante</span></td>
                                                    <td> 
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" id="atenuante" name="atenuante1" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                                    <td><span></span>
                                                    </td>
                                                    <td>                                                             
                                                     <textarea id="otros_dolor" name="nota1"></textarea>
                                                    </td>
                                                </tr>
                                                
        
                                            </tbody>
                                    </table>
                                    <p></p>
                                    <table  id="tablamenu" class="table table-hover" style="width:700px; height:100px" >
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr class="table-success">
                                                <td><span>Eva</span></td>
                                                <td> 
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text"  id="eva_dolor_2" name="eva2" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                </td>
                                                <td><span>Tipo.</span>
                                                </td>
                                                <td>                                                             
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="tipo_2" name="tipo2" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-success">
                                                <td><span>Localizacion</span></td>
                                                <td> 
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" id="localizacion_2" name="localizacion2" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                </td>
                                                <td><span>Generador.</span>
                                                </td>
                                                <td>                                                             
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text"  id="generador_2" name="generador2" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-success">
                                                <td><span>Atenuante</span></td>
                                                <td> 
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" id="atenuante_2" name="atenuante2" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                </td>
                                                <td><span></span>
                                                </td>
                                                <td>                                                             
                                                 <textarea id="otros_dolor_2" name="nota2" ></textarea>
                                                </td>
                                            </tr>
                                            
    
                                        </tbody>
                                </table>  

                                <h6>Sensibilidad</h6>
                                <table  id="tablamenu" class="table table-hover" style="width:700px; height:100px" >
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr class="table-info">
                                            <td><span>Superficial</span></td>
                                            <td> 
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="superficial" name="superficial" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                            </td>
                                        </tr>
                                        <tr class="table-info">
                                            <td><span>Profunda</span></td>
                                            <td> 
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text"  id="profundidad" name="profunda" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                            </td>
                                        </tr>
                                    </tbody>
                            </table>
                            <p></p>
                            <h6>Cicatriz</h6>
                            <table  id="tablamenu" class="table table-hover" style="width:700px; height:100px" >
                                <thead>
                                </thead>
                                <tbody>
                                    <tr class="table-info">
                                        <td><span>Dimension</span></td>
                                        <td> 
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="dimension" name="dimension" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                        </td>
                                    </tr>
                                    <tr class="table-info">
                                        <td><span>Estado</span></td>
                                        <td> 
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text"   id="estado"  name="estado" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                        </td>
                                    </tr>
                                </tbody>
                        </table>
                        <p></p>
                        <h6>Antropometria</h6>
                        <p></p>

                        <table  id="tablamenu" class="table table-hover" style="width:700px; height:100px" >
                                <thead>
                                </thead>
                                <tbody>
                                    <tr class="table-info">
                                        <td><span>Segmento</span></td>
                                        <td><span>Der</span></td>
                                        <td><span>Izq</span></td>

                                    </tr>
                                    <tr class="table-info">
                                        <td> 
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" id="segmento1" name="seg1" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" id="der1" name="der1" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" id="izq1" name="izq1" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>    
                                    </tr>
                                    <tr class="table-info">
                                            <td> 
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" id="segemento2" name="seg2" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td> 
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" id="der2" name="der2" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td> 
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" id="izq2" name="izq2" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </td>    
                                        </tr>
                                        <tr class="table-info">
                                                <td> 
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="segmento3" name="seg3" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td> 
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="der3" name="der3" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td> 
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="izq3" name="izq3" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>    
                                            </tr>
                                </tbody>
                        </table> 




                              <h6>ROM</h6>
                        <p></p>

                        <table  id="tablamenu" class="table table-hover" style="width:700px; height:100px" >
                                <thead>
                                </thead>
                                <tbody>
                                    <tr class="table-info">
                                        <td><span>Articulación</span></td>
                                        <td> 
                                            <div class="row">
                                                <div class="col">
                                                    <input type="hidden" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="row">
                                                <div class="col">
                                                    <input type="hidden" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="table-info">
                                        <td><input type="text" id="articulacion" name="articulacion" class="form-control" placeholder=""></td>
                                        <td> 
                                            <div class="row">
                                                <div class="col">
                                                    <input type="hidden" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="row">
                                                <div class="col">
                                                    <input type="hidden" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="table-info">
                                        <td> 
                                            <div class="row">
                                                <div class="col">
                                                    <input type="hidden" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                        <td><span>Der</span></td>
                                        <td><span>Izq</span></td>   
                                    </tr>
                                    <tr class="table-info">
                                            <td><span>Activo</span></td>

                                            <td> 
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" id="activo_der" name="activoder" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td> 
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" id="activo_izq" name="activoizq" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </td>    
                                        </tr>
                                        <tr class="table-info">
                                                <td><span>Pasivo</span></td>

                                                <td> 
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="pasivo_der" name="pasivoder" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td> 
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="pasivo_izq" name="pasivoizq" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>    
                                            </tr>
                                            <tr class="table-info">
                                                    <td><span>Endfeal</span></td>
    
                                                    <td> 
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="edfeal_der" name="endfealder"class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="endfeal_izq" name="endfealizq" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>    
                                                </tr>
                                                
                                </tbody>
                        </table>   
                                               <p></p>
                        <h6>Fuerza</h6>
                        <p></p>

                        <table  id="tablamenu" class="table table-hover" style="width:700px; height:100px" >
                                <thead>
                                </thead>
                                <tbody>
                                    <tr class="table-info">
                                        <td><span>Articulación</span></td>
                                        <td> 
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" id="articulacion1" name="articulacion1" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" id="articulacion2" name="articulacion2" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="table-info">
                                        <td> 
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" id="articulacion3" name="articulacion3" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                        <td><span>Der</span></td>
                                        <td><span>Izq</span></td>   
                                    </tr>
                                    <tr class="table-info">
                                            <td><span>Flexión</span></td>

                                            <td> 
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" id="flexion_der" name="flexionder" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td> 
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" id="flexion_izq" name="flexionizq" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </td>    
                                        </tr>
                                        <tr class="table-info">
                                                <td><span>Extención</span></td>

                                                <td> 
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="extension_der" name="extensionder" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td> 
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="extension_izq" name="extensionizq" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>    
                                            </tr>
                                            <tr class="table-info">
                                                    <td><span>ABD</span></td>
    
                                                    <td> 
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="abd_der" name="abdder" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="abd_izq" name="abdizq" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>    
                                                </tr>
                                                <tr class="table-info">
                                                    <td><span>ADD</span></td>
        
                                                    <td> 
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="add_der"name="addder" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text"  id="add_izq" name="addizq" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>    
                                                </tr>
                                                <tr class="table-info">
                                                        <td><span>ROT INT</span></td>
            
                                                        <td> 
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" id="rot_int_der"  name="rotintder" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td> 
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" id="rot_int_izq" name="rotintizq" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                        </td>    
                                                    </tr> 
                                                    <tr class="table-info">
                                                        <td><span>ROT EXT</span></td>
                                                        <td> 
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" id="rot_ext_der" name="rotextder"class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td> 
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" id="rot_ext_izq" name="rotextizq" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                        </td>    
                                                    </tr>         
                                </tbody>
                        </table> 
                        <h6>Pruebas Funcionales</h6>

                        <table id="tablamenu" class="table table-hover" style="width:700px; height:100px" >
                            
                            <tr class="table-info">
                                <td>
                                <textarea style="width:600px" id="pruebas_funcionales" name="prueba_funcional"></textarea> 
                                </td>
                            </tr>
                        </table>
                        <p></p>
                        <h6>Sesiones</h6>
                        <table id="tablamenu" class="table table-hover" style="width:700px; height:200px" >
                            <tr class="table-info">
                                <td>
                                    <span>Fecha</span> 
                                    <input type="date" id="fecha_sesiones" name="fecha_sesion" class="form-control" placeholder="aaaa/mm/dd">
                                </td>

                                <td>
                                        <span>Atendido</span>
                                           <input type="text"   id="atendido" name="atendido" class="form-control" placeholder="">
                                </td>
                                <td>
                                    <span>Nº sesión</span>
                                    <input type="text" id="n_sesion" name="num_sesion" class="form-control" placeholder="">
                                </td>
                            </tr>
                            <tr class="table-info">
                                <td>
                                <textarea cols="20" rows="2" id="otro" name="otro_sesion"></textarea> 
                                </td>
                                <input type="hidden" class="form-control" placeholder="">                                
                                </td>
                            </tr>
                        </table>

                                </form>

                                </center>
                                <button type="submit" form="form_ek2"  class="btn btn-success">Enviar</button>

                                </center>
</body>
</html>