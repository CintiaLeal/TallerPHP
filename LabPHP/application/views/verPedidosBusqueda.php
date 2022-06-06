<?php
session_start();
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>
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
    <div>
        <img src="<?=$pedido->imagen?>" alt="Imagen" class="contenedorImagen" style="margin-left:5%; max-width:220px;">
    </div>
</div>
</div>
<?php
    include ('footer.php');
?>
