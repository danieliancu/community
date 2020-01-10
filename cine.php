

<?php 
    include 'header.php';
    $arhiva = 'eveniment';

    require_once 'include/db_connect.php';

    $result = queryMysql (" SELECT * FROM despre");
        if(mysqli_num_rows($result)>0) {
            {
            while($row=mysqli_fetch_array($result))
                {
                $foto = $row['foto'];
                $text = $row['text'];
?>

<script>
    $(document).ready(function(){
        $(".menu a:nth-child(2)").css("color","red");
        $("body").css("background-color","grey");  
        
    });
</script>


<div class="stage">
    <div class="fundal fundalPages">
        <img src="pic/<?php echo $foto; ?>">
        <div class="fundalAlb"></div>
        <div class="pagesTitle">despre noi</div>
    </div>
    
    <div class="articolePages container-fluid">
        <div class="band"></div><br><br>
        <div class="articol">
            <?php echo $text; ?>
        </div>
    </div>
</div>

<?php
                        }
                    }
                } else {
                    echo "Database failure";
                }   

include 'arhiva.php';
include 'footer.php'; 
?>
