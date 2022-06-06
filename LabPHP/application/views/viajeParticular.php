<?php
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>
<link href='https://css.gg/twitter.css' rel='stylesheet'>
<form action="<?= base_url().'/index.php/viaje/ofertar'?>" method="POST" id="form">
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
                    <u>Origen:</u>  <?=$viaje->origen?>
                </p>
            </div>
            
            <div class="contenedorParticular">
                <p class="atributosV">
                    <u>Destino:</u>  <?=$viaje->destino?>
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
            <?if(!empty($pedidos)){?>
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
                    <button type="button" class="btnViaje" id="btn">Confirmar</button>
                </div>
            <?}?>
    </div>
</form>
    <div>
        <img src="https://i.pinimg.com/564x/1a/aa/61/1aaa6165855063bb63caf5d608ca8859.jpg" alt="Imagen" class="contenedorImagen" style="margin-left:5%; max-width:220px;">
        <div style="margin-left: 30%; margin-top:5%;">
            <a class="btn btn-primary" style="background-color: #389393; border: none; margin:5px; opacity:50%;" href="https://twitter.com/intent/tweet?text=Hola%20soy%20<?= $n = $_SESSION["usuario"]?>%20👋%20%2C%20estoy%20viajando%20desde%20✈%20<?=$viaje->origen?>%20hasta%20✈%20<?=$viaje->destino?>%20%2C%20el%20la%20fecha%20<?=$viaje->fechaI?>.%20Si%20necesitas%20mi%20servicio%20comunicate&hashtags=Telollevo" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16" style="opacity: 50%;">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                </svg>
            </a>
            <a class="btn btn-primary" style="background-color: #389393; border-radius: 5px; opacity:50%;" href="https://www.facebook.com/sharer/sharer.php?u=www.telollevo.com&quote=Hola%20soy%20<?= $n = $_SESSION["usuario"]?>%20👋%20%2C%20estoy%20viajando%20desde%20✈%20<?=$viaje->origen?>%20hasta%20✈%20<?=$viaje->destino?>%20%2C%20el%20la%20fecha%20<?=$viaje->fechaI?>.%20Si%20necesitas%20mi%20servicio%20comunicate&hashtags=Telollevo" target="_blank">
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
    function validarCampo(){
        if((document.getElementById("comision".value == null)) || (document.getElementById("comision".value == undefined)) || (document.getElementById("comision").value <= 0)){
            alert('Error, debe completar todos los campos');
            return false;
        }
        return true;
    }
    let form = document.getElementById("form");
    let btn = document.getElementById("btn");
    btn.addEventListener('click', e =>{
        e.preventDefault();
        if(validarCampo()){
            form.submit();
        }
    })
</script>