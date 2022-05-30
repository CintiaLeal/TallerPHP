<?php
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>
<form action="<?= base_url().'/index.php/viaje/ofertar'?>" method="POST">
    <div class="conteiner">
        <div style="margin-bottom:3%; text-align: center; display: flex;">
            <h1 style="font-family: 'Unica One', cursive;"><u>VIAJE</u></h1>
        </div>
    </div>

    <div class="conteiner">
        <div class="contenedorAtributos">
            <div class="contenedorParticular">
                <p class="atributosV">
                    <u>Id:</u>  <?=$viaje->viaje_id?>
                </p>
                <input name="idViaje" value="<?=$viaje->viaje_id?>" class="d-none">
            </div>

            <div class="contenedorParticular">
                <p class="atributosV">
                    <u>Origen:</u>  <?=$viaje->citiesD_id?>
                </p>
            </div>
            
            <div class="contenedorParticular">
                <p class="atributosV">
                    <u>Destino:</u>  <?=$viaje->citiesH_id?>
                </p>
            </div>
            
            <div class="contenedorParticular">
                <p class="atributosV">
                    <u>Fecha ida:</u>  <?=$viaje->fechaI?>
                </p>
            </div>
            <?if($viaje->fechaV != '0000-00-00'){?>
            <div class="contenedorParticular">
                <p class="atributosV">
                    <u>Fecha vuelta:</u>  <?=$viaje->fechaV?>
                </p>
            </div>
            <?}?>
                <div class="contenedorParticular">
                    <p class="atributosV"><u>Ofertar sobre:</u></p>
                    <select class="listaPedidos" id="idPedido" name="idPedido">
                        <?foreach($pedidos as $pedido){?>
                        <option value="<?=$pedido->numero?>">
                            <?=$pedido->titulo?>
                        </option>
                        <?}?>
                    </select>
                    <input type="number" placeholder="Comisión" class="comision" name="comision" id="comision">
                </div>

                <div class="contenedorParticular">
                    <button type="submit" class="btnViaje">Confirmar</button>
                </div>

    </div>
</form>
    <div>
        <img src="https://i.pinimg.com/564x/1a/aa/61/1aaa6165855063bb63caf5d608ca8859.jpg" alt="Imagen" class="contenedorImagen" style="margin-left:5%; max-width:220px;">
    </div>

</div>
<?php
    include ('footer.php');
?>