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
    <input id="busqueda" name="busqueda" type="search" id="form1" class="form-control buscar" placeholder="Buscar" oninput="buscar()">
    <br><br><br>
    <p> Pedidos: </p>
    <div class="conteiner">
        <div id = "divpedidos" class="scroll_text_pedidos">
            <?foreach($pedidos as $row){?>
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
        <p> Viajes: </p>
        <div id = "divviajes" class="scroll_text_pedidos">
            <?foreach($viajes as $viaje){?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    buscar(){
        console.log("llega 1");
        var contenido = document.getElementById("busqueda").value
        $.ajax({
        type: 'POST',
        data: {contenido: contenido},
        url: '<?php echo base_url() . 'index.php/buscar/busqueda'; ?>', 
        dataType: "json",
        success: function(resp) {
            $('divpedidos').empty();
            $('divviajes').empty();
        }
        })
    }   
</script>

<?php
    include ('footer.php');
?>