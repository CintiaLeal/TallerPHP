<?php
    if(isset($_SESSION["usuario"])){
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
                <br>
                <?
                if($promedioC == 0){?>
                        <i style='font-size:15px; color:#fa7f72;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='far'>&#xf004;</i>
                    <?}?>
                    <?if($promedioC > 0 && $promedioC < 2){?>
                        <i style='font-size:15px; color:#fa7f72;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='far'>&#xf004;</i>
                    <?}?>
                    <?if($promedioC >=2 && $promedioC < 3){?>
                        <i style='font-size:15px; color:#fa7f72;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='far'>&#xf004;</i>
                    <?}?>
                    <?if($promedioC >=3 && $promedioC <4){?>
                        <i style='font-size:15px; color:#fa7f72;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='far'>&#xf004;</i>
                    <?}?>
                    <?if($promedioC >=4 && $promedioC <5){?>
                        <i style='font-size:15px; color:#fa7f72;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='far'>&#xf004;</i>
                    <?}?>
                    <?if($promedioC >=5){?>
                        <i style='font-size:15px; color:#fa7f72;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#fa7f72;' class='fas'>&#xf004;</i>
                    <?}?>
                <br>
                <label style="margin-bottom: 5%;">
                    <u class="viajero">
                        Viajero:
                    </u>
                </label>
                <br>
                <?if($promedioV == 0){?>
                        <i style='font-size:15px; color:#f5a25d;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='far'>&#xf004;</i>
                    <?}?>
                    <?if($promedioV > 0 && $promedioV < 2){?>
                        <i style='font-size:15px; color:#f5a25d;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='far'>&#xf004;</i>
                    <?}?>
                    <?if($promedioV >=2 && $promedioV < 3){?>
                        <i style='font-size:15px; color:#f5a25d;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='far'>&#xf004;</i>
                    <?}?>
                    <?if($promedioV >=3 && $promedioV <4){?>
                        <i style='font-size:15px; color:#f5a25d;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='far'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='far'>&#xf004;</i>
                    <?}?>
                    <?if($promedioV >=4 && $promedioV <5){?>
                        <i style='font-size:15px; color:#f5a25d;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='far'>&#xf004;</i>
                    <?}?>
                    <?if($promedioV >=5){?>
                        <i style='font-size:15px; color:#f5a25d;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='fas'>&#xf004;</i>
                        <i style='font-size:15px; color:#f5a25d;' class='fas'>&#xf004;</i>
                    <?}?>
            </div>

            <div style="display: flex; margin-left: 30%;">
                <h3 style="font-family: 'Unica One', cursive;">
                    <u style="color: #606060;"><?=$nombre.'<br>'.$apellido?></u>
                </h3>
                <img src="<?=$imagen?>" alt="Foto de perfil" style="margin-bottom: 15%; margin-left:15%; max-width: 200px; max-height: auto;">
            </div>

        </div>

        <div style="margin-left: 60%; margin-bottom: 10%;"> 
            <i class='far fa-calendar' style='font-size:24px; color:#606060; opacity: 50%;'></i>
            <p style="font-family: 'Unica One', cursive; color:#606060; opacity: 50%;">Unido desde: <?=$unido?></p>
        </div>

        <div class="c_bio_val">
            <label style="margin-right: 40%;">
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
            <div class="scroll_text_bio" style="text-align: center;"> 
                <?=$biografia?>
            </div>
            <!-- comentarios de las valoraciones -->
            <div class="scroll_text_val" style="margin-left:10px;"> 
            <ul>
                <? foreach($comentarios as $c){?>
                    <li>
                        <?="'$c.'";?>
                    </li>
                <?}?>
                </ul>
                </div>
        </div>
    </div>
</div>



<?php
    include ('footer.php');
?>