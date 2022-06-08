<?php
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>
<?if(!empty($arreglo)){?>
<form action="<?=base_url().'/index.php/pedido/verPedido'?>" id="form" method="POST">
<div class="conteiner">
    <div style="margin-bottom:3%; text-align: center;">
        <h1 style="font-family: 'Unica One', cursive;"><u>PEDIDOS</u></h1>
    </div>
</div>

<div class="conteiner">
    <div style="text-align: center;">
            <h5 style="font-family: 'Sen', sans-serif; color: #389393;">
                <a href="<?= base_url().'/index.php/usuario/verPedidosEnTransito'?>"><u style="color: #f5a25d;">En tránsito</u></a>
                |
                <a href="<?= base_url().'/index.php/usuario/verPedidosPendientes'?>"><u style="color: #f5a25d;">Pendientes</u></a>
                |
                <a href="<?= base_url().'/index.php/usuario/verPedidosActivos'?>"><u style="color: #f5a25d;">Activos</u></a>
                |
                <a href="<?= base_url().'/index.php/usuario/verPedidosEntregados'?>"><u style="color: #f5a25d;">Recibidos</u></a>
            </h5>
     </div>
</div>

<div class="conteiner">
    <div class="scroll_text_pedidos">
        <?foreach($arreglo as $row){?>
            <div style="width:200px;">
            <img src="<?=$row->imagen?>" style="max-width: 50px;">
            <?echo "<br>"."<button class="."'texto'"." onClick = 'verId(".$row->numero.")'>Titulo: ".$row->titulo."<br>";
            echo "Descripcion: ".$row->descripcion."<br>";
            echo "Precio: $".$row->precio."<br></button>";?>
            </div>
        <?}?>
        <input id="idPedido" name="idPedido" class="d-none">
    </div>
</div>
</form>
<?} else{?>
    <div class="row d-flex flex-column align-items-center">
            <h1 id="titulo" style="text-align: center; font-family: 'Unica One', cursive; color:#389393; opacity: 70%;">Ups!</h2>
        </div>
        <div class="row d-flex flex-column align-items-center">
            <h4 style="text-align: center; font-family: 'Unica One', cursive; color:#fa7f72; opacity: 70%;">Al parecer no tienes pedidos<br> para ver aún</h4>
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
    function verId(id){
        document.getElementById("idPedido").value = id;
        document.getElementById("form").submit();
    }
</script>