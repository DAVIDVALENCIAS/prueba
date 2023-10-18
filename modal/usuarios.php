
	<div class="modal fade" id="modificarUsuarios" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Modificar Usuario
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="descripcion_modificar">Nombre Usuario</label>
	                    <input type="text" class="form-control" id="nombre_modificar" name="nombre_modificar" placeholder="Ingrese el nombre">
	                  </div>
	                  <div class="form-group">
	                    <label for="descripcion_modificar">Apellido Usuario</label>
	                    <input type="text" class="form-control" id="apellido_modificar" name="apellido_modificar" placeholder="Ingrese el apellido">
	                  </div>
	                  <div class="form-group">
	                    <label for="descripcion_modificar">Edad Usuario</label>
	                    <input type="text" class="form-control" id="edad_modificar" name="edad_modificar" placeholder="Ingrese la edad">
	                  </div>
	                </div>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="id_modificar">
					<button type="button" id="modificar" class="btn btn-warning">MODIFICAR</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">REGRESAR</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="eliminarUsuarios" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Eliminar Usuario
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
	                <div class="card-body">
	                  <center><h3>¿Está Seguro en Eliminar el Usuario?</h3></center>
	                </div>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="id_eliminar">
					<button type="button" id="eliminar" class="btn btn-danger">ELIMINAR</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">REGRESAR</button>
				</div>
			</div>
		</div>
	</div>