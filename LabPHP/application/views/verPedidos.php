<?php
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>

<div class="conteiner">
    <div style="margin-bottom:3%; text-align: center;">
        <h1 style="font-family: 'Unica One', cursive;"><u>PEDIDOS</u></h1>
    </div>
</div>

<div class="conteiner">
    <div style="text-align: center;">
            <h5 style="font-family: 'Sen', sans-serif; color: #389393;">
                <a><u style="color: #f5a25d;">En tránsito</u></a>
                |
                <a><u style="color: #f5a25d;">Pendientes</u></a>
                |
                <a><u style="color: #f5a25d;">Activos</u></a>
                |
                <a><u style="color: #f5a25d;">Recibidos</u></a>
            </h5>
     </div>
</div>

<div class="conteiner">
    <div class="scroll_text_pedidos">
        <?foreach($arreglo as $row){?>
            <div style="width:200px;">
            <img src="<?=$row->imagen?>" style="max-width: 50px;">
            <?echo "<br>"."<p class="."'texto'".">Titulo: ".$row->titulo."<br>";
            echo "Descripcion: ".$row->descripcion."<br>";
            echo "Precio: $".$row->precio."<br></p>";?>
            </div>
        <?}?>
    </div>
</div>

<?php
    include ('footer.php');
?>