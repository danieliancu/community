<?php
    session_start();
    $_SESSION['arhiva'] = "";
    $arhiva = $_SESSION['arhiva'];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'include/db_connect.php';
        $nume = $_POST['nume'];
        $prenume = $_POST['prenume'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];
        $mesaj = $_POST['mesaj'];
        $status = "in progress";
        
        
        $result = queryMysql
        (" INSERT INTO voluntari
        (nume, prenume, telefon, email, mesaj, status)
        VALUES
        ('$nume','$prenume','$telefon','$email','$mesaj','$status')
        ");
    }
?>

<!DOCTYPE html>
<html>
    
<head>
  <title>South East Romanian Community | United Kingdom</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
<script src='https://kit.fontawesome.com/a076d05399.js'></script> 

<link href="https://fonts.googleapis.com/css?family=Barlow:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">


<link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/css.css">  
</head>
    
<body>
<script src="js/js.js"></script>   
    
    


<div class="black">
	<div class="left">
    	<a href="info@abcd.com"><i class='far fa-envelope'></i> office@ro-community.co.uk</a>
        <div class="icons">
        	<a href="facebook.com"><i class='fab fa-facebook'></i></a>        
        	<a href="twitter.com"><i class='fab fa-twitter-square'></i></a>
        	<a href="instagram.com"><i class='fab fa-instagram'></i></a>        
        </div>
    </div>
    <div class="right">
    	<button data-toggle="modal" data-target="#myModal"><i class='fas fa-heart' style="font-size:12px;"></i> <span class="rightText">VREAU SĂ AJUT!</span> </button>
        <a href="#" id="cautare"><i class='fas fa-search' style="font-size:12px;"></i> <span class="rightText">Căutare</span></a>
        <span class="more"><i class='fas fa-ellipsis-h'></i></span>        
    </div>

</div>


<div class="header">
	<div class="logo">
        <img src="pic/logo_SRC_white_web.svg">
    </div>
    <div class="menu">
    	<a href="index.php">Acasă</a>
    	<a href="#who">Cine suntem</a>        
    	<a href="pages.php">Evenimente</a>
    	<a href="#">News</a>
        <a href="#brexit">Brexit</a>
    </div>
    <div class="responsive"><i class='fas fa-bars'></i></div>
    <div class="noResponsive"><i class='fas fa-times'></i></div>
</div>

<div class="backHeader"></div>

<div class="cauta">
    <form class="cautare">
        <div class="closeCautare"><i class='fas fa-times'></i></div>
        <input type="text" placeholder="Caută in website">
        <button type="submit">CAUTĂ <i class='fas fa-arrow-right'></i></button>
    </form>
</div>
    
<div class="modal" id="myModal">
    <div class="modal-content">
        <form class="contact" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <img src="pic/logo_SRC_white.svg">
            <br>
            <label>Vrei să fii voluntar? Vrei să te implici în acțiunile comunității românești din orașul tau? Trimite formularul de înscriere cu datele tale. Te vom contacta în cel mai scurt timp posibil.</label>            
            <div class="row">
                <input type="text" placeholder="Nume" class="col-md-3" name="nume" required>
                <input type="text" placeholder="Prenume" class="col-md-3" name="prenume" required>
                <input type="text" placeholder="Telefon" class="col-md-3" name="telefon" required>
                <input type="mail" placeholder="Adresă email" class="col-md-3" name="email">
            </div>   
            <br>
            <label>Dacă vrei să ne lași un mesaj:</label>
            <br>
            <textarea name="mesaj"></textarea>
            <br>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Solicitare înscriere</button>
            <button class="btn btn-secondary" data-dismiss="modal">Anulare</button>
            <br>
            <br>
        </form>
    </div>    
</div>    
