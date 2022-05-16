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
        <div style="display: flex; margin-bottom: 20%;">

            <div style="margin: 5%">
                <label style="margin: 5%;">
                    <u class="comprador">
                        Comprador:
                    </u>
                </label>
            
                <label style="margin: 5%;">
                    <u class="viajero">
                        Viajero:
                    </u>
                </label>
            </div>

            <div style="display: flex; margin-left: 30%;">
                <h3 style="font-family: 'Unica One', cursive;">
                    <u style="color: #606060;">NOMBRE APELLIDO</u>
                </h3>
                <i class='fas fa-portrait' style="font-size: 150px;"></i>
            </div>
        </div>

        <div style="justify-content: end;">
            <i class='far fa-calendar' style='font-size:24px; color:#606060; opacity: 50%;'></i>
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
            <textarea class="scroll_text_bio" style="margin-right: 20%;"> <!-- texto de la biografia -->
                
            </textarea>

            <textarea class="scroll_text_val"> <!-- comentarios de las valoraciones -->
                
            </textarea>
        </div>
    </div>

    <div class="c1">
        
    </div>
</div>



<?php
    include ('footer.php');
?>