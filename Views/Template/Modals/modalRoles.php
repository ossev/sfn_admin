<!-- Modal -->
<div class="modal fade" id="modalFormRol" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalFormRolLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formRol" name="formRol">
                <input type="hidden" id="idRol" name="idRol" value="">
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <input class="form-control" id="txtNombre" name ="txtNombre" type="text" placeholder="Nombre del rol" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Descripción</label>
                        <textarea class="form-control" row="2" id="txtDescripcion" name="txtDescripcion" placeholder="Descripcion del rol" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="intStatus">Status</label>
                        <select name="intStatus" id="intStatus" class="form-control" required>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnActionForm"><i class="fa fa-fw fa-lg fa-check-circle"></i><spam id="btnText"> Guardar</spam></button>
                        <a class="btn btn-secondary" href="" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i> Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
