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
            if (empty($_POST['usuario']=="" || empty($_POST['password']))) {
                $arrResponse = array('status' => false, 'msg' => 'No todos los campos se han diligenciado');
            }else{
                $strUsuario = strtolower(strClean($_POST['usuario']));
                $strPassword = $_POST['password'];
                $requestUser = $this->model->loginUser($strUsuario, $strPassword);
            }
            die();
        }
    }
}

?>