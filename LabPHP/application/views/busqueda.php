<?php
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    function buscar() {
        var contenido = document.getElementById("busqueda").value;
        $.ajax({
        type: 'POST',
        data: {contenido: contenido},
        url: '<?php echo base_url() . 'index.php/Busqueda/busqueda'; ?>', 
        dataType: "json",
        success: function(resp) {
            console.log("llega 1");
            $('divpedidos').empty();
            $('divviajes').empty();
        }
        })
    }   
</script>

<div class="conteiner">
    <br>    
    <input  oninput="buscar()" id="busqueda" name="busqueda" type="search" class="form-control buscar">
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


<?php
    include ('footer.php');
?>