<?php

$nombre_libro = $_POST['nomre_libro'];
$editorial = $_POST['editorial'];
$fecha_creacion = $_POST['fecha_creacion'];
$numero_paginas = $_POST['numero_paginas'];
$genero = $_POST['genero'];
$id = $_POST['id'];

require_once('configuracion.php');
require_once('conexion.php');

//consulta a la base de datos para ediar un usuario
$editar = mysqli_query($conexion, "UPDATE libro SET nombre_libro = '$nombre_libro', editorial = '$editorial', fecha_creacion = '$fecha_creacion', numero_paginas = '$numero_paginas', genero = '$genero' WHERE id = '$id' ");

$consulta = mysqli_affected_rows($conexion);
//redirigir a la pagina listar usuario
header("lacation: libros.php?consulta=".$consulta);


?>
