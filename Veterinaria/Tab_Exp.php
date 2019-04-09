<?php
	//conectamos Con el servidor
	$conectar=@mysqli_connect('localhost','root','','Veterinaria');
	//verificamos la conexion
	if(!$conectar){
		echo"No Se Pudo Conectar Con El Servidor";
	}else{

		$base=mysqli_select_db($conectar,'Veterinaria');
		if(!$base){
			echo"No Se Encontro La Base De Datos";			
		}
	} 
	//recuperar las variables
	$Nombre=$_POST['Nom_'];
	$Apellido=$_POST['Ape_'];
	$Raza=$_POST['Raz_'];
	$Fecha=$_POST['Fech'];
	$Propietario=$_POST['Prop'];
	$Accion=$_POST['Acc_'];
	
	//hacemos la sentencia de sql
	$sql="INSERT INTO expediente VALUES('$Nombre','$Apellido','$Raza','$Fecha','$Propietario','$Accion')";
	//ejecutamos la sentencia de sql
	$ejecutar=mysqli_query($conectar,$sql);
	//verificamos la ejecucion
	if(!$ejecutar){
		echo"Hubo Algun Error";
	}else{
		echo"Datos Guardados Correctamente<br><a href='Inicio.html'>Ir al Inicio</a>";
		echo"<br><a href='Expediente.php'>Buscar expedientes</a>";
	}
	
	
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>mostrar datos</title>
	<link rel="stylesheet" href="CSS/style.css">
	<style type="text/css">
		a{
			color: white;
		}
	</style>
</head>
<body>

<br>

	<table border="1" >
		<tr>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Raza</td>
			<td>Fecha</td>
			<td>Prpietario</td>
			<td>Acción</td>	
		</tr>

		<?php 
		$sql="SELECT * from expediente";
		$result=mysqli_query($conectar,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['Nombre'] ?></td>
			<td><?php echo $mostrar['Apellidos'] ?></td>
			<td><?php echo $mostrar['Raza'] ?></td>
			<td><?php echo $mostrar['Fecha'] ?></td>
			<td><?php echo $mostrar['Propietario'] ?></td>
			<td><?php echo $mostrar['Accion'] ?></td>
		</tr>
	<?php 
	}
	 ?>
	</table>

</body>
</html>