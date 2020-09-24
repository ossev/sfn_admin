<?php 
    headerAdmin($data);
    getModal('modalCliente',$data);
    getModal('modalInfo',$data);
?>

<br>
<div class="container">
    <div class="container">
        <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalFormCliente" href="<?= base_url()?>Clientes"><i class="icon-plus"></i> NUEVO</a>
    </div>
    <table class="table table-hover" id="tablaClientes">
        <thead>
            <tr>
                <th class="text-center">Nit</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Telefono</th>
                <th class="text-center">Estado</th>
                <th colspan="2" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>


<?php footerAdmin($data);?>
<?php js_file($data,'clientes_js');?>