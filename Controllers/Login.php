<?php

class Login extends Controllers{

    public function __construct()
    {
        parent::__construct();
    }

    public function login(){

        $data['page_tag']="Login | SFN";
        $data['page_title']="Login | SFN";
        $data['page_name']="login";
        $data['page_functions_js'] = "functions_login.js";
        $this->views->getView($this, "login",$data);
    }

    public function loginUser(){
        if ($_POST) {
            if (empty($_POST['email'] || empty($_POST['password']))) {
                $arrResponse = array('status' => false, 'msg' => 'No todos los campos se han diligenciado');
            }else{
                $strEmail = $_POST['email'];
                $strContrasena = strClean($_POST['password']);
                $request = $this->model->getPassWord($strEmail);
                if ($request) {
                    if (password_verify($strContrasena, $request['password'])) {
                        $arrResponse = array('status' => true, 'msg' => 'Usuario logueado');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Contraseña o email incorrecto!');
                    }
                    
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Contraseña o email incorrecto!');
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    }

}

?>