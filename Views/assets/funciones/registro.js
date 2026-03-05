$(function () {

    $("#formRegistro").validate({
        rules: {
            Identificacion: {
                required: true
            },
            Nombre: {
                required: true
            },
            CorreoElectronico: {
                required: true,
                email: true
            },
            Contrasenna: {
                required: true,
                maxlength: 15
            }
        },
        messages: {
            Identificacion: {
                required: "Campo obligatorio"
            },
            Nombre: {
                required: "Campo obligatorio"
            },
            CorreoElectronico: {
                required: "Campo obligatorio",
                email: "Formato incorrecto"
            },
            Contrasenna: {
                required: "Campo obligatorio",
                maxlength: "Máximo 15 caracteres"
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

function ConsultarNombre() {

    document.getElementById("Nombre").value = "";
    let identificacion = document.getElementById("Identificacion").value;

    if (identificacion.length >= 9) {
        $.ajax({
            url: 'https://apis.gometa.org/cedulas/' + identificacion,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if(response.resultcount > 0)
                {
                    document.getElementById("Nombre").value = response.nombre;
                }                
            }
        });
    }
}