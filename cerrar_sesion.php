<?php
session_start();
session_destroy();
$login = 0;
header("Location: iniciar_sesion.php?login=".$login);
?>