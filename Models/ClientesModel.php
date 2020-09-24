<?php

class ClientesModel extends Mysql{

    public $intId;
    public $strNombre;
    public $intNit;
    public $intDigVer;
    public $strTelefono;
    public $strEmail;
    public $strDireccion;
    public $strEstado;
    public $strObservaciones;

    public function __construct(){
        parent::__construct();
    }

    public function selectClientes(){
        //Extraer los clientes
        $sql = "SELECT * FROM cliente";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectCliente(int $id){
        //Buscar un cliente
        $this->intId = $id;
        $sql = "SELECT * FROM cliente WHERE id = $this->intId";
        $request = $this->select($sql);
        return $request;
    }

    // Guardar un cliente
    public function insertCliente(string $nombre, int $nit, int $digVer, string $telefono, string $email, string $direccion, string $estado, string $observaciones){
        $return = "";
        $this->strNombre = $nombre;
        $this->intNit = $nit;
        $this->intDigVer = $digVer;
        $this->strTelefono = $telefono;
        $this->strEmail = $email;
        $this->strDireccion = $direccion;
        $this->strEstado = $estado;
        $this->strObservaciones = $observaciones;

        $sql = "SELECT * FROM cliente WHERE nit = '{$this->intNit}'";
        $request = $this->select_all($sql);
        if(empty($request)){
            $query_insert = "INSERT INTO cliente(nombre, nit, digito_verificacion, telefono, email, direccion, estado, observaciones) VALUES(?,?,?,?,?,?,?,?)";
            $arrData = array($this->strNombre,$this->intNit, $this->intDigVer, $this->strTelefono, $this->strEmail, $this->strDireccion, $this->strEstado, $this->strObservaciones);
            $request_insert = $this->insert($query_insert,$arrData);
            $return = $request_insert;
        }else{
            $return = "exist";
        }
        return $return;
    }

    public function updateCliente(int $id, string $nombre, int $nit, int $digVer, string $telefono, string $email, string $direccion, string $estado, string $observaciones){
        $this->intId = $id;
        $this->strNombre = $nombre;
        $this->intNit = $nit;
        $this->intDigVer = $digVer;
        $this->strTelefono = $telefono;
        $this->strEmail = $email;
        $this->strDireccion = $direccion;
        $this->strEstado = $estado;
        $this->strObservaciones = $observaciones;

        $sql = "SELECT * FROM cliente WHERE nit = '$this->intNit' and id != $this->intId";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE cliente SET nombre = ?, nit = ?, digito_verificacion = ?, telefono = ?, email = ?, direccion = ?, estado = ?, observaciones = ? WHERE id = $this->intId";
            $arrData = array($this->strNombre, $this->intNit, $this->intDigVer, $this->strTelefono, $this->strEmail, $this->strDireccion, $this->strEstado, $this->strObservaciones);
            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
        
    }

    public function deleteCliente(int $id){
        $this->intId = $id;
        $sql = "DELETE FROM cliente WHERE id = $this->intId";
        $request = $this->delete($sql);
        return $request;
    }

}

?>