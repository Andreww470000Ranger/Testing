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
<a href="Inicio.html">Regresar al inicio</a>
<br>
 
	<table border="1" >
		<tr>
			<td class="Arriba">Nombre</td>
			<td class="Arriba">Genero</td>
			<td class="Arriba">Raza</td>
			<td class="Arriba">Tipo</td>
			<td class="Arriba">Colores</td>
			<td class="Arriba">Propietario</td>
			<td class="Arriba">Correo</td>
			<td class="Arriba">Teléfono</td>
			<td class="Arriba">Dirección</td>	
		</tr>

		<?php 
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