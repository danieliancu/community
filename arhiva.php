<?php
    switch ($arhiva) {
        case "eveniment":
            $vezi = "Vezi toate evenimentele ";
            $link = "pages.php";
            break;
        case "news":
            $vezi = "Vezi toate știrile ";
            $link = "news.php";
            break;
        case "brexit":
            $vezi = "Vezi toate știrile ";
            $link = "news.php";
            break;            
    }

?>


<div class="arhivaWrap"> 
    <div class="arhiva" id="arhivaEveniment">
        <div class="title"><?php echo $vezi; ?><a href="<?php echo $link; ?>" ><i class='fas fa-arrow-circle-right'></i></a></div>
        <div class="band" style="margin-left: 0px;margin-bottom:40px;"></div>
        <div class="container-fluid">
            <div class="row">
                
                <?php
                    require_once 'include/db_connect.php';
                    $result = queryMysql (" SELECT * FROM eveniment WHERE tip='$arhiva' ORDER BY data LIMIT 3; ");             
                    if(mysqli_num_rows($result)>0) {
                        {
                        while($row=mysqli_fetch_array($result))
                            {
                            require 'include/db_rows.php'; 
                            // all variables            
                ?>
                
            <div class="arhivaNews col-md-4">
                <img src="pic/<?php echo $foto; ?>">
                <div class="eticheta"><?php echo formatDate($data)." - $eveniment"; ?></div>
                <div class="title"><?php echo $trimitere; ?></div>
                <a href='<?php echo "page.php?id=$id"; ?>' class="buton" style="color:black;border-color: var(--color);">citeste mai mult</a>
            </div>
                
                <?php
                        }
                    }
                } else {
                    echo "Database failure";
                }   
                ?>      
            </div> 
        </div>
    </div> 
</div>  
