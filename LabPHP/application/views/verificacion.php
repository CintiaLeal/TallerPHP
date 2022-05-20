<?php
session_start();
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>

<form action="<?= base_url().'/index.php/usuario/validar'?>" id="form" method="POST">
    <div style="display: flex; text-align: center; justify-content: center;">
        <h1><u style="font-family: 'Unica One', cursive; color:lightseagreen;">Por favor introduzca el código de verificación</u></h1>
    </div>

    <div style="display: flex; text-align: center; justify-content: center;">
        <input type="number" name="codigo" id="codigo" placeholder="Código de verificación">
    </div>

    <div>
        <button type="button" id="validar" style="border-radius: 15px; background-color:darksalmon; color:white;">Verificar</button>
    </div>
    <input class="d-none" id="nombre" name="nombre" value="<?=$nombre?>">
    <input class="d-none" id="apellido" name="apellido" value="<?=$apellido?>">
    <input class="d-none" id="username" name="username" value="<?=$username?>">
    <input class="d-none" id="imagen" name="imagen" value="<?=$img?>">
    <input class="d-none" id="password" name="password" value="<?=$password?>">
    <input class="d-none" id="telefono" name="datos" value="<?=$telefono?>">
    <input class="d-none" id="email" name="email" value="<?=$email?>">
    <input class="d-none" id="biografia" name="biografia" value="<?=$biografia?>">
    <input class="d-none" id="unido" name="unido" value="<?=$unido?>">

</form>
<?php
    include ('footer.php');
?>

<script>
function validar(){
    let cod = document.getElementById("codigo");
    let form = document.getElementById("form");
    if(<?=$code?> == cod){
        alert("Los códigos coinciden! Bienvenid@");
        form.submit();
    }
    else{
        alert("Ups! Los códigos no coinciden, pruebe de nuevo");
    }
}

let btn = document.getElementById("validar");
btn.addEventListener("click", e => {
    e.preventDefault();
    validar();
});
</script>