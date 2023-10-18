<?php
	// IMPORTANTE
	require_once('estaticos.php');
	global $configuracion;
	
	// CONEXION MYSQL
	$conexion = mysqli_connect($configuracion['servidor'], $configuracion['usuario'], $configuracion['contrasena'], $configuracion['base_datos']);
	if(!$conexion){ die("Error de Conexion: ". mysqli_connect_error()); }
	
	mysqli_set_charset($conexion, "utf8");
?>