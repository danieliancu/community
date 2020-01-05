<?php
if(isset($_POST['submit'])){
    require_once 'include/db_connect.php'; 
    
        $nume = $_POST['nume'];
        $prenume = $_POST['prenume'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];
        $mesaj = $_POST['mesaj'];
        $evenimentID = $_POST['evenimentID'];
        $status = "in progress";
     
        $result = queryMysql
        (" INSERT INTO inscrieri
        (nume, prenume, telefon, email, mesaj, evenimentID, status)
        VALUES
        ('$nume','$prenume','$telefon','$email','$mesaj','$evenimentID','$status')
        ");
         
        header("Location:page.php?id=$evenimentID");
     
    }


?>
