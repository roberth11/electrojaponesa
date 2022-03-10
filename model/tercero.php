<?php

require_once('../conection/soapConection.php');
require_once('../util/util.php');
require_once('../util/constantes.php');


class Tercero
{

    private $tipoDocumento;
    private $documentoTercero;
    private $nombres;
    private $apellido1;
    private $apellido2;
    private $direccion1;
    private $ciudad;
    private $departamento;
    private $telefono;
    private $fechaCreacion;
    private $email;
    private $barrio;
    private $direccion2;

    public function __construct()
    {
    }

    public function agregarDatosTercero(
        $tipoDocumento,
        $documentoTercero,
        $nombres,
        $apellido1,
        $apellido2,
        $direccion1,
        $ciudad,
        $departamento,
        $telefono,
        $fechaCreacion,
        $email,
        $barrio,
        $direccion2
    )
    {
        $this->tipoDocumento = $tipoDocumento;
        $this->documentoTercero = $documentoTercero;
        $this->nombres = $nombres;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->direccion1 = $direccion1;
        $this->ciudad = $ciudad;
        $this->departamento = $departamento;
        $this->telefono = $telefono;
        $this->fechaCreacion = $fechaCreacion;
        $this->email = $email;
        $this->barrio = $barrio;
        $this->direccion2 = $direccion2;

        return $this->insertarDatosTercero();
    }

    private function insertarDatosTercero()
    {

        $nombreCompleto = $this->apellido1 . " " . $this->apellido2 . " " . $this->nombres;
        $nombreEstablecimiento = $nombreCompleto;
        $contacto = $nombreCompleto;

        $nombreEstablecimiento = wordwrap($nombreEstablecimiento, 50, TRUE);
        $contacto = wordwrap($nombreEstablecimiento, 40, TRUE);

        if (strlen($nombreEstablecimiento) < 50) {
            $nombreEstablecimiento = llenarDatos('String', 50, $nombreEstablecimiento);
        }
        if (strlen($contacto) < 50) {
            $contacto = llenarDatos('String', 50, $nombreEstablecimiento);
        }

        $lineaTercero =
            '<Linea>' . INICIOTERCERO .
            llenarDatos('String', 15, $this->documentoTercero) .
            llenarDatos('String', 25, $this->documentoTercero) .
            llenarDatos('String', 3, CODIGOVERIFICAICON) .
            $this->tipoDocumento . TIPOTERCERO .
            llenarDatos('String', 100, RAZONSOCIAL) .
            llenarDatos('String', 29, $this->apellido1) .
            llenarDatos('String', 29, $this->apellido2) .
            llenarDatos('String', 40, $this->nombres) .
            $nombreEstablecimiento . INDICADORTERCEROCLIENTE .
            INDICADORTERCEROPROVEEDOR . INDICADORTERCEROEMPLEADO .
            INDICADORTERCEROACCIONISTA . INDICADORTERCEROOTROS .
            INDICADORTERCEROINTERNO . $contacto .
            llenarDatos('String', 40, $this->direccion1) .
            llenarDatos('String', 40, $this->direccion2) .
            llenarDatos('String', 40, DIRECCION3) .
            PAIS .
            llenarDatos('int', 2, $this->departamento, 0) .
            llenarDatos('int', 3, $this->ciudad, 0) .
            llenarDatos('String', 40, $this->barrio) .
            llenarDatos('String', 20, $this->telefono) .
            llenarDatos('String', 20, FAX) .
            llenarDatos('String', 10, CODIGOPOSTAL) .
            llenarDatos('String', 255, $this->email) .
            llenarDatos('String', 8, strval($this->fechaCreacion)) .
            llenarDatos('String', 4, CODIGOACTIVIDADECONOMICA) .
            INDICADORNODOMICILIADO . INDICADORESTADO .
            llenarDatos('String', 50, EMAIL2) . '</Linea>';

        $conection = new Conection();

        return $conection->datosConexion(
            LINEAINICIO,
            $lineaTercero,
            SINSECUENCIA . LINEAFIN);

    }
}

?>