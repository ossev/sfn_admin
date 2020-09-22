<?php 
    headerAdmin($data);
    // getModal('modalUsuario',$data);
?>
<br>
<div class="container">
    <h1>Página de inicio</h1>
    <p>SFN Solo Frenos del Norte es una empresa, dedicada al servicio de mantenimiento del sistema de frenos y suspensión vehicular y a la distribución de repuestos desde 1979. SFN brinda una nueva alternativa entre el taller y el concesionario, dirigido tanto a quienes valoran la mecánica y ven cómo se realiza el mantenimiento de su vehículo, como a quienes prefieren tan solo dejarlo en manos expertas y desentenderse mientras disfruta de una cómoda sala con Internet inalámbrico y televisión satelital.</p>
    <picture>
        <img src="<?= base_url(); ?>Assets/images/logo.png" alt="Logo SFN">
    </picture>
    <p>El primero de marzo de 2009 Solo Frenos del Norte empieza un proceso de renovación con la creación de la marca SFN. Como parte de este proceso se hacen cambios en las instalaciones, dando una nueva y moderna imagen a la compañía junto con el nuevo servicio de suspensión. Se invierte también en el inventario de repuestos, teniendo en bodega más de 2.000 referencias. La modernización comienza con la compra de la Purgadora Electrónica de Líquido ATE, que permite hacer el cambio total de este en 8 minutos y con la mejor tecnología y seguridad. Incursionamos también en la importación de pastillas de freno desde Estados Unidos y España. Todo este trabajo se realiza partiendo de la conciencia de que las inversiones hechas por SFN deben reflejarse en la calidad y no el precio del servicio. Así mismo el cambio se apoya sobre la experiencia de más de 25 años de sus TECNICOS en Frenos y Suspensión.</p>
</div>


<?php footerAdmin($data);?>
<?php js_file($data,'home_js');?>