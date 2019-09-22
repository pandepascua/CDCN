
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
    <link rel="stylesheet" href="estilos.css">
    <script src="js/direccion_taller.js"></script>
    <script src="js/cargar_agendamiento_maso.js"></script>
    <script src="js/cargar_alumno_fecha_maso.js"></script>
    <script src="js/carga_alumno_elim_maso.js"></script>
    <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>

    <script src="js/carga_alumno_hora_maso.js"></script>
        <script src="js/carga_alumno_sesion_maso.js"></script>
        <script src="js/carga_alumno_sala_maso.js"></script>
        <script src="js/carga_alumno_prof_maso.js"></script>
    <script src="js/cargar_sala.js"></script>
    <script src="js/cargar_profesional.js"></script>
    <script src="js/valida_rut.js"></script>

    <title>Masoterapia</title>
</head>
<body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>

<div style="float:right" >
  <h6>Bienvenido <?php echo  $_SESSION['nombre']." ". $_SESSION['apellido'];?></h6>
   
  <a href=logout_admin.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
  
  <p></p>
</div>
       
        <p> </p>                    
            <a class="btn btn-primary" href="menu_s_2.php" role="button">Ir Atrás</a>     

           
            
           <p>

            </p>
         
         <center>


            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agendamiento_nut" data-whatever="@mdo">Agendamiento de hora</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificacion_nut" data-whatever="@fat">modificacion hora</button>
	    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminacion" data-whatever="@getbootstrap">eliminar hora</button>
        </center>
        
        
        <!-- ********************************************** MODAL agendamiento*********************************-->
<div class="modal fade" id="agendamiento_nut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE AGENDAMIENTO.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form name="formulario_agen_nu" action="guardar_hora_masoterapia_admin.php" method="post" target="_self" ONSUBMIT="return pregunta();">

<table  id="tablamenu" class="table table-hover" style="width:470px; height:500px" >
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
            
            <input type="date" name="fecha_masoterapia" min="2019-01-01"
                                            max="2030-01-01" step="1">
           
          </td>
        <td>  <!-- Campo de entrada de hora -->
            
            <input type="time" name="hora_masoterapia" min="09:00"
                                           max="18:00" step="1800">
        </td>

    </tr>
    <tr class="table-info">
        <td><span>R.U.N</span></td>
        <td> 
                <input type="text" id="run" class="form-control" maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                <input type="hidden" id="token_alumnoM" name="id_alumno" class="form-control" placeholder="Ej:11111111-k">

        </td>
</tr>
<tr class="table-info">

        <td><span>Nombre.</span></td>
        <td>                                                             
            <div class="row">
                <div class="col">
                    <input type="text" id="nom_alumnoM" class="form-control" placeholder="">
                </div>
            </div>
        </td>

    </tr>
</tr>

</tbody>
<script type="text/javascript">
                //*******************ALERT DE ENVIO*******************/
                        function pregunta(e){ 
                        if (confirm('Estas seguro de enviar los datos de este formulario?'))
                                {       
                                        document.formulario_agen_nu.submit();                             

                        }else   {
                                        e.preventDefault();
                                }
       
                        };

                        
    </script>
</table>
<button type="button" class="btn btn-success" style="width: 200px" onclick="pregunta();">Enviar</button>

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
 <div class="modal fade" id="modificacion_nut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog"  role="document">
    <div class="modal-content"  style="width:700px">
      <div class="modal-header" >
        <h5 class="modal-title"  id="exampleModalLabel">MODIFICACION AGENDAMIENTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
                <p></p>
           
                        <form name="mod_fecha" action="update/mod_fecha_ingreso_masoterapia_admin.php" method="post" target="_self" ONSUBMIT="return pregunta7();">

                        <table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

                        <tr class="table-info">
                        <td><span>R.U.N</span></td>
                            <td> 
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="run7" class="form-control" maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                                            </div>
                                        </div>
                                        <input type="hidden" id="token_id_el" name="id_alumno2" class="form-control" placeholder="">

                            </td>

                                <td><span>Fecha nueva.</span></td>
                                <td>
                                        <!-- Campo de entrada de fecha -->
                                        
                                        <input type="date" name="fecha" min="2019-01-01"
                                                                        max="2030-01-01" step="1">
                                       
                                </td>
                                <td>                                                             
                                <div class="row">
                                    <div class="col">
                                    </div>
                                </div>
                            </td>
                                <script type="text/javascript">
                                        //*******************ALERT DE ENVIO*******************/
                                 function pregunta7(e){ 
                                 if (confirm('Estas seguro de enviar los datos?'))
                                     {       
                                        document.mod_fecha.submit();                             

                                    }else   {
                                        e.preventDefault();
                                    }
       
                                    };

                        
                                </script>
                                <td> 
                                <button type="button" class="btn btn-success" style="width: 100px" onclick="pregunta7();">Modificar</button>
    
                                </td>
                        </tr>
                        </table>
                        </form>


                        <form name="mod_hora"action="update/mod_hora_ingreso_masoterapia_admin.php" method="post" target="_self" ONSUBMIT="return pregunta2();">
                        <table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

                        <tr class="table-info">
                        <td><span>R.U.N</span></td>
                            <td> 
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="run_alumno2" class="form-control" maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                                            </div>
                                        </div>
                                        <input type="hidden" id="token_id_al_h_maso" name="id_alumno" class="form-control" placeholder="">

                            </td>

                                <td><span>Hora nueva.</span></td>
                                <td>  <!-- Campo de entrada de hora -->
                            
                                    <input type="time" name="hora" min="09:00"
                                                                   max="12:00" step="450">
                                </td>

                            <script type="text/javascript">
                                        //*******************ALERT DE ENVIO*******************/
                                 function pregunta2(e){ 
                                 if (confirm('Estas seguro de enviar los datos?'))
                                     {       
                                        document.mod_hora.submit();                             

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
                                </td>
                            <script type="text/javascript">
                                        //*******************ALERT DE ENVIO*******************/
                                 function pregunta5(e){ 
                                 if (confirm('Estas seguro de enviar los datos?'))
                                     {       
                                        document.mod_prof.submit();                             

                                    }else   {
                                        e.preventDefault();
                                    }
       
                                    };

                        
                                </script>
                                <td> 
                                <button type="button" class="btn btn-success" style="width: 100px" onclick="pregunta5();">Modificar</button>
    
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
        <h5 class="modal-title" id="exampleModalLabel">Eliminacion agendamiento.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form name="eliminar_alumno"action="delete/delete_ingreso_masoterapia_admin.php" method="post" target="_self" ONSUBMIT="return pregunta5();">
                        <table  id="tablamenu" class="table table-hover" style="width:650px; height:150px" >

                        <tr class="table-info">
                        <td><span>R.U.N</span></td>
                            <td> 
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="run_al" class="form-control" maxlength="10" placeholder="11111111-k" required oninput="checkRut(this)">
                                                <input type="hidden" id="token_run_id_al" name="id_alumno" class="form-control" placeholder="">

                                            </div>
                                        </div>
                            </td>

                            <script type="text/javascript">
                                        //*******************ALERT DE ENVIO*******************/
                                 function pregunta6(e){ 
                                 if (confirm('Estas seguro de enviar los datos?'))
                                     {       
                                        document.eliminar_alumno.submit();                             

                                    }else   {
                                        e.preventDefault();
                                    }
       
                                    };

                        
                                </script>
                                <td> 
                                <button type="button" class="btn btn-success" style="width: 200px" onclick="pregunta6();">Eliminar</button>
    
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
                        
<center>

<h3>Consultar horas agendadas</h3>
</center>
<br>
        
                    <center>
            
<form action="filtro_agendamiento_masoterapia.php" method="post"></form>
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
	<script type="text/javascript" src="js/buscar_hora_masoterapia.js"></script>
</center>



      
</body>
</html>