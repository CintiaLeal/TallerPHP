<?php
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>

<div class="conteiner">
    <div style="margin-bottom:3%; text-align: center; display: flex;">
        <h1 style="font-family: 'Unica One', cursive;"><u>VIAJE</u></h1>
    </div>
</div>

<div class="conteiner">
<div class="contenedorAtributos">
    <div class="contenedorParticular">
        <p class="atributosV">
            <u>Id:</u>
        </p>
    </div>

    <div class="contenedorParticular">
        <p class="atributosV">
            <u>Origen:</u>
        </p>
    </div>
    
    <div class="contenedorParticular">
        <p class="atributosV">
            <u>Destino:</u>
        </p>
    </div>
    
    <div class="contenedorParticular">
        <p class="atributosV">
            <u>Fecha ida:</u>
        </p>
    </div>
    
    <div class="contenedorParticular">
        <p class="atributosV">
            <u>Fecha vuelta:</u>
        </p>
    </div>

    <div class="contenedorParticular">
        <select class="listaPedidos">
            <option>

            </option>
        </select>
    </div>
</div>
<div>
    <img src="https://www.nacionrex.com/__export/1622933549643/sites/debate/img/2021/06/05/bts-donde-viven-2021_crop1622931060976.jpg_1902800913.jpg" alt="Imagen" class="contenedorImagen" style="margin-left:5%; max-width:300px;">
</div>
</div>
<?php
    include ('footer.php');
?>