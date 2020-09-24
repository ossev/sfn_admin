<?php 
    headerAdmin($data);
    getModal('modalUsuario',$data);
    getModal('modalInfo',$data);
?>
<br>
<div class="container">
    <div class="container">
        <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalFormUsuario" href="<?= base_url()?>Usuarios"><i class="icon-plus"></i> NUEVO</a>
    </div>
    <br>
    <div class="row">
        <table class="table table-hover" id="tablaUsuarios">
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


<?php footerAdmin($data);?>
<?php js_file($data,'usuarios_js');?>