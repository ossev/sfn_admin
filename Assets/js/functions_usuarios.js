

document.addEventListener('DOMContentLoaded',function(){
    var tbl = document.getElementById('tablaUsuarios');
    function printDataUsuarios(dataArray){
        for (var r = 0; r < dataArray.length; r++) {
            var row = document.createElement("tr");

            //Crear id
            var cell_0 = document.createElement("td");
            var cellText_0 = document.createTextNode(dataArray[r]['id']);
            cell_0.appendChild(cellText_0);
            cell_0.classList.add("direccion");
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
            var usuario = JSON.stringify([dataArray[r]['id'], dataArray[r]['nombre'], dataArray[r]['telefono'], dataArray[r]['email'], dataArray[r]['rol']]);
            cell_6.setAttribute('onclick','seleccionarUsuario('+ usuario +')');
            cell_6.appendChild(cellText_6);
            cell_6.innerHTML = '<button class="btn btn-primary btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button> <button class="btn btn-danger btn-sm" title="Editar"><i class="fas fa-trash-alt"></i></button>';
            row.appendChild(cell_6);

            tbl.appendChild(row); // add the row to the end of the table body
        }
    }
    
    // creating rows


    var tabla_usuario = document.getElementById('tablaUsuarios')
    fetch('http://localhost/sfn_admin/Usuarios/getUsuarios')
    .then(response=>response.json())
    .then(data =>printDataUsuarios(data));

});

