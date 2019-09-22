

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
    
      
    <script src="js/cargar_sala.js"></script>
    <script src="js/cargar_profesional.js"></script>
    <script src="js/valida_rut.js"></script>

    <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>

            <title>Formulario control acupuntura</title>
        </head>
        <body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>

<div style="float:right" >
  <h6>Bienvenido <?php echo  $_SESSION['nombre']." ". $_SESSION['apellido'];?></h6>
   
  <a href=logout.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
  
  <p></p>
</div> 
        <p></p>
                <a class="btn btn-primary" href="acupuntura.php" role="button">Ir Atrás</a>     
                <p></p>
                <center>

        <h3>Formulario de agendamiento control</h3>
        <form id="formulario_acu" name="formulario_acu" action="guardar_DAA.php" method="post" target="_self">

<table  id="tablamenu" class="table table-hover" style="width:450px; height:150px" >
<thead>
<tr class="table-info">
  <th style="width: 50px" scope="col">Fecha</th>
  <th  style="width:300px" scope="col">Hora</th>

</tr>
</thead>
<tbody>
<tr class="table-info">
  <td>
      <!-- Campo de entrada de fecha -->
      
      <input type="date" name="fecha_acu" min="2019-01-01"
                                      max="2030-01-01" step="1">
     
    </td>
  <td>  <!-- Campo de entrada de hora -->
      
      <input type="time" name="hora_acu" min="09:00"
                                     max="18:00" step="1800">
  </td>

</tr>
<tr class="table-info">
  <td><span>R.U.N</span></td>
  <td> 
              <div class="row">
                  <div class="col">
                      <input type="text" id="run_alumno" name="run_acupuntura" class="form-control" maxlength="10" value="<?php echo $_POST['run_acupuntura']?>" required oninput="checkRut(this)" readonly>
                  </div>
              </div>
       
  </td>
</tr>
<tr class="table-info">

  <td><span>Nombre.</span></td>
  <td>                                                             
      <div class="row">
          <div class="col">
              <input type="text" id="nom_alumno" name="nom_alumno" value="<?php echo $_POST['nom_alumno']?>" class="form-control" placeholder=""required>
          </div>
      </div>
  </td>

</tr>
<tr class="table-info">
      <td><span>Edad.</span></td>
      <td> 
                  <div class="row">
                      <div class="col">
                          <input type="text" id="edad_alumno" name="edad" value="<?php echo $_POST['edad_alumno']?>" class="form-control" placeholder=""required>
                      </div>
                  </div>
      </td>
</tr>
<tr class="table-info">
  
      <td><span>Teléfono.</span></td>
      <td>                                                             
          <div class="row">
              <div class="col">
                  <input type="text" id="telefono_alumno" name="tel_alumno" value="<?php echo $_POST['telefono_alumno']?>" class="form-control" placeholder=""required>
              </div>
          </div>
      </td>
</tr>

<tr class="table-info">

      <td><span>Taller inscrito.</span></td>
      <td> 
                  <div class="row">
                      <div class="col">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col">
                      <select id="token_taller" name="taller[]" size="0" >
<?php
    $query = $conexion -> query ('SELECT talleres.id_taller,talleres.nom_taller FROM alumnos
    inner join talleres on(alumnos.id_taller=talleres.id_taller) where run_alumno="'.$_POST['run_acupuntura'].'"');
    while ($valores = mysqli_fetch_array($query)) {
      echo '<option id="token_taller"  name="taller[]" value="'.$valores['id_taller'].'">'.$valores['nom_taller'].'</option>';
    }
  ?>
</select>  
                      </div>
                  </div>
      </td>
</tr>
<tr class="table-info">
				<td><span>Fecha nacimiento</span></td>
				<td> 
										<div class="row">
												<div class="col">
														<input type="date" name="fecha_nac" class="form-control" value="<?php echo $_POST['fecha_nac']?>" placeholder="" required>
												</div>
										</div>
				</td>
</tr>
<tr class="table-info">

				<td><span>Nombre Apoderado.</span></td>
				<td>                                                             
						<div class="row">
								<div class="col">
										<input type="text" name="nom_apod" class="form-control" value="<?php echo $_POST['nom_apod']?>" required>
								</div>
						</div>
				</td>
</tr>
<tr class="table-info">
				<td><span>Teléfono Apoderado.</span></td>
				<td> 
										<div class="row">
												<div class="col">
														<input type="tel" name="tel_apod" maxlength="9" class="form-control" value="<?php echo $_POST['tel_apod']?>" required>
												</div>
										</div>
				</td>
</tr>
<tr class="table-info">

				<td><span>Dirección.</span></td>
				<td>                                                             
						<div class="row">
								<div class="col">
										<input type="text" name="direc_alumno" class="form-control" value="<?php echo $_POST['direc_alumno']?> " required>
								</div>
						</div>
				</td>
</tr>
<tr class="table-info">
				<td><span>Comuna</span></td>
				<td> 
										<div class="row">
												<div class="col">
														<input type="text" name="comuna_alumno" class="form-control" value="<?php echo $_POST['comuna_alumno']?> " required>
												</div>
										</div>
				</td>
</tr>
<tr class="table-info">

				<td><span>Correo.</span></td>
				<td>                                                             
						<div class="row">
								<div class="col">
								<input type="email" name="correo_alumno" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" value="<?php echo $_POST['correo_alumno']?> "required>
								</div>
						</div>
				</td>
</tr>
<tr class="table-info">
				<td><span>Patologías.</span></td>
				<td> 
										<div class="row">
												<div class="col">
													<input type="text" style="width:300px" name="patologia_alumno"  value="<?php echo $_POST['patologias_alumno']?> ">												

																</div>
														</div>
				</td>
</tr>
<tr class="table-info">
  
      <td><span>Motivo de consulta.</span></td>
      <td> 
                  <div class="row">
                      <div class="col">
                          <input type="text" name="motivo_acu" class="form-control" placeholder=""required>
                      </div>
                  </div>
      </td>
</tr>
<tr class="table-info">
      <td><span>Diagnóstico.</span></td>
      <td>                                                             
          <div class="row">
              <div class="col">
                  <input type="text" name="diagnostico" class="form-control" placeholder=""required>
              </div>
          </div>
      </td>
</tr>
<tr class="table-info">
  
      <td><span>Observación.</span></td>
      <td>                                                             
          <div class="row">
              <div class="col">
                  <input type="text" name="observacion" class="form-control" placeholder=""required>
              </div>
          </div>
      </td>
</tr>
<tr class="table-info">
      <td><span>Sala.</span></td>
      <td>                                                             
      <select id="nombre_sala" name="sala[]" size="0" >
<?php
    $query = $conexion -> query ("SELECT*FROM salas");
    while ($valores = mysqli_fetch_array($query)) {
      echo '<option id="nombre_sala"  name="sala[]" value="'.$valores['id_sala'].'">'.$valores['nom_sala'].'</option>';
    }
  ?>
</select>    
          <div class="row">
              <div class="col">
                  <!--<input type="text" id="token_sala" name="id_sala" class="form-control" placeholder="">-->
              </div>
          </div>
      </td>
</tr>
<tr class="table-info">
  
      <td><span>Profesional </span></td>
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
</tr>


<tr class="table-info">
<td><span>Sesión.</span></td>
      <td>                                      
                  <input type="text" name ="sesion"class="form-control" placeholder="" required>

          </td>



</tr>
</tbody>

</table>
<button type="submit" class="btn btn-primary" style="width: 200px" value="enviar" form="formulario_acu" >Enviar Datos</button>
  
</form>
      
        </body>
        </html>