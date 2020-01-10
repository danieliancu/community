<!DOCTYPE html>
<html lang="en">

<head>
    <title>Website Administrator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/admin.css">
    
    
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>   


</head>

<body>
    <nav>
        <button class="btn btn-success"><a href="new.php">Element Nou</a></button>
        <button class="btn btn-success"><a href="index.php">Toate articolele</a></button>
        <button class="btn btn-warning"><a href="index.php?articol=eveniment">Evenimente</a></button>
        <button class="btn btn-warning"><a href="index.php?articol=news">News</a></button>
        <button class="btn btn-warning"><a href="index.php?articol=brexit">Brexit</a></button>
        <button class="btn btn-light"><a href="despre.php" style="color:black;">Despre noi</a></button>
        <button class="btn btn-primary">Prima Pagină</button>   
        <button class="btn btn-danger" style="float:right;" onclick="<?php session_unset();session_destroy(); ?>"><a href="../index.php">Exit</a></button>
        <button class="btn btn-secondary" style="float:right;margin-right:10px;"><a href="voluntari.php">Voluntari</a></button> 
        <button class="btn btn-secondary" style="float:right;margin-right:10px;"><a href="inscrieri.php">Înscrieri evenimente</a></button>         
        

    </nav>
</body>
