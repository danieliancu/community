<?php
session_start();
include 'head.php';
$id = $_REQUEST['id'];
include '../include/db_connect.php';
$result = queryMysql ("SELECT * FROM eveniment where id=$id");
$row = mysqli_fetch_array($result);
include_once '../include/db_rows.php';
$_SESSION["pozaCurenta"] = $foto;
echo "<h1 style='text-align:center;margin-top:20px;'>Editează articol (id nr $id)</h1>";
?>
<body>
 
    
<?php     

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        
        $tip = $_POST['tip'];
        $id = $_POST['id'];
        $data = $_POST['data'];
        $eveniment = $_POST['eveniment'];
        $trimitere = $_POST['trimitere'];        
        $titlu = $_POST['titlu'];
        $sapou = $_POST['sapou'];
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
            UPDATE eveniment SET
            tip='$tip',
            data='$data',
            eveniment='$eveniment',
            trimitere='$trimitere',
            titlu='$titlu',
            sapou='$sapou',
            text='$text',
            foto='$foto'
            WHERE id='$id';
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
    
    
<form method="post"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">   
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    
        <label>Tip articol</label>
        <select name="tip">
            <option value="<?php echo $tip; ?>" selected><?php echo "--$tip--"; ?></option>
            <option value="eveniment">eveniment</option>
            <option value="news">news</option>
            <option value="brexit">brexit</option>
        </select>
        <br>

        <div class="event">
            <hr>
            <label>Data eveniment</label>
            <input type="date" name="data" value="<?php echo $data; ?>">
            <label>Etichetă eveniment</label>
            <input type="text" name="eveniment" value="<?php echo $eveniment ?>">
            <hr>
        </div>   
        <label>Titlu</label>
        <br>
        <textarea name="titlu"><?php echo $titlu; ?></textarea>
        <hr>
        <label>Trimitere articol (prima pagină și arhivă)</label>
        <br>
        <textarea name="trimitere"><?php echo $trimitere; ?></textarea>
        <hr>    
        <label>Sapou</label>
        <br>
        <textarea name="sapou"><?php echo $sapou; ?></textarea>
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
