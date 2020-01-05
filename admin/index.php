<?php
    session_start();
    if(isset($_REQUEST['articol'])){
        $articol=$_REQUEST['articol'];
        $lista = "de ".$articol;
    } else {
        $articol = "e";
        $lista = "(toate)";
    }
    include 'head.php';
    include '../include/db_connect.php';
    $result = queryMysql(" SELECT * FROM eveniment WHERE tip LIKE '%$articol%' order by data");            

    echo "<h1 style='padding:40px;text-align:center;'>Lista articole  $lista</h1>"


?>    
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Tip articol</th>
            <th>Etichetă</th>
            <th>Titlu</th>            
            <th>Trimitere (prima pagină și arhiva)</th>
            <th>Foto</th>
            <th>Data înregistrării</th>
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
                    include '../include/db_rows.php'; 
                    // all variables

            ?>
            <td><?php echo $tip; ?></td>
            <td><?php echo formatDate($data)." - $eveniment"; ?></td>
            <td><?php echo $titlu; ?></td>            
            <td><?php echo $trimitere; ?></td>
            <td><img src="../pic/<?php echo $foto; ?>"></td>
            <td><?php echo $date; ?></td>
            <td><button class="btn btn-success"><a href='<?php echo "edit.php?id=$id"; ?>'>Edit</a></button></td>
            <td><a class="btn btn-danger" onclick = "return confirmation()" href='<?php echo "delete.php?id=$id"; ?>'><strong>X</strong></a></td>
            
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
