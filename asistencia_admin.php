<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Inicia Sesion para acceder a este contenido.<br>";
   echo "<br><a href='a05dfcb.html'>Login</a>";
   echo "<br><br><a href='index.html'>Registrarme</a>";
   header('Location: http://localhost/cdcn/a05dfcb.html');//redirige a la página de login si el usuario quiere ingresar sin iniciar sesion


exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();
header('Location: http://localhost/cdcn/a05dfcb.html');//redirige a la página de login, modifica la url a tu conveniencia
echo "Tu sesion a expirado,
<a href='a05dfcb.html'>Inicia Sesion</a>";
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
    <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>

    <title>Asistencia de alumnos</title>
</head>
<body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>

<div style="float:right" >
  <h6>Bienvenido <?php echo  $_SESSION['nombre']." ". $_SESSION['apellido'];?></h6>
   
  <a href=logout_admin.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
  
  <p></p>
</div>
       
        <p></p>
                <a class="btn btn-primary" href="lista_talleres_admin.php" role="button">Ir Atrás</a>     
                <p></p>
<center>
        
    <h3>Asistencia Alumnos</h3>
    <br>
    <form name="formulario_asistencia" action="guardar_asistencia_admin.php" method="post" target="_self" ONSUBMIT="return pregunta();">

        <table id="tablamenu" class="table table-hover" style="width:650px; height:100px">
                        <tr class="table-info">
                            <td>
                            <span>Seleccione un taller</span>
<select id="q" size="0" onkeyup='load(1);'>

<?php
          $query = $conexion -> query ("SELECT * FROM talleres");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option id="q" value="'.$valores['id_taller'].'">'.$valores['nom_taller'].'</option>';
          }
        ?>
</select>    

                            </td>                            
                            <td>
                            <button type="button" class="btn btn-success" style="width: 200px" onclick='load(1);'>Consultar</button>
                            </td>

                            <td>
                            <span>Fecha</span>
                            </td>

                            <td>
                            <input type="date" name="fecha_asistencia" min="2019-01-01"
                                            max="2030-01-01" step="1">
                            </td>
                        </tr>
        </table>
    <center>
            

				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			</div>
		</div>	
		
	</div>
	<hr>
		<?php include("footer.php"); ?>

	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
    <script type="text/javascript" src="js/buscar_asistencia.js"></script>
    <script type="text/javascript">
                //*******************ALERT DE ENVIO*******************/
                        function pregunta(e){ 
                        if (confirm('Estas seguro de enviar los datos de este formulario?'))
                                {       
                                        document.formulario_asistencia.submit();                             

                        }else   {
                                        e.preventDefault();
                                }
       
                        };

                        
    </script>

    <button type="button" onclick="pregunta();" class="btn btn-success" >Enviar</button>

        </form>
</center>
</body>
</html>