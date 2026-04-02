function AgregarProductoCarrito(consecutivoProducto) {

    $.ajax({
        url: '/MN_ECC/Controllers/CarritoController.php',
        method: 'POST',
        dataType: 'json',
        data: { 
            btnAgregarProductoCarrito: true, 
            ConsecutivoProducto: consecutivoProducto 
        },
        success: function (response) {
            alert(response);
            window.location.href = '/MN_ECC/Views/vHome/inicio.php';
        }
    });

}