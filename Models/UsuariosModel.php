<?php

class UsuariosModel extends Mysql{

    public $intIdUsuario;
    public $strNombre;
    public $strTelefono;
    public $intEmail;

    public function __construct(){
        parent::__construct();
    }

    public function selectUsuarios(){
        //Extraer los usuarios
        $sql = "SELECT * FROM usuario";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectUser(int $idrol){
        //Buscar User
        $this->intIdUser = $idrol;
        $sql = "SELECT * FROM rol WHERE idrol = $this->intIdUser";
        $request = $this->select($sql);
        return $request;
    }

    public function insertUser(string $rol, string $descripcion, int $status){
        $return = "";
        $this->strUser = $rol;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $status;

        $sql = "SELECT * FROM rol WHERE nombrerol = '{$this->strUser}'";
        $request = $this->select_all($sql);
        if(empty($request)){
            $query_insert = "INSERT INTO rol(nombrerol, descripcion, status) VALUES(?,?,?)";
            $arrData = array($this->strUser, $this->strDescripcion, $this->intStatus);
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