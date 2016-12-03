<?php
require_once('encabezado.php');

//resibir variables del formulario
if(isset($_POST['email']) && isset($_POST['contrasena']))
{
	$email = $_POST['email'];
	$contrasena = sha1($_POST['contrasena']);

	//incluir archivos de configuracion de la base de datos 
	require_once('conexion.php');
	$consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE  email = '$email' AND contrasena = '$contrasena'");
	$usuario = mysqli_fetch_array($consulta);
	if(mysqli_num_rows($consulta))
	{
		session_start();
		$_SESSION['email'] = $usuario['email'];
		$_SESSION['nombre'] = $usuario['nombre'];
		$_SESSION['apellido'] = $usuario['apellido'];
		$_SESSION['id'] = $usuario['id'];
		$login = 1;
		header("location: listar_usuarios.php?login=".$login);
	}
	else
	{
		?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>
			<strong>Alerta</strong> El usuario y la contraseña no coiciden, por favor intentelo de nuevo ...
			
		</div>
		<?php
	}
}
	
?>
<div class="container-fluid">
	<div class="col-md-2"></div>
	<form action="iniciar_sesion.php" method="POST" class="text-center col-md-8">
		<legend>Iniciar Sesion</legend>
		<?php
			if(isset($_GET['login']))
			{
	   		 ?>
      			<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>
					<strong>Alerta</strong> Has finalizado sesion corectamente
				</div>
			 <?php	
			}		
			 ?>
			<div class="form-group">
				<label for="">Correo electrónico</label>
				<input type="emial" name="email" class="form-control"  placeholder="Ingrese correo electrónico" required="">
		    </div>
			<div class="form-group">
				<label for="">Contraseña</label>
				<input type="password" name="contrasena" class="form-control"  placeholder="Ingrese la Contraseña" required="">
			</div>
			<button type="submit" class="btn btn-primary">Iniciar Sesion</button>
	</form>
</div>
<?php
	require_once('pie_pagina.php');
?>
