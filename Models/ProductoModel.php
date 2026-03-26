<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Models/UtilitarioModel.php";

function ConsultarProductosModel()
{
    try 
    { 
        $context = OpenDatabase();

        $sp = "CALL sp_ConsultarProductos()";
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

function ActualizarEstadoProductoModel($consecutivoProducto)
{
   try 
    { 
        $context = OpenDatabase();

        $sp = "CALL sp_ActualizarEstadoProducto('$consecutivoProducto')";
        $result = $context -> query($sp);

        CloseDatabase($context);
        return $result;
    }
    catch (Exception $e) 
    {
        return false;
    }
}

function AgregarProductoModel($nombre, $descripcion, $precio, $cantidad, $imagenProducto)
{
   try 
    { 
        $context = OpenDatabase();

        $sp = "CALL sp_AgregarProducto('$nombre', '$descripcion', '$precio', '$cantidad', '$imagenProducto')";
        $result = $context -> query($sp);

        CloseDatabase($context);
        return $result;
    }
    catch (Exception $e) 
    {
        return false;
    }
}