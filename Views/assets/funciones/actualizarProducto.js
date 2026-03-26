$(function () {

    $.validator.addMethod("soloPNG", function (value, element) {
        if (element.files && element.files.length > 0) {
            return /\.png$/i.test(element.files[0].name);
        }
        return true; // se deja pasar si está vacío (required lo captura)
    }, "Solo se permiten archivos PNG");

    $("#Precio").on("input", function () {
        let val = $(this).val().replace(/[^0-9.,]/g, "");
        $(this).val(val);
    }).on("blur", function () {
        let raw = $(this).val().replace(/,/g, ".");
        let num = parseFloat(raw);
        if (!isNaN(num)) {
            $(this).val(num.toFixed(2).replace(".", ","));
        }
    });

    $("#Cantidad").on("input", function () {
        $(this).val($(this).val().replace(/[^0-9]/g, ""));
    });

    $("#formActualizarProducto").validate({
        rules: {
            Nombre: {
                required: true
            },
            Descripcion: {
                required: true
            },
            Precio: {
                required: true
            },
            Cantidad: {
                required: true,
                digits: true
            },
            ImagenProducto: {
                soloPNG: true
            }
        },
        messages: {
            Nombre: {
                required: "Campo obligatorio"
            },
            Descripcion: {
                required: "Campo obligatorio"
            },
            Precio: {
                required: "Campo obligatorio"
            },
            Cantidad: {
                required: "Campo obligatorio",
                digits: "Solo se permiten números enteros"
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