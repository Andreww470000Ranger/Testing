<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<title>Busqueda</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
				<div class="row">
				<?php
 					$connection = mysqli_connect('localhost','root','','Veterinaria');
 					if(isset($_POST['search'])) {
 						$searchKey = $_POST['search'];
 						$sql = "SELECT * FROM expediente WHERE Nombre LIKE '%$searchKey%'";

 					}else{
 						$sql = "SELECT * FROM expediente";
 						$searchKey = "";
 					}
 					

 					$result = mysqli_query($connection,$sql);
				?>
				<form action="" method="POST"> 
					<div class="col-md-6">
						<input type="text" name="search" class='form-control' placeholder="Buscar por nombre de mascota" value="<?php echo $searchKey; ?>" > 
					</div>
					<div class="col-md-6 text-left">
						<button class="btn">Buscar</button>
					</div>
				</form>

				<br>
				<br>
				</div>
				<table class="table table-bordered">
					<tr>  
						<th>Nombre de la mascota</th>
						<th>Apellido de la mascota</th>
						<th>Propietario</th>
						<th>Fecha</th>
						<th>Ultima acción realizada</th>
						<th>Raza</th>
					</tr>
					<?php while($row = mysqli_fetch_object($result)) { ?>
					<tr>
						<td><?php echo $row->Nombre ?></td>
						<td><?php echo $row->Apellidos ?></td>
						<td><?php echo $row->Propietario ?></td>
						<td><?php echo $row->Fecha ?></td>
						<td><?php echo $row->Accion ?></td>
						<td><?php echo $row->Raza ?></td>
					</tr>
				    <?php } ?>
				</table>
			</div>
		</div>
	</div>
	<a href="Tab_Exp.php"><button>Ver tabla de expedientes.</button></a>
</body>
</html>