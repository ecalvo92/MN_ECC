<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Models/HomeModel.php";

if (isset($_POST["btnRegistrar"])) {

    $identificacion = $_POST["Identificacion"];
    $nombre = $_POST["Nombre"];
    $contrasenna = $_POST["Contrasenna"];

    $result = Registrar($identificacion, $nombre, $contrasenna);

    if ($result) {
        header("Location: ../../Views/vHome/login.php");
        exit;
    } else {
        $_POST["Mensaje"] = "Su información no fue registrada correctamente";
    }
}
