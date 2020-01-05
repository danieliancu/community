<?php
include 'head.php';
echo "<h1 style='text-align:center;margin-top:20px;'>Adaugă articol nou</h1>";

?>
<body>
<?php     
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        include '../include/db_connect.php';
        
        $tip = $_POST['tip'];
        $data = $_POST['data'];
        $eveniment = test_input($_POST['eveniment']);
        $trimitere = test_input($_POST['trimitere']);        
        $titlu = test_input($_POST['titlu']);
        $sapou = test_input($_POST['sapou']);
        $text = test_input($_POST['text']);
        
 
        
        
        //the path to store the uploaded image
        $target = "../pic/".basename($_FILES['filename']['name']);  
        
        //get all the submitted data from the form
        $foto = $_FILES['filename']['name'];        
        
        
        $result = queryMysql
            ("INSERT INTO eveniment
            (tip, data, eveniment, trimitere, titlu, sapou, text, foto)
            VALUES
            ('$tip','$data','$eveniment','$trimitere','$titlu','$sapou','$text','$foto')
            ");
        
        
        //Move the uploaded image into the folder 'tratamente'
        if (move_uploaded_file($_FILES['filename']['tmp_name'],$target)){
            $msg = "Image uploaded successfuly";
        } else {
            $msg = "There was a problem uploading image";
        }
            
        
        
        header('location:index.php');

    }
?>    
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        <label>Tip articol</label>
        <select name="tip">
            <option value="eveniment">Eveniment</option>
            <option value="news">News</option>
            <option value="brexit">Brexit</option>
        </select>
        <br>

        <div class="event">
            <hr>
            <label>Data eveniment</label>
            <input type="date" name="data">
            <label>Etichetă eveniment</label>
            <input type="text" name="eveniment">
            <hr>
        </div>   
        <label>Titlu</label>
        <br>
        <textarea name="titlu"></textarea>
        <hr>
        <label>Trimitere articol (prima pagină și arhivă)</label>
        <br>
        <textarea name="trimitere"></textarea>
        <hr>    
        <label>Sapou</label>
        <br>
        <textarea name="sapou"></textarea>
        <hr>
        <label>Text</label>
        <br>
        <textarea name="text"></textarea>
        <hr>
        <label>Imagine articol</label>
        <br>
        <input type="file" name="filename" required>
        <hr>
        <input type="submit" name="submit" value="OK" class="btn btn-success">
    </form>  
    
<script>
    CKEDITOR.replace( 'text' );
</script>
    
    
</body>
