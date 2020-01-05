<?php
    include 'head.php';
    include '../include/db_connect.php';
    $result = queryMysql(" SELECT * FROM inscrieri ");            
    
    echo "<h1 style='padding:40px;text-align:center;'>Lista înscrierilor la evenimente</h1>"

?>    



<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Status</th>
            <th>Autor status</th>            
            <th>Nume</th>
            <th>Prenume</th>
            <th>Telefon</th>            
            <th>Email</th>
            <th>Mesaj de la solicitant</th>
            <th>Evenimentul înscris</th>                        
            <th>Data înscrierii</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    
    <tbody>
        <tr>
            <?php
                if(mysqli_num_rows($result)>0) {
                    {
                    while($row=mysqli_fetch_array($result))
                        {
                    include '../include/db_rows_inscrieri.php'; 
                    // all variables

            ?>
            <td><?php echo $status; ?></td>
            <td><i><?php echo $autor_status; ?></i></td>               
            <td><?php echo $nume; ?></td>
            <td><?php echo $prenume; ?></td>
            <td><?php echo $telefon; ?></td>            
            <td><?php echo $email; ?></td>
            <td><?php echo $mesaj; ?></td>
            <td><?php echo $evenimentID; ?></td>            
            <td><?php echo $data; ?></td>
            
         
            <td><button class="btn btn-success"><a href='<?php echo "inscrieri_edit.php?id=$id"; ?>'>Edit</a></button></td>
            <td><a class="btn btn-danger" onclick = "return confirmation()" href='<?php echo "inscrieri_delete.php?id=$id"; ?>'><strong>X</strong></a></td>
            
        </tr>
            <?php
                    }
                }
            } else {
                echo "Database failure";
            }   
            ?>        
    </tbody>
</table>

    <script>
            function confirmation(z){
            var x = confirm("Ești sigur că vrei să ștergi?")
            if(x==true){
                return true;
            } else {
                return false;
            }
        }
    </script>

