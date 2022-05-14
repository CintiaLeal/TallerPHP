<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Te lo llevo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://css.gg/phone.css' rel='stylesheet'>
    <link href='https://css.gg/mail.css' rel='stylesheet'>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Sen&family=Unica+One&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    * {
        box-sizing: border-box;
    }

    body {
        background: #f6f5f7;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: 'Montserrat', sans-serif;
        height: 100vh;
        margin: -20px 0 50px;
    }

    h1 {
        font-family: 'Sen', sans-serif;
        font-weight: bold;
        margin: 0;
    }

    h2 {
        font-family: 'Sen', sans-serif;
        text-align: center;
    }

    p {
        font-size: 14px;
        font-weight: 100;
        line-height: 20px;
        letter-spacing: 0.5px;
        margin: 20px 0 30px;
    }

    span {
        font-size: 12px;
    }

    a {
        font-family: 'Sen', sans-serif;
        color: #fa7f72;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
    }

    button {
        border-radius: 5px;
        border: 1px solid #389393;
        background-color: #389393;
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }

    button:active {
        transform: scale(0.95);
    }

    button:focus {
        outline: none;
    }

    button.ghost {
        background-color: transparent;
        border-color: #FFFFFF;
    }

    form {
        background-color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 50px;
        height: 100%;
        text-align: center;
    }

    input {
        background-color: #eee;
        border: none;
        padding: 11px 13px;
        margin: 7px 0;
        width: 100%;
    }

    .inputlogin {
        background-color: #eee;
        border: none;
        padding: 11px 13px;
        margin: 7px 0;
        width: 100%;
    }

    .container {
        background-color: #fff;
        border-radius: 10px;

        position: relative;
        overflow: hidden;
        width: 1400px;
        max-width: 100%;
        min-height: 800px;
    }

    .form-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .sign-in-container {
        left: 0;
        width: 50%;
        z-index: 2;
    }

    .container.right-panel-active .sign-in-container {
        transform: translateX(100%);
    }

    .sign-up-container {
        left: 0;
        width: 50%;
        opacity: 0;
        z-index: 1;
    }

    .container.right-panel-active .sign-up-container {
        transform: translateX(100%);
        opacity: 1;
        z-index: 5;
        animation: show 0.6s;
    }

    @keyframes show {

        0%,
        49.99% {
            opacity: 0;
            z-index: 1;
        }

        50%,
        100% {
            opacity: 1;
            z-index: 5;
        }
    }

    .overlay-container {
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: transform 0.6s ease-in-out;
        z-index: 100;
    }

    .container.right-panel-active .overlay-container {
        transform: translateX(-100%);
    }

    .overlay {
        background: #f5a25d;
    
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 0 0;
        color: #FFFFFF;
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .container.right-panel-active .overlay {
        transform: translateX(50%);
    }

    .overlay-panel {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 40px;
        text-align: center;
        top: 0;
        height: 100%;
        width: 50%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .overlay-left {
        transform: translateX(-20%);
    }

    .container.right-panel-active .overlay-left {
        transform: translateX(0);
    }

    .overlay-right {
        right: 0;
        transform: translateX(0);
    }

    .container.right-panel-active .overlay-right {
        transform: translateX(20%);
    }

    .social-container {
        margin: 20px 0;
    }

    .social-container a {
        border: 1px solid #DDDDDD;
        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0 5px;
        height: 40px;
        width: 40px;
    }

    .conteiner {
        display: flex;
        flex-wrap: wrap;
    }

    .c1 {
        width: 50%;
        padding: 1%;
    }

    .c2 {
        width: 50%;
        padding: 1%;
    }
    /*ESTILOS PARA EL FOOTER */
    .af{
        font-family: 'Sen', sans-serif;
        color: #fa7f72;
    }
    .conteinerF {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
    }

    .c1F {
        width: 20%;
        padding: 1%;
        margin: 1%;
    }
    
    .c2F {
        width: 20%;
        padding: 1%;
        margin: 1%;
    }
    i{
        height:50px; 
        width: auto;
        opacity: 50%;
    }
</style>
<body>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="<?= base_url().'/index.php/usuario/registro'?>" method="POST">
            <h1>Crear Usuario</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <!-- <span>or use your email for registration</span> -->
            <input type="text" placeholder="User name" name="username"/>
            <div class="conteiner" onkeypress="enterEnviar(event);">
                <div class="c1">
                    <input type="text" placeholder="Nombre" name="name"/>
                </div>
                <div class="c2">

                    <input type="text" placeholder="Apellido" name="apellido"/>
                </div>
                <div class="c1">
                    <input type="text" placeholder="Telefono" name="telefono"/>
                </div>
                <div class="c2">
                    <input type="file" placeholder="Imagen" name="img"/>
                </div>
            </div>
            <input type="text" placeholder="Email" name="email"/>
            <input type="text" placeholder="Biografia" name="biografia"/>
            <input id="pass1" type="password" placeholder="Password" name="password"/>
            <input id="pass2" type="password" placeholder="Repite tu password"/>
            <input type="submit" onclick="validarContrasena()" class="btn-submit" value="Registrarse">
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="<?= base_url().'/index.php/usuario/iniciarSesion'?>" method="GET">
            <h1>Login</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <!-- <span>or use your account</span> -->
            <input class="inputlogin" type="user" placeholder="User Name" name="username"/>
            <input class="inputlogin" type="password" placeholder="Password" name="password"/>

            <button>Iniciar</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Hola :)</h1>
                <img src="logo.png" height="300px" width="auto">
                <p>Estas en registrar usuario, si usted ya tiene una cuenta presione el boton Iniciar Sesion</p>
                <button class="ghost" id="signIn">Iniciar Sesion</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hola, Bienvenido</h1>
                <img src="logo.png" height="300px" width="auto">
                <p>Ingrese su nombre de usuario y contrasenia, si usted no tiene cuenta presione el boton Registrarse
                </p>
                <button class="ghost" id="signUp">Registrarse</button>
            </div>
        </div>
    </div>
</div>

<?php
    include ('footer.php');
?>
<SCRIPT LANGUAGE="JavaScript">
    


    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

   
  



//Validar contrasena
function validarContrasena() {
var p1 = document.getElementById('pass1').value;
var p2 = document.getElementById('pass2').value;

    if (p1 != p2) {
    alert("Las passwords deben de coincidir");
    return false;
  } else {
    alert("Todo esta correcto");
    return true; 
  }
}
//enter
function enterEnviar(event){
    if(event.keyCode == 13){
      validarContrasena()
    }
}
</SCRIPT>

