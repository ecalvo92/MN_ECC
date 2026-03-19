<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Models/UtilitarioModel.php";

function ConsultarUsuarioModel($consecutivo)
{
    try 
    { 
        $context = OpenDatabase();

        $sp = "CALL sp_ConsultarUsuario('$consecutivo')";
        $result = $context -> query($sp);

        $datos = null;
        while($fila = $result -> fetch_assoc())
        {
            $datos = $fila;   
        }

        CloseDatabase($context);
        return $datos;
    }
    catch (Exception $e) 
    {
        return null;
    }
}

function ActualizarPerfilModel($identificacion, $nombre, $correoElectronico, $consecutivo)
{
   try 
    { 
        $context = OpenDatabase();

        $sp = "CALL sp_ActualizarPerfil('$identificacion', '$nombre', '$correoElectronico', '$consecutivo')";
        $result = $context -> query($sp);

        CloseDatabase($context);
        return $result;
    }
    catch (Exception $e) 
    {
        return false;
    }
}