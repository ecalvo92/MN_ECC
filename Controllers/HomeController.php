<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Models/HomeModel.php";

if (session_status() === PHP_SESSION_NONE)
{
    session_start();
}

if (isset($_POST["btnRegistrar"])) {

    $identificacion = $_POST["Identificacion"];
    $nombre = $_POST["Nombre"];
    $correoElectronico = $_POST["CorreoElectronico"];
    $contrasenna = $_POST["Contrasenna"];

    $result = RegistrarModel($identificacion, $nombre, $contrasenna, $correoElectronico);

    if ($result) {
        header("Location: ../../Views/vHome/login.php");
        exit;
    } else {
        $_POST["Mensaje"] = "Su información no fue registrada correctamente";
    }
}

if (isset($_POST["btnIniciarSesion"])) {

    $correoElectronico = $_POST["CorreoElectronico"];
    $contrasenna = $_POST["Contrasenna"];

    $result = IniciarSesionModel($correoElectronico, $contrasenna);

    if ($result) {
        $_SESSION["NombreUsuario"] = $result["Nombre"];
        header("Location: ../../Views/vHome/inicio.php");
        exit;
    } else {
        $_POST["Mensaje"] = "Su información no fue autenticada correctamente";
    }
}