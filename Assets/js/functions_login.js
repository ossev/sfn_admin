document.addEventListener('DOMContentLoaded',function () {
    if (document.querySelector("#formLogin")) {
        let formLogin = document.querySelector("#formLogin");
        formLogin.onsubmit = function (e) {
            e.preventDefault();
            let strEmail = document.getElementById('email').value;
            let strPassword = document.getElementById('password').value;
            if (strEmail == "" || strPassword == "") {
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
                            modalInfo(objData.msg,'info')
        
                        }else{
                            modalInfo(objData.msg,'error');
                        }
        
                    }
        
                }
            }
        }
    }
},false);