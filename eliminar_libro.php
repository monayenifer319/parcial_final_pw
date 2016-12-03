<?php 

$id = $_GET['id'];
require_once('conexion.php');

$eliminar = mysqli_query($conexion, "DELETE FROM libro WHERE id = '$id'");
$eliminado = mysqli_affected_rows($conexion);
header('Location: libros.php?eliminado' .$eliminado);


?>