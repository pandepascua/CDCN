<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
?>

<?php
			
$action='ajax';
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		  $sTable = "agen_kinesiologia";
		 $sWhere = "";
		 $sWhere.="WHERE id_agen_kine<=1000";
		if ( $_GET['q'] != "" )
		{
		$sWhere.= " and fecha_kin  like '%$q%' ";
			
		}
		
		$sWhere.=" order by hora_kine asc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 25; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './mostrar_agendamiento_kinesiologia.php';
		//main query to fetch the data
		$sql="SELECT id_agen_kine,run_alumno,nom_alumno,edad,fecha_nac,telefono,nombre_apoderado,telefono_apod,direccion_alumno,comuna,correo,patologias,
        talleres.nom_taller,talleres.id_taller,fecha_kin,hora_kine,atencion_kine , observacion_kine , sesion_kine, 
                            estado_kine ,ejercicio_kine, proced_tens_kine , 
                            proced_us_kine,proced_chc_kine,proced_ir_kine ,salas.id_sala,salas.nom_sala,profesionales.nom_profesional,profesionales.id_profesional  
        FROM  $sTable 
        inner join talleres on(agen_kinesiologia.id_taller=talleres.id_taller)
        inner join salas on(agen_kinesiologia.id_sala=salas.id_sala)
        inner join profesionales on(agen_kinesiologia.id_profesional=profesionales.id_profesional) 

        $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive ">
			<table class="table table-hover" style="border-color: #A6DAEA;width:2500px;height:100px ">
				<tr style="color: #000000; background-color: #A6DAEA; border-color: #A6DAEA;">
				<th  style="width:10px" scope="col">Nº</th>	
				<th  style="width:400px" scope="col">asistencia</th>	
				<th style="width: 250px" scope="col">Fecha</th>
                    <th  style="width:100px" scope="col">Hora</th>
                    <th style="width: 300px" scope="col">Nombre</th>
                    <th  style="width:300px" scope="col">Rut</th>
                    <th style="width: 100px" scope="col">Edad</th>
					<th  style="width:200px" scope="col">Teléfono</th>
					<th  style="width:400px" scope="col">correo</th>
                    <th style="width: 400px" scope="col">Atención</th>
                    <th style="width: 400px" scope="col">Observación</th>
                    <th  style="width:400px" scope="col">Estado</th>
                    <th style="width: 300px" scope="col">Taller inscrito</th>
					<th  style="width:400px" scope="col">Sesión</th>
					<th  style="width:400px" scope="col">Ejercicio</th>

                    <th style="width: 400px" scope="col">Proced.Tens</th>
                    <th  style="width:400px" scope="col">Proced.Us</th>
                    <th style="width: 400px" scope="col">Proced.CHC</th>
                    <th  style="width:400px" scope="col">Proced.IR</th>
                    <th  style="width:250px" scope="col">Sala</th>
					<th  style="width:250px" scope="col">Profesional</th>

				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id=$row['id_agen_kine'];
						$fecha=$row['fecha_kin'];
						$hora=$row['hora_kine'];
						$nom_alumno=$row['nom_alumno'];
                        $run=$row['run_alumno'];
                        $edad=$row['edad'];
						$telefono=$row['telefono'];
						$correo=$row['correo'];
                        $atencion=$row['atencion_kine'];
                        $observacion=$row['observacion_kine'];
                        $estado=$row['estado_kine'];
						$taller=$row['nom_taller'];
						$idtaller=$row['id_taller'];
						$sesion=$row['sesion_kine'];
						$ejercicio=$row['ejercicio_kine'];
                        $proced_tens=$row['proced_tens_kine'];
                        $proced_us=$row['proced_us_kine'];
                        $proced_chc=$row['proced_chc_kine'];
                        $proced_ir=$row['proced_ir_kine'];
						$sala=$row['nom_sala'];
						$prof=$row['nom_profesional'];
						$idsala=$row['id_sala'];
						$idprof=$row['id_profesional'];

		
		
		
					?>
					<tr>
					<td width="10px"> <?php echo ($id);echo"<input type='hidden'  name='id_agen_kine[]' value='".$id."'>";?></td>

					<td width="400px">  <?php
                                            
						$sentencia="select*from tipo_asistencia";
						$resultado=mysqli_query($con,$sentencia);
						while($filas=mysqli_fetch_assoc($resultado)){
						echo"<input type='checkbox' name='asistencia[]' value='".$filas['id_tipo_asis']."'>";
						echo $filas['tipo_asis'];
											}?> </td>
						<td width="250px"><?php echo ($fecha); echo"<input type='hidden'  name='fecha[]' value='".$fecha."'>";?></td>
						<td><?php echo ($hora);echo"<input type='hidden'  name='hora[]' value='".$hora."'>";?></td>
						<td><?php echo ($nom_alumno);echo"<input type='hidden'  name='nom_alumno[]' value='".$nom_alumno."'>";?></td>
						<td><?php echo ($run);echo"<input type='hidden'  name='run[]' value='".$run."'>";?></td>
                        <td><?php echo ($edad); echo"<input type='hidden'  name='edad[]' value='".$edad."'>";?></td>
						<td><?php echo ($telefono);echo"<input type='hidden'  name='telefono[]' value='".$telefono."'>";?></td>
						<td width="400px"><?php echo ($correo);echo"<input type='hidden'  name='correo[]' value='".$correo."'>";?></td>
						<td><?php echo ($atencion);echo"<input type='hidden'  name='atencion[]' value='".$atencion."'>";?></td>
						<td><?php echo ($observacion);echo"<input type='hidden'  name='obs[]' value='".$observacion."'>";?></td>
						<td><?php echo ($estado); echo"<input type='hidden'  name='estado[]' value='".$estado."'>";?></td>
						<td><?php echo ($taller);echo"<input type='hidden'  name='taller[]' value='".$idtaller."'>";?></td>
						<td><?php echo ($sesion); echo"<input type='hidden'  name='sesion[]' value='".$sesion."'>";?></td>
						<td><?php echo ($ejercicio);echo"<input type='hidden'  name='ejercicio[]' value='".$ejercicio."'>";?></td>
						<td><?php echo ($proced_tens);echo"<input type='hidden'  name='proced_tens[]' value='".$proced_tens."'>";?></td>
						<td><?php echo ($proced_us);echo"<input type='hidden'  name='proced_us[]' value='".$proced_us."'>";?></td>
						<td><?php echo ($proced_chc);echo"<input type='hidden'  name='proced_chc[]' value='".$proced_chc."'>";?></td>
						<td><?php echo ($proced_ir);echo"<input type='hidden'  name='proced_ir[]' value='".$proced_ir."'>";?></td>
						<td><?php echo ($sala);echo"<input type='hidden'  name='sala[]' value='".$idsala."'>";?></td>
						<td><?php echo ($prof);echo"<input type='hidden'  name='prof[]' value='".$idprof."'>";?></td>

					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right"><?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}else{
			echo '<script> alert("No hay pacientes.")</script>';
			echo "FECHA DISPONIBLE PARA AGENDAR!";
			echo '<table class="table table-hover" style="border-color: #A6DAEA;">';
			echo '<tr style="color: #000000; background-color: #A6DAEA; border-color: #A6DAEA;">';
			echo '<th  style="width:10px" scope="col">Nº</th>';	
			echo '<th  style="width:400px" scope="col">asistencia</th>';	
			echo'<th style="width: 250px" scope="col">Fecha</th>';
			echo'	<th  style="width:100px" scope="col">Hora</th>';
			echo'	<th style="width: 300px" scope="col">Nombre</th>';
			echo'	<th  style="width:300px" scope="col">Rut</th>';
			echo'	<th style="width: 100px" scope="col">Edad</th>';
			echo'	<th  style="width:200px" scope="col">Teléfono</th>';
			echo'	<th  style="width:400px" scope="col">correo</th>';
			echo'	<th style="width: 400px" scope="col">Atención</th>';
			echo'	<th style="width: 400px" scope="col">Observación</th>';
			echo'	<th  style="width:400px" scope="col">Estado</th>';
			echo'	<th style="width: 300px" scope="col">Taller inscrito</th>';
			echo'	<th  style="width:400px" scope="col">Sesión</th>';
			echo'	<th  style="width:400px" scope="col">Ejercicio</th>';
			echo'	<th style="width: 400px" scope="col">Proced.Tens</th>';
			echo'	<th  style="width:400px" scope="col">Proced.Us</th>';
			echo'	<th style="width: 400px" scope="col">Proced.CHC</th>';
			echo'	<th  style="width:400px" scope="col">Proced.IR</th>';
			echo'	<th  style="width:250px" scope="col">Sala</th>';
			echo'	<th  style="width:250px" scope="col">Profesional</th>';

			echo	'</tr>';
			
			echo'</table>';

		}
	}
?>



