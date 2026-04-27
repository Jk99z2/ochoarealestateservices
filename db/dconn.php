<?php
    $db_host = "ochoa_db";
    $db_user = "ochoa";
    $db_password = "OchoaPass2026x";
    $db_name = "ochoa_db";
    try
    {
        global $db;
        $db = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        $e->getMessage();
    }
?>
