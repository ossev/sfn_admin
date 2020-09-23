<?php 
    headerAdmin($data);
    getModal('modalCliente',$data);
    getModal('modalInfo',$data);
?>

<br>
<div class="container">
    <!-- Button trigger modal -->
    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormCliente" href="<?= base_url()?>Clientes"><i class=" fas fa-plus-circle"></i> NUEVO</a>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tablaClientes">
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
            </div>
            </div>
        </div>
    </div>
</div>


<?php footerAdmin($data);?>
<?php js_file($data,'clientes_js');?>