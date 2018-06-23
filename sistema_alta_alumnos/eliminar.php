<?php 
# conexion a la base de datos
	include_once 'bdalumnos.php';
	# se obtiene el id del registro seleccionado
	$id = $_GET['id'];
	# se realiza el query para borar los registros del id
	$sentencia = $base_de_datos -> prepare("DELETE FROM alumnos WHERE id = ?");
	# se ejecuta el query y se guarda el resultado
	$resultado = $sentencia -> execute([$id]);
	if ($resultado) {
		# si se elimino correctamente
		header('Location: listaAlumnos.php');
	}
 ?>