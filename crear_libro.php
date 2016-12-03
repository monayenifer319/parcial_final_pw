<?php
//incluir encabezado html
	require_once ('encabezado.php');

	// validar si las variables estan inicializadas

	if (isset($_POST['nombre'])
		&& isset($_POST['editorial'
			])
		&& isset($_POST['fecha_creacion'])
		&& isset($_POST['usuarios_id'
			])
		&& isset($_POST['numero_paginas'])
		&& isset($_FILES['genero'])
		&& isset($_FILES['adjunto_libro'])
		) 

	{
		$nombre_libro = $_POST['nombre'];
		$editorial = $_POST['editorial'];
		$fecha_creacion = $_POST['fecha_creacion'];
		$usuarios_id = $_POST['usuarios_id'];
		$numero_paginas = $_POST['numero_paginas'];
		$genero = $_POST['genero'];
		$adjunto_libro = $_FILES['adjunto_libro']['name'];
		$carpeta = "adjunto_libro";
		$direccion = $carpeta.basename($adjunto_libro);

		if(move_uploaded_file($_FILES['adjunto_libro']['tmp_name'], $direccion))
		{
			require_once('conexion.php');
			$insertar = mysqli_query($conexion, "INSERT INTO libro(nombre, editorial, fecha_creacion, usuarios_id, numero_paginas, genero, adjunto_libro) values('$nombre', '$editorial', '$fecha_creacion', '$usuarios_id', '$numero_paginas', '$genero', '$adjunto_libro')");
				$consulta = mysqli_affected_rows($conexion);
				if($consulta == 1)
				{
					?>
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>
							<strong>Alerta</strong> El libro fue registrado con exito.
					
						</div>
					<?php 
				}
				else
				{
					?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>
							<strong>Alerta</strong> El libro no pudo ser registrado, intentelo de nuevo...
						</div>
					<?php
				}
		}	
		else
		{
			?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>
					<strong>Alerta</strong> El agjunto del libro no pudo ser procesado, intentelo de nuevo...
				</div>
			<?php
		}	
	}
	
?>

<div class="container">
	<h2 class="text-center">Añadir Nuevo libro</h2>
	<div class="row">
		<div class="col-md-2"></div>
		<form action="crear_libro.php" class="col-md-8" method="POST" enctype="  multipart/form-data">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre del libro" required="">
			</div>
			<div class="form-group">
				<label for="nombre">Editorial</label>
				<input type="text" name="editorial" class="form-control" placeholder="Ingrese el editorial" required="">
			</div>
			<div class="form-group">
				<label for="nombre">Fecha creacion</label>
				<input type="date" name="fecha_registro" class="form-control" placeholder="Ingrese fecha de creacion" required="">
			</div>
			<input type="hidden" name="usuarios_id" value="<?php echo $_SESSION['id']; ?>">
			<div class="form-group">
				<label for="nombre">Numero de paginas</label>
				<input type="number" name="numero_paginas" class="form-control" placeholder="Ingrese el numero de paginas" required="">
			</div>
			<div class="form-group">
				<label for="nombre">genero</label>
				<input type="text" name="genero" class="form-control" placeholder="Ingrese el genero del libro" required="">
			</div>
			<div class="form-group">
				<label for="nombre">Adjunto libro</label>
				<input type="file" name="adjunto_libro" class="form-control" required="">
			</div>
			<dir class="text-center">
				<button type="submit" class="btn btn-primary">Añadir libro</button>
				<a href="libros.php" class="btn btn-success">Volver Atrás</a>
				
			</dir>
		</form>
	</div>
</div>
<?php
	//incluir pie de pagina
	require_once ('pie_pagina.php');
?>