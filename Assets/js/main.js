function modalInfo(mensaje, tipoMensaje){
    if (tipoMensaje=="error") {
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

//Función para limpiar strings
function limpiarCadena(cadena){
    var newCadena = cadena.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\/\(\\\/]/gi, '');
    cadena = newCadena.replace(/á/gi,"a");
    cadena = cadena.replace(/é/gi,"e");
    cadena = cadena.replace(/í/gi,"i");
    cadena = cadena.replace(/ó/gi,"o");
    cadena = cadena.replace(/ú/gi,"u");
    cadena = cadena.replace(/^[ ]+|[ ]+$/g,'');
    cadena = cadena.trim();
    return cadena;
}

//Función para dar formato puntos de mil
function format(input){
    var num = input.value.replace(/\./g,'');
    if(!isNaN(num)){
    num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
    num = num.split('').reverse().join('').replace(/^[\.]/,'');
    input.value = num;
    }else{
    swal("No se pueden ingresar letras o carateres!", "Teca", "error");
    input.value = input.value.replace(/[^\d\.]*/g,'');
    }
}