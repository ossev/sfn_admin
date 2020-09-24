<?php

//Función para obtener la dirección del proyecto
function base_url(){
    return BASE_URL;
}

//Función para obtener la información de los array formataeada
function dep($data){
    $format = print_r('<pre>');
    $format .= print_r($data);
    $format .= print_r('</pre>');
    return $format;
}

function getModal(string $nameModal, $data){
    $view_modal = "Views/Template/Modals/{$nameModal}.php";
    require_once $view_modal;
}

//Funcion para limpiar una cadena
function strClean($strCadena){
    // $string = preg_replace(['/\s*/','/^\s|\s$/'],['',''],$strCadena);
    // $string = preg_replace('/\s\s+/', ' ', $strCadena);
    // $string = preg_replace('([^A-Za-z0-9])', ' ', $strCadena);
    $string = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $strCadena);
    $string = trim($string);
    $string = stripslashes($string);
    $string = str_ireplace("<script>","",$string);
    $string = str_ireplace("</script>","",$string);
    $string = str_ireplace("<script src>","",$string);
    $string = str_ireplace("<script type=>","",$string);
    $string = str_ireplace("SELECT * FROM", "",$string);
    $string = str_ireplace("DELETE * FROM", "", $string);
    $string = str_ireplace("INSERT INTO", "", $string);
    $string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
    $string = str_ireplace("DROP TABLE", "", $string);
    $string = str_ireplace("OR `1`=`1`","",$string);
    $string = str_ireplace('OR "1"="1"',"",$string);
    $string = str_ireplace('OR `1`=`1`',"",$string);
    $string = str_ireplace("is NULL; --","",$string);
    $string = str_ireplace("is NULL; --","",$string);
    $string = str_ireplace("LIKE '","",$string);
    $string = str_ireplace('LIKE "',"",$string);
    $string = str_ireplace("LIKE `","",$string);
    $string = str_ireplace("OR 'a'='a","",$string);
    $string = str_ireplace('OR "a"="a ',"",$string);
    $string = str_ireplace("OR `a`=`a","",$string);
    $string = str_ireplace("--","",$string);
    $string = str_ireplace("^","",$string);
    $string = str_ireplace("[", "",$string);
    $string = str_ireplace("]","",$string);
    $string = str_ireplace("==","",$string);
    return $string;
}

//Función para generar contraseña de 10 caracteres
function passGenerator($length = 10){
    $pass = "";
    $longitudPass = $length;
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $longitudCadena=strlen($cadena);
    
    for ($i=1; $i <= $longitudPass; $i++) { 
        $pos = rand(0,$longitudCadena-1);
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}

function token(){
    $r1 = bin2hex(random_bytes(10));
    $r2 = bin2hex(random_bytes(10));
    $r3 = bin2hex(random_bytes(10));
    $r4 = bin2hex(random_bytes(10));
    $token = $r1 .'-'. $r2 .'-'. $r3 .'-'. $r4;
    return $token;
}

function formatMoney($cantidad){
    $cantidad = number_format($cantidad,2,SPD,SPM);
    return $cantidad;
}

//Vincular los archivos de header, navbar, body y footer
function headerAdmin($data=""){
    $view_header = "Views/Template/header_admin.php";
    require_once($view_header);
}

function footerAdmin($data=""){
    $view_footer = "Views/Template/footer_admin.php";
    require_once($view_footer);
}

function js_file($data="",string $js){
    $view_js = "Views/Template/js/$js.php";
    require_once($view_js);
}

// function home_js($data=""){
//     $view_footer = "Views/Template/js/home_js.php";
//     require_once($view_footer);
// }

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}

?>