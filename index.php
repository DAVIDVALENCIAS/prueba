<?php 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	<link rel="stylesheet" href="plugins/toastr/toastr.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/usuarios.js"></script>
	<title></title>
</head>
<body>
	<div class="container">
		<br>
		<div class="row">
			<button class="btn btn-sm btn-primary" id="generar">Generar Usuarios</button>
		</div>
  		<table id="tbl-usuarios" class="table table-bordered table-hover">
  			<thead>
                  <tr>
                    <th>Opciones</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                  </tr>
	        </thead>
	        <tbody>

	        </tbody>
	        <tfoot>
		         <tr>
		           <th>Opciones</th>
		           <th>Nombre</th>
	               <th>Apellido</th>
	               <th>Edad</th>
		         </tr>
	        </tfoot>
  		</table>
	</div>
</body>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
</html>
<?php 
include_once 'modal/usuarios.php';
?>