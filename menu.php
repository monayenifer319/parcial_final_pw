<nav class="navbar navbar-default " role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" 	
				<span class="sr-only">toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
								
			</button>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
				<?php 
					session_start();
					if(!empty($_SESSION['email']))
					{
				?>
							</a></li>
							<li><a href="listar_usuarios.php"><i class="fa fa-users" aria-hidden="true"></i>
								Usuarios</a></li>
							<li><a href="libros.php"><i class="fa fa-tags" aria-hidden="true"></i>
								Productos</a></li>
							<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i>
							 <?php echo "usuario".$_SESSION['nombre']." ".$_SESSION['apellido'];
							 ?>
							<b class="caret"></b></a>
							<ul class="dropdown-menu">
									<li><a href="">Perfil</a></li>
									<li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
							</ul>
					   </li>
				<?php
					}
					else
					{
					?>
						<li class="cative"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Index</a></li>
						<li><a href="crear_usuario.php"><i class="fa fa-edit" aria-hidden="true"></i>Registrarse</a></li>
						<li ><a href="iniciar_sesion.php"><i class="fa fa-rocket" aria-hidden="true"></i>Iniciar sesion</a></li>
					<?php
					}
				?> 		
		  </ul>
		</div>
	</div>
</nav>