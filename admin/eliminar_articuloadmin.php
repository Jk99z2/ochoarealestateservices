<?php
session_start();
if(!isset($_SESSION['admin_login']))
{
    header('location: ../index.php');
}
include '../db/dconn.php';
# Se conecta a la base de datos donde se encuentran los posts ↑ ↑ ↑
# Comienza función de borrado ↓ ↓ ↓

if(isset($_GET['id']))
{
    $id = $_GET['id']; # Obtiene el ID de la 

    $select_smt = $db->prepare("SELECT * FROM propiedades WHERE id = $id");
    $select_smt->execute();

    $select_smt2 = $db->prepare("SELECT * FROM fotos WHERE id_property = $id");
    $select_smt2->execute();
    
    while($row = $select_smt2->fetch(PDO::FETCH_ASSOC))
    {
        $rows[] = $row;
    }

    foreach($rows as $row)
    {
        $img1 = "../images/properties/" . $row['foto1'];
        $img2 = "../images/properties/" . $row['foto2'];
        $img3 = "../images/properties/" . $row['foto3'];
        $img4 = "../images/properties/" . $row['foto4'];
        $img5 = "../images/properties/" . $row['foto5'];
        $img6 = "../images/properties/" . $row['foto6'];
        $img7 = "../images/properties/" . $row['foto7'];
        $img8 = "../images/properties/" . $row['foto8'];
        $img9 = "../images/properties/" . $row['foto9'];
        $img10 = "../images/properties/" . $row['foto10'];
    }
    unlink($img1);
    unlink($img2);
    unlink($img3);
    unlink($img4);
    unlink($img5);
    unlink($img6);
    unlink($img7);
    unlink($img8);
    unlink($img9);
    unlink($img10);

    $select_smt3 = $db->prepare("DELETE FROM propiedades WHERE id = $id; ALTER TABLE propiedades AUTO_INCREMENT = 1;");
    $select_smt3->execute();

    $auto_smt = $db->prepare("ALTER TABLE propiedades AUTO_INCREMENT = 1");
    $auto_smt->execute();
}
# Termina función de borrado ↑ ↑ ↑
?>
<script type="text/javascript">
	alert("Se ha eliminado la publicacion");
	window.location.href='/admin/datatable-ajax-php';
</script>