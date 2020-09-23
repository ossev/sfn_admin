<?php

class Usuarios extends Controllers{

    public function __construct()
    {
        parent::__construct();
    }

    public function usuarios(){
        
        $data['page_id']=3;
        $data['page_tag']="Usuarios | SFN";
        $data['page_title']="Usuarios | SFN";
        $data['page_name']="usuarios";
        $this->views->getView($this, "usuarios",$data);
    }

    public function getUsuarios(){
        $arrData = $this->model->selectUsuarios();
        echo json_encode(utf8ize($arrData),JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getUsuario(int $idUsuario){
        
        $intIdUsuario = intVal(strClean($idUsuario));
        if ($intIdUsuario > 0) {
            $arrData = $this->model->selectUsuario($intIdUsuario);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            }else {
                $arrResponse = array('status' =>true, 'data' =>$arrData);
            }
            echo json_encode(utf8ize($arrResponse),JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function setUsuario(){

        $intIdUsuario = intVal($_POST['idUsuario']);
        $strNombre = strClean($_POST['nombreUsuario']);
        $strTelefono = strClean($_POST['telefonoUsuario']);
        $strEmail = strClean($_POST['emailUsuario']);
        $strRol = strClean($_POST['rolUsuario']);
        $strEstado = strClean($_POST['estadoUsuario']);

        if ($intIdUsuario == 0) {
            //Crear usuario
            $request_usuario = $this->model->insertUsuario($strNombre, $strTelefono, $strEmail, $strRol, $strEstado);
            $option = 1;
        } else {
            //Actualizar usuario
            $request_usuario = $this->model->updateUsuario($intIdUsuario, $strNombre, $strTelefono, $strEmail, $strRol, $strEstado);
            $option = 2;
        }
        

        if ($request_usuario > 0) {

            if ($option == 1) {
                $arrResponse = array('status' => true,'msg' => 'Datos guardados correctamente.');
            } else {
                $arrResponse = array('status' => true,'msg' => 'Datos actualizados correctamente.');
            }
        } else if ($request_usuario == 'exist'){
            $arrResponse = array('status' => false, 'msg' => '¡Atención! El usuario ya existe.');
        } else{
            $arrResponse = array('status'=>false, 'msg' => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }


    public function delUsuario($idUsuario){

        $intIdUsuario = intVal(strClean($idUsuario));

        if ($intIdUsuario > 0) {
            $req = $this->model->deleteUsuario($intIdUsuario);
            if ($req == 1) {
                $arrResponse = array('status' => true, 'msg' => '¡Usuario eliminado con éxito');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Ha ocurrido algún error');
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            // return $arrResponse;
        }
    }
}


?>