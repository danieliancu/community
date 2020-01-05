<?php
    $id = $_REQUEST['id'];
    include '../include/db_connect.php';
    $result = queryMysql(" DELETE FROM voluntari WHERE id=$id");    
    header ('location:voluntari.php');

?>
