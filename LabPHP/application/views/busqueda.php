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
    <div class="conteiner">    
        <input  id="busqueda" name="busqueda" type="search" class="form-control buscar">
        <button onclick = "buscar()" type="button"></button>
    </div>
    <br><br><br>
    
    <p> Pedidos: </p>
    <div class="conteiner">
        <div id = "divpedidos" class="scroll_text_pedidos">
                <div id = "div" style="width:200px;">
                
                </div>
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
    function buscar() {
        var contenido = document.getElementById("busqueda").value;
        $('divpedidos').empty();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . 'index.php/Busqueda/busqueda'; ?>',
            data: {contenido: contenido}, 
            dataType: "json",
            success: function(resp) {
                let p = resp.pedidos;
                console.log('llega');
                var micapa = document.getElementById('divpedidos');
                $.each(p, function(index, element) {
                div.setAttribute("id", "div");
                div.setAttribute("style", "width:200px;");
                img.setAttribute("src", element.imagen);
                div.textContent = "nombre:" element.name;
                }
            }
        })
    }   
</script>

<?php
    include ('footer.php');
?>