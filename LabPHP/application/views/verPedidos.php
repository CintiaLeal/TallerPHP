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
    <textarea class="scroll_text_pedidos"> 
       <?
        if($res!=null){
            foreach($res as $row){
        ?>
                <img src="<? echo $row->imagen?>">
                <? echo $row->titulo?>
        <?
            }
        }
        else{
        ?>
            Ups! No hay pedidos para este usuario.
        <?
        }
       ?>
    </textarea>
</div>


<?php
    include ('footer.php');
?>