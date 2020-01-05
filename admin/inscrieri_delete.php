<?php
    $id = $_REQUEST['id'];
    include '../include/db_connect.php';
    $result = queryMysql(" DELETE FROM inscrieri WHERE id=$id");    
    header ('location:inscrieri.php');

?>
