<!--  
variabila PHP pentru:
- nth-child(variabila) - pentru rosu la menu
- background-color (la brexit body va fi cu negru)
- calendar (sa fie display:none in afara evenimentelor )
- arhiva (eveniment, news, caritate, brexit - separat pt fiecare pagina)
-->

<?php
    include 'header.php';
    $arhiva = "eveniment";
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
    } else {
        $id=$_POST['evenimentID'];
    }
    require_once 'include/db_connect.php';





    $result = queryMysql (" SELECT * FROM eveniment WHERE id=$id; ");
        if(mysqli_num_rows($result)>0) {
            {
            while($row=mysqli_fetch_array($result))
                {
                require 'include/db_rows.php';      
    ?>

<script>
    $(document).ready(function(){
        $(".menu a:nth-child(3)").css("color","red");
        $("body").css("background-color","grey");        
        $("#calendar").click(function(){
           $(".detalii").toggle(); 
        });
    });
</script>


<div class="stage">
    <div class="fundal">
       
        <img src="pic/<?php echo $foto; ?>">
         
        <div class="fundalAlb"></div>
      
        <div class="textPage">

            
            <div class="eticheta">       
               <?php echo formatDate($data)." - $eveniment"; ?>
            </div>
            <br>
            <br>
            <div class="bigTitle">
                <?php echo $titlu; ?>
            </div>
            <div class="subtitle">
                <?php echo $sapou; ?>
            </div>
            <br>
            
            <?php
                            
            $d1=strtotime(formatDate($data));
            $d2 = ceil(($d1-time())/60/60/24);
            if($d2<0){
                $interesat = "display:none;";
            } else {
                $interesat = "display:block;";
            }
            ?>
            
            <button data-toggle="modal" data-target="#myModal2" id="data" style="margin:auto;<?php echo $interesat; ?>">
                <i class='fas fa-heart'></i>VREAU SĂ PARTICIP!
            </button>
            <div class="band"></div><br><br>
            <div class="articol">
                <?php echo $text; ?>
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



<div class="modal" id="myModal2">
    <div class="modal-content">
        <form class="contact" method="post" action="inscriere.php">
            <img src="pic/logo_SRC_white.svg">
            <br>
            <label>Vrei să fii alături de noi la evenimentul <strong><?php echo $eveniment; ?></strong>?<br>Trimite formularul de participare cu datele tale.<br>Te vom contacta în cel mai scurt timp posibil pentru a-ți da toate detaliile.</label>            
            <div class="row">
                <input type="hidden" name="evenimentID" value="<?php echo $id; ?>">
                <input type="text" placeholder="Nume" class="col-md-3" name="nume" required>
                <input type="text" placeholder="Prenume" class="col-md-3" name="prenume" required>
                <input type="text" placeholder="Telefon" class="col-md-3" name="telefon" required>
                <input type="mail" placeholder="Adresă email" class="col-md-3" name="email">
            </div>   
            <br>
            <label>Dacă vrei să ne lași un mesaj:</label>
            <br>
            <textarea name="mesaj"></textarea>
            <br>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Solicitare înscriere</button>
            <button class="btn btn-secondary" data-dismiss="modal">Anulare</button>
            <br>
            <br>
        </form>
    </div>    
</div>   


<?php include 'arhiva.php'; ?>    
<?php include 'footer.php'; ?>
