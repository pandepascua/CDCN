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
		
		$sWhere.=" group by alumnos.id_taller";
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
		$sql="SELECT COUNT(nom_alumno) as cantidad_alumno,talleres.nom_taller 
        FROM  $sTable 
        alumnos inner join talleres on(alumnos.id_taller=talleres.id_taller) 

        $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive ">
			<table class="table table-hover" style="border-color: #A6DAEA;">
				<tr style="color: #000000; background-color: #A6DAEA; border-color: #A6DAEA;">
                    <th style="width: 100px" scope="col">Cantidad alumnos</th>
                    <th  style="width:100px" scope="col">Taller</th>

				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$nom=$row['cantidad_alumno'];
						$cant=$row['nom_taller'];


		
					
					?>
					<tr>
						<td><?php echo ($nom); ?></td>
						<td><?php echo ($cant);?></td>

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
			echo '<script> alert("Taller sin alumnos.")</script>';
			echo "No hay alumnos";
			echo '<table class="table table-hover" style="border-color: #A6DAEA;">';
			echo '<tr style="color: #000000; background-color: #A6DAEA; border-color: #A6DAEA;">';
            echo '        <th style="width: 100px" scope="col">Cantidad de alumnos</th>';
            echo '       <th  style="width:100px" scope="col">Taller</th>';


			echo	'</tr>';
			
			echo'</table>';
		}
	}
?>