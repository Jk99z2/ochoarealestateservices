<?php
include '../db/dconn.php';
session_start();
if(!isset($_SESSION['admin_login']))
{
    header('location: ../index.php');
}
# Comienza función de borrado ↓ ↓ ↓
if(isset($_GET['id']))
{
    $id = $_GET['id']; # Obtiene el ID de la propiedad a borrar
    $select_smt = $db->prepare("UPDATE propiedades SET vendido = 'No' WHERE id = $id");
    $select_smt->execute();
    header("Location: ../admin/datatable-ajax-php"); # Redirige a la página de inicio
}
else
{
    echo "alert('No se pudo marcar como disponible');";
}
# Termina función de borrado ↑ ↑ ↑
?>