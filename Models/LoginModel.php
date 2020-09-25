<?php

class LoginModel extends Mysql{

    private $intIdUsuario;
    private $strUsuario;
    private $strPassword;
    private $strToken;

    public function __construct(){
        parent::__construct();
    }

    public function loginUser(string $usuario, string $password){
        $this->strUsuario = $usuario;
        $this->strPassword = $password;
        $sql = "SELECT id, estado FROM usuario WHERE
                usuario = '$this->strUsuario' and
                password = '$this->strPassword' and
                estado != inactivo";
        return $request;
    }

}

?>