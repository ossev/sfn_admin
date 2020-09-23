<?php

class Clientes extends Controllers{

    public function __construct()
    {
        parent::__construct();
    }

    public function clientes(){
        
        $data['page_id']=4;
        $data['page_tag']="Clientes | SFN";
        $data['page_title']="Clientes | SFN";
        $data['page_name']="clientes";
        $this->views->getView($this, "clientes",$data);
    }

    public function getClientes(){
        $arrData = $this->model->selectClientes();
        echo json_encode(utf8ize($arrData),JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getCliente(int $idCliente){
        
        $intIdCliente = intVal(strClean($idCliente));
        if ($intIdCliente > 0) {
            $arrData = $this->model->selectCliente($intIdCliente);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            }else {
                $arrResponse = array('status' =>true, 'data' =>$arrData);
            }
            echo json_encode(utf8ize($arrResponse),JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function setCliente(){

        $intId = intVal($_POST['idCliente']);
        $strNombre = strClean($_POST['nombreCliente']);
        $intNit = intVal($_POST['nitCliente']);
        $intDigVer= intVal($_POST['digVerCliente']);
        $strTelefono = strClean($_POST['telefonoCliente']);
        $strEmail = strClean($_POST['emailCliente']);
        $strDireccion = strClean($_POST['direccionCliente']);
        $strEstado = strClean($_POST['estadoCliente']);
        $strObservacion = strClean($_POST['observacionCliente']);

        if ($intId == 0) {
            //Crear cliente
            $request_cliente = $this->model->insertCliente($strNombre,$intNit, $intDigVer, $strTelefono, $strEmail, $strDireccion, $strEstado, $strObservacion);
            $option = 1;
        } else {
            //Actualizar cliente
            $request_cliente = $this->model->updateCliente($intId, $strNombre, $intNit, $intDigVer, $strTelefono, $strEmail, $strDireccion, $strEstado, $strObservacion);
            $option = 2;
        }
        

        if ($request_cliente > 0) {

            if ($option == 1) {
                $arrResponse = array('status' => true,'msg' => 'Datos guardados correctamente.');
            } else {
                $arrResponse = array('status' => true,'msg' => 'Datos actualizados correctamente.');
            }
        } else if ($request_cliente == 'exist'){
            $arrResponse = array('status' => false, 'msg' => '¡Atención! El cliente ya existe.');
        } else{
            $arrResponse = array('status'=>false, 'msg' => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }


    public function delCliente($id){

        $intId = intVal(strClean($id));

        if ($intId> 0) {
            $req = $this->model->deleteCliente($intId);
            if ($req == 1) {
                $arrResponse = array('status' => true, 'msg' => '¡Cliente eliminado con éxito');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Ha ocurrido algún error');
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            // return $arrResponse;
        }
    }
}


?>