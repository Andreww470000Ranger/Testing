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
<a href="Inicio.html">Regresar al inicio.</a>

	<table border="1" >
		<tr>
			<td class="Arriba">Marca del producto</td>
			<td class="Arriba">Nombre del producto</td>
			<td class="Arriba">Tipo de producto</td>
			<td class="Arriba">Precio del producto</td>
			<td class="Arriba">Cantidad del producto</td>
			<td class="Arriba">Comprador</td>	
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
		$sql="SELECT * from ventas";
		$result=mysqli_query($conectar,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['Marca'] ?></td>
			<td><?php echo $mostrar['Producto'] ?></td>
			<td><?php echo $mostrar['Tipo'] ?></td>
			<td><?php echo $mostrar['Precio'] ?></td>
			<td><?php echo $mostrar['Cantidad'] ?></td>
			<td><?php echo $mostrar['Comprador'] ?></td>
		</tr>
	<?php 
	}
	 ?>
	</table>

</body>
</html>