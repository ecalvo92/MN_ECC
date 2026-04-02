<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Models/UtilitarioModel.php";

function AgregarProductoCarritoModel($consecutivoProducto, $consecutivoUsuario, $cantidad)
{
    try 
    { 
        $context = OpenDatabase();

        $sp = "CALL sp_AgregarProductoCarrito('$consecutivoProducto', '$consecutivoUsuario', $cantidad)";
        $result = $context -> query($sp);

        CloseDatabase($context);
        return $result;
    }
    catch (Exception $e) 
    {
        return false;
    }
}