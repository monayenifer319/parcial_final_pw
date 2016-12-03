<?php
require_once ('configuracion.php');
	$conexion = mysqli_connect($configuracion['servidor'], $configuracion['libro'],$configuracion['contrasena'],$configuracion['base_datos']);
if(!$conexion)
		{
			die("Error de conexion a la  base_datos:". mysqli_connect_error());
		}
?>