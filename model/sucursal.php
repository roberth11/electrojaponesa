<?php

require_once('../conection/soapConection.php');
require_once('../util/util.php');
require_once('../util/constantes.php');

class Sucursal {

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


    public function __construct() {
    }

    public function agregarDatosSucursal(
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
        $barrio
    ) {
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

        return $this->insertarDatosSucursal();

    }

    private function insertarDatosSucursal() {
        $nombreCompleto = $this->apellido1 . " " . $this->apellido2 . " " . $this->nombres;
        $razonSocial = $nombreCompleto;


        if (strlen($razonSocial) < 40) {
            $razonSocial = llenarDatos('String', 40, $razonSocial);
        }
        if (strlen($nombreCompleto) < 50) {
            $nombreCompleto = llenarDatos('String', 50, $nombreCompleto);
        }

        $lineaSucursal = '<Linea>' . INICIOSUCURSAL .
            llenarDatos('String', 15, $this->documentoTercero) .
            SUCURSALCLIENTE . ESTADOCLIENTE . $razonSocial .
            MONEDA . CODIGOVENDEDOR . CALIFICACION .
            CONDICIONPAGO .
            llenarDatos('int', 3, DIASGRACIA) .
            llenarDatos('int', 21, CUPOCREDITO) .
            llenarDatos('string', 15, CODIGOCLIENTECORP) .
            llenarDatos('string', 3, SUCURSALCLIENTECORP) .
            TIPOCLIENTE .
            llenarDatos('string', 4, GRUPODESCUENTO) .
            llenarDatos('string', 3, LISTAPRECIOS) .
            INDICADORBACKORDER .
            llenarDatos('int', 7, PORCENTAJEMAXIMO) .
            llenarDatos('int', 7, PORCENTAJEMARGENMINIMO) .
            llenarDatos('int', 7, PORCENTAJEMARGENMAXIMO) .
            INDICADORBLOQUEADO . INDICADORBLOQUEADOCUPO .
            INDICADORBLOQUEADOMORA . INDICADORFACTURAUNIFICADA .
            llenarDatos('string', 3, VACIOSTRING) .
            llenarDatos('string', 255, VACIOSTRING) .
            llenarDatos('string', 50, $nombreCompleto) .
            llenarDatos('string', 40, $this->direccion1) .
            llenarDatos('string', 40, DIRECCION2) .
            llenarDatos('string', 40, DIRECCION3) .
            PAIS .
            llenarDatos('int', 2, $this->departamento, 0) .
            llenarDatos('int', 3, $this->ciudad, 0) .
            llenarDatos('string', 40, $this->barrio) .
            llenarDatos('string', 20, $this->telefono) .
            llenarDatos('string', 20, FAX) .
            llenarDatos('string', 10, VACIOSTRING) .
            llenarDatos('string', 255, $this->email) .
            llenarDatos('string', 8, $this->fechaCreacion) .
            llenarDatos('string', 3, VACIOSTRING) .
            llenarDatos('string', 20, VACIOSTRING) .
            llenarDatos('string', 4, VACIOSTRING) .
            llenarDatos('string', 35, VACIOSTRING) .
            llenarDatos('string', 8, VACIOSTRING) .
            llenarDatos('int', 7, VACIONINT) .
            llenarDatos('int', 2, VACIONINT) .
            llenarDatos('string', 3, VACIOSTRING) .
            CODIGOCOBRADOR .
            VACIONINT . VACIONINT .
            llenarDatos('string', 50, VACIOSTRING) .
            VACIONINT .
            llenarDatos('string', 10, VACIOSTRING) .
            llenarDatos('int', 7, VACIONINT) .
            llenarDatos('int', 3, VACIONINT) . '</Linea>';

        $conection = new Conection();

        return $conection->datosConexion(
            LINEAINICIO,
            $lineaSucursal,
            SINSECUENCIA . LINEAFIN);


    }
}

?>


