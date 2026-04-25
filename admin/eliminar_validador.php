<!-- HACER PDO LAS CONSULTAS -->
<?php
session_start();
if(!isset($_SESSION['admin_login']))
{
    header('location: ../index.php');
}
include '../db/dconn.php';
if(!isset($_SESSION['admin_login']))
$miconexion = mysqli_connect("localhost", "root", "", "u584847502_inmobiliaria");
    if(!$miconexion) 
    {
        echo "La conexion ha fallado: ";
        exit();
    }
# Se conecta a la base de datos donde se encuentran los posts ↑ ↑ ↑
# Comienza función de borrado ↓ ↓ ↓
if(isset($_GET['id']))
{
    $id = $_GET['id']; # Obtiene el ID de la publicación
    $delete_smt = $db->prepare("SELECT * FROM usuarios WHERE id = $id;
    DELETE FROM usuarios WHERE id = $id;
    ALTER TABLE usuarios AUTO_INCREMENT = 1;"); # Se selecciona la info respecto al ID de la publicación
    $delete_smt->execute();
    header("Location: usr_adm"); # Redirecciona a la página de publicaciones
}
# Termina función de borrado ↑ ↑ ↑
?>