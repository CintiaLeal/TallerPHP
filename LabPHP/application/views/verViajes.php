<?php
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>
<?if(!empty($res)){?>
<form action="<?=base_url().'/index.php/viaje/verViaje'?>" id="form" method="POST">
    <div class="conteiner">
        <div style="margin-bottom:3%; text-align: center;">
            <h1 style="font-family: 'Unica One', cursive;"><u>VIAJES</u></h1>
        </div>
    </div>

    <div class="conteiner">
        <div class="scroll_text_pedidos">
            <?foreach($res as $viaje){?>
                <div style="width:200px;">
                <?echo "<button type = 'button' class="."'texto'"." onClick = 'verId(".$viaje->viaje_id.")'> Viaje: ".$viaje->viaje_id."<br>";
                echo "Fecha ida: ".$viaje->fechaI."<br>";
                echo "Origen: ".$viaje->origen."<br>";
                echo "Destino: ".$viaje->destino."<br></button>";
                ?>
                </div>
            <?}?>
        </div>
        <input id="idViaje" name="idViaje" class="d-none">
    </div>
</form>
<?} else{?>
    <div class="row d-flex flex-column align-items-center">
            <h1 id="titulo" style="text-align: center; font-family: 'Unica One', cursive; color:#389393; opacity: 70%;">Ups!</h2>
        </div>
        <div class="row d-flex flex-column align-items-center">
            <h4 style="text-align: center; font-family: 'Unica One', cursive; color:#fa7f72; opacity: 70%;">Al parecer no tienes viajes<br> para ver aún</h4>
        </div>
        <div style="display: flex; justify-content:center;">
            <a href="<?= base_url().'/index.php/usuario/inicio'?>" style="color:white;"><button type="submit" style="border: none;
            color: white;
            padding: 10px;
            text-align: center;
            font-family: 'Sen', sans-serif;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 5px 1px;
            cursor: pointer;
            border-radius: 12px;  
            background-color:#389393; 
            opacity: 50%;"><b>
            Volver al inicio</b></button></a>
        </div>
<?}?>
<?php
    include ('footer.php');
?>

<script>
    function verId(id){
        document.getElementById("idViaje").value = id;
        document.getElementById("form").submit();
    }
</script>