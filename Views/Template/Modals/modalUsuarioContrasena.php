<!-- Modal -->
<div class="modal fade" id="modalFormUsuarioContrasena" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Asignacion Contraseña</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="formularioUsuarioContrasena" name="formularioUsuarioContrasena">
                <div class="form-group">
                    <label for="nombreUsuarioContrasena">Nombre: </label>
                    <input type="hidden" class="form-control" id="idUsuarioContrasena" name="idUsuarioContrasena" required>
                    <span id="nombreUsuarioContrasena" class="text-primary"></span>
                </div>
                <div class="form-group">
                    <label for="emailUsuarioContrasena">Email: </label>
                    <span id="emailUsuarioContrasena" class="text-primary"></span>
                </div>
                <div class="form-group">
                    <label for="contrasenaUsuario">Contraseña</label>
                    <input type="text" class="form-control" id="contrasenaUsuario" name="contrasenaUsuario">
                    <span id="avisoContrasena" class="text-danger"></span>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
        <div class="modal-footer justify-content-center text-primary">
            <i class="icon-info" style="font-size:2em"></i>
            <p>Tenga en cuenta que las contraseñas no se pueden recuperar, sólo se puede asignar una nueva contraseña.</p>
        </div>
        </div>
    </div>
</div>