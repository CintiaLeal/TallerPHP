<?php 
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>
<?if(!empty($pedidos)){?>
    <style>
        a,b{
            color: white;  
        }
        #titulo{
            font-size: 82px;
            text-decoration: underline;
            font-family: 'Unica One', cursive;
            color: #389393;
        }
        h2,h4{
            font-size: 25px;
            font-family: 'Unica One', cursive;
            color:#fa7f72;
            opacity: 70%;
        }

        .button1 {border-radius: 12px;  background-color:#389393; opacity: 50%;} 

    </style>
<form id="form1" action="<?=base_url().'/index.php/pedido/pedidoRecibido'?>" method="POST">
    <div class="conteiner" style="margin-bottom: 10px;">
        <h1 style="font-family: 'Unica One', cursive;"><u>PEDIDOS</u></h1>
    </div>
    <div class="conteiner" style="margin-bottom: 20px;">
        <select id="listaPedidos" class="listaPedidos" style="margin-right:15px;">
            <?foreach($pedidos as $pedido){?>
                <option value="<?=$pedido->numero?>">Pedido número <?=$pedido->numero?></option>
                <?}?>
        </select>
    </div>
    <div class="conteiner">
            <button type="button" class="btnViaje" id="marcar" onclick="enviar()">Marcar como recibido</button>
    </div>
    <input class="d-none" id="pedido" name="pedido">
</form>
<?}
else {?>
        <div class="row d-flex flex-column align-items-center">
            <h1 id="titulo" style="text-align: center; font-family: 'Unica One', cursive; color:#389393; opacity: 70%;">Ups!</h2>
        </div>
        <div class="row d-flex flex-column align-items-center">
            <h4 style="text-align: center; font-family: 'Unica One', cursive; color:#fa7f72; opacity: 70%;">Al parecer no tienes pedidos<br> para marcar aún</h4>
        </div>
        <div style="display: flex; justify-content:center;">
            <a href="<?= base_url().'/index.php/usuario/inicio'?>" style="color:white;"><button type="submit" style="border: none;
            color: white;
            padding: 10px;
            text-align: center;
            font-family: 'Sen', sans-serif;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 5px 1px;
            cursor: pointer;
            border-radius: 12px;  
            background-color:#389393; 
            opacity: 50%;"><b>
            Volver al inicio</b></button></a>
        </div>
<?}?>
<?php
    include ('footer.php');
?>

<script>
let form2 = document.getElementById("form1");

function enviar(){
    document.getElementById("pedido").value = document.getElementById("listaPedidos").value;
    form2.submit();
}
</script>