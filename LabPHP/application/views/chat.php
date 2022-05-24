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
    <title>Bootstrap Auto-layout Columns</title>
    <script src="https://code.jquery.com/jquery-git.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>   
    <style type="text/css">
    /* Some custom styles to beautify this example */

    @import url('https://fonts.googleapis.com/css2?family=Sen&family=Unica+One&display=swap');

    .row {
        margin-top: 1rem;
        
        background: #ffffff;
        border: none;
       
    }
    html,body{ margin: 0;}
    .div_contenedor{
        
        height: 100vh;       
    }
    .div_centrado{
       
        width: 80%;       
        height: 100%;
        position: absolute;
        top:20%;
        left: 10%;           
        margin-top: -10px;
        margin-left: -10px;
    }

    .col {
        background-color: #fff;
        position: relative;
        overflow: hidden;

        max-width: 100%;
        min-height: 300px;
        padding: 10px 15px;
        width: 70%;
        border: 1px solid rgba(0, 0, 0, 0.5)
    }

    .col2 {
        background-color: #fff;
        position: relative;
        overflow: hidden;

        max-width: 100%;
        min-height: 300px;
        padding: 10px 15px;
        width: 30%;
        border: 1px solid rgba(0, 0, 0, 0.5);

    }

    header{
        width: 1300px;
    }
    .col3 {
        background: linear-gradient(90deg, #389393, #f5a25d);
        opacity: 80%;
        position: relative;
        overflow: hidden;
        opacity: 70%;
        max-width: 100%;
        min-height: 100px;
        padding: 10px 15px;
        width: 100%;
        border: 1px solid rgba(0, 0, 0, 0.5)
    }

    .col4 {
        background-color: #389393;
        opacity: 80%;
        position: relative;
        overflow: hidden;
        width: 600px;
        max-width: 100%;
        min-height: 100px;
        padding: 10px 15px;
        width: 100%;
        border: 1px solid rgba(0, 0, 0, 0.5)
    }

    .cont {
        display: flex;
        flex-wrap: wrap;
    }

    .c1p {
        width: 78%;
        padding: 1%;
    }

    .c2p {
        width: 50%;
        padding: 1%;
    }

    .c3p {
        width: 19%;
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
        width: 100%;
        height: 100%;
        border-radius: 5px;
        font-family: 'Sen', sans-serif;
        font-size: 16px;
        color: black;
        border-color: #f5a25d;
        opacity: 50%;
    }

    .perfilbtn {
        background-color: #f5a25d;
        width: 100%;
        height: 100%;
        border-radius: 5px;
        font-family: 'Sen', sans-serif;
        font-size: 16px;
        color: black;
        border-color: #f5a25d;
        opacity: 50%;
    }

    #global {
        height: 300px;
        width: 100%;
        overflow-y: scroll;
    }

    #global2 {
        height: 300px;
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
let nickAnterior = "";
let timerId;

let ocultarSpiner = false;

function llamada(nick) {

    var spiner = document.getElementById('spiner');


    if (nickAnterior != "" && nickAnterior != nick) {
        clearTimeout(timerId);
        timerId = null;
    }

    nickAnterior = nick;
    var padre = document.getElementById('demo');
    var div = document.createElement("div");
    $('#demo').empty();
    buscarPerfil(nick);


    spiner.style.visibility = "visible";
    timerId = setInterval(() => {
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
                    $('#global2').scrollTop( $('#global2').prop('scrollHeight') ); 

                }
                else{
                    var div = document.createElement("div");
                    div.setAttribute("id", "div");
                    div.setAttribute("class", "darkerv");
                    div.textContent = element.contenido;
                    micapa.appendChild(div);
                    $('#global2').scrollTop( $('#global2').prop('scrollHeight') );      
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

    var micapa = document.getElementById('demo');


    var div = document.createElement("div");
    div.setAttribute("id", "div");
    div.setAttribute("class", "darkerv")
    div.textContent = contenido;
    micapa.appendChild(div);
    $('#global2').scrollTop( $('#global2').prop('scrollHeight') ); 
}
</script>

<body>

<div class="div_contenedor">
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

                </div>
            </div>
            <div class="col2">
                <div id="global">
                    <?php foreach ($Perfiles as $row) {?>
                    <div class="containerperfil">
                        <img src="<?=$row->img;?>" alt="Foto de perfil"
                            style="margin-bottom: 15%; margin-left:15%; max-width: 100px; max-height: auto;">
                        <button class="perfilbtn" name="xPerfil" value="<?=$row->nick;?>"
                            onclick="llamada('<?=$row->nick;?>')"> <?=$row->nick;?></button>
                    </div>
                    <?php 
            } ?>
                </div>
            </div>
            <div class="col">
                <div id="global2" name="global2">
                    <div class="cont">
                        <div class="spinner-border ocultar" style="visibility:hidden; width: 15rem; height: 15rem; margin: auto; font-size: 50px"
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
                <div class="cont">

                    <div class="c1p">
                        <input type="textarea" class="inputEnvio" id="contenidoMensaje" name="contenidoMensaje">
                        </input>
                    </div>
                    <div class="c3p">
                        <button class="enviobtn" onclick="enviar()">Enviar</button>
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