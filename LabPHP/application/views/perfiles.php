<?php 
    if(isset($_SESSION)){
        include ('headerLogueado.php');
    }
    else{
        include ('header.php');
    }
?>

<div class="c_perfiles">
    <div>
        <div style="display: flex; margin-bottom: 8%;">

            <div style="margin-left: 5%; margin-right:5%; margin-bottom:5%;">
                <label style="margin-bottom: 5%;">
                    <u class="comprador">
                        Comprador:
                    </u>
                </label>
            
                <label style="margin-bottom: 5%;">
                    <u class="viajero">
                        Viajero:
                    </u>
                </label>
            </div>

            <div style="display: flex; margin-left: 30%;">
                <h3 style="font-family: 'Unica One', cursive;">
                    <u style="color: #606060;"><?=$nombre.'<br>'.$apellido?></u>
                </h3>
                <img src="https://res.cloudinary.com/dmc55ugqh/image/upload/v1652475712/cld-sample.jpg" alt="Foto de perfil" style="margin-bottom: 15%; margin-left:15%; max-width: 200px;">
            </div>

        </div>

        <div style="margin-left: 60%; margin-bottom: 10%;"> 
            <i class='far fa-calendar' style='font-size:24px; color:#606060; opacity: 50%;'></i>
            <p style="font-family: 'Unica One', cursive; color:#606060; opacity: 50%;">Unido desde: </p>
        </div>

        <div class="c_bio_val">
            <label style="margin-right: 50%;">
                <u class="bio_title">
                    Biografía:
                </u>
            </label>

            <label>
                <u class="valoraciones_title">
                    Valoraciones:
                </u>
            </label>
        </div>

        <div class="c_textarea">
            <!-- texto de la biografia -->
            <textarea class="scroll_text_bio" style="margin-right: 20%;"> 
                <?=$biografia?>
            </textarea>
            <!-- comentarios de las valoraciones -->
            <textarea class="scroll_text_val"> 
                
            </textarea>
        </div>
    </div>
</div>



<?php
    include ('footer.php');
?>