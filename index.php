<!<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/logo.png">

    <title>Validacion</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/select2/select2.css" rel="stylesheet">
    <link href="css/jquery.SplashScreen.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <script src="js/select2/select2.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/appBuscar.js"></script>
    <script src="js/jquery.SplashScreen.js"></script>
    <script src="js/jqueryFormValidation/jquery.validate.min.js"></script>
</head>
<header>
    <div class="header mx-auto">
        <img src="images/electrojaponesa.png">
    </div>
</header>
<body>
<div class="container card">
    <form onkeydown="return event.key != 'Enter';" method="post" id="formVerificarCliente" name="formVerificarCliente">
        <div class="titutoSeccion">Validar documento</div>
        <div class="separador"></div>
        <div class="col-10 col-sm-6 mx-auto mt-4">
            <div class="disenoInput">
                <label class="disenoLabel" for="txtDocumento">Documento*</label>
                <input type="text" id="txtDocumento" name="txtDocumento" data-source="documento">
            </div>
        </div>
        <div class="row">
            <div id="seccionPolitica" class="col-lg-12 text-center justify-content-center mt-2">
                <input type="checkbox" id="txtPolitica" name="txtPolitica"> Acepto* <a id="linkModal" class="linkModal">
                    Pol&iacute;tica de
                    tratamiento de datos.</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center justify-content-center mt-2">
                <button type="button" id="btnSubmit1" class="btnPrincipal">Validar</button>
            </div>
        </div>
    </form>
</div>
<div class="seccionPasoPaso">
    <div class="titutoSeccion">Agiliza tu proceso de compra.</div>
    <div class="contenedor card2 ">
        <div>
            <img src="images/scan-qr.png">
            <div class="subtituloSeccion">
                1. Escanea el QR.
            </div>
        </div>
        <div>
            <img src="images/validate-document.png">
            <div class="subtituloSeccion">
                2. Valida tu documento.
            </div>
        </div>
        <div>
            <img src="images/register-user.png">
            <div class="subtituloSeccion">
                3. Registra tus datos.
            </div>
        </div>
    </div>
</div>
<div class="mt-auto">
    <footer>
        <div class="fotter ">
            <span id="fecha"></span>
        </div>
    </footer>
</div>

<script>
    let today = new Date();
    let year = today.getFullYear();
    let sbFecha = document.getElementById('fecha');
    sbFecha.innerHTML = "© Electrojaponesa S.A - " + year;
    var $disabledResults = $(".js-example-disabled-results");
    $disabledResults.select2();
</script>
<div id="splashscreen">
    <img src="images/electrojaponesa.png" alt="" width="240" height="auto" class="img-fluid">
</div>

<div class="modal fade" id="modalUsuarioSinRegistro" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title titutoSeccion" id="exampleModalLabel">Usuario no registrado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body subtituloSeccion">
                El n&uacute;mero de documento no se encuentra registrado. ¿Desea realizar el proceso de registro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mx-auto" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" id="btnEnviarARegistro" class="btnPrincipal mx-auto"
                        onclick="window.open('registrarTercero.php','_self')">Registrar
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalinformacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title titutoSeccion" id="exampleModalLabel">Bienvenido a Electrojaponesa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="subtituloSeccion modal-body">
                Por favor ingrese su n&uacute;mero documento para validar si se encuentra registrado
                en nuestra base de datos.
            </div>
            <div class="modal-footer">
                <button type="button" class="btnPrincipal mx-auto" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUsuarioConRegistro" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title titutoSeccion" id="exampleModalLabel">Bienvenido a Electrojaponesa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="subtituloSeccion modal-body">
                Usted ya se encuentra registrado en nuestra base de datos, puede continuar con su compra.
            </div>
            <div class="modal-footer">
                <button type="button" class="btnPrincipal mx-auto" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTratamientoDatos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title titutoSeccion" id="exampleModalLabel">Politica de tratamiento de datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="subtituloSeccion modal-body">
                Aviso de privacidad
                ELECTROJAPONESA S.A. comunica que la información personal que se solicita
                a través de este formulario, será tratada para las siguientes finalidades:
                (i) Gestionar la petición, reclamo, queja, o sugerencia formulada por el titular
                del dato. (ii) Comunicarla a las empresas que prestan los servicios o productos
                en relación con los cuales se presenta la petición, reclamo, queja, o sugerencia,
                cuando éstas deban dar la respuesta requerida por el cliente. (iii) Remitir al
                titular del dato y/o peticionario la respuesta e información relacionada con su
                petición, reclamo, queja, o sugerencia; (iv) Analizar el servicio prestado y tomar
                acciones correctivas. El tratamiento de la información personal se realiza de acuerdo
                con el régimen de protección de datos personales vigente en Colombia y el marco normativo
                adoptado por la empresa.

                La política de tratamiento de datos de ELECTROJAPONESA S.A puede ser consultada
                en <a href="https://www.electrojaponesa.com/">www.electrojaponesa.com</a>, en la cual se incluyen
                los procedimientos de consultay reclamación que le permiten hacer efectivos – en cualquier
                momento- los derechos al acceso, conocimiento, consulta, rectificación, actualización y supresión de los
                datos,
                e igualmente EL CLIENTE podrá presentar Preguntas, Quejas o Reclamos (PQR´s) referida a sus
                datos personales a través del correo electrónico servicioalcliente@electrojaponesa.com o ante
                la Superintendencia de Industria y Comercio.
            </div>
            <div class="modal-footer">
                <button type="button" class="btnPrincipal mx-auto" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalCargando" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-body">
            <div class="row">
                <div class="spinner-border text-danger mx-auto " style="width: 3rem; height: 3rem;" role="status"></div>
            </div>
            <div class="row">
                <div class="text-danger fw-bold text-center"><h3>Cargando...</h3></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalError" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title titutoSeccion" id="exampleModalLabel">Error de registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="subtituloSeccion modal-body">
                Ocurri&oacute; un error en el proceso de registro. Valide la informaci&oacute;n e intente de nuevo.
            </div>
            <div class="modal-footer">
                <button type="button" class="btnPrincipal mx-auto" data-bs-dismiss="modal">Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
</body>
</html>