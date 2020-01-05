<?php
include 'head.php';
$id = $_REQUEST['id'];
include '../include/db_connect.php';
$result = queryMysql ("SELECT * FROM voluntari where id=$id");
$row = mysqli_fetch_array($result);
include_once '../include/db_rows_voluntari.php';
echo "<h1 style='text-align:center;margin-top:20px;'>Detalii voluntar $nume $prenume</h1>";
?>
<body>
 
    
<?php     

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $id = $_POST['id'];        
        $nume = $_POST['nume'];
        $prenume = $_POST['prenume'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];        
        $mesaj = $_POST['mesaj'];
        $status = $_POST['status'];
        $autor_status = $_POST['autor_status'];
        

        $result = queryMysql
            ("
            UPDATE voluntari SET
            nume='$nume',
            prenume='$prenume',
            telefon='$telefon',
            email='$email',
            mesaj='$mesaj',
            status='$status',
            autor_status='$autor_status'
            WHERE id='$id';
            ");
        
 
        
        
        header('location:voluntari.php');

    }
?>       
    
    
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">   
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    
        <label>Nume</label>
        <br>
        <input type="text" name="nume" value="<?php echo $nume; ?> ">
        <hr>
    
        <label>Prenume</label>
        <br>
        <input type="text" name="prenume" value="<?php echo $prenume; ?>">
        <hr>

        <label>Telefon</label>
        <br>
        <input type="text" name="telefon" value="<?php echo $telefon; ?>">
        <hr>
    
        <label>Email</label>
        <br>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <hr>

        <label>Mesaj voluntar</label>
        <br>
        <textarea name="mesaj" placeholder="<?php echo $mesaj; ?>"><?php echo $mesaj; ?></textarea>
        <hr>
    
        <label>Status înscriere</label>
        <br>
            <select name="status">
                <option selected value="<?php echo $status; ?>"><?php echo "--$status--"; ?></option>
                <option value="in progress">In Progress</option>                
                <option value="aprobat">Aprobat</option>
                <option value="respins">Respins</option>
            </select>
    
        <input type="text" placeholder="autor status" name="autor_status" value="<?php echo $autor_status; ?>">
                
        <br>
        <br>
    
        <input type="submit" name="edit" value="Confirmă modificările" class="btn btn-success">
    </form>        
</body>
