<?php

class mysql extends Conexion{
    private $conexion;
    private $strquery;
    private $arrValues;

    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }

    // Insertar registros
    public function insert(string $query, array $arrValues)
    {
        $this->strQuery = $query;
        $this->arrValues = $arrValues;

        $insert = $this->conexion->prepare($this->strQuery);
        $resInsert = $insert->execute($this->arrValues);
        if ($resInsert) {
            $lastInsert = $this->conexion->lastInsertId();
        } else {
            $lastInsert = 0;
        }
        return $lastInsert;
    }

    //Método para obtener un registro
    public function select(string $query){
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    //Método para obtener todos los registros
    public function select_all(string $query){
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetchall(PDO::FETCH_ASSOC);
        return $data;
    }

    //Método para actualizar registros
    public function update(string $query, array $arrValues){
        $this->strquery = $query;
        $this->arrValues = $arrValues;
        $update = $this->conexion->prepare($this->strquery);
        $resExecute = $update->execute($this->arrValues);
        return $resExecute;
    }

    //Método para eliminar un registro
    public function delete(string $query){
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $del = $result->execute();
        return $del;
    }
}

?>