<?php

class UsuariosModel extends Mysql{

    public $intIdUsuario;
    public $strNombre;
    public $strTelefono;
    public $strEmail;
    public $strEstado;

    public function __construct(){
        parent::__construct();
    }

    public function selectUsuarios(){
        //Extraer los usuarios
        $sql = "SELECT * FROM usuario";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectUsuario(int $idUsuario){
        //Buscar User
        $this->intIdUsuario = $idUsuario;
        $sql = "SELECT * FROM usuario WHERE id = $this->intIdUsuario";
        $request = $this->select($sql);
        return $request;
    }

    public function insertUsuario(string $nombre, string $telefono, string $email, string $rol, string $estado){
        $return = "";
        $this->strNombre = $nombre;
        $this->strTelefono = $telefono;
        $this->strEmail = $email;
        $this->strRol = $rol;
        $this->strEstado = $estado;

        $sql = "SELECT * FROM usuario WHERE nombre = '{$this->strNombre}'";
        $request = $this->select_all($sql);
        if(empty($request)){
            $query_insert = "INSERT INTO usuario(nombre, telefono, email, rol, estado) VALUES(?,?,?,?,?)";
            $arrData = array($this->strNombre, $this->strTelefono, $this->strEmail, $this->strRol, $this->strEstado);
            $request_insert = $this->insert($query_insert,$arrData);
            $return = $request_insert;
        }else{
            $return = "exist";
        }
        return $return;
    }

    public function updateUsuario(int $id, string $nombre, string $telefono, string $email, string $rol, string $estado){
        $this->intId = $id;
        $this->strNombre = $nombre;
        $this->strTelefono = $telefono;
        $this->strEmail = $email;
        $this->strRol = $rol;
        $this->estado = $estado;

        $sql = "SELECT * FROM usuario WHERE nombre = '$this->strNombre' and id != $this->intId";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE usuario SET nombre = ?, telefono = ?, email = ?, rol = ?, estado = ? WHERE id = $this->intId";
            $arrData = array($this->strNombre, $this->strTelefono, $this->strEmail, $this->strRol, $this->estado);
            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
        
    }

    public function deleteUsuario(int $idUsuario){
        $this->intId = $idUsuario;
        $sql = "DELETE FROM usuario WHERE id = $this->intId";
        $request = $this->delete($sql);
        return $request;
    }

    public function setContrasena(int $id, string $contrasena){
        $this->intId = $id;
        $this->strContrasena = password_hash($contrasena, PASSWORD_BCRYPT);
        $sql = "UPDATE usuario SET password = ? WHERE id = $this->intId";
        $arrData = array($this->strContrasena);
        $request = $this->update($sql, $arrData);
        return $request;
        //Se debe usar >> password_verify($pass, $passHash) << para verificar la contraseña
    }

}

?>