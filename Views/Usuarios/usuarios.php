<?php 
    headerAdmin($data);
    getModal('modalUsuario',$data);
    getModal('modalInfo',$data);
?>
<br>
<div class="container">
        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormUsuario" href="<?= base_url()?>Usuarios">+Nuevo</a>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tablaUsuarios">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Telefono</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Rol</th>
                                <th class="text-center">Estado</th>
                                <th colspan="2" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


<?php footerAdmin($data);?>
<?php js_file($data,'usuarios_js');?>