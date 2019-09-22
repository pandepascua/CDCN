<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
?>

<?php
			
$action='ajax';
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		  $sTable = "agen_acupuntura";
		 $sWhere = "";
		 $sWhere.="WHERE id_agen_acupuntura<=1000";
		if ( $_GET['q'] != "" )
		{
		$sWhere.= " and fecha_acupuntura like '%$q%' ";
			
		}
		
		$sWhere.=" order by hora_acupuntura asc";
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
		$reload = './mostrar_agendamiento_acupuntura.php';
		//main query to fetch the data
		$sql="SELECT id_agen_acupuntura,run_alumno,nom_alumno,edad,fecha_nac,telefono,nombre_apoderado,telefono_apod,direccion_alumno,comuna,correo,patologias,
        talleres.nom_taller,talleres.id_taller,fecha_acupuntura,hora_acupuntura,motivo_consulta_acupuntura,diagnostico_acupuntura,observacion_acupuntura,sesion,salas.id_sala,salas.nom_sala,profesionales.nom_profesional,profesionales.id_profesional  
        FROM  $sTable 
        inner join talleres on(agen_acupuntura.id_taller=talleres.id_taller)
        inner join salas on(agen_acupuntura.id_sala=salas.id_sala)
        inner join profesionales on(agen_acupuntura.id_profesional=profesionales.id_profesional) 

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
					<th  style="width:400px" scope="col">Correo</th>
                    <th style="width: 400px" scope="col">Motivo de consulta</th>
                    <th  style="width:400px" scope="col">Diagnóstico</th>
					<th style="width: 300px" scope="col">Taller inscrito</th>
					<th style="width: 300px" scope="col">Sesión</th>
                    <th  style="width:400px" scope="col">Observación</th>
                    <th  style="width:250px" scope="col">Sala</th>
					<th  style="width:250px" scope="col">Profesional</th>

				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id=$row['id_agen_acupuntura'];
						$fecha=$row['fecha_acupuntura'];
						$hora=$row['hora_acupuntura'];
						$nom_alumno=$row['nom_alumno'];
                        $run=$row['run_alumno'];
                        $edad=$row['edad'];
						$telefono=$row['telefono'];
						$correo=$row['correo'];
						$motivo=$row['motivo_consulta_acupuntura'];
						$sesion=$row['sesion'];
                        $diagnostico=$row['diagnostico_acupuntura'];
                        $taller=$row['nom_taller'];
                        $id_taller=$row['id_taller'];

						$observacion=$row['observacion_acupuntura'];
                        $sala=$row['nom_sala'];
                        $idsala=$row['id_sala'];
                        $profesional=$row['nom_profesional'];
                        $idprofesional=$row['id_profesional'];


		
		
		
					?>
					<tr>
					<td width="10px"> <?php echo ($id);echo"<input type='hidden'  name='id_agen_acu[]' value='".$id."'>";?></td>

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

						<td><?php echo ($motivo);echo"<input type='hidden'  name='motivo[]' value='".$motivo."'>";?></td>
						<td><?php echo ($diagnostico); echo"<input type='hidden'  name='diagnostico[]' value='".$diagnostico."'>";?></td>
						<td><?php echo ($taller);echo"<input type='hidden'  name='taller[]' value='".$id_taller."'>";?></td>
						<td><?php echo ($sesion); echo"<input type='hidden'  name='sesion[]' value='".$sesion."'>";?></td>
						<td><?php echo ($observacion);echo"<input type='hidden'  name='observacion[]' value='".$observacion."'>";?></td>
						<td><?php echo ($sala);echo"<input type='hidden'  name='sala[]' value='".$idsala."'>";?></td>
						<td><?php echo ($profesional);echo"<input type='hidden'  name='prof[]' value='".$idprofesional."'>";?></td>

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
            echo '        <th style="width: 100px" scope="col">Fecha</th>';
            echo '       <th  style="width:100px" scope="col">Hora</th>';
            echo '       <th style="width: 300px" scope="col">Nombre</th>';
            echo '       <th  style="width:300px" scope="col">Rut</th>';
            echo '       <th style="width: 100px" scope="col">Edad</th>';
            echo '       <th  style="width:200px" scope="col">Teléfono</th>';
            echo '       <th style="width: 400px" scope="col">Motivo de consulta</th>';
            echo '       <th  style="width:400px" scope="col">Diagnóstico</th>';
			echo '      <th style="width: 300px" scope="col">Taller inscrito</th>';
			echo '		<th style="width: 300px" scope="col">Sesión</th>';
            echo  '      <th  style="width:400px" scope="col">Observación</th>';
            echo  '      <th  style="width:250px" scope="col">Sala</th>';
			echo	'	<th  style="width:250px" scope="col">Profesional</th>';

			echo	'</tr>';
			
			echo'</table>';

		}
	}
?>



