function modalInfo(mensaje, tipoMensaje){
    if (tipoMensaje="error") {
        document.getElementById('modalInfoTitle').innerHTML = 'Error';
        document.getElementById('modalInfoTitle').className = "modal-body text-danger";
        document.getElementById('bodyModalInfo').innerHTML = mensaje;
        document.getElementById('bodyModalInfo').className = "text-danger";
        $('#modalInfo').modal('show');
    } else {
        document.getElementById('modalInfoTitle').innerHTML = 'Información';
        document.getElementById('modalInfoTitle').className = "modal-body text-primary";
        document.getElementById('bodyModalInfo').innerHTML = mensaje;
        document.getElementById('bodyModalInfo').className = "text-primary";
        $('#modalInfo').modal('show');
    }
}