<?php

if (isset($_POST) && !empty($_POST)) {
    date_default_timezone_set('America/Bogota');

    require_once('../conection/apiConsulta.php');
    $result = array();

    $cedula = $_POST['txtDocumento']; //Tipo String, Longitud 15

    $conection = new ApiConsulta();

    session_start();
    $_SESSION["documento"] = $cedula;

    $result2 = $conection->datosConsulta($cedula);

    $response1 = str_replace("<soap:Body>", "", $result2);
    $response2 = str_replace("</soap:Body>", "", $response1);

    $parser = simplexml_load_string($response2);
    $parser->EjecutarConsultaXMLResponse->EjecutarConsultaXMLResult;

    $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $result2);
    $xml = new SimpleXMLElement($response);
    $body = $xml->xpath('//Resultado');
    $array = json_decode(json_encode((array)$body), TRUE);

    if (count($array) >= 1) {
        $result["msj"] = "true";
    } else {
        $result["msj"] = "false";
    }

    echo json_encode($result);

}

?>