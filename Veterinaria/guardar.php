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
	$Nombre=$_POST['Nombre'];
	$Genero=$_POST['Genero'];
	$Raza=$_POST['Raza'];
	$Tipo=$_POST['Tipo'];
	$Colores=$_POST['Colores'];
	$Correo=$_POST['Cor'];
	$Telefono=$_POST['Tel'];
	$Direccion=$_POST['Dir'];
	$Propietario=$_POST['Propietario'];

	//hacemos la sentencia de sql
	$sql="INSERT INTO Registro VALUES('$Nombre','$Genero','$Raza','$Tipo','$Colores','$Correo','$Telefono','$Direccion','$Propietario')";
	//ejecutamos la sentencia de sql
	$ejecutar=mysqli_query($conectar,$sql);
	//verificamos la ejecucion
	if(!$ejecutar){
		echo"Hubo Algun Error";
	}else{
		echo"Datos Guardados Correctamente<br><a href='Inicio.html'>Volver</a>";
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
			<td>Genero</td>
			<td>Raza</td>
			<td>Tipo</td>
			<td>Colores</td>
			<td>Correo</td>
			<td>Telefono</td>
			<td>Direccion</td>
			<td>Propietario</td>	
		</tr>

		<?php 
		$sql="SELECT * from Registro";
		$result=mysqli_query($conectar,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['Nombre'] ?></td>
			<td><?php echo $mostrar['Genero'] ?></td>
			<td><?php echo $mostrar['Raza'] ?></td>
			<td><?php echo $mostrar['Tipo'] ?></td>
			<td><?php echo $mostrar['Colores'] ?></td>
			<td><?php echo $mostrar['Correo'] ?></td>
			<td><?php echo $mostrar['Telefono'] ?></td>
			<td><?php echo $mostrar['Direccion'] ?></td>
			<td><?php echo $mostrar['Propietario'] ?></td>
		</tr>
	<?php 
	}
	 ?>
	</table>

</body>
</html>