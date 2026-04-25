<?php
	session_start();
	if(!isset($_SESSION['admin_login']))
	{
			header('location: ../index.php');
	}
  if(isset($_SESSION['admin_login']))
  {
    global $correo;
    $correo = $_SESSION['admin_login'];
  }

	include '../db/dconn.php';

	$correo 			= $_SESSION['admin_login'];
	$titulo				= $_POST['titulo'];
	$categoria 		= $_POST['categoria'];
	$vrenta       = $_POST['vrenta'];
	$precio 			= $_POST['precio'];
	$precioint    = str_replace(",", "", $precio);
	$ubicacion		= $_POST['ubicacion'];
	$mapa					= $_POST['mapa'];
	$fecha 				= date("Y-m-d H:i:s");
	$terreno			= $_POST['terreno'];
	$construccion = $_POST['construccion'];
	$recamaras 		= $_POST['recamaras'];
	$niveles			= $_POST['niveles'];
	$banios 			= $_POST['banios'];
	$estac				= $_POST['estac'];
	$descripcion	= $_POST['descripcion'];
	$video 				= $_POST['video'];
	$vendido 			= 'No';
	$autorizada		= 'No';
	$expediente		= $_POST['expediente'];

	$insert_smt = $db->prepare("INSERT INTO propiedades (email_usuario, titulo, categoria, vrenta, pr_int, precio, ubicacion, mapa, fecha, terreno, construccion, recamaras, niveles, banios, estac, descripcion, video, vendido, autorizada, expediente) 
	VALUES ('".$correo."', '".$titulo."', '".$categoria."', '".$vrenta."', '".$precioint."', '".$precio."', '".$ubicacion."', '".$mapa."', '".$fecha."', '".$terreno."', '".$construccion."', '".$recamaras."', '".$niveles."', '".$banios."', '".$estac."', '".$descripcion."', '".$video."', '".$vendido."', '".$autorizada."', '".$expediente."')");
	$insert_smt->execute();

	$select_smt = $db->prepare("SELECT MAX(id) FROM propiedades;");
	$select_smt->execute();
	$property_id = $select_smt->fetch();
	$property_id = $property_id[0];
	echo $property_id . "<br>";
	

	$countfiles = count($_FILES['images']['name']);
	echo $countfiles . "<br>";

if($countfiles <= 10)
{
	for($key = 0; $key < $countfiles; $key++)
	{
		$file_name = $_FILES['images']['name'][$key];
		$tmp_name = $_FILES['images']['tmp_name'][$key];
		$file_size = $_FILES['images']['size'][$key];
		$file_type = $_FILES['images']['type'][$key];
		$file_error = $_FILES['images']['error'][$key];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$file_name_new = uniqid('', true).'.'.$file_ext;

		$file_destination = '../images/properties/'.$file_name_new;
		move_uploaded_file($tmp_name, $file_destination);
		$result[$key] = $file_name_new;
	}

	$result = array_filter($result);
	
	$finsert_smt = $db->prepare("INSERT INTO fotos (id_property, foto1, foto2, foto3, foto4, foto5, foto6, foto7, foto8, foto9, foto10) 
	VALUES ('".$property_id."', '".$result[0]."', '".$result[1]."', '".$result[2]."', '".$result[3]."', '".$result[4]."', '".$result[5]."', '".$result[6]."', '".$result[7]."', '".$result[8]."', '".$result[9]."')");
	$finsert_smt->execute();

	header("Location: ../admin/datatable-ajax-php");

}
elseif($countfiles > 10)
{
	echo "<script type='text/javascript'>alert('No se pueden subir más de 10 fotografías')</script>";
	echo "<script type='text/javascript'>history.go(-1);</script>";
}
else
{
	echo "No se han subido fotografías";
}

?>