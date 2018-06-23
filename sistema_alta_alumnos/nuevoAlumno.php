<?php 

# con una condicion se verifica si se encuentran los valores tomados con el metodo post
if (!isset($_POST["nombre"]) || !isset($_POST["apellidos"]) || !isset($_POST["matricula"])) exit();
 
   # importamos el archivo bdalumnos.php que hace la conexion a la base de datos
	include_once "bdalumnos.php";
   
   # guardamos en variables los valores tomados con el metodo post del formulario
   $nombre = $_POST["nombre"];
   $apellidos = $_POST["apellidos"];
   $matricula = $_POST["matricula"];
   $email = $_POST["email"];
   $carrera = $_POST["carrera"];
   $grupo = $_POST["grupo"];
   $telefono = $_POST["telefono"];
   # definimos la variable sentencia que tendra el insert que insertara los valores de las variables con un query a la base de datos
   $sentencia = $base_de_datos->prepare("INSERT INTO alumnos(nombre, apellidos, matricula, email, carrera, grupo, telefono) VALUES (?, ?, ?, ?, ?, ?, ?);");
   # a la sentencia le asignamos los valores de las variable y se ejecuta
   $resultado = $sentencia->execute([$nombre, $apellidos, $matricula, $email, $carrera, $grupo, $telefono]);

   # con esta condicion se verifica si el resultado de la sentencia se ejecuto correctamente
   if ($resultado === TRUE) {
   	echo "<b>Insertado correctamente</b>";# en caso verdadero muestra el mensaje
   }else{
   	echo "Algo salio mal. por favor verifica que la tabla exista";# en caso contrario muestra este mensaje
   }
   ?>