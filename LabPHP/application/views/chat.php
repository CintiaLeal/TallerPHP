<!DOCTYPE html>
<html lang="en">
<header>
    <?php
    include ('headerLogueado.php');
?>
</header>



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-git.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<link href='https://css.gg/arrow-up-o.css' rel='stylesheet'>
<style type="text/css">
/* Some custom styles to beautify this example */

@import url('https://fonts.googleapis.com/css2?family=Sen&family=Unica+One&display=swap');

.row {
    margin-top: -0.5rem;
    margin-left: 0%;
    height: 640px;
    background: #ffffff;
    border: none;

}

body {
    margin: 0;
}

html {
    margin: 0;
}

.div_contenedor {
    height: 100vh;
}

.div_centrado {
    width: 80%;
    height: 100vh;
    position: absolute;
    top: 15%;
    left: 15%;

}

.col {
    background: linear-gradient(90deg, #d6d6d6,white);
    background-color: #d6d6d6;
    position: relative;
    overflow: hidden;
  
    max-width: 100%;
    min-height: 430px;
    padding: 10px 15px;
    width: 100%;
    border-color: #d6d6d6;
    border-top: solid;
}

.col2 {
    background-color: #d6d6d6;
    position: relative;
    overflow: hidden;
   
    border-right: solid;
    max-width: 100%;
    min-height: 400px;
    padding: 10px 15px;
    width: 15%;
  
  

}

header {
    width: 1300px;
}

.col3 {
    z-index: 1;
    /*  background: linear-gradient(90deg, #389393, white);*/
    opacity: 80%;
    position: relative;
    overflow: hidden;
    max-width: 100%;
    height: 100px;
    padding: 10px 15px;
    width: 100%;
    
    border-color: #d6d6d6;
}

.col4 {
    background-color: #d6d6d6;
    opacity: 80%;
    height: 100px;
    padding: 10px 15px;
    width: 100%;
    
  
    
}

.cont {
    display: flex;
    flex-wrap: wrap;
}

.contt {
    display: flex;
    left: 50%;
    margin-top: 10px;
}

.c1p {
    width: 89%;
    padding: 1%;
}

.c2p {
    width: 50%;
    padding: 1%;
}

.c3p {
    padding: 8px 8px;

    width: 9%;
}


.containerc {
    border: none;
    background-color: #f1f1f1;
    border-radius: 5px;

    margin: 10px 0;


}

.containerperfil {
    border: 1px solid rgba(0, 0, 0, 0.5);
    background-color: #f1f1f1;
    
    width: 90%;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
}

.darker {

    float: right;
    background-color: #389393;
    width: 90%;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
    border-color: #389393;
    opacity: 70%;
}

.darkerv {
    float: left;
    background-color: #f5a25d;
    width: 90%;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
    border-color: #f5a25d;
    opacity: 50%;
}

.enviobtn {
    background-color: #f5a25d;
    width: 80%;
    height: 80%;
    border-radius: 5px;
    color: black;
    border-color: #f5a25d;

}

.perfilbtn {
    background-color: #f5a25d;
    width: 100%;
    height: 100%;
    border-radius: 5px;
    font-family: 'Sen', sans-serif;
    font-size: 16px;
    color: black;
    border-right: black;
    border-color: #f5a25d;
    opacity: 50%;
}

#global {
    height: 600px;
    width: 100%;
    overflow-y: scroll;
}

#global2 {
    height: 400px;
    width: 100%;
    overflow-y: scroll;
}

.demo {}

input {
    width: 100%;
}

.inputInfo {
    font-family: 'Sen', sans-serif;
    font-size: 50px;
    color: black;
    display: flex;

    border: none;
    background-color: transparent;
}

.inputEnvio {
    background-color: #c0c0c0;
    border: none;

}

footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 30px;
}
</style>

<link href='https://css.gg/user.css' rel='stylesheet'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
let nickAnterior = "";
let timerIdx;

let ocultarSpiner = false;

function llamada(nick) {

    var spiner = document.getElementById('spiner');


    if (nickAnterior != "" && nickAnterior != nick) {
        clearTimeout(timerIdx);
        timerIdx = null;
    }

    nickAnterior = nick;
    var padre = document.getElementById('demo');
    var div = document.createElement("div");
    $('#demo').empty();
    buscarPerfil(nick);


    spiner.style.visibility = "visible";
    timerIdx = setInterval(() => {
        spiner.style.visibility = "hidden";
        buscarChat(nick);
    }, 5000);
}

function buscarPerfil(nick) {
    console.log(nick);

    $.ajax({
        type: 'POST',
        url: '<?php echo base_url() . 'index.php/chat/buscarPerfil'; ?>',
        data: {
            nick: nick
        }, //estado primero es el que manda 
        dataType: "json",

        success: function(resp) {
            let valorFinal = resp.perfil;

            //console.log(valorFinal);

            valorFinal.forEach(element => {
                console.log(element);
                var option = document.createElement("option");
                option.text = element.nombre;
                option.text = element.apellido;

                option.text = element.nick;


                document.getElementById('nickU').value = element.nick;
                document.getElementById('img').src = element.img;
                document.getElementById('nombreApellido').value = element.nombre + " " + element
                    .apellido;



            });
        }
    });

}

function buscarChat(nick) {

    $('#demo').empty();

    $.ajax({
        type: 'POST',
        url: '<?php echo base_url() . 'index.php/chat/buscarChat'; ?>',
        data: {
            nick: nick
        }, //estado primero es el que manda 
        dataType: "json",
        success: function(resp) {
            let valorFinal = resp.infochat;
            console.log(valorFinal);

            var micapa = document.getElementById('demo');

            $.each(valorFinal, function(index, element) {

                if (element.recibio == nick) {
                    var div = document.createElement("div");
                    div.setAttribute("id", "div");
                    div.setAttribute("class", "darker");
                    div.textContent = element.contenido;
                    micapa.appendChild(div);
                    $('#global2').scrollTop($('#global2').prop('scrollHeight'));

                } else {
                    var div = document.createElement("div");
                    div.setAttribute("id", "div");
                    div.setAttribute("class", "darkerv");
                    div.textContent = element.contenido;
                    micapa.appendChild(div);
                    $('#global2').scrollTop($('#global2').prop('scrollHeight'));
                }

                //scroll siemrpe abajo


            });

        }

    });



}


function enviar() {
    console.log("llego");

    var contenido = document.getElementById('contenidoMensaje').value;

    var receptor = document.getElementById('nickU').value;

    console.log(contenido);
    console.log(receptor);

    $.ajax({
        type: 'POST',
        url: '<?php echo base_url() . 'index.php/chat/enviarMensaje'; ?>',
        data: {
            contenido: contenido,
            receptor: receptor
        },
        dataType: "json",
    });
    document.getElementById('contenidoMensaje').value = "";

    /* var micapa = document.getElementById('demo');


     var div = document.createElement("div");
     div.setAttribute("id", "div");
     div.setAttribute("class", "darkerv")
     div.textContent = contenido;
     micapa.appendChild(div);
     $('#global2').scrollTop($('#global2').prop('scrollHeight'));*/
}
</script>
<link href='https://css.gg/mail.css' rel='stylesheet'>

<body>


    <div class="col2">
        <div><i class="gg-user" style="width: 30px;"></i></div>
        <div id="global">
            <?php foreach ($Perfiles as $row) {?>
            <div class="containerperfil">
                <div style="width:70%">
                    <img src="<?=$row->img;?>" alt="Foto de perfil"
                        style="width:70px; height:70px; border-radius:70px;"> <a><?=$row->nick;?></a>
                </div>
                <div style="width:100%">
                    <a><?=$row->nombre;?> <?=$row->apellido;?></a>
                </div>
                <button class="perfilbtn" name="xPerfil" value="<?=$row->nick;?>" onclick="llamada('<?=$row->nick;?>')">
                    <i class="gg-mail"></i></button>
            </div>
            <?php 
            } ?>
        </div>
    </div>

    <div class="div_centrado">

        <!--Row with two equal columns-->
        <div class="row">
            <div class="col3">
                <div class="cont">
                    <div class="c1p">
                        <input type="hidden" id="nickU" name="nickU" disabled="disabled" />
                        <input type="text" class="inputInfo" id="nombreApellido" name="nombreApellido"
                            disabled="disabled" />
                    </div>
                    <div class="c3p">
                        <img src="img" id="img" alt="Foto de perfil" style="width:70px; height:70px; border-radius:70px;">
                    </div>
                </div>
            </div>

            <div class="col">
                <div id="global2" name="global2">
                    <div class="cont">
                        <div class="spinner-border ocultar"
                            style="visibility:hidden; width: 15rem; height: 15rem; margin: auto; font-size: 50px"
                            id="spiner" name="spiner" role="status">
                            <span class="sr-only"></span>
                        </div>

                        <div id="demo">
                            <div id="div">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col4">
                <div class="contt">

                    <div class="c1p">
                        <textarea id="contenidoMensaje" name="contenidoMensaje" rows="2" cols="172"></textarea>
                    </div>
                    <div class="c3p">
                        <button class="enviobtn" onclick="enviar()"><a style="font-size:16px;">Enviar</a></button>
                    </div>
                </div>
            
        </div>
    </div>
    </div>

    </div>
</body>
<footer>
    <?php
    include ('footer.php');
?>

</footer>

</html>