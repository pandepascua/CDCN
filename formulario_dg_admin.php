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
<script src="js/jquery_filas/antecedentes_morbidos.js"></script>
<script src="js/jquery_filas/antecedentes_quirurjicos.js"></script>
<script src="js/jquery_filas/antecedentes_anteriores.js"></script>
<script src="js/jquery_filas/antecedentes_farmacologicos.js"></script>

<link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>


<script src="js/jquery_filas/funcionBotonEliminarFila.js"></script>



<title>Datos generales</title>
        </head>
        <body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>

<div style="float:right" >
  <h6>Bienvenido <?php echo  $_SESSION['nombre']." ". $_SESSION['apellido'];?></h6>
   
  <a href=logout_admin.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
  
  <p></p>
</div>
    <p></p>
    <a class="btn btn-primary" href="fichakinemaso_admin.php" role="button">Ir Atrás</a>     
    <p></p>
    <center>


    
    <h3>Formulario Datos generales</h3>
        <form id="formulario_dg" name="formulario_dg" action="guardar_dg_admin.php" method="post" target="_self">

<table  id="tablamenu" class="table table-hover" style="width:450px; height:150px" >
<thead>

</thead>
<tbody>

<tr class="table-info">
  <td><span>R.U.N</span></td>
  <td> 
              <div class="row">
                  <div class="col">
                      <input type="text" id="run_alumno" name="run" class="form-control" maxlength="10" value="<?php echo $_POST['run']?>" required oninput="checkRut(this)" readonly>
                  </div>
              </div>
       
  </td>
</tr>
<tr class="table-info">

  <td><span>Nombre.</span></td>
  <td>                                                             
      <div class="row">
          <div class="col">
              <input type="text" id="nom_alumno" name="nombre" value="<?php echo $_POST['nombre']?>" class="form-control" placeholder=""required>
          </div>
      </div>
  </td>

</tr>
<tr class="table-info">
      <td><span>Edad.</span></td>
      <td> 
                  <div class="row">
                      <div class="col">
                          <input type="text" id="edad_alumno" name="edad" value="<?php echo $_POST['edad']?>" class="form-control" placeholder=""required>
                      </div>
                  </div>
      </td>
</tr>
<tr class="table-info">
  
      <td><span>Celular.</span></td>
      <td>                                                             
          <div class="row">
              <div class="col">
                  <input type="text" id="telefono_alumno" name="celular" value="<?php echo $_POST['celular']?>" class="form-control" placeholder=""required>
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
    inner join talleres on(alumnos.id_taller=talleres.id_taller) where run_alumno="'.$_POST['run'].'"');
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

				<td><span>Dirección.</span></td>
				<td>                                                             
						<div class="row">
								<div class="col">
										<input type="text" name="direccion" class="form-control" value="<?php echo $_POST['direccion']?> " required>
								</div>
						</div>
				</td>
</tr>

<tr class="table-info">

				<td><span>Correo.</span></td>
				<td>                                                             
						<div class="row">
								<div class="col">
								<input type="email" name="correo" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" value="<?php echo $_POST['correo']?> "required>
								</div>
						</div>
				</td>
</tr>
<tr class="table-info">
				<td><span>Patologías.</span></td>
				<td> 
										<div class="row">
												<div class="col">
													<input type="text" style="width:300px" name="patologia"  value="<?php echo $_POST['patologia']?> ">												

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
    <td><span>Ocupacion.</span></td>
       <td> 
            <div class="row">
                <div class="col">
                   <input type="text"name="ocupacion" class="form-control" placeholder="">
            </div>
       </div>
    </td>
</tr>

<tr class="table-info">
      <td><span>Fecha ingreso.</span></td>
            <td> 
            <div class="row">
                <div class="col">
                <input type="date" name="fecha_ing" min="2019-01-01"
                                      max="2030-01-01" step="1">
     
    </td>                  </div>
            </div>
         </td>
</tr>
         <tr class="table-info">

      <td><span>Motivo de consulta.</span></td>
        <td><textarea name="motivo" id="" cols="25" rows="2" placeholder="ingrese motivo de consulta"></textarea></td>
 </tr>
</tbody>

</table>







        <h4>Antecedente Generales</h4><p>
            <H6>Antecedentes morbidos</H6>
    </p>
        <table  id="tabla_ant_mor" class="table table-hover" style="width:700px; height:200px" >
        <thead>
             <tr class="table-info">
                <th scope="col">Enfermedad</th>
                 <th scope="col">Año</th>
                   <th>Control</th>
                    <th>Accion</th>
            </tr>
               </thead>
                <tbody>

                </tbody>
        </table>
         <button type="button" id="agregar" class="btn btn-primary">Agregar fila</button>
        <button type="button"  id="borrar" class="btn btn-secondary">Eliminar ultima fila</button>
        <script type="text/javascript">
                        /*************ELIMINAR ULTIMA FILA DE LA TABLA***************/

                        $("#borrar").click(function(){
                        var columna=$("#tabla_ant_mor tr").length;
                        if(columna>1){
                                $("#tabla_ant_mor tr:last").remove();
                                }
                        });
                </script>
           <p>
            <h6>Antecedentes quirurgicos</h6>
            </p>
            <table  id="tabla_ant_quir" class="table table-hover" style="width:700px; height:200px" >
                <thead>
                <tr class="table-info">
                    <th scope="col">Cirugía</th>
                    <th scope="col">Año</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <button type="button" id="agregar2" class="btn btn-primary">Agregar fila</button>
        <button type="button"  id="borrar2" class="btn btn-secondary">Eliminar ultima fila</button>
        <script type="text/javascript">
                        /*************ELIMINAR ULTIMA FILA DE LA TABLA***************/

                        $("#borrar2").click(function(){
                        var columna=$("#tabla_ant_quir tr").length;
                        if(columna>1){
                                $("#tabla_ant_quir tr:last").remove();
                                }
                        });
                </script>
            <p>
                <h6>Antecedentes anteriores</h6>
            </p>
                <table  id="tabla_ant_ant" class="table table-hover" style="width:700px; height:200px" >
                    <thead>
                         <tr class="table-info">
                            <th scope="col">Descripcion</th>
                            <th scope="col">Año</th>
                            <th>Estado</th>
                             <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                 </table>
                 <button type="button" id="agregar3" class="btn btn-primary">Agregar fila</button>
        <button type="button"  id="borrar3" class="btn btn-secondary">Eliminar ultima fila</button>
        <script type="text/javascript">
                        /*************ELIMINAR ULTIMA FILA DE LA TABLA***************/

                        $("#borrar3").click(function(){
                        var columna=$("#tabla_ant_ant tr").length;
                        if(columna>1){
                                $("#tabla_ant_ant tr:last").remove();
                                }
                        });
        </script>
                    <p>
                        <h6>Hábitos</h6>
                    </p>
                    <table  id="tablamenu" class="table table-hover" style="width:300px; height:200px" >
                        <tbody>
                            <tr class="table-info">
                                <td><span>Tabaquico</span></td>
                                <td> <input type="checkbox" name="habito[]" value="tabaco"></td>
                                    
                            </tr>
                             <tr class="table-info">
                                <td><span>Alcohol.</span></td>
                                <td><input type="checkbox" name="habito[]"value="alcohol" ></td>
                            </tr>
                            <tr class="table-info">
                                <td><span>Drogas.</span></td>
                                <td><input type="checkbox" name="habito[]" value="drogas"></td>
                            </tr>
                            <tr class="table-info">
                                <td><span>Otros.</span></td>
                                <td><textarea name="otros_habitos" id="" cols="30" rows="2" placeholder=""></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                                    <p>
                                            <h6>Antecedentes Farmacologicos</h6>
                                        </p>
                        <table  id="tabla_ant_far" class="table table-hover" style="width:700px; height:200px" >
                            <thead>
                                <tr class="table-info">
                                    <th scope="col">Medicamento</th>
                                    <th scope="col">Dosis</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
         <button type="button" id="agregar4" class="btn btn-primary">Agregar fila</button>
        <button type="button"  id="borrar4" class="btn btn-secondary">Eliminar ultima fila</button>
        <script type="text/javascript">
                        /*************ELIMINAR ULTIMA FILA DE LA TABLA***************/

                        $("#borrar4").click(function(){
                        var columna=$("#tabla_ant_far tr").length;
                        if(columna>1){
                                $("#tabla_ant_far tr:last").remove();
                                }
                        });
                </script>
                                        <p>
                                                <h6>Actividad fisica</h6>
                                            </p>
                                        <table  id="tablamenu" class="table table-hover" style="width:100px; height:100px" >
                                                <tbody>
                                                    <tr class="table-info">
                                                        <td><textarea name="actividad_fisica" id="" cols="50" rows="2" placeholder=""></textarea></td>
                                                    </tr>
                                                </tbody>
                                        </table>
                                        <p>
                                                <h6>Anamnesis</h6>
                                            </p>
                                        <table  id="tablamenu" class="table table-hover" style="width:100px; height:100px" >
                                                <tbody>
                                                    <tr class="table-info">
                                                        <td><textarea name="anamnesis" id="" cols="50" rows="2" placeholder=""></textarea></td>
                                                    </tr>
                                                </tbody>
                                        </table>          
        <button type="submit" class="btn btn-primary" style="width: 200px" value="enviar" form="formulario_dg" >Enviar Datos</button>
  
  </form>

</body>
</html>