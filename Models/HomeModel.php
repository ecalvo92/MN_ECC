<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Models/UtilitarioModel.php";

function RegistrarModel($identificacion, $nombre, $contrasenna, $correoElectroncio)
{
    $context = OpenDatabase();

    $sp = "CALL sp_Registrar('$identificacion', '$nombre', '$contrasenna', '$correoElectroncio')";
    $result = $context -> query($sp);

    CloseDatabase($context);
    return $result;
}

function IniciarSesionModel($correoElectronico, $contrasenna)
{
    $context = OpenDatabase();

    $sp = "CALL sp_IniciarSesion('$correoElectronico', '$contrasenna')";
    $result = $context -> query($sp);

    $datos = null;
    while($fila = $result -> fetch_assoc())
    {
        $datos = $fila;   
    }

    CloseDatabase($context);
    return $datos;
}