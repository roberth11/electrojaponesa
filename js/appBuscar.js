$(document).ready(function () {
    $.SplashScreen({
        id: 'splashscreen',
        desktop: true,
        mobile: true,
        forceLoader: false,
        queryParameter: 'loader',
        progressCount: false,
        progressCountId: 'status',
        progressBar: false,
        progressBarId: 'progress',
        fadeEffect: true,
        timeToFade: 100, // in milliseconds (eg: 1000 = 1sec)
        timeOut: 200   // in milliseconds (eg: 2000 = 2sec)
    });

    $("#formVerificarCliente").keypress(function (e) {
        if (e.which == 13) {
            return false;
        }
    });

    let myModal = new bootstrap.Modal("#modalinformacion", {});
    myModal.show();

    $('#linkModal').click(function () {
        let myModal = new bootstrap.Modal("#modalTratamientoDatos", {});
        myModal.show();
    });

    $("#btnSubmit1").attr("disabled", "disabled");
    $("#btnSubmit1").addClass("botonInactivo");

    $('#txtPolitica').on('change', function () {
        if ($(this).is(':checked')) {
            $("#btnSubmit1").removeAttr("disabled");
            $("#btnSubmit1").removeClass("botonInactivo")
        } else {
            $("#btnSubmit1").attr("disabled", "disabled");
            $("#btnSubmit1").addClass("botonInactivo")
        }
    });

    jQuery.validator.addMethod("alphanumeric", function (value, element) {
        return this.optional(element) || /^\w+$/i.test(value);
    }, "Solo letras, números y guiones bajos, por favor");

    $("#formVerificarCliente").validate(
        {
            rules: {
                txtDocumento: {
                    required: true,
                    maxlength: 15,
                    alphanumeric: true
                },

            },
            messages: {
                txtDocumento: {
                    required: "Campo requerido",
                    maxlength: "Maximo 15 caracteres"
                },

            }
        }
    );

    $('#btnSubmit1').click(function () {
        if ($("#formVerificarCliente").valid()) {
            $.ajax({
                url: "controller/consultaController.php",
                type: 'post',
                data: $("#formVerificarCliente").serialize(),
                dataType: 'json',
                success: function (dataType) {
                    if (dataType.msj === 'true') {

                        let myModal = new bootstrap.Modal("#modalUsuarioConRegistro", {});
                        myModal.show();

                        $('#formVerificarCliente')[0].reset();
                        $("#btnSubmit1").attr("disabled", "disabled");
                        $("#btnSubmit1").addClass("botonInactivo");

                    } else {
                        let myModal = new bootstrap.Modal("#modalUsuarioSinRegistro", {});
                        myModal.show();
                        $('#formVerificarCliente')[0].reset();
                        $("#btnSubmit1").attr("disabled", "disabled");
                        $("#btnSubmit1").addClass("botonInactivo")
                    }
                },
                error: function (request, status, error) {
                    let modalError = new bootstrap.Modal("#modalError", {backdrop: 'static', keyboard: false});
                    modalError.show();
                }
            })
        }
    });

});