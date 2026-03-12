<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Controllers/UtilitarioController.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Models/HomeModel.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Models/SeguridadModel.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["btnCambiarAcceso"])) {

    $nuevaContrasenna = $_POST["NuevaContrasenna"];
    $consecutivo = $_SESSION["Consecutivo"];

    $result = ActualizarContrasennaModel($nuevaContrasenna, $consecutivo);

    if ($result) {
        session_unset();
        session_destroy();
        header("Location: ../../Views/vHome/login.php");
        exit;
    } else {
        $_POST["Mensaje"] = "Su información no fue actualizada correctamente";
    }
}
