document.addEventListener('DOMContentLoaded',function () {
    if (document.querySelector("#formLogin")) {
        let formLogin = document.querySelector("#formLogin");
        formLogin.onsubmit = function (e) {
            e.preventDefault();
            let strUsuario = document.getElementById('usuario').value;
            let strPassword = document.getElementById('password').value;
            if (strUsuario == "" || strPassword == "") {
                modalInfo("Todos los campos se deben diligenciar", "error");
                return false;
            }else{
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url+'Login/LoginUser';
                var formData = new FormData(formLogin);
                request.open("POST",ajaxUrl,true);
                request.send(formData);
                
                request.onreadystatechange = function(){
                    if (request.readyState == 4 && request.status == 200) {
                        var objData = JSON.parse(request.responseText);
        
                        if (objData.status){
                            // $('#modalFormCliente').modal("hide");
                            // formLogin.reset();
                            //     document.getElementById('modalInfoTitle').innerHTML = 'Informacion';
                            //     document.getElementById('modalInfoTitle').className = "modal-body text-primary";
                            //     document.getElementById('bodyModalInfo').innerHTML = objData.msg;
                            //     document.getElementById('bodyModalInfo').className = "text-primary";
                            // $('#modalInfo').modal('show');
                            // $('#modalInfo').on('hidden.bs.modal', function (e) {
                            //     location.reload();
                            // })
        
                        }else{
                            // document.getElementById('modalInfoTitle').innerHTML = 'Error';
                            // document.getElementById('modalInfoTitle').className = "modal-body text-danger";
                            // document.getElementById('bodyModalInfo').innerHTML = objData.msg;
                            // document.getElementById('bodyModalInfo').className = "text-danger";
                            // $('#modalInfo').modal('show');
                        }
        
                    }
        
                }
            }
        }
    }
},false);