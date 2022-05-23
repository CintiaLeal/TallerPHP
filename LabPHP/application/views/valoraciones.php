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
    label{ 
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
        font-size: 20px;
        font-family: 'Unica One', cursive;
    }
    label:hover ~ label{
        color:#606060;
    }
</style>
</head>
<body>
    <p class="nombre">Nickname</p>
<div style="justify-content: center;">
    
    <div style="justify-content: center; text-align:center;">
        <img src="http://www.w3.org/2000/svg" class="img" alt= "img" width="40" height="40" fill="#389393" class="bi bi-person-circle" viewBox="0 0 16 16" style="opacity: 50%;">
    </div>

    <div style="justify-content: center; text-align:center;">
        <form>
            <p class="clasificacion">
                <input id="radio1" type="radio" name="estrellas" value="5">
                <label for="radio1">✯</label>
                <input id="radio2" type="radio" name="estrellas" value="4">
                <label for="radio2">✯</label>
                <input id="radio3" type="radio" name="estrellas" value="3">
                <label for="radio3">✯</label>
                <input id="radio4" type="radio" name="estrellas" value="2">
                <label for="radio4">✯</label>
                <input id="radio5" type="radio" name="estrellas" value="1">
                <label for="radio5">✯</label>
            </p>
        </form>
    </div>

    <div style="justify-content: center; text-align:center; margin: 5%;">
        <u><h4 style="font-family: 'Unica One', cursive;">VALORAR COMO:</h4></u>
        <select style="font-family: 'Sen', sans-serif; background-color:lightseagreen; border-radius: 10px; color: white; border-color:#606060;">
            <option value="comprador">Comprador</option>
            <option value="viajero">Viajero</option>
        </select>
    </div>

    <div style="justify-content: center; text-align:center; margin: 10px;">
        <u><h4 style="font-family: 'Unica One', cursive;">Comentarios:</h4></u>
        <textarea id="comentarios" name="comentarios" style="border-radius: 10px; background-color:#aaaaaa; color: white; width: 400px; height: 200px;">

        </textarea>
    </div>

    <div style="justify-content: center; text-align:center;">
        <button class="Cal"> Calificar</button>
    </div>

</div>
</body>

<?php
    // include ('footer.php');
?>