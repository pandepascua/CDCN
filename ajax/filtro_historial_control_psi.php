<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
?>

<?php
			
$action='ajax';
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		  $sTable = "asis_control_psi_ing";
		 $sWhere = "";
		 $sWhere.="WHERE id_asistencia_psico<=1000";
		if ( $_GET['q'] != "" )
		{
		$sWhere.= " and run_alumno like '%$q%' or nom_alumno like '%$q%' ";
			
		}
		
		$sWhere.=" order by hora_psico asc";
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
		$reload = './mostrar_agendamiento_psico.php';
		//main query to fetch the data
		$sql="SELECT id_agen_psico,run_alumno,nom_alumno,edad,telefono,correo,
        talleres.nom_taller,talleres.id_taller,tipo_asistencia.id_tipo_asis,tipo_asistencia.tipo_asis,fecha_psico,hora_psico,diagnostico,sesion,salas.id_sala,salas.nom_sala,profesionales.nom_profesional,profesionales.id_profesional  
        FROM  $sTable 
		inner join tipo_asistencia on(asis_control_psi_ing.id_tipo_asis=tipo_asistencia.id_tipo_asis)
        inner join talleres on(asis_control_psi_ing.id_taller=talleres.id_taller)
        inner join salas on(asis_control_psi_ing.id_sala=salas.id_sala)
        inner join profesionales on(asis_control_psi_ing.id_profesional=profesionales.id_profesional) 

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
                    <th  style="width:400px" scope="col">Diagnóstico</th>
					<th style="width: 300px" scope="col">Taller inscrito</th>
					<th style="width: 300px" scope="col">Sesión</th>
                    <th  style="width:250px" scope="col">Sala</th>
					<th  style="width:250px" scope="col">Profesional</th>

				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id=$row['id_agen_psico'];
						$tipo_asis=$row['tipo_asis'];
						$fecha=$row['fecha_psico'];
						$hora=$row['hora_psico'];
						$nom_alumno=$row['nom_alumno'];
                        $run=$row['run_alumno'];
                        $edad=$row['edad'];
						$telefono=$row['telefono'];
						$correo=$row['correo'];
						$sesion=$row['sesion'];
                        $diagnostico=$row['diagnostico'];
                        $taller=$row['nom_taller'];
						$sala=$row['nom_sala'];
						$profesional=$row['nom_profesional'];

		
		
		
					?>
					<tr>
					<td width="10px"> <?php echo ($id);?></td>

					<td width="400px">  <?php echo($tipo_asis)?> </td>
						<td width="250px"><?php echo ($fecha);?></td>
						<td><?php echo ($hora);?></td>
						<td><?php echo ($nom_alumno);?></td>
						<td><?php echo ($run);?></td>
                        <td><?php echo ($edad); ?></td>
						<td><?php echo ($telefono);?></td>
						<td width="400px"><?php echo ($correo);?></td>

						<td><?php echo ($diagnostico); ?></td>
						<td><?php echo ($taller);?></td>
						<td><?php echo ($sesion);?></td>
						<td><?php echo ($sala);?></td>
						<td><?php echo ($profesional);?></td>

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
			echo '<script> alert("run o nombre no encontrado.")</script>';
			echo "Datos no existentes!";
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



