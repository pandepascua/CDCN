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
		<script src="js/direccion_taller.js"></script>
		<script src="js/cargar_taller.js"></script>
		<link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>

    <script src="js/cargar_al_taller.js"></script>
    <script src="js/cargar_al_correo.js"></script>
    <script src="js/cargar_al_edad.js"></script>
        <script src="js/cargar_al_direccion.js"></script>
        <script src="js/cargar_al_fono_al.js"></script>
        <script src="js/cargar_al_patologia.js"></script>
        <script src="js/cargar_al_apod.js"></script>
				<script src="js/cargar_al_apod_fono.js"></script>
        <script src="js/cargar_al_comuna.js"></script>
				<script src="js/cargar_alumno.js"></script>

		<script src="js/cargar_sala.js"></script>
		<script src="js/valida_rut.js"></script>
		<link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>




    <?php include("head.php");?>


    <title>Lista de talleres</title>
</head>
<body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>

<div style="float:right" >
  <h6>Bienvenido <?php echo  $_SESSION['nombre']." ". $_SESSION['apellido'];?></h6>
   
  <a href=logout.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
  
  <p></p>
</div>
        <p></p>
        <a class="btn btn-primary" href="menu_s.php" role="button">Ir Atrás</a>     
        <p></p> 
<center><h3>Lista de talleres</h3>

		</div>
			<div class="panel-body cold-md-12 col-lg-10 col-xs-12 col-sm-12 col-lg-offset-1">
				<form class="form-horizontal" role="form" id="datos_cotizacion">
				<table  id="tablamenu" class="table table-hover" style="width:450px; height:50px" >
				<tr class="table-info">
							<td>
											<div class="form-group row">
							<label for="q" class="col-md-2 control-label"></label>
							<div class="col-md-5">
								<input type="text"  class="form-control" id="q" placeholder="Nombre taller o recinto" onkeyup='load(1);'>
						</div>
						
							</td>

				</tr>
				</table>
				
				</form>
							<!--***************************MODAL INSCRIPCION ALUMNO***************************-->
							<center>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inscripcion" data-whatever="@mdo">Inscripcion del Alumno.</button>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificar" data-whatever="@fat">Modificar</button>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminar" data-whatever="@getbootstrap">Eliminar</button>
							<a class="btn btn-primary" href="cupos_s.php" role="button">Cupos</a>
          
							</center>
			
							<!--                    
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>-->
		
			</center>
				<!<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			</div>
		</div>	
	</div>
<!-- ********************************************** MODAL*********************************-->

<!--*********************************** AGREGAR********************************-->

<div class="modal fade" id="inscripcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">inscripcion del Alumno.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form id="formulario_inscripcion" name='formulario_inscripcion' action="guardar_datos_s.php" method="post" target="_self"  ><!--ONSUBMIT="return pregunta();"-->
 
<h3>Inscripción del alumno</h3>
<br>

<table  id="tablamenu" class="table table-hover" style="width:470px; height:150px" >
<thead>

</thead>
<tbody>

<tr class="table-info">
<td><span>Taller </span></td>
              <td>                                               
              <select id="nom_taller" name="taller[]" size="0" required>
<?php
          $query = $conexion -> query ("SELECT*FROM talleres");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option id="nom_taller"  name="taller[]" value="'.$valores['id_taller'].'">'.$valores['nom_taller'].'</option>';
          }
        ?>
</select>   
                    
                </td>
    </tr>
<tr class="table-info">

		<td><span>RUN.</span></td>
		<td>                                                             
				<div class="row">
						<div class="col">
								<input type="text"   id="run" name="run_alumno"class="form-control" maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
						</div>
				</div>
		</td>

</tr>
<tr class="table-info">
				<td><span>Nombre del Alumno.</span></td>
				<td> 
										<div class="row">
												<div class="col">
														<input type="text" name="nom_alumno" class="form-control" placeholder="" required>
												</div>
										</div>
				</td>
</tr>
<tr class="table-info">

				<td><span>Edad.</span></td>
				<td>                                                             
						<div class="row">
								<div class="col">
										<input type="number" name="edad_alumno" class="form-control" placeholder="" required>
								</div>
						</div>
				</td>
</tr>

<tr class="table-info">
				<td><span>Fecha nacimiento</span></td>
				<td> 
										<div class="row">
												<div class="col">
														<input type="date" name="fecha_nac" class="form-control" placeholder="" required>
												</div>
										</div>
				</td>
</tr>
<tr class="table-info">

				<td><span>Nombre Apoderado.</span></td>
				<td>                                                             
						<div class="row">
								<div class="col">
										<input type="text" name="nom_apod" class="form-control" placeholder="" required>
								</div>
						</div>
				</td>
</tr>
<tr class="table-info">
				<td><span>Teléfono Apoderado.</span></td>
				<td> 
										<div class="row">
												<div class="col">
														<input type="tel" name="tel_apod" maxlength="9" class="form-control" value="9" required>
												</div>
										</div>
				</td>
</tr>
<tr class="table-info">

				<td><span>Dirección.</span></td>
				<td>                                                             
						<div class="row">
								<div class="col">
										<input type="text" name="direc_alumno" class="form-control" placeholder="" required>
								</div>
						</div>
				</td>
</tr>
<tr class="table-info">
				<td><span>Comuna</span></td>
				<td> 
										<div class="row">
												<div class="col">
														<input type="text" name="comuna_alumno" class="form-control" placeholder="" required>
												</div>
										</div>
				</td>
</tr>
<tr class="table-info">

				<td><span>Correo.</span></td>
				<td>                                                             
						<div class="row">
								<div class="col">
								<input type="email" name="correo_alumno" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
								</div>
						</div>
				</td>
</tr>
<tr class="table-info">
				<td><span>Patologías.</span></td>
				<td> 
										<div class="row">
												<div class="col">
														<input type="text" name="patologia_alumno" class="form-control" placeholder="" required>
												</div>
										</div>
				</td>
</tr>
<tr class="table-info">

				<td><span>Teléfono alumno</span></td>
		<td> 
				<div class="row">
				<div class="col">
						<input type="tel" name="tel_alumno" class="form-control" maxlength="9" value="9" required>
				</div>
				</div>
		</td>
</tr>                

</tbody>

</table>
</form>
				

				<hr>
		<?php include("footer.php"); ?>

	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/buscar.js"></script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" style="width: 200px" value="enviar" form="formulario_inscripcion">Enviar Datos</button>
      </div>
    </div>
  </div>
</div>

<!--***********************************FIN AGREGAR********************************-->


<!--***********************************MODIFICACION********************************-->

<div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:700px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar registro.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


			<form id="mod_taller"name="mod_taller" action="update/taller_alumno_s.php" method="post" target="_self" ><!--ONSUBMIT="return pregunta1();"-->
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>R.U.N</span></td>
		<td> 
								<div class="row">
										<div class="col">
												<input type="text" id="run_alumno1" class="form-control" placeholder="Ej:11111111-k"  maxlength="10" required oninput="checkRut(this)">
										</div>
								</div>
								<input type="hidden" id="token_alumno1" name="id_alumno1" class="form-control" placeholder="">

		</td>

				<td><span>Nuevo Taller.</span></td>
				<td>                                                             
				<select id="nom_taller" name="taller[]" size="0" >
<?php
$query = $conexion -> query ("SELECT*FROM talleres");
while ($valores = mysqli_fetch_array($query)) {
echo '<option id="nombre_taller"  name="taller[]" value="'.$valores['id_taller'].'">'.$valores['nom_taller'].'</option>';
}
?>
</select>    
				</td>
<!--
		<script type="text/javascript">
								//*******************ALERT DE ENVIO*******************/
				 function pregunta1(e){ 
				 if (confirm('Estas seguro de enviar los datos?'))
						 {       
								document.mod_taller.submit();                             

						}else   {
								e.preventDefault();
						}

						};


				</script>-->
				<td> 
				<button type="submit" class="btn btn-success" form="mod_taller"style="width: 100px" >Modificar</button>

				</td>
</tr>
</table>
</form>






<form id="mod_comuna"name="mod_comuna"action="update/comuna.php" method="post" target="_self">
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>R.U.N</span></td>
		<td> 
								<div class="row">
										<div class="col">
												<input type="text" id="run_alumno2" class="form-control" placeholder="Ej:11111111-k"  maxlength="10" required oninput="checkRut(this)">
										</div>
								</div>
								<input type="hidden" id="token_alumno2" name="id_alumno2" class="form-control" placeholder="">

		</td>

				<td><span>Nueva comuna.</span></td>
				<td>  <!-- Campo de entrada de hora -->
		
						<input type="text" name="comuna" required>
				</td>
				<td> 
				<button type="submit" class="btn btn-success" form="mod_comuna" style="width: 100px" ">Modificar</button>

				</td>
</tr>
</table>
</form>
			<form id="mod_nom_apod" name="mod_nom_apod"action="update/apoderado_alumno_s.php" method="post" target="_self" >
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>R.U.N</span></td>
		<td> 
								<div class="row">
										<div class="col">
												<input type="text" id="run_alumno3" class="form-control" placeholder="Ej:11111111-k"  maxlength="10" required oninput="checkRut(this)">
										</div>
								</div>
								<input type="hidden" id="token_alumno3" name="id_alumno3" class="form-control" placeholder="">

		</td>

				<td><span>Nuevo nombre apoderado.</span></td>
				<td>  <!-- Campo de entrada de hora -->
		
						<input type="text" name="apoderado" required>
				</td>
				<td> 
				<button type="submit" class="btn btn-success" style="width: 100px" form="mod_nom_apod">Modificar</button>

				</td>
</tr>
</table>
</form>


			<form id="mod_fono_apod" name="mod_fono_apod"action="update/fono_apoderado_s.php" method="post" target="_self" >
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>R.U.N</span></td>
		<td> 
								<div class="row">
										<div class="col">
												<input type="text" id="run_alumno4" class="form-control" placeholder="Ej:11111111-k"  maxlength="10" required oninput="checkRut(this)">
										</div>
								</div>
								<input type="hidden" id="token_alumno4" name="id_alumno4" class="form-control" placeholder="">

		</td>

				<td><span>Nuevo fono apoderado.</span></td>
				<td>  <!-- Campo de entrada de hora -->
		
						<input type="tel" name="fono_apod" required>
				</td>


				<td> 
				<button type="submit" class="btn btn-success" style="width: 100px" form="mod_fono_apod">Modificar</button>

				</td>
</tr>
</table>
</form>

			<form id="mod_edad" name="mod_edad"action="update/edad_alumno_s.php" method="post" target="_self">
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>R.U.N</span></td>
		<td> 
								<div class="row">
										<div class="col">
												<input type="text" id="run_alumno5" class="form-control" placeholder="Ej:11111111-k"  maxlength="10" required oninput="checkRut(this)">
										</div>
								</div>
								<input type="hidden" id="token_alumno5" name="id_alumno5" class="form-control" placeholder="">

		</td>

				<td><span>Nueva edad.</span></td>
				<td>  <!-- Campo de entrada de hora -->
		
						<input type="number" maxlength="3" name="edad_alumno" required>
				</td>


				<td> 
				<button type="submit" class="btn btn-success" style="width: 100px" form="mod_edad">Modificar</button>

				</td>
</tr>
</table>
</form>

			<form id="mod_patologia"name="mod_patologia"action="update/patologia_alumno_s.php" method="post" target="_self" >
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>R.U.N</span></td>
		<td> 
								<div class="row">
										<div class="col">
												<input type="text" id="run_alumno6" class="form-control" placeholder="Ej:11111111-k"  maxlength="10" required oninput="checkRut(this)">
										</div>
								</div>
								<input type="hidden" id="token_alumno6" name="id_alumno6" class="form-control" placeholder="">

		</td>

				<td><span>Nuevo patología alumno.</span></td>
				<td>  <!-- Campo de entrada de hora -->
		
						<input type="text" name="patologia_alumno" required>
				</td>

	
				<td> 
				<button type="submit" class="btn btn-success" style="width: 100px" form="mod_patologia">Modificar</button>

				</td>
</tr>
</table>
</form>

			<form id="mod_fono_alumno"name="mod_fono_alumno"action="update/fono_alumno_s.php" method="post" target="_self">
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>R.U.N</span></td>
		<td> 
								<div class="row">
										<div class="col">
												<input type="text" id="run_alumno7" class="form-control" placeholder="Ej:11111111-k"  maxlength="10" required oninput="checkRut(this)">
										</div>
								</div>
								<input type="hidden" id="token_alumno7" name="id_alumno7" class="form-control" placeholder="">

		</td>

				<td><span>Nuevo fono alumno.</span></td>
				<td>  <!-- Campo de entrada de hora -->
		
						<input type="tel" maxlength="9" name="fono_alumno" required>
				</td>
				<td> 
				<button type="submit" class="btn btn-success" style="width: 100px" form="mod_fono_alumno">Modificar</button>

				</td>
</tr>
</table>
</form>


			<form id="mod_direccion" name="mod_direccion" action="update/direccion_alumno_s.php" method="post" target="_self" >

<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>R.U.N</span></td>
		<td> 
								<div class="row">
										<div class="col">
												<input type="text" id="run_alumno8" class="form-control" placeholder="Ej:11111111-k"  maxlength="10" required oninput="checkRut(this)">
										</div>
								</div>
								<input type="hidden" id="token_alumno8" name="id_alumno8" class="form-control" placeholder="">

		</td>

				<td><span>Nueva dirección.</span></td>
				<td>
								<!-- Campo de entrada de fecha -->
								
								<input type="text" name="direccion_alumno" required>
							 
				</td>
				<td>                                                             
				<div class="row">
						<div class="col">
						</div>
				</div>
		</td>
			
				<td> 
				<button type="submit" class="btn btn-success" style="width: 100px" form="mod_direccion">Modificar</button>

				</td>
</tr>
</table>
</form>


<form id="mod_correo" name="mod_correo"action="update/correo_alumno_s.php" method="post" target="_self" >
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>R.U.N</span></td>
		<td> 
								<div class="row">
										<div class="col">
												<input type="text" id="run_alumno9" class="form-control" placeholder="Ej:11111111-k"  maxlength="10" required oninput="checkRut(this)">
										</div>
								</div>
								<input type="hidden" id="token_alumno9" name="id_alumno9" class="form-control" placeholder="">

		</td>

				<td><span>Nuevo correo.</span></td>
				<td>  <!-- Campo de entrada de hora -->
		
						<input type="email" name="correo_al" attern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
				</td>

				<td> 
				<button type="submit" class="btn btn-success" style="width: 100px" form="mod_correo">Modificar</button>

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

<!--***********************************FIN MODIFICACION********************************-->




<!--*********************************** ELIMINACION********************************-->

<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content" style="width:700px">      
	<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar registro.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form id="eliminar_alumno"name="eliminar_alumno"action="delete/delete_alumno_taller_s.php" method="post" target="_self" >
                        <table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

                        <tr class="table-info">
                        <td><span>R.U.N</span></td>
                            <td> 
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="run_alumno10" class="form-control" placeholder="Ej:11111111-k"  maxlength="10" required oninput="checkRut(this)">
                                                <input type="hidden" id="token_alumno10" name="id_alumno10" class="form-control" placeholder="">

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
<!--***********************************FIN ELIMINACION********************************-->



<!--*************************************DERIVACION*********************************-->
<div class="modal fade" id="derivacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cupos.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" style="width: 200px" value="enviar" onclick="pregunta();">Enviar Datos</button>
      </div>
    </div>
  </div>
</div>

  </body>
</html>