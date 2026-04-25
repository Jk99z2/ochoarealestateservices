<?php
	$db_host = "localhost"; //localhost server 
	$db_user = "u584847502_personales";	//database username
	$db_password = "GBou9x2FtB!!!";	//database password   
	$db_name = "u584847502_inmobiliaria";	//database name
	try
	{
	  global $db;
		$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	catch(PDOEXCEPTION $e)
	{
		$e->getMessage();
	}
?>