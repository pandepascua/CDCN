<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
?>

<?php
			
$action='ajax';
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		  $sTable = "agen_nutricion";
		 $sWhere = "";
		 $sWhere.="WHERE id_agen_nutricion<=1000";
		if ( $_GET['q'] != "" )
		{
		$sWhere.= " and fecha_nutricion like '%$q%' ";
			
		}
		
		$sWhere.=" order by fecha_nutricion asc";
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
		$reload = './buscar_nutricion.php';
		//main query to fetch the data
		$sql="SELECT alumnos.id_alumno,alumnos.run_alumno,alumnos.nom_alumno,alumnos.edad,alumnos.telefono,
        talleres.nom_taller,alumnos.id_taller,fecha_nutricion,hora_nutricion,motivo_consulta_nut,alumnos.correo,sesion,diagnostico_nut,observacion_nut,salas.id_sala,salas.nom_sala,profesionales.nom_profesional,profesionales.id_profesional    
        FROM  $sTable 
        inner join talleres on(agen_nutricion.id_taller=talleres.id_taller)
        inner join alumnos on(agen_nutricion.id_alumno=alumnos.id_alumno)
        inner join salas on(agen_nutricion.id_sala=salas.id_sala)
		inner join profesionales on(agen_nutricion.id_profesional=profesionales.id_profesional) 

        $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive ">
			<table class="table table-hover" style="border-color: #A6DAEA;">
				<tr style="color: #000000; background-color: #A6DAEA; border-color: #A6DAEA;">
                    <th style="width: 100px" scope="col">Fecha</th>
                    <th  style="width:100px" scope="col">Hora</th>
                    <th style="width: 300px" scope="col">Nombre</th>
                    <th  style="width:300px" scope="col">Rut</th>
                    <th style="width: 100px" scope="col">Edad</th>
                    <th  style="width:200px" scope="col">Teléfono</th>
					<th style="width: 400px" scope="col">Motivo de consulta</th>
					<th style="width: 400px" scope="col">Sesión</th>

                    <th  style="width:400px" scope="col">Diagnóstico</th>
					<th  style="width:400px" scope="col">Correo</th>

                    <th style="width: 300px" scope="col">Taller inscrito</th>
                    <th  style="width:400px" scope="col">Observación</th>
                    <th  style="width:250px" scope="col">Sala</th>
					<th  style="width:250px" scope="col">Profesional</th>

				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$fecha=$row['fecha_nutricion'];
						$hora=$row['hora_nutricion'];
						$nom_alumno=$row['nom_alumno'];
                        $run=$row['run_alumno'];
                        $edad=$row['edad'];
						$telefono=$row['telefono'];
						$motivo=$row['motivo_consulta_nut'];
						$sesion=$row['sesion'];
                        $diagnostico=$row['diagnostico_nut'];
                        $correo=$row['correo'];

						$taller=$row['nom_taller'];
						$observacion=$row['observacion_nut'];
						$sala=$row['nom_sala'];
						$prof=$row['nom_profesional'];

		
					
					?>
					<tr>
						<td><?php echo ($fecha); ?></td>
						<td><?php echo ($hora);?></td>
						<td><?php echo ($nom_alumno);?></td>
						<td><?php echo ($run); ?></td>
                        <td><?php echo ($edad); ?></td>
						<td><?php echo ($telefono);?></td>
						<td><?php echo ($motivo);?></td>
						<td><?php echo ($sesion);?></td>
						<td><?php echo ($diagnostico); ?></td>
						<td><?php echo ($correo); ?></td>

                        <td><?php echo ($taller); ?></td>
						<td><?php echo ($observacion);?></td>
						<td><?php echo ($sala);?></td>
						<td><?php echo ($prof);?></td>

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
			echo '<script> alert("Fecha disponible para agendar.")</script>';
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
			echo '		<th style="width: 300px" scope="col">Sesión</th>';
			echo '       <th  style="width:400px" scope="col">Diagnóstico</th>';
			echo '       <th  style="width:400px" scope="col">Correo</th>';

			echo '      <th style="width: 300px" scope="col">Taller inscrito</th>';

            echo  '      <th  style="width:400px" scope="col">Observación</th>';
            echo  '      <th  style="width:250px" scope="col">Sala</th>';
			echo	'	<th  style="width:250px" scope="col">Profesional</th>';

			echo	'</tr>';
			
			echo'</table>';
		}
	}
?>