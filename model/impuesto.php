<?php

require_once('../conection/soapConection.php');
require_once('../util/util.php');
require_once('../util/constantes.php');


class Impuesto
{

    private $documentoTercero;

    public function __construct()
    {
    }

    public function agregarDatosImpuesto($documentoTercero)
    {

        $this->documentoTercero = $documentoTercero;

        return $this->insertarDatosImpuesto();
    }

    private function insertarDatosImpuesto()
    {
        $tipoRegistro = array(
            TIPOREGISTRO1,
            TIPOREGISTRO2,
            TIPOREGISTRO2,
            TIPOREGISTRO2,
            TIPOREGISTRO2,
        );

        $claseImpuesto = array(
            CLASEIMPUESTO1,
            CLASEIMPUESTO2,
            CLASEIMPUESTO3,
            CLASEIMPUESTO4,
            CLASEIMPUESTO5,
        );

        $configuracionTercero = array(
            CONFIGURACIONTERCERO1,
            CONFIGURACIONTERCERO2,
            CONFIGURACIONTERCERO2,
            CONFIGURACIONTERCERO2,
            CONFIGURACIONTERCERO1,
        );

        for ($i = 0; $i <= 4; $i++) {

            $numeroRegistro = 2;

            $numeroRegistro += $i;

            $lineaImpuesto[$i] = '<Linea>' . llenarDatos('int', 7, NUMEROREGISTRO . $numeroRegistro, 0) . $tipoRegistro[$i] . INICIOIMPUESTO2 .
                llenarDatos('String', 15, $this->documentoTercero) .
                SUCURSALCLIENTE .
                $claseImpuesto[$i] .
                $configuracionTercero[$i] .
                llenarDatos('String', 4, VACIOSTRING) . '</Linea>';

        }

        $numeroRegistro += 1;

        $conection = new Conection();

        return $conection->datosConexion(
            LINEAINICIO,
            $lineaImpuesto[0] . $lineaImpuesto[1] . $lineaImpuesto[2] . $lineaImpuesto[3] . $lineaImpuesto[4],
            llenarDatos('int', 7, SECUENCIAFIN . $numeroRegistro, 0) . LINEAFIN);

    }

}


?>