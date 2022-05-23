<?php
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Valoraciones</title>
<style>
    .nombre{
        text-align: center;
        font-size: 35px;
        font-family: 'Unica One', cursive;
    }
    .flex{
        display:flex;
        justify-content: center;
    }
    .label{ 
        color: lightcoral;
        text-align: center;
        font-size: 60px;
    }
    input[type = "radio"]{
         display:none;
         }
    img{
        max-width: 200px;
    }
    button.Cal{
        border-radius: 12px;
        border-color: #606060;
        color:white;
        background-color:lightsalmon;
        font-size: 24px;
        font-family: 'Unica One', cursive;
    }
    .label:hover ~ .label{
        color:#606060;
    }
</style>
</head>
<body>

<div style="justify-content: center; text-align:center;">
    <u><p class="nombre">Nickname:</p></u>
    <select id="usuario" name="usuario" style="font-family: 'Sen', sans-serif; font-size:x-large; background-color:lightseagreen; color: white; border-radius: 10px;">
        <?foreach($usuarios as $user){?>
            <option value="<?=$user->nick;?>">
                <?=$user->nick;?>
            </option>
        <?}?>

    </select>
</div>
    
<div style="justify-content: center;">

    <div style="justify-content: center; text-align:center;">
        <form>
            <p class="clasificacion">
                <input id="radio1" type="radio" name="estrellas" value="5">
                <label for="radio1" class="label">✯</label>
                <input id="radio2" type="radio" name="estrellas" value="4">
                <label for="radio2" class="label">✯</label>
                <input id="radio3" type="radio" name="estrellas" value="3">
                <label for="radio3" class="label">✯</label>
                <input id="radio4" type="radio" name="estrellas" value="2">
                <label for="radio4" class="label">✯</label>
                <input id="radio5" type="radio" name="estrellas" value="1">
                <label for="radio5" class="label">✯</label>
            </p>
        </form>
    </div>

    <div style="justify-content: center; text-align:center; margin: 3%;">
        <u><p class="nombre">VALORAR COMO:</p></u>
        <select id="tipo" name="tipo" style="font-family: 'Sen', sans-serif; background-color:lightseagreen; border-radius: 10px; color: white; border-color:#606060; font-size:x-large;">
            <option value="comprador">Comprador</option>
            <option value="viajero">Viajero</option>
        </select>
    </div>

    <div style="justify-content: center; text-align:center; margin: 10px;">
        <u><p class="nombre">Comentarios:</p></u>
        <textarea id="comentarios" name="comentarios" style="border-radius: 10px; background-color:#aaaaaa; color: white; width: 400px; height: 200px;">

        </textarea>
    </div>

    <div style="justify-content: center; text-align:center;">
        <button class="Cal" id="calificar"> Calificar</button>
    </div>

</div>
</body>

<?php
    include ('footer.php');
?>