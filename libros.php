<?php
//incluir encabezado html
	require_once ('encabezado.php');
	
	require_once('conexion.php');

	$conexion = mysqli_connect($configuracion['servidor'], $configuracion['libro'], $configuracion['contrasena'], $configuracion['base_datos']);

	if(!$conexion){
		die("Error de Conexion a la base de datos". mysqli_connect_error());
	}

	$consulta = mysqli_query($conexion, "SELECT * FROM libro");
	$libros = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
?>
<div class="container-fluid">
	<h2 class="text-center">Listar libros</h2>
	<a href="crear_libro.php" class="btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Añadir Nuevo Libro</a>
	<table class="table table-bordered table-striped">
		<tr>
			<th class="text-center">id</th>
			<th class="text-center">Nombre</th>
			<th class="text-center">Editorial</th>
			<th class="text-center">Fecha creacion</th>
			<th class="text-center">Numero de paginas</th>
			<th class="text-center">Adjunto libro</th>
			<th class="text-center">Opciones</th>
		</tr>
		<?php foreach ($libros as $libro): ?>
			<tr>
				<td class="text-center"><?php echo $libro['id'];?></td>
				<td class="text-center"><?php echo $libro['nombre']; ?></td>
				<td class="text-center"><?php echo $libro['editorial']; ?></td>
				<td class="text-center"><?php echo $libro['fecha_creacion']; ?></td>
				<td class="text-center"><?php echo $libro['numero_paginas']; ?></td>
				<td class="text-center"><?php echo $libro['genero']; ?></td>
				<td class="text-center"><img src="adjunto_libro/<?php echo $libro['adjunto_libro'];?>" class="img-responsive" width="10%" >
				</td>
				<td class="text-center">
					<a href="ver_libro.php?id='<?php $libro['id'] ?>"  class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></a>
					<a href="editar_libro.php?id='<?php $libro['id'] ?>" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>
					<a href="eliminar_libro.php?id='<?php $libro['id'] ?>" class="btn btn-danger" onclick="return confirm('esta seguro de eliminar este registro')" ><i class="fa fa-trash" aria-hidden="true"></i></a>
				</td>
			</tr>
		<?php endforeach;?>
			
	</table>
</div>
<?php
	//incluir pie de pagina
	require_once ('pie_pagina.php');
?>