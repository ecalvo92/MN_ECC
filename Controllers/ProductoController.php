<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Controllers/UtilitarioController.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Models/ProductoModel.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function ConsultarProductos()
{
    return ConsultarProductosModel();
}

if (isset($_POST["btnCambiarEstado"])) {

    $consecutivoProducto = $_POST["Consecutivo"];

    $result = ActualizarEstadoProductoModel($consecutivoProducto);

    if ($result) {
         header("Location: ../../Views/vProducto/consultarProductos.php");
         exit;
    } else {
         $_POST["Mensaje"] = "La información no fue actualizada correctamente";
    }
}