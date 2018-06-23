<!DOCTYPE html>
<html>
<head>
	<title>Alumnos</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, intial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
	table, th, td {
	    border: 1px solid black;
	}
	th, td {
	    padding: 5px;
	    text-align: left;
	}
	</style>
</head>
<body>
<br>
<!--se usa un container para acomodar la lista-->
<div class="container">
<!--enlace para agregar nuevo alumno-->
	<a href="formularioAlumnos.html">Nuevo Alumno</a><br><br>
	<table class="table"><!--clase para la tabla-->
		<thead class="thead-dark"><!--clase para el encabezado de la tabla-->
			<tr>
				<th>#id</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Matricula</th>
				<th>Email</th>
				<th>Carrera</th>
				<th>Grupo</th>
				<th>Telefono</th>
				<th>Actualizar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				include_once 'bdalumnos.php';#conexion a la base de datos
				$sentencia = "SELECT * FROM alumnos ORDER BY id ASC";
				foreach ($base_de_datos->query($sentencia) as $row) {
					# Este ciclo barrera toda la tabla de la bd para mostrar los datos
					# Mostrara los datos registrados en la base de datos que se registraron
					echo "<tr><td>".$row['id']."</td>";
					echo "<td>".$row['nombre']."</td>";
					echo "<td>".$row['apellidos']."</td>";
					echo "<td>".$row['matricula']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['carrera']."</td>";
					echo "<td>".$row['grupo']."</td>";
					echo "<td>".$row['telefono']."</td>";
					echo "<td><a href='actualizar.php?id=".$row['id']."'>Actualizar</a></td>";
					echo "<td><a href='eliminar.php?id=".$row['id']."'>Eliminar</a></td></tr>";
				}
			 ?>
		</tbody>
</div>
	</table>
</body>
</html>