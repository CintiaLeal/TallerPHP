<?php
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>
<form action="<?= base_url().'/index.php/pedido/aceptarOferta'?>" method="POST" id="form">
    <div class="conteiner">
        <div style="margin-bottom:3%; text-align: center; display: flex;">
            <h1 style="font-family: 'Unica One', cursive;"><u>PEDIDO</u></h1>
        </div>
    </div>

    <div class="conteiner">
        <div class="contenedorAtributos">
            <div class="contenedorParticular">
                <p class="atributosV">
                    <u>Numero:</u>  <?=$pedido->numero?>
                </p>
            </div>

            <div class="contenedorParticular">
                <p class="atributosV">
                    <u>Origen:</u>  <?=$origen?>
                </p>
            </div>
            
            <div class="contenedorParticular">
                <p class="atributosV">
                    <u>Destino:</u>  <?=$destino?>
                </p>
            </div>
            
            <div class="contenedorParticular">
                <p class="atributosV">
                    <u>Fecha max:</u>  <?=$pedido->fecha_max?>
                </p>
            </div>
            <div class="contenedorParticular">
                <p class="atributosV">
                    <u>Fecha min:</u>  <?=$pedido->fecha_min?>
                </p>
            </div>
            <?if($pedido->link != null){?>
            <div class="contenedorParticular">
                <p class="atributosV">
                    <u>Link: </u>  <?=$pedido->link?>
                </p>
            </div>
            <?}?>
            <?if(isset($pedido->descripcion)){?>
            <div class="contenedorParticular">
                <p class="atributosV">
                    <u>Descripcion: </u>  <?=$pedido->descripcion?>
                </p>
            </div>
            <?}?>
            <?if(!empty($ofertas)){?>
                <div class="contenedorParticular">
                    <p class="atributosV"><u>Ofertas:</u></p>
                    <select class="listaPedidos" id="idOferta" name="idOferta">
                        <?foreach($ofertas as $oferta){?>
                        <option value="<?=$oferta->id?>">
                            Oferta <?=$oferta->id?> - Comision: <?=$oferta->comision?>
                        </option>
                        <?}?>
                    </select>
                </div>

                <div class="contenedorParticular">
                    <button type="submit" class="btnViaje" id="btn">Aceptar</button>
                </div>
            <?}?>
</form>
        <form id="form1" action="<?= base_url().'/index.php/pedido/pedidoRecibido'?>" method="POST">
                <div class="contenedorParticular">
                        <button type="button" class="btnViaje" id="marcar" onclick="enviar(<?=$pedido->numero?>)">Marcar como recibido</button>
                </div>
                <input class="d-none" id="pedido" name="pedido">            
    </div>
        </form>
    <div>
        <img src="<?=$pedido->imagen?>" alt="Imagen" class="contenedorImagen" style="margin-left:5%; max-width:220px;">
    </div>

</div>
<?php
    include ('footer.php');
?>

<script>
let form2 = document.getElementById("form1");

function enviar(pedido){
    document.getElementById("pedido").value = pedido;
    form2.submit();
}
</script>