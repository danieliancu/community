

<?php 
    include 'header.php';
    $arhiva = 'eveniment';

?>

<script>
    $(document).ready(function(){
        $(".menu a:nth-child(3)").css("color","red");
        $("body").css("background-color","grey");  
        
    });
</script>


<div class="stage">
    
    <div class="fundal fundalPages">
        <img src="pic/selective-focus-photography-of-three-disney-princesses-1089069.jpg">
        <div class="fundalAlb"></div>
        <div class="pagesTitle">Evenimente</div>
    </div>
    
    <div class="articolePages container-fluid">
        
        <div class="row">
            <p class="evenimente">Evenimente realizate</p>
            
            <?php
            require_once 'include/db_connect.php';
            $result = queryMysql (" SELECT * FROM eveniment WHERE tip='$arhiva' ORDER BY data; ");             
                if(mysqli_num_rows($result)>0) {
                    {
                    while($row=mysqli_fetch_array($result))
                        {
                    require 'include/db_rows.php'; 
                    // all variables
                        
                    $d1=strtotime(formatDate($data));
                    $d2 = ceil(($d1-time())/60/60/24);
                        if($d2<0){
                    // calcul - daca evenimentul este in trecut        
            ?>
            <div class="col-md-4">
                <div class="articolPages">
                    <img src="pic/<?php echo $foto; ?>">
                    <div>
                        <div class="etichetaPages">
                            <?php echo formatDate($data)." - $eveniment"; ?>
                        </div>
                        <div class="title">
                            <?php echo $trimitere; ?>
                        </div> 
                        <a href='<?php echo "page.php?id=$id"; ?>' class="buton">citește</a>
                    </div>
                </div>    
            </div>
            <?php
                            }
                        }
                    }
                } else {
                    echo "Database failure";
                }   
            ?>            
        </div>

        
        
        
        
        <div class="row">
            <p class="evenimente">Evenimente viitoare</p>
            <?php
            require_once 'include/db_connect.php';
            $result = queryMysql (" SELECT * FROM eveniment WHERE tip='$arhiva' ORDER BY data; ");             
                if(mysqli_num_rows($result)>0) {
                    {
                    while($row=mysqli_fetch_array($result))
                        {
                    require 'include/db_rows.php'; 
                    // all variables
                        
                    
                    $d1=strtotime(formatDate($data));
                    $d2 = ceil(($d1-time())/60/60/24);
                        if($d2>0){
                    // calcul - daca evenimentul este in viitor        
            ?>
            
            <div class="col-md-4">
                <div class="articolPages">
                    <img src="pic/<?php echo $foto; ?>">
                    <div>
                        <div class="etichetaPages">
                            <?php echo formatDate($data)." - $eveniment"; ?>
                        </div>
                        <div class="title">
                            <?php echo $trimitere; ?>
                        </div> 
                        <a href='<?php echo "page.php?id=$id"; ?>' class="buton">citește</a>
                    </div>
                </div>    
            </div>
            <?php
                            }
                        }
                    }
                } else {
                    echo "Database failure";
                }   
            ?>            
        </div>
        
    </div>

</div>


<?php include 'footer.php'; ?>
