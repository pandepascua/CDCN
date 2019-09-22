
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script src="js/direccion_taller.js"></script>
    <script src="js/cargar_agendamiento_acup.js"></script>
    <script src="js/cargar_alumno_fecha_acu.js"></script>

    <script src="js/carga_alumno_hora_acu.js"></script>
        <script src="js/carga_alumno_sesion_acu.js"></script>
        <script src="js/carga_alumno_sala_acu.js"></script>
        <script src="js/carga_alumno_prof_acu.js"></script>
        <script src="js/carga_alumno_elim_acu.js"></script>
        <script src="js/eliminar_entrevista.js"></script>

    <script src="js/cargar_sala.js"></script>
    <script src="js/cargar_profesional.js"></script>
    <script src="js/valida_rut.js"></script>

    <link rel="stylesheet" href="estilos.css">
    <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>


    <title>Acupuntura</title>
</head>
<body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>

<div style="float:right" >
  <h6>Bienvenido <?php echo  $_SESSION['nombre']." ". $_SESSION['apellido'];?></h6>
   
  <a href=logout.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
  
  <p></p>
</div>
        <p> </p>                    

           
        <p></p>
        <a class="btn btn-primary" href="menu.php" role="button">Ir Atrás</a>     
        <p></p>  
           <p>

            </p>
         
            <center>


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agendamiento" data-whatever="@mdo">Agendamiento Control del paciente</button>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificacion" data-whatever="@fat">modificacion agendamiento</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminacion" data-whatever="@getbootstrap">eliminar agendamiento</button><br><br>
    <a class="btn btn-primary" href="ficha_derivacion_acupuntura_admin.php" role="button">Ingreso ficha derivacion</a>
    <a class="btn btn-primary" href="ficha_derivacion_acu_ver_admin.php" role="button">Ver datos ficha derivacion</a>
    <a class="btn btn-primary" href="ficha_derivacion_acu_mod_admin.php" role="button">Modificar ficha derivacion</a>
    <a class="btn btn-primary" href="ficha_derivacion_acu_elim_admin.php" role="button">Eliminar ficha derivacion</a><br><br>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminacion_entrevista" data-whatever="@getbootstrap">eliminar entrevista</button>
    <a class="btn btn-primary" href="asistencia_control_acu_admin.php" role="button">Ver Asistencia, disponibilidad y agendamiento control</a>
    <a class="btn btn-primary" href="historial_asistencia_control_acu_admin.php" role="button">Ver historial asistencia agendamiento control</a>

  <br><br><br>
       
        </center>        
    <center>

    <div class="modal fade" id="eliminacion_entrevista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:700px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminacion Entrevista.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form name="eliminar_alumno_entrevista"action="delete/delete_ingreso_acupuntura_prof_admin.php" method="post" target="_self" ONSUBMIT="return pregunta5();">
                        <table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

                        <tr class="table-info">
                        <td><span>R.U.N</span></td>
                            <td> 
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="run_entrevista" class="form-control" maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                                                <input type="text" id="token_id_entrevista" name="id_alumno" class="form-control" placeholder="">

                                            </div>
                                        </div>
                            </td>

                            <script type="text/javascript">
                                        //*******************ALERT DE ENVIO*******************/
                                 function pregunta5(e){ 
                                 if (confirm('Estas seguro de enviar los datos?'))
                                     {       
                                        document.eliminar_alumno_entrevista.submit();                             

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
				


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
       
        <!-- ********************************************** MODAL agendamiento*********************************-->
<div class="modal fade" id="agendamiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">inscripcion del Alumno.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form id="formulario_acu" name="formulario_acu" action="formulario_control_acu_admin.php" method="post" target="_blank">

      <table  id="tablamenu" class="table table-hover" style="width:450px; height:150px" >
<thead>
    <tr class="table-info">
        <th style="width: 50px" scope="col">Fecha</th>
        <th  style="width:300px" scope="col">Hora</th>

    </tr>
</thead>
<tbody>
    <tr class="table-info">
        <td><span>R.U.N</span></td>
        <td> 
                    <div class="row">
                        <div class="col">
                            <input type="text" id="run_alumno" name="run_acupuntura" class="form-control" maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" id="token_run" name="run_acu" class="form-control" placeholder="Ej:11111111-k">
                        </div>
                    </div>
        </td>
    </tr>
    <tr class="table-info">

  <td><span>Nombre.</span></td>
  <td>                                                             
      <div class="row">
          <div class="col">
              <input type="text" id="nom_alumno" name="nom_alumno" class="form-control" placeholder=""required>

          </div>
      </div>
  </td>

</tr>
<tr class="table-info">
      <td><span>Edad.</span></td>
      <td> 
                  <div class="row">
                      <div class="col">
                          <input type="text" id="edad_alumno" name="edad_alumno" class="form-control" placeholder=""required>
                      </div>
                  </div>
      </td>
</tr>
<tr class="table-info">
				<td><span>Fecha nacimiento</span></td>
				<td> 
										<div class="row">
												<div class="col">
														<input type="date" id="fecha_nac"name="fecha_nac" class="form-control" placeholder="" required>
												</div>
										</div>
				</td>
</tr>
<tr class="table-info">
				<td><span>Teléfono</span></td>
				<td> 
										<div class="row">
												<div class="col">
														<input type="text" id="telefono_alumno"name="telefono_alumno" class="form-control" placeholder="" required>
												</div>
										</div>
				</td>
</tr>
<tr class="table-info">

				<td><span>Nombre Apoderado.</span></td>
				<td>                                                             
						<div class="row">
								<div class="col">
										<input type="text" id="nom_apod"name="nom_apod" class="form-control" placeholder="" required>
								</div>
						</div>
				</td>
</tr>
<tr class="table-info">
				<td><span>Teléfono Apoderado.</span></td>
				<td> 
										<div class="row">
												<div class="col">
														<input type="tel" id="fono_apod"name="tel_apod" maxlength="9" class="form-control" value="9" required>
												</div>
										</div>
				</td>
</tr>
<tr class="table-info">

				<td><span>Dirección.</span></td>
				<td>                                                             
						<div class="row">
								<div class="col">
										<input type="text" id="direccion" name="direc_alumno" class="form-control" placeholder="" required>
								</div>
						</div>
				</td>
</tr>
<tr class="table-info">
				<td><span>Comuna</span></td>
				<td> 
										<div class="row">
												<div class="col">
														<input type="text"id="comuna" name="comuna_alumno" class="form-control" placeholder="" required>
												</div>
										</div>
				</td>
</tr>
<tr class="table-info">

				<td><span>Correo.</span></td>
				<td>                                                             
						<div class="row">
								<div class="col">
								<input type="email" id="correo"name="correo_alumno" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
								</div>
						</div>
				</td>
</tr>
<tr class="table-info">
				<td><span>Patologías.</span></td>
				<td> 
										<div class="row">
												<div class="col">
													<textarea id="patologias" name="patologias_alumno" cols="30" rows="4"></textarea>												

																</div>
														</div>
				</td>
</tr>
</tbody>

</table>
<button type="submit" class="btn btn-primary" style="width: 200px" value="enviar" form="formulario_acu" >Enviar Datos</button>
		
</form>
				


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- ****************************************FIN AGENDAMIENTO*****************************-->

 <!-- ********************************************** MODAL MODIFICACION*********************************-->
 <div class="modal fade" id="modificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog"  role="document">
    <div class="modal-content"  style="width:700px">
      <div class="modal-header" >
        <h5 class="modal-title"  id="exampleModalLabel">MODIFICACION AGENDAMIENTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >


      <h3>Modificar Hora Agendamiento Acupuntura</h3>
                <p></p>
           
                       
                <form id="mod_fecha" name="mod_fecha" action="update/mod_fecha_acu_admin.php" method="post" target="_self" >

<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>R.U.N</span></td>
    <td> 
                <div class="row">
                    <div class="col">
                        <input type="text" id="run_alumno7" class="form-control"maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                    </div>
                </div>
                <input type="text" id="token_alumno7" name="id_alumno2" class="form-control" placeholder="">

    </td>

        <td><span>Fecha nueva.</span></td>
        <td>
                <!-- Campo de entrada de fecha -->
                
                <input type="date" name="fecha" min="2019-01-01"
                                                max="2030-01-01" step="1" required>
               
        </td>
        <td>                                                             
        <div class="row">
            <div class="col">
            </div>
        </div>
    </td>
        
        <td> 
        <button type="submit" class="btn btn-success" style="width: 100px" form="mod_fecha">Modificar</button>

        </td>
</tr>
</table>
</form>


<form id="mod_hora" name="mod_hora"action="update/mod_hora_acu_admin.php" method="post" target="_self" >
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>R.U.N</span></td>
    <td> 
                <div class="row">
                    <div class="col">
                        <input type="text" id="run_alumno2" class="form-control" maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                    </div>
                </div>
                <input type="text" id="token_alumno2" name="id_alumno" class="form-control" placeholder="">

    </td>

        <td><span>Hora nueva.</span></td>
        <td>  <!-- Campo de entrada de hora -->
    
            <input type="time" name="hora" min="09:00"
                                           max="12:00" step="450" required>
        </td>

        <td> 
        <button type="submit" class="btn btn-success" style="width: 100px" form="mod_hora">Modificar</button>

        </td>
</tr>
</table>
</form>


<form id="mod_sala" name="mod_sala" action="update/mod_sala_acu_admin.php" method="post" target="_self" >
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>R.U.N</span></td>
    <td> 
                <div class="row">
                    <div class="col">
                        <input type="text" id="run_alumno3" class="form-control" maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                    </div>
                </div>
                <input type="text" id="token_alumno3" name="id_alumno" class="form-control" placeholder="">

    </td>

        <td><span>Sala nueva.</span></td>
        <td>                                                             
        <select id="nombre_sala" name="sala[]" size="0" >
<?php
$query = $conexion -> query ("SELECT*FROM salas");
while ($valores = mysqli_fetch_array($query)) {
echo '<option id="nombre_sala"  name="sala[]" value="'.$valores['id_sala'].'">'.$valores['nom_sala'].'</option>';
}
?>
</select>    
        </td>
        <td> 
        <button type="submit" class="btn btn-success" style="width: 100px" form="mod_sala">Modificar</button>

        </td>
</tr>
</table>
</form>

<form id="mod_sesion" name="mod_sesion" action="update/mod_sesion_acu_admin.php" method="post" target="_self" >
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>R.U.N</span></td>
    <td> 
                <div class="row">
                    <div class="col">
                        <input type="text" id="run_alumno4" class="form-control" maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                    </div>
                </div>
                <input type="text" id="token_alumno4" name="id_alumno" class="form-control" placeholder="">

    </td>
        <td><span>Sesión nuevo.</span></td>
        <td>                                                             
            <div class="row">
                <div class="col">
                    <input type="text" name="sesion"class="form-control" placeholder="" required>
                </div>
            </div>
        </td>
  
        <td> 
        <button type="submit" class="btn btn-success" style="width: 100px" form="mod_sesion">Modificar</button>

        </td>
</tr>
</table>
</form>
<form id="mod_prof" name="mod_prof"action="update/mod_prof_acu_admin.php" method="post" target="_self" >
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>R.U.N</span></td>
    <td> 
                <div class="row">
                    <div class="col">
                        <input type="text" id="run_alumno5" class="form-control" maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                    </div>
                </div>
                <input type="text" id="token_alumno5" name="id_alumno" class="form-control" placeholder="">


        <td><span>Profesional nuevo.</span></td>
        <td>                                                             
        <select id="nom_profesional" name="prof[]" size="0" >
<?php
$query = $conexion -> query ("SELECT*FROM profesionales");
while ($valores = mysqli_fetch_array($query)) {
echo '<option id="nom_profesional"  name="prof[]" value="'.$valores['id_profesional'].'">'.$valores['nom_profesional'].'</option>';
}
?>
</select>   
        </td>
 
        <td> 
        <button type="submit" class="btn btn-success" style="width: 100px" form="mod_prof">Modificar</button>

        </td>
</tr>

</table>
</form>



</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
</div>

<!--********************************FIN MODAL MODIFICAR********************-->


<!-- ********************************************** MODAL ELIMINAR*********************************-->
<div class="modal fade" id="eliminacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content" style="width:700px">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">inscripcion del Alumno.</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<form id="eliminar_alumno"name="eliminar_alumno"action="delete/delete_alumno_acup_admin.php" method="post" target="_self" >
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>R.U.N</span></td>
    <td> 
                <div class="row">
                    <div class="col">
                        <input type="text" id="run_alumno6" class="form-control" maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                        <input type="text" id="token_run_el" name="id_alumno" class="form-control" placeholder="">

                    </div>
                </div>
    </td>


        <td> 
        <button type="submit" class="btn btn-success" style="width: 200px" form="eliminar_alumno">Eliminar</button>

        </td>
</tr>

</table>
</form>



</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
</div>

<!-- *******************************FIN ELIMINACION***************************-->
 


                            
<h3>Entrevista Acupuntura</h3>
</center>
<br>
          <center>
<form action="" method="post"></form>
<table  id="tablamenu" class="table table-hover" style="width:650px; height:100px" >

<tr class="table-info">
     <td>

<div class="panel-body cold-md-12 col-lg-10 col-xs-12 col-sm-12 col-lg-offset-1">				
					<div class="form-group row">
						<label for="q" class="col-md-2 control-label"></label>
					<div class="col-md-5">
				<input type="date" class="form-control" id="q" placeholder="Nombre taller o recinto" onkeyup='load(1);'>
</div>
				
<button type="button" class="btn btn-success" style="width: 200px" onclick='load(1);'>Consultar</button>

</td>	   

</tr>
					
							
			<!--                    
			<div class="col-md-3">
			<button type="button" class="btn btn-default" onclick='load(1);'>
			<span class="glyphicon glyphicon-search" ></span> Buscar</button>
			<span id="loader"></span>
		</div>
							
	</div>-->

                        
</table>

 
		
</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			</div>
		</div>	
		
	</div>
	<hr>
		<?php include("footer.php"); ?>

	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/buscar_hora_Acupuntura.js"></script>
</center>


    
</body>
</html>