
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
include 'conecta.php';
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
<script  src="js/carga_mod_dg.js"></script>
<script src="js/valida_rut.js"></script>
<script src="js/jquery_filas/antecedentes_morbidos.js"></script>
<script src="js/jquery_filas/antecedentes_quirurjicos.js"></script>
<script src="js/jquery_filas/antecedentes_anteriores.js"></script>
<script src="js/jquery_filas/antecedentes_farmacologicos.js"></script>
<link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>



<script src="js/jquery_filas/funcionBotonEliminarFila.js"></script>



<title>Ficha datos generales</title>
        </head>
<body style="margin: 25px 50px 75px">
<img src="images/logocor.png" width="100px" height="100px"/>

<div style="float:right" >
  <h6>Bienvenido <?php echo  $_SESSION['nombre']." ". $_SESSION['apellido'];?></h6>
   
  <a href=logout_admin.php><button type="button" class="btn btn-success"> Cerrar Sesion</button></a>
  
  <p></p>
</div>
    <p></p>
    <a class="btn btn-primary" href="fichakinemaso_kine_admin.php" role="button">Ir Atrás</a>     
    <p></p>
    <center>


    
    <h3>Formulario Datos generales</h3>
        <form id="formulario_dg" name="formulario_dg" action="update/mod_dg_kine_admin.php" method="post" target="_self">

<table  id="tablamenu" class="table table-hover" style="width:450px; height:150px" >
<thead>

</thead>
<tbody>

<tr class="table-info">
  <td><span>Nº ficha</span></td>
  <td> 
              <div class="row">
                  <div class="col">
                      <input type="text"  name="id_dg2" class="form-control"  value="<?php echo $_POST['id_dg2']?>">
                  </div>
              </div>
       
  </td>

<tr class="table-info">
  <td><span>R.U.N</span></td>
  <td> 
              <div class="row">
                  <div class="col">
                      <input type="text" id="run_alumno" name="run" class="form-control" maxlength="10" value="<?php echo $_POST['run2']?>" required oninput="checkRut(this)" readonly>
                  </div>
              </div>
       
  </td>
</tr>
<tr class="table-info">

  <td><span>Nombre.</span></td>
  <td>                                                             
      <div class="row">
          <div class="col">
              <input type="text" id="nom_alumno" name="nombre" value="<?php echo $_POST['nombre2']?>" class="form-control" placeholder=""required>
          </div>
      </div>
  </td>

</tr>
<tr class="table-info">
      <td><span>Edad.</span></td>
      <td> 
                  <div class="row">
                      <div class="col">
                          <input type="text" id="edad_alumno" name="edad" value="<?php echo $_POST['edad2']?>" class="form-control" placeholder=""required>
                      </div>
                  </div>
      </td>
</tr>
<tr class="table-info">
  
      <td><span>Celular.</span></td>
      <td>                                                             
          <div class="row">
              <div class="col">
                  <input type="text" id="telefono_alumno" name="celular" value="<?php echo $_POST['celular2']?>" class="form-control" placeholder=""required>
              </div>
          </div>
      </td>
</tr>
<tr class="table-info">

     <td><span>Taller seleccionado.</span></td>
        <td>                                                             
            <div class="row">
                <div class="col">
                    <input type="text" id="token_dg29" class="form-control" name="" value="<?php echo $_POST['taller']?>">
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
    inner join talleres on(alumnos.id_taller=talleres.id_taller) where run_alumno="'.$_POST['run2'].'"');
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
							<input type="date" name="fecha_nac" class="form-control" value="<?php echo $_POST['fecha_nac2']?>" placeholder="" required>
						</div>
					</div>
				</td>
</tr>

<tr class="table-info">

				<td><span>Dirección.</span></td>
				<td>                                                             
						<div class="row">
								<div class="col">
										<input type="text" name="direccion" class="form-control" value="<?php echo $_POST['direccion2']?> " required>
								</div>
						</div>
				</td>
</tr>

<tr class="table-info">

				<td><span>Correo.</span></td>
				<td>                                                             
						<div class="row">
								<div class="col">
								<input type="email" name="correo" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" value="<?php echo $_POST['correo2']?> "required>
								</div>
						</div>
				</td>
</tr>
<tr class="table-info">
				<td><span>Patologías.</span></td>
				<td> 
										<div class="row">
												<div class="col">
													<input type="text" style="width:300px" name="patologia"  value="<?php echo $_POST['patologia2']?> ">												

																</div>
														</div>
				</td>
</tr>

<tr class="table-info">
      <td><span>Diagnóstico.</span></td>
      <td>                                                             
          <div class="row">
              <div class="col">
                  <input type="text" id="token_dg10" name="diagnostico" class="form-control" value="<?php echo $_POST['diagnostico2']?> "required>
              </div>
          </div>
      </td>
</tr>
  
<tr class="table-info">
    <td><span>Ocupacion.</span></td>
       <td> 
            <div class="row">
                <div class="col">
                   <input type="text" id="token_dg11" name="ocupacion" class="form-control" placeholder="" value="<?php echo $_POST['ocupacion2']?> ">
            </div>
       </div>
    </td>
</tr>

<tr class="table-info">
      <td><span>Fecha ingreso ingresado.</span></td>
            <td> 
            <div class="row">
                <div class="col">
                <input  id="token_dg12" type="input" class="form-control"  value="<?php echo $_POST['fecha_ingreso2']?> ">
     
    </td>                  </div>
            </div>
         </td>
</tr>
<tr class="table-info">
      <td><span>Fecha ingreso.</span></td>
            <td> 
            <div class="row">
                <div class="col">
                <input  id="token_dg12" type="date" class="form-control"  name="fecha_ing" min="2019-01-01"
                                      max="2030-01-01" step="1" value="<?php echo $_POST['fecha_ingreso2']?> ">
     
    </td>                  </div>
            </div>
         </td>
</tr>
         <tr class="table-info">

      <td><span>Motivo de consulta.</span></td>

        <td><textarea name="motivo" id="token_dg13" cols="25" rows="2"  placeholder="ingrese motivo de consulta"><?php echo $_POST['motivo2']?> </textarea></td>
 </tr>
</tbody>

</table>







        <h4>Antecedente Generales</h4><p>
            <H6>Carga Antecedentes morbidos</H6>
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
           
                <?php
    $query = $conexion -> query ('SELECT id_dg,id_ant_mor,enf_mor ,año_mor,control_mor FROM antecedentes_morbidos
     where id_dg="'.$_POST['id_dg2'].'"');
    while ($valores = mysqli_fetch_array($query)) {
        echo '<tr>';
        echo'<td>';
      echo '<input id="token_taller"  name="enfermedad[]" value="'.$valores['enf_mor'].'">';
      echo '</td>';
      echo '<td>';
      echo '<input id="token_taller"  name="año[]" value="'.$valores['año_mor'].'">';
      echo '</td>';
      echo '<td>';
      echo '<input id="token_taller"  name="control[]" value="'.$valores['control_mor'].'">';
      echo '</td>';
      echo '<td>';
      echo '<input type="button"  onclick="remove(this)" value="Eliminar">';
      echo '</td>';
echo '</tr>';
    }
  ?>

           
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
                <?php
    $query = $conexion -> query ('SELECT  id_dg,id_ant_quir,cirujia ,año_quir FROM antecedentes_quirurjicos
     where id_dg="'.$_POST['id_dg2'].'"');
    while ($valores = mysqli_fetch_array($query)) {
        echo '<tr>';
        echo'<td>';
      echo '<input id="token_taller"  name="cirujia[]" value="'.$valores['cirujia'].'">';
      echo '</td>';
      echo '<td>';
      echo '<input id="token_taller"  name="año_q[]" value="'.$valores['año_quir'].'">';
      echo '</td>';
      echo '<td>';
      echo '<input type="button"  onclick="remove(this)" value="Eliminar">';
      echo '</td>';
echo '</tr>';
    }
  ?>
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
                    <?php
    $query = $conexion -> query ('SELECT  id_dg,id_ant_ant,descripcion ,año_ant ,estado_ant FROM antecedentes_anteriores
     where id_dg="'.$_POST['id_dg2'].'"');
    while ($valores = mysqli_fetch_array($query)) {
        echo '<tr>';
        echo'<td>';
      echo '<input id="token_taller"  name="descripcion[]" value="'.$valores['descripcion'].'">';
      echo '</td>';
      echo '<td>';
      echo '<input id="token_taller"  name="año_ant[]" value="'.$valores['año_ant'].'">';
      echo '</td>';
      echo '<td>';
      echo '<input id="token_taller"  name="estado[]" value="'.$valores['estado_ant'].'">';
      echo '</td>';
      echo '<td>';
      echo '<input type="button"  onclick="remove(this)" value="Eliminar">';
      echo '</td>';
echo '</tr>';
    }
  ?>
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
                        <h6>Hábitos seleccionados</h6>
                    </p>


                    <table  id="tablamenu" class="table table-hover" style="width:300px; height:200px" >
                        <tbody>

 <?php
    $query = $conexion -> query ('SELECT id_dg,id_habito,nom_habito ,otros 
    FROM habitos
     where id_dg="'.$_POST['id_dg2'].'"');
    while ($valores = mysqli_fetch_array($query)) {
        echo '<tr class="table-info">';
        echo'<td>';
        echo '<span> '.$valores['nom_habito'].'</span>';
        echo '</td>';
        echo'<td>';
        echo '<input id="token_taller"  type="checkbox" checked name="" value="'.$valores['nom_habito'].'">';
        echo '</td>';
        echo '</tr>';
        echo'<tr class="table-info">';
        echo'<td>';
        echo '<span>otros</span>';
        echo '</td>';
        echo'<td>';
        echo '<textarea id="token_taller"  type="text" checked name="" >'.$valores['otros'].'</textarea>';
        echo '</td>';
        echo '</tr>';
    }
  ?>

                            
                        </tbody>
                    </table>

                    <p>
                        <h6>Nuevos Hábitos</h6>
                    </p>


                    <table  id="tablamenu" class="table table-hover" style="width:300px; height:200px" >
                        <tbody>


                            <tr class="table-info">
                                <td><span>Tabaquico</span></td>
                                <td> <input type="checkbox" name="habito[]" value="tabico"></td>
                                    
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
                            <?php
    $query = $conexion -> query ('SELECT   id_dg,medicamento ,dosis FROM antecedentes_farmacologicos
     where id_dg="'.$_POST['id_dg2'].'"');
    while ($valores = mysqli_fetch_array($query)) {
        echo '<tr>';
        echo'<td>';
      echo '<input id="token_taller"  name="medicamento[]" value="'.$valores['medicamento'].'">';
      echo '</td>';
      echo '<td>';
      echo '<input id="token_taller"  name="dosis[]" value="'.$valores['dosis'].'">';
      echo '</td>';
      echo '<td>';
      echo '<input type="button"  onclick="remove(this)" value="Eliminar">';
      echo '</td>';
echo '</tr>';
    }
  ?>
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
                                                        <td><textarea id="token_dg26" name="actividad_fisica" id="" cols="50" rows="2" placeholder=""><?php echo $_POST['act_fisica2']?> </textarea></td>
                                                    </tr>
                                                </tbody>
                                        </table>
                                        <p>
                                                <h6>Anamnesis</h6>
                                            </p>
                                        <table  id="tablamenu" class="table table-hover" style="width:100px; height:100px" >
                                                <tbody>
                                                    <tr class="table-info">
                                                        <td><textarea name="anamnesis"id="token_dg27"cols="50" rows="2" placeholder=""><?php echo $_POST['anamnesis2']?> </textarea></td>
                                                    </tr>
                                                </tbody>
                                        </table>          
        <button type="submit" class="btn btn-primary" style="width: 200px" value="enviar" form="formulario_dg" >Enviar Datos</button>
  
  </form>

</body>
</html>