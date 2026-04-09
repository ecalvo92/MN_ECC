function soloNumeros(e) {
    var codigo = e.charCode || e.keyCode;
    if (codigo < 48 || codigo > 57) e.preventDefault();
}

function cambiarCantidad(consecutivoProducto, cantidad) {
    var input = document.getElementById('cantidad_' + consecutivoProducto);
    var nuevaValor = parseInt(input.value) + cantidad;

    if (nuevaValor >= 1 && nuevaValor <= 99) 
        input.value = nuevaValor;
}

function AgregarProductoCarrito(consecutivoProducto, inventario) {
    var cantidad = document.getElementById('cantidad_' + consecutivoProducto).value;

    if(cantidad > inventario)
    {
        alert("La cantidad supera las unidades disponibles");
        return;
    }

    $.ajax({
        url: '/MN_ECC/Controllers/CarritoController.php',
        method: 'POST',
        dataType: 'json',
        data: {
            btnAgregarProductoCarrito: true,
            ConsecutivoProducto: consecutivoProducto,
            Cantidad: cantidad
        },
        success: function (response) {
            alert(response);
            window.location.href = '/MN_ECC/Views/vHome/inicio.php';
        }
    });

}