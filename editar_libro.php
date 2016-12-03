<?php
//incluir encabezado html
	require_once ('encabezado.php');
	$id = $_GET['id'];
	require_once('conexion.php');
		$consulta = mysqli_query($conexion, "SELECT * FROM libro WHERE id = $id");
		$libro = mysqli_fetch_array($consulta);
		if(mysqli_num_rows($consulta)):

?>
	<div class="container">
	<h2 class="text-center">Editar libro<?php echo $libro['nombre']." ". $libro['editoral'] ?></h2>
	<div class="row">
		<div class="col-md-2"></div>
		<form action="editar_libro_post.php" method="POST" class="col-md-8">
			<input type="hidden" name="id" value=" <?php echo $libro['id']; ?>">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre del libro" required="" value="<?php echo $libro['nombre']; ?>">
			</div>
			<div class="form-group">
				<label for="nombre">Editorial</label>
				<input type="text" name="editorial" class="form-control" placeholder="Ingrese editorial" required="" value="<?php echo $libro['editorial']; ?>">
			</div>
			<div class="form-group">
				<label for="nombre">Fecha de creacion</label>
				<input type="email" name="fecha_creacion" class="form-control" placeholder="Ingrese fecha de creacion" required="" value="<?php echo $libro['fecha_creacion']; ?>">
			</div>
			<div class="form-group">
				<label for="nombre">Numero de pagina</label>
				<input type="text" name="numero_paginas" class="form-control" placeholder="Ingrese # de paginas" required="" value="<?php echo $libro['numero_paginas']; ?>">
			</div>
			<div class="form-group">
				<label for="nombre">Genero</label>
				<input type="text" name="genero" class="form-control" placeholder="Ingrese el genero" required="" value="<?php echo $libro['genero']; ?>">
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Editar libro</button>
				<a href="libros.php" class="btn btn-success">Volver Atrás</a>
				
			</div>
		</form>
	</div>
 </div>
<?php
	endif;

	//incluir pie de pagina
	require_once ('pie_pagina.php');
?>