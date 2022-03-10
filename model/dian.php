<?php

require_once('../conection/soapConection.php');
require_once('../util/util.php');
require_once('../util/constantes.php');


class Dian
{

    private $documentoTercero;

    public function __construct()
    {
    }

    public function agregarDatosDian($documentoTercero)
    {
        $this->documentoTercero = $documentoTercero;

        return $this->insertarDatosDian();

    }

    private function insertarDatosDian()
    {

        $grupoEntidad = array(
            CODIGOENTIDAD1,
            CODIGOENTIDAD2,
            CODIGOENTIDAD3,
            CODIGOENTIDAD4,
            CODIGOENTIDAD5
        );

        $codigoAtributo = array(
            CODIGOATRIBUTO1,
            CODIGOATRIBUTO2,
            CODIGOATRIBUTO3,
            CODIGOATRIBUTO4,
            CODIGOATRIBUTO5
        );

        $codigoMaestro = array(
            CODIGOMAESTRO1,
            CODIGOMAESTRO2,
            CODIGOMAESTRO3,
            CODIGOMAESTRO4,
            CODIGOMAESTRO5
        );

        $detalleMaestro = array(
            DETALLEMAESTRO1,
            DETALLEMAESTRO2,
            DETALLEMAESTRO3,
            DETALLEMAESTRO4,
            DETALLEMAESTRO5
        );

        $conection = new Conection();


        for ($i = 0; $i <= 4; $i++) {

            $numeroRegistro = 2;

            $numeroRegistro += $i;

            $lineaDian[$i] = '<Linea>' . llenarDatos('int', 7, NUMEROREGISTRO . $numeroRegistro, 0) . INICIODIAN .
                llenarDatos('string', 15, $this->documentoTercero) .
                llenarDatos('string', 185, RESERVADODIAN) .
                CODIGOGRUPOENTIDAD .
                llenarDatos('string', 30, $grupoEntidad[$i]) .
                llenarDatos('string', 30, $codigoAtributo[$i]) .
                llenarDatos('int', 28, INFONUMERICAENTIDAD) .
                llenarDatos('string', 2000, INFOTIPOTEXTOENTIDAD) .
                llenarDatos('string', 8, INFOTIPOFECHAENTIDAD) .
                $codigoMaestro[$i] .
                llenarDatos('string', 20, $detalleMaestro[$i]) .
                llenarDatos('string', 8, CODIGOMAESTROINTERNO) .
                llenarDatos('int', 4, VACIONINT) .
                llenarDatos('string', 10, VACIOSTRING) .
                llenarDatos('string', 100, VACIOSTRING) . '</Linea>';

        }

        $numeroRegistro += 1;

        $result = $conection->datosConexion(
            LINEAINICIO,
            $lineaDian[0] . $lineaDian[1] . $lineaDian[2] . $lineaDian[3] . $lineaDian[4],
            llenarDatos('int', 7, SECUENCIAFIN . $numeroRegistro, 0) . LINEAFIN);

        return $result;

    }
}


?>