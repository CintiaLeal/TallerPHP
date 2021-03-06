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
    <div style="display: flex; text-align: center; justify-content: center; margin: 10px;">
        <h1><u style="font-family: 'Unica One', cursive; color:lightseagreen;">Por favor seleccione si ha sido invitado por alguno de los usuarios</u></h1>
    </div>

    <?if(!empty($usuarios)){?>
    <div style="display: flex; text-align: center; justify-content: center; margin: 20px;">
    <select id="listaUsuarios" style="font-family: 'Sen', sans-serif; background-color:lightsalmon; border-radius: 10px; color: white; border-color:#606060; font-size:large;">
        <?foreach($usuarios as $usuario){?>
        <option id="nickUsuario" value="<?=$usuario->nick?>">
            <?=$usuario->nick;?>
        </option>
        <?}?>
    </select>
    </div>
    
    <div style="display: flex; text-align: center; justify-content: center; margin: 20px;">
        <button type="button" onclick="referido()" id="invitado" style="border-radius: 15px; background-color:lightseagreen; color:white;">Seleccionar referido</button>
    </div>

    <div style="display: flex; text-align: center; justify-content: center; margin: 20px;">
        <button type="button" id="validar" style="border-radius: 15px; background-color:darksalmon; color:white;">Confirmar</button>
    </div>
    <?}?>
    <input class="d-none" id="nombre" name="nombre" value="<?=$data['nombre']?>">
    <input class="d-none" id="apellido" name="apellido" value="<?=$data['apellido']?>">
    <input class="d-none" id="username" name="username" value="<?=$data['username']?>">
    <input class="d-none" id="imagen" name="imagen" value="<?=$data['img']?>">
    <input class="d-none" id="password" name="password" value="<?=$data['password']?>">
    <input class="d-none" id="telefono" name="telefono" value="<?=$data['telefono']?>">
    <input class="d-none" id="email" name="email" value="<?=$data['email']?>">
    <input class="d-none" id="biografia" name="biografia" value="<?=$data['biografia']?>">
    <input class="d-none" id="unido" name="unido" value="<?=$data['unido']?>">
    <input class="d-none" id="nickReferido" name="nickReferido">

</form>
<?php
    include ('footer.php');
?>

<script>
function referido(){
    document.getElementById("nickReferido").value = document.getElementById("listaUsuarios").value;
    console.log(document.getElementById("nickReferido").value);
}
// function validar(){
//     let cod = document.getElementById("codigo");
//     let form = document.getElementById("form");
//     if(<?//$code?> == cod.value){
//         alert("Los c??digos coinciden! Bienvenid@");
//         form.submit();
//     }
//     else{
//         alert("Ups! Los c??digos no coinciden, pruebe de nuevo");
//     }
// }
let form = document.getElementById("form");
let btn = document.getElementById("validar");
btn.addEventListener("click", e => {
    e.preventDefault();
    // validar();
    form.submit();
});
</script>