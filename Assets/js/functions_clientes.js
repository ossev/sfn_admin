var cliente = "";

document.addEventListener('DOMContentLoaded',function(){

    var tbl = document.getElementById('tablaClientes');
    function printDataClientes(dataArray){
        for (var r = 0; r < dataArray.length; r++) {
            var row = document.createElement("tr");

            //Crear nit
            var cell_0 = document.createElement("td");
            var cellText_0 = document.createTextNode(dataArray[r]['nit']);
            cell_0.appendChild(cellText_0);
            row.appendChild(cell_0);

            //Crear nombre
            var cell_1 = document.createElement("td");
            var cellText_1 = document.createTextNode(dataArray[r]['nombre']);
            cell_1.appendChild(cellText_1);
            row.appendChild(cell_1);

            //Crear telefono
            var cell_2 = document.createElement("td");
            var cellText_2 = document.createTextNode(dataArray[r]['telefono']);
            cell_2.appendChild(cellText_2);
            row.appendChild(cell_2);

            //Crear estado
            var cell_5 = document.createElement("td");
            var cellText_5 = document.createTextNode(dataArray[r]['estado']);
            cell_5.appendChild(cellText_5);
            row.appendChild(cell_5);

            //Crear editar
            var cell_6 = document.createElement("td");
            var cellText_6 = document.createTextNode('');
            cliente = JSON.stringify([dataArray[r]['id'], dataArray[r]['nombre'], dataArray[r]['nit'], dataArray[r]['digito_verificacion'], dataArray[r]['telefono'], dataArray[r]['email'], dataArray[r]['direccion'], dataArray[r]['estado'], dataArray[r]['observaciones']]);
            cell_6.setAttribute('onclick','seleccionarCliente('+ cliente +')');
            cell_6.appendChild(cellText_6);
            cell_6.innerHTML =  '<button class="btn btn-primary btn-sm"><i class="icon-pencil"></i></button>';
            row.appendChild(cell_6);

            //Crear eliminar
            var cell_7 = document.createElement("td");
            var cellText_7 = document.createTextNode('');
            cliente = JSON.stringify([dataArray[r]['id'], dataArray[r]['nombre'], dataArray[r]['nit'], dataArray[r]['digito_verificacion'], dataArray[r]['telefono'], dataArray[r]['email'], dataArray[r]['direccion'], dataArray[r]['estado'], dataArray[r]['observaciones']]);
            cell_7.setAttribute('onclick','eliminarCliente('+ cliente +')');
            cell_7.appendChild(cellText_7);
            cell_7.innerHTML = '<button class="btn btn-danger btn-sm"><i class="icon-bin2"></i></button>';
            row.appendChild(cell_7);

            tbl.appendChild(row); // add the row to the end of the table body
        }
    }
    
    // Obtener los datos para crear la tabla de clientes
    fetch('http://localhost/sfn_admin/Clientes/getClientes')
    .then(response=>response.json())
    .then(data =>printDataClientes(data));

});

    //Nuevo Cliente
    var formCliente = document.querySelector("#formularioCliente");
    formCliente.onsubmit = function(e){

        e.preventDefault(); // Para evitar que formulario se recargue por defecto

        document.getElementById("errorNit").innerHTML = '';
        var nitCliente = document.querySelector('#nitCliente').value;

        var mensajeError = "";
        
        //Verificar que el campo de nit esté diligenciado
        if (isNaN(nitCliente)) {
            mensajeError += "Nit debe ser número";
            document.getElementById("errorNit").innerHTML = mensajeError;
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'Clientes/SetCliente';
        var formData = new FormData(formCliente);
        console.log(formData);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);

                if (objData.status){

                    $('#modalFormCliente').modal("hide");
                    formCliente.reset();
                        document.getElementById('modalInfoTitle').innerHTML = 'Informacion';
                        document.getElementById('modalInfoTitle').className = "modal-body text-primary";
                        document.getElementById('bodyModalInfo').innerHTML = objData.msg;
                        document.getElementById('bodyModalInfo').className = "text-primary";
                    $('#modalInfo').modal('show');
                    $('#modalInfo').on('hidden.bs.modal', function (e) {
                        location.reload();
                    })

                }else{
                    document.getElementById('modalInfoTitle').innerHTML = 'Error';
                    document.getElementById('modalInfoTitle').className = "modal-body text-danger";
                    document.getElementById('bodyModalInfo').innerHTML = objData.msg;
                    document.getElementById('bodyModalInfo').className = "text-danger";
                    $('#modalInfo').modal('show');
                }

            }

        }
    }

    function seleccionarCliente(cliente){
        document.querySelector('#idCliente').value = cliente[0];
        document.querySelector('#nombreCliente').value = cliente[1];
        document.querySelector('#nitCliente').value = cliente[2];
        document.querySelector('#digVerCliente').value = cliente[3];
        document.querySelector('#telefonoCliente').value = cliente[4];
        document.querySelector('#emailCliente').value = cliente[5];
        document.querySelector('#direccionCliente').value = cliente[6];
        document.querySelector('#estadoCliente').value = cliente[7];
        document.querySelector('#observacionCliente').value = cliente[8];
        $('#modalFormCliente').modal('show');
    }

//Eliminar 
function eliminarCliente(id){
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'Clientes/delCliente/'+id;
    request.open("POST",ajaxUrl,true);
    request.send(id);
    request.onreadystatechange = function(){
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.getElementById('modalInfoTitle').innerHTML = 'Informacion';
                document.getElementById('modalInfoTitle').className = "modal-body text-primary";
                document.getElementById('bodyModalInfo').innerHTML = objData.msg;
                document.getElementById('bodyModalInfo').className = "text-primary";
                $('#modalInfo').modal('show');
                $('#modalInfo').on('hidden.bs.modal', function (e) {
                location.reload();
            })
            } else {
                document.getElementById('modalInfoTitle').innerHTML = 'Error';
                document.getElementById('modalInfoTitle').className = "modal-body text-danger";
                document.getElementById('bodyModalInfo').innerHTML = objData.msg;
                document.getElementById('bodyModalInfo').className = "text-danger";
                $('#modalInfo').modal('show');
            }
        }

    }
}

