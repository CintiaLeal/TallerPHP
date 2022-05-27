<?php
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>

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