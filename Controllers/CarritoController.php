<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Models/CarritoModel.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST["btnAgregarProductoCarrito"])) {
     
    $consecutivoProducto = $_POST["ConsecutivoProducto"];
    $consecutivoUsuario = $_SESSION["Consecutivo"];
    $cantidad = 1;

    $result = AgregarProductoCarritoModel($consecutivoProducto, $consecutivoUsuario, $cantidad);

    if ($result) {
        ConsultarResumenCarrito();
        echo json_encode("Producto agregado al carrito correctamente");
    } else {
        echo json_encode("Error al agregar el producto al carrito");
    }

}

function ConsultarCarrito()
{
    $consecutivoUsuario = $_SESSION["Consecutivo"];
    return ConsultarCarritoModel($consecutivoUsuario);
}

function ConsultarResumenCarrito()
{
    $consecutivoUsuario = $_SESSION["Consecutivo"];
    $result = ConsultarResumenCarritoModel($consecutivoUsuario);

    $_SESSION["TotalCantidad"] = $result["TotalCantidad"];
    $_SESSION["TotalPago"] = $result["TotalPago"];
}
