<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Controllers/UtilitarioController.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Models/SeguridadModel.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Models/HomeModel.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["btnCambiarAcceso"])) {

    $nuevaContrasenna = $_POST["NuevaContrasenna"];
    $consecutivo = $_SESSION["Consecutivo"];
    $correoElectronico = $_SESSION["CorreoElectronico"];
    $nombre = $_SESSION["NombreUsuario"];

    $result = ActualizarContrasennaModel($nuevaContrasenna, $consecutivo);

    if ($result) {
        session_unset();
        session_destroy();

        $plantilla = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Views/emails/cambioAcceso.html");
        $cuerpoCorreo = str_replace(
            ["{{NOMBRE}}", "{{FECHA}}"],
            [$nombre, date("d/m/Y H:i")],
            $plantilla
        );

        EnviarCorreo("Cambio de Acceso", $cuerpoCorreo, $correoElectronico);

        header("Location: ../../Views/vHome/login.php");
        exit;
    } else {
        $_POST["Mensaje"] = "Su información no fue actualizada correctamente";
    }
}

if (isset($_POST["btnCambiarPerfil"])) {

    $identificacion = $_POST["Identificacion"];
    $nombre = $_POST["Nombre"];
    $correoElectronico = $_POST["CorreoElectronico"];
    $consecutivo = $_SESSION["Consecutivo"];

    $result = ActualizarPerfilModel($identificacion, $nombre, $correoElectronico, $consecutivo);

    if ($result) {
        $_SESSION["NombreUsuario"] = $nombre;
        $_SESSION["CorreoElectronico"] = $correoElectronico;
        $_POST["Mensaje"] = "Su información fue actualizada correctamente";
    } else {
        $_POST["Mensaje"] = "Su información no fue actualizada correctamente";
    }
}

function ConsultarUsuario()
{
    $consecutivo = $_SESSION["Consecutivo"];
    return ConsultarUsuarioModel($consecutivo);
}