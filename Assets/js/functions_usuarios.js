var usuario = "";

document.addEventListener('DOMContentLoaded',function(){

    var tbl = document.getElementById('tablaUsuarios');
    function printDataUsuarios(dataArray){
        for (var r = 0; r < dataArray.length; r++) {
            var row = document.createElement("tr");

            //Crear id
            var cell_0 = document.createElement("td");
            var cellText_0 = document.createTextNode(dataArray[r]['id']);
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

            //Crear email
            var cell_3 = document.createElement("td");
            var cellText_3 = document.createTextNode(dataArray[r]['email']);
            cell_3.appendChild(cellText_3);
            row.appendChild(cell_3);

            //Crear rol
            var cell_4 = document.createElement("td");
            var cellText_4 = document.createTextNode(dataArray[r]['rol']);
            cell_4.appendChild(cellText_4);
            row.appendChild(cell_4);

            //Crear rol
            var cell_5 = document.createElement("td");
            var cellText_5 = document.createTextNode(dataArray[r]['estado']);
            cell_5.appendChild(cellText_5);
            row.appendChild(cell_5);

            //Crear editar
            var cell_6 = document.createElement("td");
            var cellText_6 = document.createTextNode('');
            usuario = JSON.stringify([dataArray[r]['id'], dataArray[r]['nombre'], dataArray[r]['telefono'], dataArray[r]['email'], dataArray[r]['rol'], dataArray[r]['estado']]);
            cell_6.setAttribute('onclick','seleccionarUsuario('+ usuario +')');
            cell_6.appendChild(cellText_6);
            cell_6.innerHTML = '<button class="btn btn-primary btn-sm"><i class="icon-pencil"></i></button>';
            row.appendChild(cell_6);

            //Crear asignar contraseña
            var cell_6 = document.createElement("td");
            var cellText_6 = document.createTextNode('');
            usuario = JSON.stringify([dataArray[r]['id']]);
            cell_6.setAttribute('onclick','seleccionarUsuario('+ usuario +')');
            cell_6.appendChild(cellText_6);
            cell_6.innerHTML = '<button class="btn btn-primary btn-sm"><i class="icon-pencil"></i></button>';
            row.appendChild(cell_6);

            //Crear eliminar
            var cell_7 = document.createElement("td");
            var cellText_7 = document.createTextNode('');
            usuario = JSON.stringify([dataArray[r]['id'], dataArray[r]['nombre'], dataArray[r]['telefono'], dataArray[r]['email'], dataArray[r]['rol'], dataArray[r]['estado']]);
            cell_7.setAttribute('onclick','eliminarUsuario('+ usuario +')');
            cell_7.appendChild(cellText_7);
            cell_7.innerHTML = '<button class="btn btn-danger btn-sm"><i class="icon-bin2"></i></button>';
            row.appendChild(cell_7);

            tbl.appendChild(row); // add the row to the end of the table body
        }
    }
    
    // Obtener los datos para crear la tabla de usuarios
    fetch('http://localhost/sfn_admin/Usuarios/getUsuarios')
    .then(response=>response.json())
    .then(data =>printDataUsuarios(data));



});

    //Nuevo Usuario
    var formUsuario = document.querySelector("#formularioUsuario");
    formUsuario.onsubmit = function(e){

        e.preventDefault(); // Para evitar que formulario se recargue por defecto
        var nombreUsuario = document.querySelector('#nombreUsuario').value;
        var rolUsuario = document.querySelector('#rolUsuario').Value;


        if (nombreUsuario == '' || rolUsuario == '') {
            modalinfo("Todos los campos son obligatorios", "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'Usuarios/SetUsuario';
        var formData = new FormData(formUsuario);
        
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);

                if (objData.status){

                    $('#modalFormUsuario').modal("hide");
                    formUsuario.reset();
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

    function seleccionarUsuario(usuario){
        console.log(usuario[5]);
        document.querySelector('#idUsuario').value = usuario[0];
        document.querySelector('#nombreUsuario').value = usuario[1];
        document.querySelector('#telefonoUsuario').value = usuario[2];
        document.querySelector('#emailUsuario').value = usuario[3];
        document.querySelector('#rolUsuario').value = usuario[5];
        document.querySelector('#estadoUsuario').value = usuario[6];
        $('#modalFormUsuario').modal('show');
    }

//Eliminar 
function eliminarUsuario(id){
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'Usuarios/delUsuario/'+id;
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

