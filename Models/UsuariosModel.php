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

    public function updateUser(int $idrol, string $rol, string $descripcion, int $status){
        $this->intIdUser = $idrol;
        $this->strUser = $rol;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $status;

        $sql = "SELECT * FROM rol WHERE nombrerol = '$this->strUser' and idrol != $this->intIdUser";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE rol SET nombrerol = ?, descripcion = ?, status = ? WHERE idrol = $this->intIdUser";
            $arrData = array($this->strUser, $this->strDescripcion, $this->intStatus);
            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
        
    }

}

?>