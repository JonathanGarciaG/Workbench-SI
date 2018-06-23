<!DOCTYPE html>
<html>
<head>
	<title>Alumnos</title>\
	<?php 
	# Hacemos la conexion a la base de datos
		include_once 'bdalumnos.php';
		#obtenemos el id y realizamos una consulta para obtener los registros
		$id=$_GET['id'];
		$sentencia = "SELECT * FROM alumnos WHERE id =".$id;?>
</head>
<body>
	<form method="post" action="<?php echo 'actualizarDatos.php?id='.$id;?>">
	
	<?php
	#se realiza ep formulario en donde insertamos en los input los datos del registro
		foreach ($base_de_datos ->query($sentencia) as $row ) {?>
			<label>Nombre:</label>
			<input type="text" name="nombre" value="<?php echo $row['nombre'];?>"><br>
			<label>Apellidos:</label>
			<input type="text" name="apellidos" value="<?php echo $row['apellidos'];?>"><br>
			<label>Matricula:</label>
			<input type="text" name="matricula" value="<?php echo $row['matricula'];?>"><br>
			<label>Email:</label>
			<input type="text" name="email" value="<?php echo $row['email'];?>"><br>
			<label>Carrera:</label>
			<input type="text" name="carrera" value="<?php echo $row['carrera'];?>"><br>
			<label>Grupo:</label>
			<input type="text" name="grupo" value="<?php echo $row['grupo'];?>"><br>
			<label>Telefono:</label>
			<input type="text" name="telefono" value="<?php echo $row['telefono'];?>"><br>
			<button type="submit" value="Actualizar">Actualizar</button><!--boton para actualizar los datos con actualizarDatos.php-->
		</form>
	<?php		 
		}
 	?>
</body>
</html>
