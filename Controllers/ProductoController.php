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

function ConsultarProducto($consecutivoProducto)
{
    return ConsultarProductoModel($consecutivoProducto);
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

if (isset($_POST["btnAgregarProducto"])){

    $nombre = $_POST["Nombre"];
    $descripcion = $_POST["Descripcion"];
    $precio = $_POST["Precio"];
    $cantidad = $_POST["Cantidad"];
    $imagenProducto = '/MN_ECC/Views/assets/imgProductos/' . $_FILES["ImagenProducto"]["name"];

    $origen = $_FILES["ImagenProducto"]["tmp_name"];
    $destino = $_SERVER["DOCUMENT_ROOT"] . '/MN_ECC/Views/assets/imgProductos/' . $_FILES["ImagenProducto"]["name"];;
    copy($origen, $destino);

    $result = AgregarProductoModel($nombre, $descripcion, $precio, $cantidad, $imagenProducto);

    if($result) {
        header("Location: ../../Views/vProducto/consultarProductos.php");
        exit;
    } else {
         $_POST["Mensaje"] = "La información no fue registrada correctamente";
    }

}

if (isset($_POST["btnActualizarProducto"])){

    $consecutivoProducto = $_POST["Consecutivo"];
    $nombre = $_POST["Nombre"];
    $descripcion = $_POST["Descripcion"];
    $precio = $_POST["Precio"];
    $cantidad = $_POST["Cantidad"];
    $imagenProducto = "";

    if($_FILES["ImagenProducto"]["name"] != "") {
        $imagenProducto = '/MN_ECC/Views/assets/imgProductos/' . $_FILES["ImagenProducto"]["name"];
    
        $origen = $_FILES["ImagenProducto"]["tmp_name"];
        $destino = $_SERVER["DOCUMENT_ROOT"] . '/MN_ECC/Views/assets/imgProductos/' . $_FILES["ImagenProducto"]["name"];;
        copy($origen, $destino);
    }

    $result = ActualizarProductoModel($consecutivoProducto, $nombre, $descripcion, $precio, $cantidad, $imagenProducto);

    if($result) {
        header("Location: ../../Views/vProducto/consultarProductos.php");
        exit;
    } else {
         $_POST["Mensaje"] = "La información no fue actualizada correctamente";
    }

}