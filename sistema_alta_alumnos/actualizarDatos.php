<?php 
	 #Incluimos el archivo bdalumnos.php para hacer la conexion a la base de datos
	include_once 'bdalumnos.php';
	 #obtenemos los datos de el registro y los almacenamos en vatiables
	$id = $_GET['id'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$matricula = $_POST['matricula'];
	$email = $_POST['email'];
	$grupo = $_POST['grupo'];
	$carrera = $_POST['carrera'];
	$telefono = $_POST['telefono'];

	 # En la sentencia realizamos el query de update para actualizar los registros de la base de datos
	$sentencia = $base_de_datos -> prepare("UPDATE alumnos SET nombre = ?,apellidos = ?,matricula = ? ,email = ?,grupo = ? ,carrera = ? ,telefono = ? WHERE id = ?");
	 # Ejecutamos y guardamos el resultado
	$resultado = $sentencia -> execute([$nombre,$apellidos,$matricula,$email,$grupo,$carrera,$telefono,$id]);

	if ($resultado) {
		# Condiciona el resultado:
		# Si el resultado me devolvio un TRUE quiere decir que la insercion de datos fue hecha correctamente
		header('Location: listaAlumnos.php');
	}else {
		# Si resultado fue FALSE la insercion de datos no fue hecha correctamente
		echo "<p>Error</p>";
	}

 ?>