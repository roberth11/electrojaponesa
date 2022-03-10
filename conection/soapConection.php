<?php

class Conection
{

    private $lineaInicial;
    private $datos;
    private $lineaFinal;

    public function __construct()
    {
    }

    public function datosConexion(
        $lineaInicial,
        $datos,
        $lineaFinal)
    {
        $this->lineaInicial = $lineaInicial;
        $this->datos = $datos;
        $this->lineaFinal = $lineaFinal;

        return $this->soapConection();
    }

    private function soapConection()
    {
        $curl = curl_init();


        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://10.238.74.8/WSUNOEE/WSUNOEE.asmx?op=ImportarXML',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
    <soap12:Body>
        <ImportarXML  xmlns="http://tempuri.org/">
            <pvstrDatos><![CDATA[<?xml version=\'1.0\' encoding=\'utf-8\'?>
            <Importar>
            <NombreConexion>UNOEE</NombreConexion>
            <IdCia>1</IdCia>
            <Usuario>unoee</Usuario>
            <Clave>123456</Clave>
                <Datos>
                    <Linea>' . $this->lineaInicial . '</Linea>
                           ' . $this->datos . '
                    <Linea>' . $this->lineaFinal . '</Linea>
                </Datos>
			</Importar>]]>
        	</pvstrDatos>
    	</ImportarXML >
	</soap12:Body>
</soap12:Envelope>',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: text/xml;'
            ),
        ));

        $result = curl_exec($curl);

        return $result;
    }
}


?>