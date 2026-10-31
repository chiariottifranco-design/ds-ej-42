<?php
require_once '../modelo/recital.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Accion = $_POST['accion'] ?? '';
    $Nombre = $_POST['nombre'] ?? '';
    $Lugar = $_POST['lugar'] ?? '';
    $Fecha = $_POST['fecha'] ?? '';
    $Hora = $_POST['hora'] ?? '';
    $Capacidad = $_POST['capacidad'] ?? '';
    $PrecioEntrada = $_POST['precioEntrada'] ?? '';
    $Id = $_POST['id'] ?? '';

    if ($Accion === 'agregar') {
        Recital::agregar($Nombre, $Lugar, $Fecha, $Hora, $Capacidad, $PrecioEntrada);
        header('Location: vistas/listar.php');
        exit;
    }

    if ($Accion === 'editar') {
        Recital::editar($Id, $Nombre, $Lugar, $Fecha, $Hora, $Capacidad, $PrecioEntrada);
        header('Location: vistas/listar.php');
        exit;
    }

    if ($Accion === 'eliminar') {
        Recital::eliminar($Id);
        header('Location: vistas/listar.php');
        exit;
    }
}
?>
