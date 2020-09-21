<?php 
    headerAdmin($data);
    // getModal('modalUsuario',$data);
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tablaUsuarios">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Acciones</th>
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