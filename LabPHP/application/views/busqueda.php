<?php
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}
?>
<div class="conteiner">
    <br>    
    <input id="busqueda" name="busqueda" type="search" id="form1" class="form-control buscar" placeholder="Buscar">
    <br><br><br>
    <p> Pedidos: </p>
    <div class="conteiner">
        <div class="scroll_text_pedidos">
            <?foreach($Pedidos as $row){?>
                <div style="width:200px;">
                <img src="<?=$row->imagen?>" style="max-width: 50px;">
                <?echo "<br> <p> Titulo: ".$row->titulo."<br>";
                echo "Descripcion: ".$row->descripcion."<br>";
                echo "Precio: $".$row->precio."<br></p>";?>
                </div>
            <?}?>
        </div>
    </div>
    <div class="conteiner">
        <p> Vienes: </p>
        <div class="scroll_text_pedidos">
            <?foreach($Viajes as $viaje){?>
                <div style="width:200px;">
                    <?echo "<button type = 'button' class="."'texto'"." onClick = 'verId(".$viaje->viaje_id.")'> Viaje: ".$viaje->viaje_id."<br>";
                    echo "Fecha ida: ".$viaje->fechaI."<br>";
                    echo "Origen: ".$viaje->origen."<br>";
                    echo "Destino: ".$viaje->destino."<br></button>";
                    ?>
                </div>
            <?}?>
        </div>
    </div>
</div>

<?php
    include ('footer.php');
?>