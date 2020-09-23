<!-- Modal -->
<div class="modal fade" id="modalFormCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Creacion/Modificación de Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="formularioCliente">
                <div class="form-group">
                    <label for="nombreCliente">Nombre</label>
                    <input type="hidden" class="form-control" id="idCliente" name="idCliente">
                    <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" required>
                </div>
                <div class="form-group">
                    <label for="nitCliente">Nit</label> <span class="text-white bg-danger" id="errorNit"></span>
                    <input type="text" class="form-control" id="nitCliente" name="nitCliente" required>
                </div>
                <div class="form-group">
                    <label for="digVerCliente">Digito Verificación</label>
                    <select class="form-control" id="digVerCliente" name="digVerCliente">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="telefonoCliente">Teléfono</label>
                    <input type="text" class="form-control" id="telefonoCliente" name="telefonoCliente" required>
                </div>
                <div class="form-group">
                    <label for="emailCliente">Email</label>
                    <input type="email" class="form-control" id="emailCliente" name="emailCliente">
                </div>
                <div class="form-group">
                    <label for="estadoCliente">Estado</label>
                    <select class="form-control" id="estadoCliente" name="estadoCliente">
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="direccionCliente">Direccion</label>
                    <input name="direccionCliente" id="direccionCliente"class="form-control">
                </div>
                <div class="form-group">
                    <label for="observacionCliente">Observación</label>
                    <textarea name="observacionCliente" id="observacionCliente" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
        <div class="modal-footer" id="footerModalCliente">
        </div>
        </div>
    </div>
</div>