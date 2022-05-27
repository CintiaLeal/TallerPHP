<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Bienvenid@ ".$_SESSION["usuario"]?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://css.gg/phone.css' rel='stylesheet'>
    <link href='https://css.gg/mail.css' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.jquery.com/jquery-git.js"></script>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Sen&family=Unica+One&display=swap');

/*ESTILOS DEL HEADER*/
.af {
    font-family: 'Sen', sans-serif;
    color: #fa7f72;
}

.conteiner {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.c1 {
    width: 15%;
    margin: 2%;
    display: flex;
}

.c2 {
    width: 10%;
    padding: 1%;
    margin-top: 1.5%;

}

.c3 {
    width: 15%;
    margin: 1.5%;
}

.c4 {
    width: 15%;
    margin: 2%;
    display: flex;
    justify-content: flex-end;
}

/*ESTILOS DEL FOOTER*/
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

i {
    height: 50px;
    width: auto;
    opacity: 50%;
}

.buscar {
    max-height: 40px;
}

.iconos {
    max-height: 40px;
    max-width: 40px;
    margin: 3%;
    border: none;
    background-color: white;
}

/*ESTILOS DE PERFILES*/
.comprador {
    font-family: 'Unica One', cursive;
    font-size: x-large;
    color: #aaaaaa;
}

.viajero {
    font-family: 'Unica One', cursive;
    font-size: x-large;
    color: #aaaaaa;
}

.c_perfiles {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.bio_title {
    font-family: 'Unica One', cursive;
    font-size: medium;
    color: #aaaaaa;
}

.valoraciones_title {
    font-family: 'Unica One', cursive;
    font-size: medium;
    color: #aaaaaa;
}

.c_bio_val {
    margin: 2%;
    display: flex;
}

.scroll_text_bio {
    background-color: #389393;
    opacity: 50%;
    border-radius: 5px;
    color: white;
    width: 300px;
    height: 150px;
}

.scroll_text_val {
    background-color: #fa7f72;
    opacity: 50%;
    border-radius: 5px;
    color: white;
    width: 300px;
    height: 150px;
}

.c_textarea {
    width: 100%;
    display: flex;
}

/*PARA DESPLEGAR EL BOTON*/
/* Dropdown Button */
.dropbtn {
    background-color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
    background-color: white
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: white;
}

/*ESTILOS PARA EDITAR USUARIO*/
.cU {
    width: 15%;
    margin: 20px;
    display: flex;
    justify-content: center;
}

/*ESTILOS PARA VER PEDIDOS*/
.scroll_text_pedidos {
    border-color: #389393;
    border-radius: 5px;
    color: black;
    width: 500px;
    max-height: 250px;
    overflow-y: scroll;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    display: flex;
}

.texto {
    font-family: 'Sen', sans-serif;
    color: white;
    margin: 5px;
    background-color:#389393;
    opacity: 70%;
    border-radius: 10px;
    border-color: #aaaaaa;
}

.prioridad {
    z-index: 50;
}

/*ESTILOS PARA VER VIAJE PARTICULAR */

.atributosV{
    margin: 5px;
}

.contenedorAtributos{
    justify-content:start;
}

.contenedorParticular{
    margin: 10px; 
    justify-content:center;
}

.contenedorImagen{
    border-radius: 10px;
    border-color: #389393;
    border-width: 1px;
}

.listaPedidos{
    background-color: #fa7f72;
    color: white;
    opacity: 50%;
    border-radius: 10px;
}

.btnViaje{
    background-color: #389393;
    color: white;
    opacity: 50%;
    border-radius: 10px;
    border-color: #389393;
}

.comision{
    border-radius: 10px;
    background-color: #e6e6e6;
    color:white;
    width: 100px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
let timerId;

       window.onload = function () {
      console.log("function called...");
      timerId = setInterval(() => {
         
        console.log("hola otra vez");
        cambiarAlerta();
     }, 5000);
    }

    function cambiarAlerta() {
    var spanalerta = document.getElementById("alerta");

    $.ajax({
        type: 'POST',
        url: '<?php echo base_url() . 'index.php/notificacion/alerta'; ?>',
        //estado primero es el que manda 
        dataType: "json",
        success: function(resp) {
            let valor = resp.alerta;
            
            $.each(valor, function(index, element) {
                console.log(element.leida); 
            if(element.leida == 0){
                spanalerta.setAttribute("class", "position-absolute top-10 start-20 translate-middle p-2 bg-success border border-light rounded-circle");
            }
            else{
                spanalerta.setAttribute("class", "");
            }
        });  
        }

    });

}

function buscarNotificacion() {
    $('#dropdown-content').empty();
    var spanalerta = document.getElementById("alerta");
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url() . 'index.php/notificacion/nuevaNotificacion'; ?>',
        //estado primero es el que manda 
        dataType: "json",
        success: function(resp) {
            let valorFinal = resp.nuevaNotificaciones;
            console.log(valorFinal);


            var micapa = document.getElementById("dropdown-content");
           
            var aRef = document.createElement("a");
            $.each(valorFinal, function(index, element) {
                var div = document.createElement("div");
                var a = document.createElement("a");
                var aN = document.createElement("a");
                aN.style.backgroundColor = "#389393";
                aN.textContent = "Nueva";
                aN.style.opacity = "80%";
                //aN.font-family = 'Sen', sans-serif;
                aN.color = "#389393";
                micapa.setAttribute("class", "dropdown-content prioridad");
                div.setAttribute("id", "div");
                div.setAttribute("class", "prioridad");
                a.setAttribute("class", "dropdown-item prioridad");
                div.style.border = "solid gray";
                a.style.backgroundColor = "white";
                a.textContent = element.contenido;
                div.appendChild(aN);
                div.appendChild(a);
                micapa.appendChild(div);

                spanalerta.setAttribute("class", "");
            });

            
                    aRef.setAttribute("class", "dropdown-item prioridad");
                    aRef.style.backgroundColor = "#f5a25d";
                    aRef.style.opacity = "80%";
                    aRef.setAttribute("href", "<?= base_url().'/index.php/notificacion/verNotificacion'?>");
                    // a.setAttribute("href", "http://www.google.es");
                    aRef.textContent = "Ver más";
                    
                    micapa.appendChild(aRef);
        }

    });



}
</script>
<nav onload="myFunction()">
    <div class="conteiner">
        <div class="c1">
            <img src="https://res.cloudinary.com/djiek0hdx/image/upload/v1652475313/te_lo_llevo-removebg-preview_e6vtz2.png"
                alt="Logo" height="80px" width="auto">
        </div>
        <div class="c2">
            <u><a href="<?= base_url().'/index.php/welcome/crearPedido'?>" style="color:lightcoral">Comprar</a></u>
        </div>
        <div class="c2">
            <label style="color: #389393">|</label>
        </div>
        <div class="c2">
            <u><a href="<?= base_url().'/index.php/welcome/publicarViajes'?>" style="color:lightcoral">Viaje</a></u>
        </div>
        <div class="c1">
            <input type="search" id="form1" class="form-control buscar" placeholder="Buscar">
            <button type="button" style="background-color:dimgray; border-radius:5px;" class="buscar">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-search"
                    viewBox="0 0 16 16" style="margin: 3%;">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
        </div>
        <div class="c4">
            <!--   <button type="button" class="dropbtn">-->
            <a type="button" class="dropbtn" href="<?= base_url().'/index.php/chat/verChat'?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#f5a25d" class="bi bi-chat"
                    viewBox="0 0 16 16">
                    <path
                        d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                </svg>
                </button>
            </a>
            <div class="dropdown">
                <button class="dropbtn" onclick="buscarNotificacion()">
                    <!-- <a  href=""> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#606060" class="bi bi-bell"
                        viewBox="0 0 16 16" style="opacity: 50%;">
                        <path
                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                    </svg>
                    <span
                        class=""
                        id="alerta"></span>
                </button>
                
                <div class="dropdown-content prioridad" id="dropdown-content">
                </div>
                
                
            </div>

            <!-- Icono de perfil -->
            <div class="dropdown">
                <button type="button" class="dropbtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#389393"
                        class="bi bi-person-circle" viewBox="0 0 16 16" style="opacity: 50%;">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </button>
                <div class="dropdown-content prioridad">
                    <a href="<?= base_url().'/index.php/usuario/verPerfil'?>" style="background-color: white;">Ver
                        perfil</a>
                    <a href="<?= base_url().'/index.php/usuario/editarUsuario'?>"
                        style="background-color: white;">Editar perfil</a>
                    <a href="<?= base_url().'/index.php/usuario/verViajes'?>" style="background-color: white;">Ver
                        viajes</a>
                    <a href="<?= base_url().'/index.php/usuario/verPedidos'?>" style="background-color: white;">Ver
                        pedidos</a>
                    <a href="<?= base_url().'/index.php/usuario/valorarUsuario'?>"
                        style="background-color: white;">Calificar usuario</a>
                    <a href="<?= base_url().'/index.php/usuario/cerrarSesion'?>" style="background-color: white;">Cerrar
                        sesión</a>
                </div>
            </div>
        </div>
    </div>
</nav>