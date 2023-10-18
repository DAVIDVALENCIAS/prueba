<?php 
require_once('../configuracion/config.php');

if (isset($_GET["state"]) && $_GET["state"] == "listarUsuarios"){
	$select = mysqli_query($conexion,"SELECT 'opciones', usu.nombre AS nombre, usu.apellido AS apellido, usu.edad AS edad, usu.id AS id FROM usuarios usu ");
	$rUsuarios = mysqli_fetch_all($select, MYSQLI_NUM);
	for ($i = 0; $i < sizeof($rUsuarios); $i++) {
		$rUsuarios[$i][0] = '';
			$rUsuarios[$i][0] = '
			<button class="btn btn-warning modificarUsuarios" data-toggle="modal" data-target="#modificarUsuarios" data-id="'.$rUsuarios[$i][4].'" data-nombre="'.$rUsuarios[$i][1].'" data-apellido="'.$rUsuarios[$i][2].'" data-edad="'.$rUsuarios[$i][3].'"><i class="fas fa-edit"></i>Modificar</button>
			<button class="btn btn-danger eliminarUsuarios" data-toggle="modal" data-target="#eliminarUsuarios" data-id="'.$rUsuarios[$i][4].'">Eliminar</button>';
	}
	$result["data"] = $rUsuarios;
	echo json_encode($result, JSON_INVALID_UTF8_IGNORE);
    die;
}

if (isset($_POST["state"]) && $_POST["state"] == "Generar"){
	$truncar = mysqli_query($conexion,"TRUNCATE TABLE usuarios");
	$nombres = ['Juan', 'María', 'Carlos', 'Luisa', 'Ana', 'Pedro', 'Laura', 'Sofía', 'Miguel', 'Lucía', 'Javier', 'Isabel', 'Fernando', 'Elena', 'Andrés', 'Beatriz', 'Roberto', 'Clara', 'Alejandro', 'Victoria', 'Diego', 'Carmen', 'Pablo', 'Teresa', 'Gustavo', 'Raquel', 'Jorge', 'Olga', 'Ricardo', 'Lorena', 'Emilio', 'Gloria', 'Manuel', 'Patricia', 'Federico', 'Adriana', 'Simón', 'Rosa', 'Guillermo', 'Lourdes', 'Oscar', 'Leticia', 'Julio', 'Natalia', 'Héctor', 'Sara', 'Eduardo', 'Alicia', 'Marcelo', 'Marta', 'Álvaro', 'Juana', 'Francisco', 'Rocio', 'José', 'Mónica', 'Joaquín', 'Camila', 'Hugo', 'Nerea', 'Rafael', 'Carolina', 'David', 'Patricia', 'Óscar', 'Angela', 'Iván', 'Alejandra', 'Nicolás', 'Eva', 'Ángel', 'Silvia', 'Tomás', 'Patricia', 'León', 'Alba', 'Renato', 'Diana', 'Sebastián', 'Elena', 'Germán', 'Pilar', 'Ramon', 'Elisa', 'Mario', 'Isidora', 'Joaquín', 'Laura', 'Mauricio', 'Valentina', 'Raul', 'Rosa', 'Félix', 'María', 'Santiago', 'Catalina', 'Lorenzo', 'Paula'];

	$apellidos = ['González', 'Rodríguez', 'Martínez', 'López', 'Pérez', 'Fernández', 'Sánchez', 'Ramírez', 'Torres', 'Vargas', 'Romero', 'Mendoza', 'Díaz', 'Hernández', 'Silva', 'Cruz', 'Ortega', 'Gómez', 'Ortiz', 'Flores', 'Álvarez', 'Reyes', 'Guerrero', 'Morales', 'Castro', 'Ruiz', 'Vega', 'Luna', 'Torres', 'Vargas', 'Rojas', 'Aguilar', 'Acosta', 'Chávez', 'Campos', 'Núñez', 'Jiménez', 'Soto', 'Espinoza', 'Gutiérrez', 'Miranda', 'Molina', 'García', 'Iglesias', 'Ríos', 'Paredes', 'Suárez', 'Valenzuela', 'Quintero', 'Cabrera', 'Lara', 'Medina', 'Santos', 'Pacheco', 'León', 'Salazar', 'Parra', 'Fuentes', 'Bustamante', 'Navarro', 'Cortés', 'Sepúlveda', 'Escobar', 'Contreras', 'Santander', 'Muñoz', 'Valdés', 'Araya', 'Garrido', 'Orellana', 'Villanueva', 'Pinto', 'Toledo', 'Serrano', 'Bravo', 'Calderón', 'Pizarro', 'Aldana', 'Sanchez', 'Zapata', 'Landa', 'Villar', 'Bermúdez', 'Barrios', 'Peña', 'Pastor', 'Herrera', 'Castañeda', 'Velasco', 'Méndez', 'Chamorro', 'Avilés', 'Landa', 'Torre', 'Pérez', 'Mancilla', 'Villa', 'Arias', 'Baez', 'Santiago'];


	for ($i = 0; $i < 10; $i++) {
		$edadAleatoria = rand(18, 80);
		$insert = mysqli_query($conexion,"INSERT INTO usuarios VALUES (NULL,'".$nombres[array_rand($nombres)]."','".$apellidos[array_rand($apellidos)]."',$edadAleatoria)");
	    if (!$insert) {
	    	$data['validacion']	= 'error';
			$data['mensaje'] 	= "Hubo un error al momento de insertar el registro.";
		}else{
			$data['validacion']	= 'exito';
			$data['mensaje'] 	= "Usuarios insertado con éxito.";
		}
	}
	echo json_encode($data);
}

if (isset($_POST["state"]) && $_POST["state"] == "Modificar"){
        	$id 						= $_POST['id'];
        	$nombre_modificar 			= $_POST['nombre_modificar'];
    		$apellido_modificar			= $_POST['apellido_modificar'];
    		$edad_modificar				= $_POST['edad_modificar'];


			$update = mysqli_query($conexion,"UPDATE usuarios SET nombre = '$nombre_modificar', apellido = '$apellido_modificar', edad = $edad_modificar WHERE id = $id");
			
			if (!$update) {
    			$data['validacion']	= 'error';
				$data['mensaje'] 	= "Hubo un error al momento de modificar el registro.";
    		}else{
    			$data['validacion']	= 'exito';
				$data['mensaje'] 	= "Usuario modificado con éxito.";
    		}
    		
    		echo json_encode($data);
}

if (isset($_POST["state"]) && $_POST["state"] == "Eliminar"){
	$id = $_POST['id'];
	$delete = mysqli_query($conexion,"DELETE FROM usuarios WHERE id = $id ");
	if (!$delete) {
		$data['validacion']	= 'error';
		$data['mensaje'] 	= "Hubo un error al momento de eliminar el registro.";
	}else{
		$data['validacion']	= 'exito';
		$data['mensaje'] 	= "Usuario eliminado con éxito.";
	}
	
	echo json_encode($data);
}

?>