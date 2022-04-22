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
    $('#slCiudad').append("<option value='' >Ciudad...<option>");
    $('#slDepartamento').append("<option value='' >Departamento...</option>");
    $('#slBarrio').append("<option value='' >Barrio...</option>");

    $.getJSON('util/departamento.json', function (json) {
        $('#slDepartamento').empty()
        $('#slDepartamento').append("<option value='' >Departamento...</option>");
        $.each(json.data, function (key, val) {
            $('#slDepartamento').append("<option value='" + val.id + "' >" + val.descripcion + "</option>");
        });
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

    $('#linkModal').click(function () {
        let myModal = new bootstrap.Modal("#modalTratamientoDatos", {});
        myModal.show();
    });

    $('#slDepartamento').change(function () {
        let sbIdDepartamento = $('#slDepartamento').val();

        $.getJSON('util/ciudad.json', function (json) {
            $('#slCiudad').empty()
            $('#slCiudad').append("<option value='' >Ciudad...</option>");
            $.each(json, function (key, val) {
                $.each(val, function (index, data) {
                    if (sbIdDepartamento == key)
                        $('#slCiudad').append("<option value='" + data.id + "' >" + data.descripcion + "</option>");

                });
            });
        });
    });

    $('#slCiudad').change(function () {
        let sbIdDepartamento = $('#slDepartamento').val();
        let sbIdCiudad = $('#slCiudad').val();

        $.getJSON('util/barrios.json', function (json) {
            $('#slBarrio').empty()
            $('#slBarrio').append("<option value='' >Barrio...</option>");
            $.each(json, function (key, val) {
                if (sbIdDepartamento == key) {
                    $.each(val, function (index, data) {
                        $.each(data, function (key2, valor) {
                            if (sbIdCiudad == key2) {
                                $.each(valor, function (key3, barrio) {
                                    $('#slBarrio').append("<option value='" + barrio.id + "' >" + barrio.descripcion + "</option>");
                                });
                            }
                        });
                    });
                }
            });
        });
    });

    $.getJSON('util/tiposDocumentos.json', function (json) {
        $('#slTipoDocumento').empty()
        $('#slTipoDocumento').append("<option value='' >Tipo Documento...</option>");
        $.each(json.data, function (key, val) {
            $('#slTipoDocumento').append("<option value='" + val.id + "' >" + val.descripcion + "</option>");
        });
    });

    jQuery.validator.addMethod("alphanumeric", function (value, element) {
        return this.optional(element) || /^[A-Za-z0-9\u00f1\u00d1\s]+$/i.test(value);
    }, "Solo letras, números");

    jQuery.validator.addMethod("validate_email", function (value, element) {

        if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
            return true;
        } else {
            return false;
        }
    }, "Correo invalido");

    $("#formCliente").validate(
        {
            ignore: "",
            rules: {
                slTipoDocumento: {
                    required: true,
                    maxlength: 1
                },
                txtDocumento: {
                    required: true,
                    maxlength: 15
                },
                txtNombre: {
                    required: true,
                    maxlength: 40,
                    alphanumeric: true
                },
                txtApellido: {
                    required: true,
                    maxlength: 29,
                    alphanumeric: true
                },
                txtApellido2: {
                    maxlength: 29,
                    alphanumeric: true
                },
                txtTelefono: {
                    required: true,
                    maxlength: 20,
                    minlength: 8,
                    number: true
                },
                txtCorreo: {
                    required: true,
                    maxlength: 255,
                    validate_email: true
                },
                txtDirreccion1: {
                    required: true,
                    maxlength: 40
                },
                slDepartamento: {
                    required: true,
                    maxlength: 2
                },
                txtDireccion1: {
                    required: true,
                    maxlength: 40
                },
                slCiudad: {
                    required: true,
                    maxlength: 3
                },
                txtBarrio: {
                    maxlength: 40,
                    alphanumeric: true
                },
            },
            messages: {
                slTipoDocumento: {
                    required: "Campo requerido",
                    maxlength: "Maximo 1 caracter"
                },
                txtDocumento: {
                    required: "Campo requerido",
                    maxlength: "Maximo 15 caracteres"
                },
                txtNombre: {
                    required: "Campo requerido",
                    maxlength: "Maximo 40 caracteres",
                    alphanumeric: "Caracter no valido"
                },
                txtApellido: {
                    required: "Campo requerido",
                    maxlength: "Maximo 29 caracteres",
                    alphanumeric: "Caracter no valido"
                },
                txtApellido2: {
                    maxlength: "Maximo 29 caracteres",
                    alphanumeric: "Caracter no valido"
                },
                txtTelefono: {
                    required: "Campo requerido",
                    maxlength: "Maximo 20 caracteres",
                    minlength: "Minimo 8 caracteres",
                    number: "Ingrese un numero valido"
                },
                txtCorreo: {
                    required: "Campo requerido",
                    maxlength: "Maximo 255 caracteres"
                },
                txtDireccion1: {
                    required: "Campo requerido",
                    maxlength: "Maximo 40 caracteres"
                },
                slDepartamento: {
                    required: "Campo requerido",
                    maxlength: "Maximo 2 caracteres"
                },
                slCiudad: {
                    required: "Campo requerido",
                    maxlength: "Maximo 3 caracteres"
                },
                txtBarrio: {
                    maxlength: "Maximo 40 caracteres",
                    alphanumeric: "Caracter no valido"
                },
            }
        }
    );

    $('#btnSubmit1').click(function () {
        if ($("#slTipoDocumento").val() == "") {
            $(".selectipodocumento").addClass('select_error');
        } else {
            $(".selectipodocumento").removeClass('select_error');
        }
        if ($("#slDepartamento").val() == "") {
            $(".selecdepartamento").addClass('select_error');
        } else {
            $(".selecdepartamento").removeClass('select_error');
        }
        if ($("#slCiudad").val() == "") {
            $(".selecciudad").addClass('select_error');
        } else {
            $(".selecciudad").removeClass('select_error');
        }

        if ($("#formCliente").valid()) {
            var myModal = new bootstrap.Modal("#modalCargando", {backdrop: 'static', keyboard: false});
            myModal.show();
            $.ajax({
                url: "controller/terceroController.php",
                type: 'post',
                data: $("#formCliente").serialize(),
                dataType: 'json',
                success: function (dataType) {
                    console.log(dataType);
                    if (dataType.msj === 'true') {
                        $('#formCliente')[0].reset();
                        myModal.hide();
                        let modalExito = new bootstrap.Modal("#modalExito", {backdrop: 'static', keyboard: false});
                        modalExito.show();
                    } else {
                        myModal.hide();
                        let modalExito = new bootstrap.Modal("#modalError", {backdrop: 'static', keyboard: false});
                        modalExito.show();
                    }
                },
                error: function (request, status, error) {
                    myModal.hide();
                    let modalError = new bootstrap.Modal("#modalError", {backdrop: 'static', keyboard: false});
                    modalError.show();
                }
            })
        }

    });

});