<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<style>
body {
    background-color: #f4f7f6;
    margin-top: 20px;
}

input {
    font-family: 'Sen', sans-serif;
    font-size: 60px;
    color: black;
    display: flex;

    border: none;
    background-color: transparent;
}

.card {
    background: #D5D8DC;
    transition: .5s;
    border: 0;
    margin-bottom: 30px;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
}

.chat-app .people-list {
    width: 280px;
    position: absolute;
    left: 0;
    top: 0;
    padding: 20px;
    z-index: 7
}

#global2 {
    height: 400px;
    width: 100%;
    overflow-y: scroll;
}

.chat-app .chat {
    margin-left: 280px;

    border-left: 1px solid #eaeaea
}

.people-list {
    -moz-transition: .5s;
    -o-transition: .5s;
    -webkit-transition: .5s;
    transition: .5s;
    overflow-y: scroll;
}

.people-list .chat-list li {
    padding: 10px 15px;
    list-style: none;
    border-radius: 3px
}

.people-list .chat-list li:hover {
    background: #efefef;
    cursor: pointer
}

.people-list .chat-list li.active {
    background: #efefef
}

.people-list .chat-list li .name {
    font-size: 15px
}

.people-list .chat-list img {
    width: 45px;
    border-radius: 50%
}

.people-list img {
    float: left;
    border-radius: 50%
}

.people-list .about {
    float: left;
    padding-left: 8px
}

.people-list .status {
    color: #999;
    font-size: 13px
}

.chat .chat-header {
    padding: 15px 20px;
    border-bottom: 2px solid #f4f7f6
}

.chat .chat-header img {
    float: left;
    border-radius: 40px;
    width: 40px
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px
}

.chat .chat-history {
    padding: 20px;
    background: #D5D8DC;
    
    border-bottom: 2px solid #fff
}

.chat .chat-history ul {
    padding: 0
}

.chat .chat-history ul li {
    list-style: none;
    margin-bottom: 30px
}

.chat .chat-history ul li:last-child {
    margin-bottom: 0px
}

.chat .chat-history .message-data {
    overflow-y: scroll;
    margin-bottom: 15px
}

.chat .chat-history .message-data img {
    border-radius: 40px;
    width: 40px
}

.chat .chat-history .message-data-time {
    color: #434651;
    padding-left: 6px
}

.chat .chat-history .message {
    color: #444;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    display: inline-block;
    position: relative
}

.chat .chat-history .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .my-message {
    margin-top: 20px;
    width: 60%;
    background: #efefef
}

.chat .chat-history .my-message:after {
    bottom: 100%;
    left: 30px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #efefef;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .other-message {
    background: #e8f1f3;
    text-align: right
}

.chat .chat-history .other-message:after {
    border-bottom-color: #e8f1f3;
    left: 93%;

}

.chat .chat-message {

    padding: 20px
}

.online,
.offline,
.me {
    margin-top: 20px;
    margin-right: 2px;
    font-size: 8px;
    width: 60%;
    vertical-align: middle
}

.online {
    color: #86c541
}

.offline {
    color: #e47297
}

.me {
    margin-top: 20px;
    color: #1d8ecd;
    width: 60%;
}

.float-right {
    float: right;
    margin-top: 20px;
    width: 60%;
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0
}

@media only screen and (max-width: 767px) {
    .chat-app .people-list {
        height: 465px;
        width: 100%;
        overflow-x: auto;
        background: #fff;
        left: -400px;
        display: none
    }

    .chat-app .people-list.open {
        left: 0
    }

    .chat-app .chat {
        margin: 0
    }

    .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0
    }

    .chat-app .chat-history {
        height: 300px;
        overflow-x: auto
    }
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
    .chat-app .chat-list {
        height: 650px;
        overflow-x: auto
    }

    .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
    }
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
    .chat-app .chat-list {
        height: 480px;
        overflow-x: auto
    }

    .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
    }
}
</style>
<header>
    <?php
    include ('headerLogueado.php');
?>
</header>
<link href='https://css.gg/mail.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-git.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
                    div.setAttribute("class", "message other-message float-right");
                    div.textContent = element.contenido;
                    micapa.appendChild(div);
                    $('#global2').scrollTop($('#global2').prop('scrollHeight'));

                } else {
                    var div = document.createElement("div");
                    div.setAttribute("id", "div");
                    div.setAttribute("class", "message my-message");
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

<div class="container">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card chat-app">
                <div id="plist" class="people-list">

                    <?php foreach ($Perfiles as $row) {?>
                    <ul class="list-unstyled chat-list mt-2 mb-0">
                        <li class="clearfix">

                            <img src="<?=$row->img;?>" alt="Foto de perfil"
                                style="width:50px; height:50px; border-radius:50px;">
                            <div class="about">
                                <div class="name"><a><?=$row->nick;?></a></div>
                                <div class="status"> <i class="gg-mail"
                                        onclick="llamada('<?=$row->nick;?>')"></i><?=$row->nombre;?>
                                    <?=$row->apellido;?> </div>

                            </div>
                        </li>
                        <?php 
            } ?>
                    </ul>
                </div>
                <div class="chat">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="img" id="img" alt="Foto de perfil"
                                        style="width:50px; height:50px; border-radius:50px;">
                                </a>
                                <div class="chat-about">
                                    <input type="hidden" id="nickU" name="nickU" disabled="disabled" />
                                    <input type="text" id="nombreApellido" name="nombreApellido" disabled="disabled" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="chat-history">
                        <div id="global2" name="global2">
                            <div class="spinner-border ocultar"
                                style="visibility:hidden; width: 10rem; height: 10rem; margin: 100px; font-size: 40px"
                                id="spiner" name="spiner" role="status">
                                <span class="sr-only"></span>
                            </div>
                            <div id="demo" style="width:100%">
                                <div id="div">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-message clearfix">
                        <div class="input-group mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-send" onclick="enviar()"></i></span>
                            </div>
                            <input type="text" id="contenidoMensaje" name="contenidoMensaje" class="form-control"
                                placeholder="Enter text here...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <?php
    include ('footer.php');
?>

</footer>