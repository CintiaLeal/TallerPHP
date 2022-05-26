<?php
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>
<form action="<?=base_url().'/index.php/viaje/verViaje'?>">
    <div class="conteiner">
        <div style="margin-bottom:3%; text-align: center;">
            <h1 style="font-family: 'Unica One', cursive;"><u>VIAJES</u></h1>
        </div>
    </div>

    <div class="conteiner">
        <div class="scroll_text_pedidos">
            <?foreach($res as $viaje){?>
                <div style="width:200px;">
                <?echo "<button type = 'submit' value ='".$viaje->viaje_id."' name ='viaje".$viaje->viaje_id."' class="."'texto'"."> Viaje: ".$viaje->viaje_id."<br>";
                echo "Fecha ida: ".$viaje->fechaI."<br>";
                echo "Origen: ".$viaje->origen."<br>";
                echo "Destino: ".$viaje->destino."<br></button>";
                ?>
                </div>
            <?}?>
        </div>
    </div>
</form>
<?php
    include ('footer.php');
?>