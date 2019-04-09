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
	$Marca=$_POST['Marca'];
	$Producto=$_POST['Producto'];
	$Tipo=$_POST['Tip'];
	$Precio=$_POST['Precio'];
	$Cantidad=$_POST['Canti'];
	$Comprador=$_POST['Vendido'];

	//hacemos la sentencia de sql
	$sql="INSERT INTO ventas VALUES('$Marca','$Producto','$Tipo','$Precio','$Cantidad','$Comprador')";
	//ejecutamos la sentencia de sql
	$ejecutar=mysqli_query($conectar,$sql);
	//verificamos la ejecucion
	if(!$ejecutar){
		echo"Hubo Algun Error";
	}else{
		echo"Datos Guardados Correctamente<br><a href='Ventas.html'>Volver</a>";
	}
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>mostrar datos</title>
	<link rel="stylesheet" href="CSS/style.css">

</head>
<body>

<br>

	<table border="1" >
		<tr>
			<td>Marca del producto</td>
			<td>Nombre del producto</td>
			<td>Tipo de producto</td>
			<td>Precio del producto</td>
			<td>Cantidad del producto</td>
			<td>Comprador</td>	
		</tr>

		<?php 
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