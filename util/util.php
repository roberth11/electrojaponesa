<?php

function llenarDatos($tipo, $cantidad, $valor, $orientacion = 1)
{

    if ($tipo === "int") {
        $dato = str_pad($valor, $cantidad, "0", $orientacion === 0 ? STR_PAD_LEFT : STR_PAD_RIGHT);
    } else {
        $dato =mb_strtoupper($valor . str_pad('', $cantidad - mb_strlen(mb_strtoupper($valor,'UTF-8')), "   "));
    }
    return $dato;
}

function valInsert($xml)
{
    $response1 = str_replace("<soap:Body>", "", $xml);
    $response2 = str_replace("</soap:Body>", "", $response1);

    $parser = simplexml_load_string($response2);
    return $parser->ImportarXMLResponse->printTipoError;
}

?>