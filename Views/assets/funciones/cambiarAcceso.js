$(function () {

    $.validator.addMethod("sinEspacios", function (value) {
        return !/\s/.test(value);
    }, "La contraseña no debe contener espacios");

    $("#formCambiarAcceso").validate({
        rules: {
            NuevaContrasenna: {
                required: true,
                minlength: 8,
                sinEspacios: true
            },
            ConfirmarContrasenna: {
                required: true,
                equalTo: "#NuevaContrasenna"
            }
        },
        messages: {
            NuevaContrasenna: {
                required: "Campo obligatorio",
                minlength: "Mínimo 8 caracteres"
            },
            ConfirmarContrasenna: {
                required: "Campo obligatorio",
                equalTo: "Las contraseñas no coinciden"
            }
        },
        errorElement: "span",
        errorClass: "text-danger",
        highlight: function (element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid");
        }
    });

});