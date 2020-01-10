<?php
session_start();
include 'head.php';
include '../include/db_connect.php';
$result = queryMysql ("SELECT * FROM despre");
$row = mysqli_fetch_array($result);
$text = $row['text']; $foto = $row['foto'];
$_SESSION["pozaCurenta"] = $foto;
echo "<h1 style='text-align:center;margin-top:20px;'>Editează pagina 'Despre noi'</h1>";
?>
<body>
 
    
<?php     

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $text = $_POST['text'];
             
        //the path to store the uploaded image
        $target = "../pic/".basename($_FILES['filename']['name']);          
        
        //get all the submitted data from the form
        $foto = $_FILES['filename']['name'];       
        
        if(empty($foto)){
            $foto = $_SESSION["pozaCurenta"];
        }
        
        $result = queryMysql
            ("
            UPDATE despre SET
            text='$text',
            foto='$foto'
            ");
        
        //Move the uploaded image into the folder 'tratamente'
        if (move_uploaded_file($_FILES['filename']['tmp_name'],$target)){
            $msg = "OK";
        } else {
            $msg = "Not OK";
        }
        
        
        header('location:index.php');

    }
?>       
    
    
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">   
        <br>
        <hr>
        <label>Text</label>
        <br>
        <textarea name="text" id="text"><?php echo $text; ?></textarea>
        <hr>
        <label>Schimbi imaginea?</label>
        <br>
        <img src="../pic/<?php echo $foto; ?>">
        <input type="file" name="filename">
        <hr>
        <input type="submit" name="edit" value="Confirmă modificările" class="btn btn-success">
    </form> 
    
<script>
    CKEDITOR.replace( 'text' );
</script>    
    
</body>
