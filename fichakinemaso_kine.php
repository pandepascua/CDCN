
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


    <title>Fichas kinesilogía y masoterapia</title>
</head>
<body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>

<div style="float:right" >
  <h6>Bienvenido <?php echo  $_SESSION['nombre']." ". $_SESSION['apellido'];?></h6>
   
  <a href=logout.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
  
  <p></p>
</div> 
        <p></p>
            <a class="btn btn-primary" href="kinesiologia.php" role="button">Ir Atrás</a>    
        </p>
          
        <div class="row">
                <div class="col-3">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Datos generales</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Evaluacion funcional</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Evaluacion kinésica</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Masoterapia</a>
                  </div>
                </div>
                <div class="col-9">
                  <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                            <h4>Ficha Datos Generales</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingreso" data-whatever="@mdo">Ingreso ficha</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificar" data-whatever="@fat">modificar ficha</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminar_dg" data-whatever="@getbootstrap">Ver y eliminar ficha</button>

<div class="modal fade" id="ingreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="width:900 px">
        <h5 class="modal-title" id="exampleModalLabel">Ingreso Ficha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h4>Ficha Inscripcion</h4>
                        <form id="form_dg" name="form_dg" method="post" action="formulario_dg_kine.php">
                                <table  id="tablamenu" class="table table-hover" style="width:470px; height:150px"  >
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr class="table-info">
                                                <td><span>R.U.N</span></td>
                                                <td> 
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" id="run_dg" class="form-control" maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                                                                    <input type="hidden" id="token_run_dg" name="run" class="form-control">
 
                                                                </div>
                                                            </div>
                                                </td>
                                            </tr>
                                            <tr class="table-info">

                                                <td><span>Nombre.</span></td>
                                                <td>                                                             
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="nom_alumno" name="nombre" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                
                                            </tr>
                                            <tr class="table-info">
                                                    <td><span>Edad.</span></td>
                                                    <td> 
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" id="edad_alumno" name="edad" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">

                                                    <td><span>Fecha nacimiento.</span></td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="fecha_nac" name="fecha_nac" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>

                                            <tr class="table-info">
                                                    <td><span>Direccion.</span></td>
                                                    <td> 
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">

                                                    <td><span>Patologias.</span></td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="patologias" name="patologia" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td><span>Calular.</span></td>
                                                    <td> 
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" id="telefono_alumno" name="celular" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">

                                                    <td><span>Email.</span></td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="correo" class="form-control" name="correo" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>

                                    
                                        </tbody>
                                </table>   
                        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" style="width: 200px" value="enviar" form="form_dg" >Continuar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="width:900 px">
        <h5 class="modal-title" id="exampleModalLabel">Ingreso Ficha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h4>Ficha Inscripcion</h4>
                        <form id="form_dg_mod" name="form_dg_mod" method="post" action="ficha_datos_generales_kine.php">
                                <table  id="tablamenu" class="table table-hover" style="width:470px; height:150px"  >
                                        <thead>
                                        </thead>
                                        <tbody>
                                        <tr class="table-info">
                                                <td><span>R.U.N</span></td>
                                                <td> 
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="run_dg2" class="form-control" name="run2"  maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <tr class="table-info">
                                                <td><span>Nº de ficha</span></td>
                                                <td> 
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="token_dg1" class="form-control" name="id_dg2"  maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="table-info">

                                                <td><span>Nombre.</span></td>
                                                <td>                                                             
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="token_dg3" name="nombre2" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                
                                            </tr>
                                            <tr class="table-info">
                                                    <td><span>Edad.</span></td>
                                                    <td> 
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" id="token_dg4" name="edad2" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">

                                                    <td><span>Fecha nacimiento.</span></td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="token_dg5" name="fecha_nac2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>

                                            <tr class="table-info">
                                                    <td><span>Direccion.</span></td>
                                                    <td> 
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" id="token_dg7" name="direccion2" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">

                                                    <td><span>Patologias.</span></td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="token_dg9" name="patologia2" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td><span>Celular.</span></td>
                                                    <td> 
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" id="token_dg6" name="celular2" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">

                                                    <td><span>Email.</span></td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="token_dg8" class="form-control" name="correo2" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>
                                                    <tr class="table-info">

                                                    <td><span>Taller seleccionado.</span></td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="token_dg29" class="form-control" name="taller" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">

                                            <td><span>Diágnostico.</span></td>
                                            <td>                                                             
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" id="token_dg10" class="form-control" name="diagnostico2" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>         
                                        <tr class="table-info">

                                    <td><span>Ocupación.</span></td>
                                    <td>                                                             
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="token_dg11" class="form-control" name="ocupacion2" placeholder="">
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                                         <tr class="table-info">

                                    <td><span>Fecha de Ingreso.</span></td>
                                    <td>                                                             
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="token_dg12" class="form-control" name="fecha_ingreso2" placeholder="">
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    </tr>
                                     <tr class="table-info">

                                    <td><span>Motivo de consulta.</span></td>
                                    <td>                                                             
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="token_dg13" class="form-control" name="motivo2" placeholder="">
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    </tr>
                                    <tr class="table-info">

                                    <td><span>Actividad física.</span></td>
                                    <td>                                                             
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="token_dg26" class="form-control" name="act_fisica2" placeholder="">
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    </tr>
                                                         <tr class="table-info">

                                    <td><span>Anamnesis.</span></td>
                                    <td>                                                             
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="token_dg27" class="form-control" name="anamnesis2" placeholder="">
                                            </div>
                                        </div>
                                    </td>
                                    </tr>

                                    
                                        </tbody>
                                </table>   
                        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" style="width: 200px" value="enviar" form="form_dg_mod" >Continuar</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="eliminar_dg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="width:900 px">
        <h5 class="modal-title" id="exampleModalLabel">Ingreso Ficha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h4>Ficha Inscripcion</h4>
                        <form id="form_dg_el" name="form_dg_el" method="post" action="eliminar_dg_kine.php">
                                <table  id="tablamenu" class="table table-hover" style="width:470px; height:150px"  >
                                        <thead>
                                        </thead>
                                        <tbody>
                                        <tr class="table-info">
                                                <td><span>R.U.N</span></td>
                                                <td> 
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="run_el" class="form-control" name="run3_el"  maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <tr class="table-info">
                                                <td><span>Nº de ficha</span></td>
                                                <td> 
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="el_dg1" class="form-control" name="id_dg_el"  maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="table-info">

                                                <td><span>Nombre.</span></td>
                                                <td>                                                             
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="el_dg3" name="nombre_el" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                
                                            </tr>
                                            <tr class="table-info">
                                                    <td><span>Edad.</span></td>
                                                    <td> 
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" id="el_dg4" name="edad_el" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">

                                                    <td><span>Fecha nacimiento.</span></td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="el_dg5" name="fecha_nac_el" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>

                                            <tr class="table-info">
                                                    <td><span>Direccion.</span></td>
                                                    <td> 
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" id="el_dg7" name="direccion_el" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">

                                                    <td><span>Patologias.</span></td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="el_dg9" name="patologia_el" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">
                                                    <td><span>Celular.</span></td>
                                                    <td> 
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" id="el_dg6" name="celular_el" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">

                                                    <td><span>Email.</span></td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="el_dg8" class="form-control" name="correo_el" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>
                                                    <tr class="table-info">

                                                    <td><span>Taller seleccionado.</span></td>
                                                    <td>                                                             
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" id="el_dg29" class="form-control" name="taller_el" placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>
                                            <tr class="table-info">

                                            <td><span>Diágnostico.</span></td>
                                            <td>                                                             
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" id="el_dg10" class="form-control" name="diagnostico_el" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>         
                                        <tr class="table-info">

                                    <td><span>Ocupación.</span></td>
                                    <td>                                                             
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="el_dg11" class="form-control" name="ocupacion_el" placeholder="">
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                                         <tr class="table-info">

                                    <td><span>Fecha de Ingreso.</span></td>
                                    <td>                                                             
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="el_dg12" class="form-control" name="fecha_ingreso_el" placeholder="">
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    </tr>
                                     <tr class="table-info">

                                    <td><span>Motivo de consulta.</span></td>
                                    <td>                                                             
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="el_dg13" class="form-control" name="motivo_el" placeholder="">
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    </tr>
                                    <tr class="table-info">

                                    <td><span>Actividad física.</span></td>
                                    <td>                                                             
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="el_dg26" class="form-control" name="act_fisica_el" placeholder="">
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    </tr>
                                                         <tr class="table-info">

                                    <td><span>Anamnesis.</span></td>
                                    <td>                                                             
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="el_dg27" class="form-control" name="anamnesis_el" placeholder="">
                                            </div>
                                        </div>
                                    </td>
                                    </tr>

                                    
                                        </tbody>
                                </table>   
                        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" style="width: 200px" value="enviar" form="form_dg_el" >Continuar</button>
      </div>
    </div>
  </div>
</div>


























                    </div>
                    <!--*********************EVALUACION FUNCIONAL********************************************-->
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <h4>Evaluacion Funcional</h4>
                                           
                                           <a class="btn btn-primary" href="evaluacion_funcional_ingreso_kine.php" role="button">Ir a ficha</a> 
                                           <a class="btn btn-primary" href="evaluacion_funcional_mod_kine.php" role="button">Modificar ficha</a> 
                                           <a class="btn btn-primary" href="evaluacion_funcional_eliminar_kine.php" role="button">Eliminar ficha</a> 


                <!--***********************************evaluacion kinesica**********************************************-->
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <h4>Evaluacion Kinésica traumatológica</h4>
                        <p></p>
                    
                    <a class="btn btn-primary" href="registro_ficha_ev_k_kine.php" role="button">Ir a ficha</a> 
                    <a class="btn btn-primary" href="modificacion_ev_k_kine.php" role="button">Modificar ficha</a> 
                    <a class="btn btn-primary" href="eliminar_ev_k_kine.php" role="button">Ver y eliminar ficha</a> 


                    </div>

                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <h4>Ficha Masoterapia</h4>
                    <a class="btn btn-primary" href="registro_ficha_maso_kine.php" role="button">Ir a ficha</a> 
                    <a class="btn btn-primary" href="modificacion_maso_kine.php" role="button">Modificar ficha</a> 
                    <a class="btn btn-primary" href="eliminar_maso_kine.php" role="button">Eliminar ficha</a> 

                    </div>
                  </div>
            </div>
        </div>      
</body>
</html>