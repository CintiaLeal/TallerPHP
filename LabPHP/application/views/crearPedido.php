<?php
if(isset($_SESSION['usuario'])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css">
        /* Some custom styles to beautify this example */
        
        @import url('https://fonts.googleapis.com/css2?family=Sen&family=Unica+One&display=swap');
        .row {
            margin-top: 1rem;
            background: #ffffff;
        }
        
        .col {
            background-color: #fff;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            width: 700px;
            max-width: 100%;
            min-height: 300px;
            padding: 10px 15px;
            width: 100%;
            border: 1px solid rgba(0, 0, 0, 0.5)
        }
        
        .col3 {
            background-color: #fff;
            border-radius: 10px;
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
            width: 30%;
            padding: 1%;
            justify-content: center;
        }
        
        .c2p {
            width: 32%;
            padding: 1%;
            justify-content: center;
        }
        
        button {
            border-radius: 10px;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            width: 100%;
            text-transform: uppercase;
        }
        
        .btnbtn {
            border: 1px solid #389393;
            background-color: #389393;
            opacity: 80%;
        }
        
        .btnbtn:hover {
            background-color: #225e5e;
        }
        
        h2 {
            font-family: 'Sen', sans-serif;
            color: #fa7f72;
        }
        
        h3 {
            font-family: 'Sen', sans-serif;
        }
        
        a {
            font-family: 'Sen', sans-serif;
            font-size: 16px;
        }
        
        p {
            font-family: 'Sen', sans-serif;
            color: #606060;
            font-size: 20px;
        }
        
        textarea {
            font-family: 'Sen', sans-serif;
            color: #606060;
            font-size: 12px;
        }
        
        .amini {
            font-family: 'Sen', sans-serif;
            font-size: 10px;
        }
        
        .pmini {
            font-family: 'Sen', sans-serif;
            color: #606060;
            font-size: 16px;
        }
        
        .pnegrita {
            font-family: 'Sen', sans-serif;
            color: #606060;
            font-size: 18px;
        }
        
        .img {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .inputCalculados {
            border: none;
            font-family: 'Sen', sans-serif;
        }
    </style>
</head>
<script>
    function toggle() {
        var element = document.getElementById('element1');
        var element2 = document.getElementById('element2');
        var uno = document.getElementById('btn');
        if (element.style.display != 'none' & element.style.display != 'none') {
            element.style.display = 'none';
            element2.style.display = 'none';
            uno.innerText = 'Solo ida';
        } else {
            element2.style.display = '';
            element.style.display = '';
            uno.innerText = 'Ida y vuelta';
        }
    }
    function buscar(){
        var estado = $("#estado").val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . 'index.php/lugar/getEstados'; ?>', // C:\MAMP\htdocs\TallerPHP\LabPHP\application\controllers\Viaje.php
            data: {estado: estado}, //estado primero es el que manda 
            dataType: "json",
            success: function(resp){   
                var select = document.getElementById("estados");
                for (let i = select.options.length; i >= 0; i--) {
                    select.remove(i);
                }
                let valorFinal = resp.estados;
                valorFinal.forEach(element =>  {
                    console.log(element);
                    var option = document.createElement("option");
                    option.text = element.name;
                    option.value = element.id;
                    select.add(option);                    
                });
            }
        });
    }
    function buscarCiudad(){
    var estado = $("#estados").val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url() . 'index.php/lugar/getCiudad'; ?>', // C:\MAMP\htdocs\TallerPHP\LabPHP\application\controllers\Viaje.php
        data: {estado: estado}, //estado primero es el que manda 
        dataType: "json",
        success: function(resp){   
            var select = document.getElementById("ciudades");
            for (let i = select.options.length; i >= 0; i--) {
                select.remove(i);
            }
            let valorFinal = resp.ciudades;
            valorFinal.forEach(element =>  {
                console.log(element);
                var option = document.createElement("option");
                option.text = element.name;
                option.value = element.id;
                select.add(option);         
            });
        }
    });
}
function buscarx(){
var estado = $("#est").val();
$.ajax({
    type: 'POST',
    url: '<?php echo base_url() . 'index.php/lugar/getEstados'; ?>', // C:\MAMP\htdocs\TallerPHP\LabPHP\application\controllers\Viaje.php
    data: {estado: estado}, //estado primero es el que manda 
    dataType: "json",
    success: function(resp){   
        var select = document.getElementById("esta");
        for (let i = select.options.length; i >= 0; i--) {
            select.remove(i);
        }
        let valorFinal = resp.estados;
        valorFinal.forEach(element =>  {
            console.log(element);
            var option = document.createElement("option");
            option.text = element.name;
            option.value = element.id;
            select.add(option);         
        });
    }
});
}
function buscarCiudadx(){
var estado = $("#esta").val();
$.ajax({
type: 'POST',
url: '<?php echo base_url() . 'index.php/lugar/getCiudad'; ?>', // C:\MAMP\htdocs\TallerPHP\LabPHP\application\controllers\Viaje.php
data: {estado: estado}, //estado primero es el que manda 
dataType: "json",
success: function(resp){   
    var select = document.getElementById("c");
    for (let i = select.options.length; i >= 0; i--) {
        select.remove(i);
    }
    let valorFinal = resp.ciudades;
    valorFinal.forEach(element =>  {
        console.log(element);
        var option = document.createElement("option");
        option.text = element.name;
        option.value = element.id;
        select.add(option);
        
    });
}
});
}
</script>

<body>
    <div class="container">

        <form action="<?= base_url().'/index.php/pedido/registro'?>" method="POST">
            <!--Row with two equal columns-->
            <div class="row">

                <div class="col">
                    <div class="c1">
                        <h2>Nuevo pedido</h2>
                    </div>

                    <div class="cont">
                        <div class="c2p">
                            <p>Nombre:</p>
                            <input name="nombre" id="nombre" type="text" />
                        </div>
                        <div class="c2p">
                            <div class="c2p">
                            <p>Origen:</p>
                                <select name="estado" id="estado" onchange="buscar()">
                                <option value="">Pais</option>
                                    <?php foreach ($Lugar as $row) {?>
                                    <option value="<?=$row->id;?>"><?=$row->name;?></option>
                                    <?php } ?>
                                </select>
                                </div>
                                <div class="c2p">
                                <select id="estados"  name="estados" onchange="buscarCiudad()">
                                    <option>Estado</option>
                                </select>
                                </div>
                                <div class="c2p">
                                <select id="ciudades"  name="ciudades" >
                                    <option>Ciudad</option>
                                </select>
                            </div>
                            
                            <div class="c2p">
                                <p>Destino:</p>
                                <select name="est" id="est" onchange="buscarx()">
                                <option value="">Pais</option>
                                    <?php foreach ($Lugar as $row) {?>
                                    <option value="<?=$row->id;?>"><?=$row->name;?></option>
                                    <?php } ?>
                                </select>
                                </div>
                                <div class="c2p">
                                <select id="esta"  name="esta" onchange="buscarCiudadx()">
                                    <option>Estado</option>
                                </select>
                                </div>
                                <div class="c2p">
                                <select id="c"  name="c" onchange="esIgual()">
                                    <option>Ciudad</option>
                                </select>
                            </div>
                        </div>

                        <div class="c2p">
                            <div>
                                <p>Fecha de minima:</p>
                                <input name="min" type="date" />
                            </div>
                            <div>
                                <p>Fecha de maxima:</p>
                                <input name = "max" type="date" />
                            </div>
                        </div>
                        <div class="c2p">
                            <p>Imagen:</p>
                            <button  type="button" class="file-select btn" id="btn" style="background-color:#606060; color:white; opacity:50%; max-width:fit-content;">
                            Seleccionar Archivo
                            </button>
                            <input name="imagen" id="imagen" class="d-none" />
                        </div>
                        <div class="c2p">
                            <p>Precio:</p>
                            <input type="text" id="neto" name="precio"/>
                        </div>
                        <div class="c2p">
                            <p>Link</p>
                            <input id = "link" name="link" type="text">
                        </div>
                        <div class="c1p">
                            <p>Descripcion</p>
                            <textarea id = "descripcion" name="descripcion" rows="5" cols="100"></textarea>
                            <p class="amini">Incluir detalles sobre tu pedido</p>
                            <?if(!empty($cupones)){?>
                            <p>Cupones:</p>
                            <select class="listaPedidos" id="cupones" name="cupones">
                                <?foreach($cupones as $cupon){?>
                                <option value="<?=$cupon->id?>">
                                    $<?=$cupon->descuento?>
                                </option>
                                <?}?>
                            </select>
                            <button type="button" onclick="cupondescuento()" style="margin-top:5px; background-color:#389393; color:white; opacity:50%;">Seleccionar</button> 
                            <?}?>
                        </div>
                        <input class="d-none" name="cupon" id="cupon">
                    </div>
                    <button class="btnbtn" id="btnbtn" type="submit" style="background-color:#fa7f72;">Hacer Pedido</button>
                </div>

            </div>
            <!-- <div class="row">
                <div class="col3">
                    <div class="">
                        <p class="pmini" value="neto">Precio: $ <input type="text" class="inputCalculados" id="pneto" disabled="disabled" /> </p>
                        <p class="pmini" id="comiTeloLLevo">Tasa de TeloLLevo: $ <input type="text" class="inputCalculados" id="comisTeloLLevo" disabled="disabled" /></p>
                        <?//if(!empty($cupones)){?>
                        <p class="pmini" id="desc">Descuento: $ <input type="text" class="inputCalculados" id="descuento" disabled="disabled" /></p>
                        <?//}?>
                        <p class="pnegrita"><b>Total estimado:  $ <input type="text" id="total" name="total" class="inputCalculados" disabled="disabled" /> </b></p>
                    </div>

                </div> -->

            </div>
            <!--Row with three equal columns-->
            <div class="row">
                

            </div>
        </form>

    </div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
<SCRIPT LANGUAGE="JavaScript">
function esIgual(){
    console.log("llega");
    
    var c1 = document.getElementById("ciudades").value;
    var c2 = document.getElementById("c").value;
//pone fecha
    var cop = document.getElementById("c");
    const p  = document.getElementById("btnbtn");

    console.log(c2);
    console.log(c1);
   
    if(c1===c2){ 
        p.disabled = true; 
        cop.setAttribute("style", "background-color: #E6B0AA;");
    }
    else{
        p.disabled = false; 
        cop.setAttribute("style", "background-color: none;");
    }

}
    

        const btn = document.querySelector("#btn");
        const imagen = document.querySelector("#imagen");
        let urlImagen = ''
        const widget_cloudinary = cloudinary.createUploadWidget({
            cloudName: "dmc55ugqh",
            uploadPreset: "fkvyrxo1"
        }, (error, result) => {
            if (!error && result && result.event === 'success') {
                console.log(result.info.secure_url)
                urlImagen = result.info.secure_url;
                imagen.value = result.info.secure_url;
            }
        })
        btn.addEventListener("click", e => {
            e.preventDefault();
            widget_cloudinary.open()
        }, false)
        imagen.value = urlImagen;
        console.log(imagen.value);

    // function calcular() {
    //     ne = eval(document.getElementById('neto').value);

    //     comiTeloLLevo = ne * 0.1;
    //     total = ne + comiTeloLLevo;
    //     document.getElementById('comisTeloLLevo').value = comiTeloLLevo;
    //     document.getElementById('pneto').value = ne;
    //     document.getElementById('total').value = total;
    //     document.getElementById("precio").value = total;
    // }

    function cupondescuento(){
        document.getElementById('descuento').value = document.getElementById("desc").value;
        document.getElementById("cupon").value = document.getElementById("cupones").value;
        console.log(document.getElementById("cupon").value);
    }
</SCRIPT>


<?php
    include ('footer.php');
?>
</html>
