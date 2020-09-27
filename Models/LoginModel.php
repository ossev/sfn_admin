<?php

class LoginModel extends Mysql{

    private $strEmail;
    private $strContrasena;

    public function __construct(){
        parent::__construct();
    }

    public function getPassWord(string $email){
        $this->strEmail = $email;
        $sql = "SELECT * FROM usuario WHERE email = '$this->strEmail'";
        $arrData = array($this->strEmail);
        $request = $this->select($sql, $arrData);
        return $request;
        //Se debe usar >> password_verify($pass, $passHash) << para verificar la contraseña
    }

}

?>