
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/direccion_taller.js"></script>
    <script src="js/cargar_agendamiento_maso.js"></script>
    <script src="js/cargar_sala.js"></script>
    <script src="js/cargar_profesional.js"></script>

    <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>

    <title>Agendamiento Masoterapia</title>
</head>
<body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>

<div style="float:right" >
  <h6>Bienvenido <?php echo  $_SESSION['nombre']." ". $_SESSION['apellido'];?></h6>
   
  <a href=logout.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
  
  <p></p>
</div>
       
                <p></p>
                <a class="btn btn-primary" href="masoterapia.php" role="button">Ir Atrás</a>     
                <p></p>  
<center>
        
    <h3>Agendamiento Masoterapia</h3>
    <br>
    <form name="formulario_maso" action="guardar_DAM.php" method="post" target="_self" ONSUBMIT="return pregunta();">

<table  id="tablamenu" class="table table-hover" style="width:1000px; height:150px" >
<thead>
    <tr class="table-info">
        <th style="width: 50px" scope="col">Fecha </th>
        <th  style="width:300px" scope="col">Hora</th>
        <th   style="width:300px" scope="col"><input type="hidden"></th>
        <th   style="width:300px" scope="col"><input type="hidden"></th>
    </tr>
</thead>
<tbody>
    <tr class="table-info">
        <td>
            <!-- Campo de entrada de fecha -->
            
            <input type="date" name="fecha_maso" min="2019-01-01"
                                            max="2030-01-01" step="1">
           
       </td>
        <td>  <!-- Campo de entrada de hora -->
            
            <input type="time" name="hora_maso" min="09:00"
                                           max="18:00" step="1800">
        </td>
        <td>
                        <th   style="width:300px" scope="col"><input type="hidden"></th>
        </td>
    </tr>
    <tr class="table-info">
        <td><span>R.U.N</span></td>
        <td> 
                    <div class="row">
                        <div class="col">
                            <input type="text" id="run" class="form-control" placeholder="11111111-1" required oninput="checkRut(this)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="hidden" id="token_run" name="token_run" class="form-control" placeholder="Ej:11111111-k">
                        </div>
                    </div>
        </td>
        <td><span>Nombre.</span></td>
        <td>                                                             
            <div class="row">
                <div class="col">
                    <input type="text"  id="nombre_maso"  class="form-control" placeholder="">
                </div>
            </div>
        </td>

    </tr>
    <tr class="table-info">
            <td><span>Edad.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text" id="edad_maso"  class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
            <td><span>Teléfono.</span></td>
            <td>                                                             
                <div class="row">
                    <div class="col">
                        <input type="text" id="telefono_maso" class="form-control" placeholder="">
                    </div>
                </div>
            </td>
    </tr>

    <tr class="table-info">
            <td><span>Taller inscrito.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text" id="nom_taller" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" id="token_taller" name="id_taller" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
            <td><span>Atención.</span></td>
            <td>                                                             
                <div class="row">
                    <div class="col">
                        <input type="text" id="atencion_maso" name="atencion_maso" class="form-control" placeholder="">
                    </div>
                </div>
            </td>
    </tr>
    <tr class="table-info">
            <td><span>Observación.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text" id="observacion_maso" name="observacion_maso" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
            <td><span>Sesión.</span></td>
            <td>                                                             
                <div class="row">
                    <div class="col">
                        <input type="text" id="sesion_maso" name="sesion_maso" class="form-control" placeholder="">
                    </div>
                </div>
            </td>
    </tr>
    <tr class="table-info">
            <td><span>Estado.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text" id="estado_maso" name="estado_maso" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
            <td><span>Ejercicio.</span></td>
            <td>                                                             
                <div class="row">
                    <div class="col">
                        <input type="text" id="ejercicio_maso" name="ejercicio_maso" class="form-control" placeholder="">
                    </div>
                </div>
            </td>
    </tr>
    <tr class="table-info">
            <td><span>Proced.Tens.</span></td>
            <td> 
                        <div class="row">
                            <div class="col">
                                <input type="text" id="tens_maso" name="tens_maso" class="form-control" placeholder="">
                            </div>
                        </div>
            </td>
            <td><span>Proced.Us.</span></td>
        <td> 
            <div class="row">
            <div class="col">
                <input type="text" id="us_maso" name="us_maso" class="form-control" placeholder="">
            </div>
            </div>
        </td>
    </tr>                
    <tr class="table-info">
        <td><span>Proced.CHC.</span></td>
        <td> 
            <div class="row">
                <div class="col">
                     <input type="text" id="chc_maso" name="chc_maso" class="form-control" placeholder="">
                </div>
            </div>
        </td>
        <td><span>Proced.IR.</span></td>
        <td> 
            <div class="row">
                <div class="col">
                    <input type="text" id="ir_maso" name="ir_maso" class="form-control" placeholder="">
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
</tr>
</tbody>
<script type="text/javascript">
                //*******************ALERT DE ENVIO*******************/
                        function pregunta(e){ 
                        if (confirm('Estas seguro de enviar los datos de este formulario?'))
                                {       
                                        document.formulario_maso.submit();                             

                        }else   {
                                        e.preventDefault();
                                }
       
                        };

                        
    </script>
</table>
<button type="button" class="btn btn-success" style="width: 200px" onclick="pregunta();">Enviar</button>

</form>
</center>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<center>
<h3>Ver disponibilidad Masoterapia</h3>
</center>
<br>
<form action="filtro_agendamiento_nutricion.php" method="post"></form>
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
<table class="table table-hover"   style="width:1000px; height:150px"  >

<tbody>

</tbody>
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
	<script type="text/javascript" src="js/buscar_masoterapia.js"></script>
</center>
</body>
</html>