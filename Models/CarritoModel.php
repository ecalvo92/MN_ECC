<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Models/UtilitarioModel.php";

function AgregarProductoCarritoModel($consecutivoProducto, $consecutivoUsuario, $cantidad)
{
    try 
    { 
        $context = OpenDatabase();

        $sp = "CALL sp_AgregarProductoCarrito('$consecutivoProducto', '$consecutivoUsuario', '$cantidad')";
        $result = $context -> query($sp);

        CloseDatabase($context);
        return $result;
    }
    catch (Exception $e) 
    {
        return false;
    }
}

function PagarCarritoModel($consecutivoUsuario)
{
    try 
    { 
        $context = OpenDatabase();

        $sp = "CALL sp_PagarCarrito('$consecutivoUsuario')";
        $result = $context -> query($sp);

        CloseDatabase($context);
        return $result;
    }
    catch (Exception $e) 
    {
        return false;
    }
}

function RemoverProductoCarritoModel($consecutivoCarrito)
{
    try 
    { 
        $context = OpenDatabase();

        $sp = "CALL sp_RemoverProductoCarrito('$consecutivoCarrito')";
        $result = $context -> query($sp);

        CloseDatabase($context);
        return $result;
    }
    catch (Exception $e) 
    {
        return false;
    }
}

function ConsultarCarritoModel($consecutivoUsuario)
{
    try 
    { 
        $context = OpenDatabase();

        $sp = "CALL sp_ConsultarCarrito('$consecutivoUsuario')";
        $result = $context -> query($sp);

        $datos = [];
        while($fila = $result -> fetch_assoc())
        {
            $datos[] = $fila;   
        }

        CloseDatabase($context);
        return $datos;
    }
    catch (Exception $e) 
    {
        return null;
    }
}

function ConsultarResumenCarritoModel($consecutivoUsuario)
{
    try 
    { 
        $context = OpenDatabase();

        $sp = "CALL sp_ConsultarResumenCarrito('$consecutivoUsuario')";
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
