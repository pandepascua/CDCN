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

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/cargar_taller.js"></script>
    <script src="js/cargar_sala.js"></script>
    <script src="js/cargar_profesional.js"></script>
    <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>

    <title>Administracion de Datos</title>
</head>
<body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>


<body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>

<div style="float:right" >
  <h6>Bienvenido <?php echo  $_SESSION['nombre']." ". $_SESSION['apellido'];?></h6>
   
  <a href=logout.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
  
  <p></p>
</div>
<p> </p>                    
            <a class="btn btn-primary" href="menu.php" role="button">Ir Atrás</a>   
<br>
<br>

<!--*********************************************TALLER***********************************************************-->
<center>
<h3>Administracion de Talleres</h3>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingreso_taller" data-whatever="@mdo">Registro de datos</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificacion_taller" data-whatever="@fat">Modificación de datos</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminacion_taller" data-whatever="@getbootstrap">Eliminación de datos</button>

<div class="modal fade" id="ingreso_taller" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro datos de taller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

      <form name='formulario_inscripcion' action="registro_taller.php" method="post" target="_self" ONSUBMIT="return pregunta();" >
 <br>

<table  id="tablamenu" class="table table-hover" style="width:470px; height:150px" >
<thead>

</thead>
<tbody>
<tr class="table-info">

		<td><span>Nombre del taller.</span></td>
		<td>                                                             
				<div class="row">
						<div class="col">
								<input type="text" name="nom_taller"class="form-control" placeholder="">
						</div>
				</div>
		</td>

</tr>
<tr class="table-info">
				<td><span>Recinto.</span></td>
				<td> 
                <div class="row">
					<div class="col">
						<input type="text" name="recinto" class="form-control" placeholder="">
					</div>
				</div>
				</td>
</tr>
<tr class="table-info">

				<td><span>Descripción.</span></td>
				<td>                                                             
                <textarea name="descripcion" id="" cols="30" rows="10"></textarea>

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
					
				</form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" style="width: 200px" value="enviar" onclick="pregunta();">Enviar Datos</button>
      </div>
    </div>
  </div>
</div>


<!--******************************modificacion taller**************************-->


<div class="modal fade" id="modificacion_taller" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content" style="width:800px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar datos de taller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       


      <form name="mod_taller" action="update/nuevo_taller.php" method="post" target="_self" ONSUBMIT="return pregunta1();">
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px"  >

<tr class="table-info">

				<td><span>Taller a modificar.</span></td>
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
                <td><span>Nuevo taller</span></td>
		<td> 
			<div class="row">
				<div class="col">
					<input type="text"  name="nuevo_taller" class="form-control" style="width:200px" placeholder="Nombre nuevo">
				</div>
			</div>
		</td>

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


				</script>
				<td> 
				<button type="button" class="btn btn-success" style="width: 100px" onclick="pregunta1();">Modificar</button>

				</td>
</tr>
</table>
</form>






			<form name="mod_comuna"action="update/nuevo_recinto.php" method="post" target="_self" ONSUBMIT="return pregunta2();">
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>Taller a modificar.</span></td>
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

				<td><span>Nuevo recinto.</span></td>
				<td>  <!-- Campo de entrada de hora -->
		
						<input type="text" style="width:200px" name="nuevo_recinto">
				</td>

		<script type="text/javascript">
								//*******************ALERT DE ENVIO*******************/
				 function pregunta2(e){ 
				 if (confirm('Estas seguro de enviar los datos?'))
						 {       
								document.mod_comuna.submit();                             

						}else   {
								e.preventDefault();
						}

						};


				</script>
				<td> 
				<button type="button" class="btn btn-success" style="width: 100px" onclick="pregunta2();">Modificar</button>

				</td>
</tr>
</table>
</form>



	<form name="mod_nom_apod"action="update/nueva_descripcion.php" method="post" target="_self" ONSUBMIT="return pregunta3();">
    <table  id="tablamenu" class="table table-hover" style="width:550px; height:150px" >

    <tr class="table-info">
    <td><span>Taller a modificar.</span></td>
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


				<td><span>Nueva descripción.</span></td>
				<td>  <!-- Campo de entrada de hora -->
		
<textarea name="nueva_descripcion" width="200px" id="" cols="21" rows="3"></textarea>				</td>

		<script type="text/javascript">
								//*******************ALERT DE ENVIO*******************/
				 function pregunta3(e){ 
				 if (confirm('Estas seguro de enviar los datos?'))
						 {       
								document.mod_nom_apod.submit();                             

						}else   {
								e.preventDefault();
						}

						};


				</script>
				<td> 
				<button type="button" class="btn btn-success" style="width: 100px" onclick="pregunta3();">Modificar</button>

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



<div class="modal fade" id="eliminacion_taller" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar datos de taller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

      <form name="eliminar_taller"action="delete/taller_eliminado.php" method="post" target="_self" ONSUBMIT="return pregunta10();">
                        <table  id="tablamenu" class="table table-hover" style="width:450px; height:150px" >

                        <tr class="table-info">
                        <td><span>Taller a eliminar.</span></td>
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

                            <script type="text/javascript">
                                        //*******************ALERT DE ENVIO*******************/
                                 function pregunta10(e){ 
                                 if (confirm('Estas seguro de enviar los datos?'))
                                     {       
                                        document.eliminar_taller.submit();                             

                                    }else   {
                                        e.preventDefault();
                                    }
       
                                    };

                        
                                </script>
                                <td> 
                                <button type="button" class="btn btn-success" style="width: 100px" onclick="pregunta10();">Eliminar</button>
    
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



</center>
<hr>
<br>
<br>
<center>

<!--*******************************************FIN TALLER**************************************************************-->

<!--*********************************************SALAS*****************************************************************-->

<h3>Administracion de salas</h3>
    
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingreso_sala" data-whatever="@mdo">Registro de datos</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificacion_sala" data-whatever="@fat">Modificación de datos</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminacion_sala" data-whatever="@getbootstrap">Eliminación de datos</button>

<div class="modal fade" id="ingreso_sala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingreso sala</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form name='formulario_inscripcionS' action="registro_sala.php" method="post" target="_self" ONSUBMIT="return preguntaSala();" >
 <br>

<table  id="tablamenu" class="table table-hover" style="width:470px; height:150px" >
<thead>

</thead>
<tbody>
<tr class="table-info">

		<td><span>Nombre de la sala.</span></td>
		<td>                                                             
				<div class="row">
						<div class="col">
								<input type="text" name="nom_sala"class="form-control" placeholder="">
						</div>
				</div>
		</td>

</tr>

          

</tbody>


<script type="text/javascript">
						//*******************ALERT DE ENVIO*******************/
										function preguntaSala(e){ 
										if (confirm('Estas seguro de enviar los datos de este formulario?'))
														{       
																		document.formulario_inscripcionS.submit();                             

										}else   {
																		e.preventDefault();
														}
	 
										};

										
</script>
</table>
					
				</form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" style="width: 200px" value="enviar" onclick="preguntaSala();">Enviar Datos</button>
      </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modificacion_sala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content" style="width:700px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Sala</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

			<form name="mod_sala"action="update/sala_mod.php" method="post" target="_self" ONSUBMIT="return preguntams();">
<table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

<tr class="table-info">
<td><span>Sala a modificar.</span></td>
				<td>                                                             
				<select id="nom_sala" name="sala[]" size="0" >
                <?php
                $query = $conexion -> query ("SELECT*FROM salas");
                while ($valores = mysqli_fetch_array($query)) {
                echo '<option id="nombre_sala"  name="sala[]" value="'.$valores['id_sala'].'">'.$valores['nom_sala'].'</option>';
                }
                ?>
                </select>    
				</td>

				<td><span>Nueva sala.</span></td>
				<td>  <!-- Campo de entrada de hora -->
		
						<input type="text" name="nueva_sala">
				</td>

		<script type="text/javascript">
								//*******************ALERT DE ENVIO*******************/
				 function preguntams(e){ 
				 if (confirm('Estas seguro de enviar los datos?'))
						 {       
								document.mod_sala.submit();                             

						}else   {
								e.preventDefault();
						}

						};


				</script>
				<td> 
				<button type="button" class="btn btn-success" style="width: 100px" onclick="preguntams();">Modificar</button>

				</td>
</tr>
</table>
</form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Enviar datos</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="eliminacion_sala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar sala.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

      <form name="el_sala"action="delete/sala_eliminada.php" method="post" target="_self" ONSUBMIT="return preguntaelsala();">
<table  id="tablamenu" class="table table-hover"  >

<tr class="table-info">
<td><span>Sala a eliminar.</span></td>
				<td>                                                             
				<select id="nom_sala" name="sala[]" size="0" >
                <?php
                $query = $conexion -> query ("SELECT*FROM salas");
                while ($valores = mysqli_fetch_array($query)) {
                echo '<option id="nombre_sala"  name="sala[]" value="'.$valores['id_sala'].'">'.$valores['nom_sala'].'</option>';
                }
                ?>
                </select>    
				</td>


		<script type="text/javascript">
								//*******************ALERT DE ENVIO*******************/
				 function preguntaelsala(e){ 
				 if (confirm('Estas seguro de enviar los datos?'))
						 {       
								document.el_sala.submit();                             

						}else   {
								e.preventDefault();
						}

						};


				</script>
				<td> 
				<button type="button" class="btn btn-success" style="width: 100px" onclick="preguntaelsala();">Modificar</button>

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
</center>

<!--************************************************FIN SALAS******************************-->
<hr>
<br>
<br>

<!--**************************************************PROFESIONAL***********************************-->
<center>
<h3>Administracion de Profesionales</h3>
    
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingreso_prof" data-whatever="@mdo">Registro de datos</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mod_prof" data-whatever="@fat">Modificación de datos</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#el_prof" data-whatever="@getbootstrap">Eliminación de datos</button>

<div class="modal fade" id="ingreso_prof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro profesional</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <form name='formulario_inscripcionprof' action="profesional_reg.php" method="post" target="_self" ONSUBMIT="return preguntaregistroprof();" >
 <br>

<table  id="tablamenu" class="table table-hover" style="width:470px; height:150px" >
<thead>

</thead>
<tbody>
<tr class="table-info">

		<td><span>RUN profesional.</span></td>
		<td>                                                             
				<div class="row">
						<div class="col">
								<input type="text" name="run_prof"class="form-control" placeholder="">
						</div>
				</div>
		</td>

</tr>
<tr class="table-info">
				<td><span>Nombre profesional.</span></td>
				<td> 
                <div class="row">
					<div class="col">
						<input type="text" name="nombre_prof" class="form-control" placeholder="">
					</div>
				</div>
				</td>
</tr>
<tr class="table-info">

				<td><span>taller.</span></td>
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
</tr>
          

</tbody>


<script type="text/javascript">
						//*******************ALERT DE ENVIO*******************/
										function preguntaregistroprof(e){ 
										if (confirm('Estas seguro de enviar los datos de este formulario?'))
														{       
																		document.formulario_inscripcionprof.submit();                             

										}else   {
																		e.preventDefault();
														}
	 
										};

										
</script>
</table>
					
				</form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" style="width: 200px" value="enviar" onclick="preguntaregistroprof();">Enviar Datos</button>
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="mod_prof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content" style="width:600px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <form name='formulario_modprof' action="update/profesional_mod.php" method="post" target="_self" ONSUBMIT="return preguntamodprof();" >
 <br>

<table  id="tablamenu" class="table table-hover" style="width:470px; height:150px" >
<thead>

</thead>
<tbody>

<tr class="table-info">
<td><span>Nombre profesional.</span></td>
<td>                                                             
				<select id="nom_prof" name="prof[]" size="0" >
                <?php
                $query = $conexion -> query ("SELECT*FROM profesionales");
                while ($valores = mysqli_fetch_array($query)) {
                echo '<option id="nombre_profesional"  name="prof[]" value="'.$valores['id_profesional'].'">'.$valores['nom_profesional'].'</option>';
                }
                ?>
                </select>    
				</td>
				<td><span> nuevo taller.</span></td>
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

</tr>
          

</tbody>


<script type="text/javascript">
						//*******************ALERT DE ENVIO*******************/
										function preguntamodprof(e){ 
										if (confirm('Estas seguro de enviar los datos de este formulario?'))
														{       
																		document.formulario_modprof.submit();                             

										}else   {
																		e.preventDefault();
														}
	 
										};

										
</script>
</table>
					
				</form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" style="width: 200px" value="enviar" onclick="preguntamodprof();">Enviar Datos</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="el_prof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Profesional</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <form name='formulario_elprof' action="delete/profesional_eliminado.php" method="post" target="_self" ONSUBMIT="return preguntaelprof();" >
 <br>

<table  id="tablamenu" class="table table-hover" style="width:470px; height:150px" >
<thead>

</thead>
<tbody>

<tr class="table-info">
<td><span>Nombre profesional.</span></td>
<td>                                                             
				<select id="nom_prof" name="prof[]" size="0" >
                <?php
                $query = $conexion -> query ("SELECT*FROM profesionales");
                while ($valores = mysqli_fetch_array($query)) {
                echo '<option id="nombre_profesional"  name="prof[]" value="'.$valores['id_profesional'].'">'.$valores['nom_profesional'].'</option>';
                }
                ?>
                </select>    

</tr>
          

</tbody>


<script type="text/javascript">
						//*******************ALERT DE ENVIO*******************/
										function preguntaelprof(e){ 
										if (confirm('Estas seguro de enviar los datos de este formulario?'))
														{       
																		document.formulario_elprof.submit();                             

										}else   {
																		e.preventDefault();
														}
	 
										};

										
</script>
</table>
					
				</form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" style="width: 200px" value="enviar" onclick="preguntaelprof();">Enviar Datos</button>
      </div>
    </div>
  </div>
</div>

</center>
<!--*****************************************FIN PROFESIONAL************************************-->
</body>
</html>