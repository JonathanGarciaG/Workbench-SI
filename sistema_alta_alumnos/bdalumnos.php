<?php 
 # declaramos las variables y les asignamos los datos de nuestra base de datos
$contraseña = ""; 
$usuario = "root";
$nombre_base_de_datos = "bdalumnos";
try{
	#esta es sentencia de conexion, en ella se concatena los datos para ingresar a la base de datos
	$base_de_datos = new PDO('mysql:host=localhost;dbname='. $nombre_base_de_datos, $usuario, $contraseña); 
}catch(Exception $e){
	echo "Ocurrio algo con la base de datos" . $e->getMessage(); #en caso de haber un error el try catch mostrara el mensaje
}
 ?>
