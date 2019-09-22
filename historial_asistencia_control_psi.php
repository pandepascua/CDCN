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
	<link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>

    <title>Historial asistencia control acupuntura</title>
</head>
<body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>

<div style="float:right" >
  <h6>Bienvenido <?php echo  $_SESSION['nombre']." ". $_SESSION['apellido'];?></h6>
   
  <a href=logout_admin.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
  
  <p></p>
</div>
        <p></p>
                <a class="btn btn-primary" href="psicomotricidad.php" role="button">Ir Atrás</a>     
                <p></p>
                <center>
<h3>Historial Agendamiento de control</h3>
</center>
<br>
          <center>
<table  id="tablamenu" class="table table-hover" style="width:650px; height:100px" >

<tr class="table-info">
     <td>

<div class="panel-body cold-md-12 col-lg-10 col-xs-12 col-sm-12 col-lg-offset-1">				
					<div class="form-group row">
						<label for="q" class="col-md-2 control-label"></label>
					<div class="col-md-5">
				<input type="text" class="form-control" id="q" placeholder="run del alumno" onkeyup='load(1);'>
</div>
				
<button type="button" class="btn btn-success" style="width: 200px" onclick='load(1);'>Consultar</button>

</td>	   

</tr>
					
		

                        
</table>
<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			</div>
		</div>	
		
	</div>
	<hr>
		<?php include("footer.php"); ?>

	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/historial_asistencia_control_psi.js"></script>
</center>
		
				

</body>
</html>