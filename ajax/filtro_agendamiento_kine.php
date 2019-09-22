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
		$sWhere.= " and fecha_kin like '%$q%' ";
			
		}
		
		$sWhere.=" order by fecha_kin asc";
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
		$reload = './mostrar_agendamiento_kine.php';
		//main query to fetch the data
		$sql="SELECT alumnos.id_alumno,alumnos.run_alumno,alumnos.nom_alumno,alumnos.edad,alumnos.telefono,fecha_kin,hora_kine,atencion_kine,observacion_kine,estado_kine,ejercicio_kine,proced_tens_kine,proced_us_kine,proced_chc_kine,proced_ir_kine,sesion_kine,salas.id_sala,salas.nom_sala,
        talleres.nom_taller,talleres.id_taller,profesionales.nom_profesional,profesionales.id_profesional    
        FROM  $sTable 
        inner join talleres on(agen_kinesiologia.id_taller=talleres.id_taller)
        inner join alumnos on(agen_kinesiologia.id_alumno=alumnos.id_alumno)
        inner join salas on(agen_kinesiologia.id_sala=salas.id_sala)
		inner join profesionales on(agen_kinesiologia.id_profesional=profesionales.id_profesional) 

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
                    <th style="width: 400px" scope="col">Atención</th>
                    <th style="width: 400px" scope="col">Observación</th>
                    <th  style="width:400px" scope="col">Estado</th>
                    <th style="width: 300px" scope="col">Taller inscrito</th>
                    <th  style="width:400px" scope="col">Sesión</th>
                    <th style="width: 400px" scope="col">Proced.Tens</th>
                    <th  style="width:400px" scope="col">Proced.Us</th>
                    <th style="width: 400px" scope="col">Proced.CHC</th>
                    <th  style="width:400px" scope="col">Proced.IR</th>
                    <th  style="width:250px" scope="col">Sala</th>
					<th  style="width:250px" scope="col">Profesional</th>

				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$fecha=$row['fecha_kin'];
						$hora=$row['hora_kine'];
						$nom_alumno=$row['nom_alumno'];
                        $run=$row['run_alumno'];
                        $edad=$row['edad'];
                        $telefono=$row['telefono'];
                        $atencion=$row['atencion_kine'];
                        $observacion=$row['observacion_kine'];
                        $estado=$row['estado_kine'];
                        $taller=$row['nom_taller'];
                        $sesion=$row['sesion_kine'];
                        $proced_tens=$row['proced_tens_kine'];
                        $proced_us=$row['proced_us_kine'];
                        $proced_chc=$row['proced_chc_kine'];
                        $proced_ir=$row['proced_ir_kine'];
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
						<td><?php echo ($atencion);?></td>
                        <td><?php echo ($observacion);?></td>
                        <td><?php echo ($estado);?></td>
                        <td><?php echo ($taller); ?></td>
						<td><?php echo ($sesion);?></td>
                        <td><?php echo ($proced_tens);?></td>
						<td><?php echo ($proced_us); ?></td>
                        <td><?php echo ($proced_chc);?></td>
                        <td><?php echo ($proced_ir);?></td>
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
            echo '       <th style="width: 400px" scope="col">Atencion</th>';
			echo '       <th  style="width:400px" scope="col">Observación</th>';
			echo  '      <th  style="width:400px" scope="col">Estado</th>';
			echo '      <th style="width: 300px" scope="col">Taller inscrito</th>';
			echo '		<th style="width: 300px" scope="col">Sesión</th>';
			echo '       <th  style="width:400px" scope="col">Proced.Tens</th>';
			echo '      <th style="width: 300px" scope="col">Proced.Us</th>';
			echo '		<th style="width: 300px" scope="col">Proced.CHC</th>';
            echo  '      <th  style="width:400px" scope="col">Proced.IR</th>';
            echo  '      <th  style="width:250px" scope="col">Sala</th>';
			echo	'	<th  style="width:250px" scope="col">Profesional</th>';

			echo	'</tr>';
			
			echo'</table>';

		}
	}
?>




