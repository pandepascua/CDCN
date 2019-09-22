<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
?>

<?php
			
$action='ajax';
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		  $sTable = "talleres";
		 $sWhere = "";
		 $sWhere.="WHERE id_taller<=1000";
		if ( $_GET['q'] != "" )
		{
		$sWhere.= " and nom_taller like '%$q%' or recinto like '%$q%' ";
			
		}
		
		$sWhere.=" order by id_taller asc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 200; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './buscar.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive ">
			<table class="table table-hover" style="border-color: #A6DAEA;">
				<tr style="color: #000000; background-color: #A6DAEA; border-color: #A6DAEA;">
					<th>ID</th>
					<th>NOMBRE TALLER</th>
					<th>RECINTO</th>
					<th>DESCRIPCION</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id=$row['id_taller'];
						$nombre=$row['nom_taller'];
						$recinto=$row['recinto'];
						$descripcion=$row['descripcion'];
		
					?>
					<tr>
						<td><?php echo ($id); ?></td>
						<td><?php echo ($nombre);?></td>
						<td><?php echo ($recinto);?></td>
						<td><?php echo ($descripcion); ?></td>	
						</td>					
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
		}
	}
?>