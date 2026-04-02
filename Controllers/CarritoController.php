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
        echo json_encode("Producto agregado al carrito correctamente");
    } else {
        echo json_encode("Error al agregar el producto al carrito");
    }

}