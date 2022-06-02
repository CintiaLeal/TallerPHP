<?php
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>
<link href='https://css.gg/twitter.css' rel='stylesheet'>
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
        <div style="margin-left: 30%;">
        <a class="btn btn-primary" style="background-color: #389393; border: none; margin:5px; opacity:50%;" href="https://twitter.com/intent/tweet?text=Hola%20soy%20<?= $n = $_SESSION["usuario"]?>%20👋%20%2C%20quiero%20comprar%20<?=$pedido->titulo?>.%20Me%20gustaría%20que%20llegara%20como  mínimo el día:%20<?=$pedido->fecha_min?>,%20en la ciudad de%20<?=$destino?>%20desde%20<?=$origen?>.%20Comunícate%20conmigo%20&hashtags=Telollevo" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16" style="opacity: 50%;">
            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
            </svg>
        </a>
        <a class="btn btn-primary" style="background-color: #389393; border-radius: 5px; opacity:50%;" href="https://www.facebook.com/sharer/sharer.php?u=www.telollevo.com&quote=Hola%20soy%20<?= $n = $_SESSION["usuario"]?>%20%2C%20quiero%20comprar%20<?=$pedido->titulo?>.%20Me%20gustaría%20que%20llegara%20como  mínimo el día:%20<?=$pedido->fecha_min?>,%20en la ciudad de%20<?=$destino?>%20desde%20<?=$origen?>.%20Comunícate%20conmigo%20&hashtags=Telollevo" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16" style="opacity: 50%;">
            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </svg>
        </a>
        </div>
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

function share(){ 
    url = 'https://work.workplace.com/sharer.php?display=popup&u=' 
    + window.location.href; 
    options = 'toolbar=0,status=0,resizable=1,width=626,height=436'; 
    window.open(url,'sharer',options);
    }
</script>