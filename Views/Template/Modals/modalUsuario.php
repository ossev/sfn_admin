<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Creacion/Modificación de Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="formularioUsuario">
                <div class="form-group">
                    <label for="nombreUsuario">Nombre</label>
                    <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" required>
                    <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" required>
                </div>
                <div class="form-group">
                    <label for="telefonoUsuario">Teléfono</label>
                    <input type="text" class="form-control" id="telefonoUsuario" name="telefonoUsuario">
                </div>
                <div class="form-group">
                    <label for="emailUsuario">Email</label>
                    <input type="email" class="form-control" id="emailUsuario" name="emailUsuario">
                </div>
                <div class="form-group">
                    <label for="rolUsuario">Rol</label>
                    <select class="form-control" id="rolUsuario"  name="rolUsuario" required>
                        <option value="">Seleccione un rol</option>
                        <option value="Admin">Admin</option>
                        <option value="Vendedor">Vendedor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="estadoUsuario">Estado</label>
                    <select class="form-control" id="estadoUsuario" name="estadoUsuario">
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
        <div class="modal-footer">

        </div>
        </div>
    </div>
</div>