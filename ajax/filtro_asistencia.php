<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
?>

<?php
			
$action='ajax';
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		  $sTable = "alumnos";
		 $sWhere = "";
		 $sWhere.="WHERE id_alumno<=1000";
		if ( $_GET['q'] != "" )
		{
		$sWhere.= " and alumnos.id_taller like '%$q%' ";
			
		}
		
		$sWhere.=" order by nom_alumno asc";
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
		$reload = './asistencia_alumno.php';
		//main query to fetch the data
		$sql="SELECT id_alumno,run_alumno,nom_alumno,edad,fecha_nac,telefono,nombre_apoderado,telefono_apod,direccion_alumno,comuna,patologias,correo,
        talleres.nom_taller,talleres.id_taller
        FROM  $sTable 
        inner join talleres on(alumnos.id_taller=talleres.id_taller)

        $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
            ?>

			<div class="table-responsive ">
			<table class="table table-hover" style="border-color: #A6DAEA;width:2500px; height:100px">
				<tr style="color: #000000; background-color: #A6DAEA; border-color: #A6DAEA;">
                    <th  style="width:400px" scope="col">asistencia</th>
                    <th style="width: 300px" scope="col">Nombre</th>
                    <th  style="width:300px" scope="col">Rut</th>
                    <th style="width: 100px" scope="col">Edad</th>
					<th  style="width:200px" scope="col">Fecha Nac.</th>

                    <th  style="width:200px" scope="col">Teléfono</th>
					<th  style="width:200px" scope="col">Apoderado</th>
                    <th  style="width:200px" scope="col">Teléfono apod.</th>
					<th  style="width:200px" scope="col">Correo</th>
                    <th style="width: 400px" scope="col">Dirección</th>
                    <th  style="width:400px" scope="col">Comuna</th>
                    <th style="width: 300px" scope="col">Patología</th>
                    <th  style="width:400px" scope="col">Observación</th>
                    <th  style="width:400px" scope="col">Taller inscrito</th>

				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$nom_alumno=$row['nom_alumno'];
                        $run=$row['run_alumno'];
						$edad=$row['edad'];
						$fec=$row['fecha_nac'];

						$telefono=$row['telefono'];
						$nom_ap=$row['nombre_apoderado'];
                        $fono_ap=$row['telefono_apod'];
						$correo=$row['correo'];
						$direccion=$row['direccion_alumno'];
                        $comuna=$row['comuna'];
                        $patologias=$row['patologias'];
						$taller=$row['nom_taller'];
						$id_taller=$row['id_taller'];
						$id_alumno=$row['id_alumno'];


		
		
		
					?>
                                       
                        
                      
					<tr>

   
                                                          
                       
                        <td width="300px">  <?php
                                            
                        $sentencia="select*from tipo_asistencia";
                        $resultado=mysqli_query($con,$sentencia);
                        while($filas=mysqli_fetch_assoc($resultado)){
                        echo"<input type='checkbox' name='asistencia[]' value='".$filas['id_tipo_asis']."'>";
                        echo $filas['tipo_asis'];

                        
                        }?> </td>
                          
						<td><?php echo ($nom_alumno);?></td>
						<td><?php echo ($run); echo"<input type='hidden'  name='id_alumno[]' value='".$id_alumno."'>";?></td>
                        <td><?php echo ($edad); ?></td>
						<td><?php echo ($fec); ?></td>
						<td><?php echo ($telefono);?></td>
						<td><?php echo ($nom_ap); ?></td>
						<td><?php echo ($fono_ap); ?></td>
						<td><?php echo ($correo);?></td>
						<td><?php echo ($direccion);?></td>
						<td><?php echo ($comuna); ?></td>
                        <td><?php echo ($patologias); ?></td>
						<td><?php
						echo "<input type='text' id='a_' name='observacion[]'>";
						
						?>
						</td>
						<td><?php echo ($taller); echo " <input type='hidden'name='id_taller[]' value='".$id_taller."'>";?></td>
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
			echo '<script> alert("No hay alumnos en el taller.")</script>';
			echo "NO HAY ALUMNOS EN EL TALLER SELECCIONADO!";
			echo '<table  id="tablamenu" class="table table-hover" style="width:300px; height:100px" background-color: #A6DAEA; border-color: #A6DAEA; >';
			echo '<tr style="color: #000000; background-color: #A6DAEA; border-color: #A6DAEA;">';
            echo '        <th style="width: 300px" scope="col">Asistencia</th>';
            echo '       <th  style="width:100px" scope="col">Nombre</th>';
            echo '       <th  style="width:300px" scope="col">Rut</th>';
            echo '       <th style="width: 100px" scope="col">Edad</th>';
			echo '       <th  style="width:200px" scope="col">Teléfono</th>';
			echo '      <th style="width: 300px" scope="col">Apoderado</th>';
            echo '       <th style="width: 400px" scope="col">telefono Apod.</th>';
            echo '       <th  style="width:400px" scope="col">Correo</th>';
			echo '		<th style="width: 300px" scope="col">Direccion</th>';
            echo  '      <th  style="width:250px" scope="col">Comuna</th>';
			echo	'	<th  style="width:250px" scope="col">Patología</th>';
			echo	'	<th  style="width:250px" scope="col">Observacion</th>';
			echo	'	<th  style="width:250px" scope="col">Taller </th>';



			echo	'</tr>';
			
			echo'</table>';

		}

	}
?>



