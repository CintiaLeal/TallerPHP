<?php
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>
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
<?php
    include ('footer.php');
?>

<script>
    function verId(id){
        document.getElementById("idPedido").value = id;
        document.getElementById("form").submit();
    }
</script>