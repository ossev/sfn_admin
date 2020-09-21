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

    public function getRol(int $idrol){
        
        $intIdRol = intVal(strClean($idrol));
        if ($intIdRol > 0) {
            $arrData = $this->model->selectRol($intIdRol);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            }else {
                $arrResponse = array('status' =>true, 'data' =>$arrData);
            }
            echo json_encode(utf8ize($arrResponse),JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function setRol(){

        $intIdRol = intVal($_POST['idRol']);
        $strRol = strClean($_POST['txtNombre']);
        $strDescripcion = strClean($_POST['txtDescripcion']);
        $intStatus = intVal($_POST['intStatus']);

        if ($intIdRol == 0) {
            //Crear
            $request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);
            $option = 1;
        } else {
            //Actualizar
            $request_rol = $this->model->updateRol($intIdRol, $strRol, $strDescripcion, $intStatus);
            $option = 2;
        }
        

        if ($request_rol > 0) {

            if ($option == 1) {
                $arrResponse = array('status' => true,'msg' => 'Datos guardados correctamente.');
            } else {
                $arrResponse = array('status' => true,'msg' => 'Datos actualizados correctamente.');
            }
        } else if ($request_rol == 'exist'){
            $arrResponse = array('status' => false, 'msg' => '¡Atención! El rol ya existe.');
        } else{
            $arrResponse = array('status'=>false, 'msg' => 'No es posible almacenar los datos.');
        }
        echo json_encode(utf8ize($arrResponse,JSON_UNESCAPED_UNICODE));
        die();
    }

}


?>