<?php
    $id = $_REQUEST['id'];
    include '../include/db_connect.php';
    echo $id;
    $result = queryMysql("SELECT foto FROM eveniment WHERE id=$id"); 

    $row=mysqli_fetch_array($result);

   echo $row['foto'];

    
    $file = "../pic/".$row['foto'];

    unlink($file);

    $result = queryMysql(" DELETE FROM eveniment WHERE id=$id");    


    header ('location:index.php');

?>
