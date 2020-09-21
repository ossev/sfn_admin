<?php

class RolesModel extends Mysql{

    public $intIdRol;
    public $strRol;
    public $strDescripcion;
    public $intStatus;

    public function __construct(){
        parent::__construct();
    }

    public function selectRoles(){
        //Extraer los roles
        $sql = "SELECT * FROM rol";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectRol(int $idrol){
        //Buscar Rol
        $this->intIdRol = $idrol;
        $sql = "SELECT * FROM rol WHERE idrol = $this->intIdRol";
        $request = $this->select($sql);
        return $request;
    }

    public function insertRol(string $rol, string $descripcion, int $status){
        $return = "";
        $this->strRol = $rol;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $status;

        $sql = "SELECT * FROM rol WHERE nombrerol = '{$this->strRol}'";
        $request = $this->select_all($sql);
        if(empty($request)){
            $query_insert = "INSERT INTO rol(nombrerol, descripcion, status) VALUES(?,?,?)";
            $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
            $request_insert = $this->insert($query_insert,$arrData);
            
            $return = $request_insert;
        }else{
            $return = "exist";
        }
        return $return;
    }

    public function updateRol(int $idrol, string $rol, string $descripcion, int $status){
        $this->intIdRol = $idrol;
        $this->strRol = $rol;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $status;

        $sql = "SELECT * FROM rol WHERE nombrerol = '$this->strRol' and idrol != $this->intIdRol";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE rol SET nombrerol = ?, descripcion = ?, status = ? WHERE idrol = $this->intIdRol";
            $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
        
    }

}

?>