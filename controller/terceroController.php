<?php

if (isset($_POST) && !empty($_POST)) {
    date_default_timezone_set('America/Bogota');


    require_once('../model/tercero.php');
    require_once('../model/sucursal.php');
    require_once('../model/impuesto.php');
    require_once('../model/dian.php');
    require_once('../conection/soapConection.php');
    require_once('../util/util.php');

    session_start();
    $tipoDocumento = $_POST["slTipoDocumento"];
    $documentoTercero = $_SESSION["documento"]; //Tipo String, Longitud 15
    $nombres = strtoupper($_POST['txtNombre']); //Tipo String, Longitud 40
    $apellido1 = strtoupper($_POST['txtApellido']); //Tipo String, Longitud 29
    $apellido2 = strtoupper($_POST['txtApellido2']); //Tipo String, Longitud 29
    $telefono = strtoupper($_POST['txtTelefono']); //Tipo String, Longitud 20
    $direccion1 = strtoupper($_POST['txtDireccion1']); //Tipo String, Longitud 40
    $ciudad = $_POST['slCiudad']; //Tipo String, Longitud 3
    $departamento = $_POST['slDepartamento']; //Tipo String, Longitud 2
    $barrio = strtoupper($_POST['txtBarrio']); //Tipo String, Longitud 2
    $email = strtoupper($_POST['txtCorreo']); //Tipo String, Longitud 255
    $fechaCreacion = date("Ymd"); //Tipo String, Longitud 8
    $direccion2 = strtoupper($_POST['txtDireccion2']);

    $tercero = new Tercero();
    $sucursal = new Sucursal();
    $impuesto = new Impuesto();
    $dian = new Dian();

    $agregarTercero = $tercero->agregarDatosTercero(
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
        $direccion2);

    $result = array();
    $result["msj"] = "false";


    if (valInsert($agregarTercero) == "1") {
        $result["msj"] = "false";
        $result["err"]= "Error en tercero";

    } else {
        $result["msj"] = "true";
        $agregarSucursal = $sucursal->agregarDatosSucursal(
            $documentoTercero,
            $nombres,
            $apellido1,
            $apellido2,
            $direccion1,
            $ciudad,
            $departamento,
            $telefono,
            $fechaCreacion,
            $email, $barrio);
        if (valInsert($agregarSucursal) == "1") {
            $result["msj"] = "false";
            $result["err"]= "Error en Sucursal";

        } else {
            $agregarImpuesto = $impuesto->agregarDatosImpuesto($documentoTercero);
            if (valInsert($agregarImpuesto) == "1") {
                $result["msj"] = "false";
                $result["err"]= "Error en impuesto";

            } else {
                $agregarDian = $dian->agregarDatosDian($documentoTercero);
                if (valInsert($agregarDian) == "1") {
                    $result["msj"] = "false";
                    $result["err"] = "Error en dian";

                } else {
                    $result["msj"] = "true";
                    session_destroy();
                }
            }
        }
    }

    echo json_encode($result);

}

?>