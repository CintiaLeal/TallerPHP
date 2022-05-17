
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

<body>
    <div class="container">
        <!--Row with two equal columns-->
        <div class="row">

            <div class="col">
                <div class="c1">
                    <h2>Nuevo pedido</h2>
                </div>

                <div class="cont">
                    <div class="c2p">
                        <p>Nombre:</p>
                        <input type="text" />
                    </div>
                    <div class="c2p">
                        <p>Lugar para recibir mi pedido</p>
                        <select>
                        <option>Selecciones</option>
                    </select>
                    </div>

                    <div class="c2p">
                        <p>Fecha de minima:</p>
                        <input type="date" />
                    </div>
                    <div class="c2p">
                        <p>Fecha de maxima:</p>
                        <input type="date" />
                    </div>
                    <div class="c2p">
                        <p>Imagen:</p>
                        <button  type="button" class="file-select btn" id="btn">
                        Seleccionar Archivo
                        </button>
                        <input name="imagen" id="imagen" class="d-none" />
                    </div>
                    <div class="c2p">
                        <p>Precio:</p>
                        <input type="text" id="neto" onkeyup="calcular()" />
                    </div>
                    <div class="c2p">
                        <p>Link</p>
                        <input type="text">
                    </div>
                    <div class="c1p">
                        <p>Descripcion</p>
                        <textarea name="descripcion" rows="5" cols="100"></textarea>
                        <p class="amini">Incluir detalles sobre tu pedido</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col3">
                <div class="">
                    <p class="pmini" value="neto">Precio: $ <input type="text" class="inputCalculados" id="pneto" disabled="disabled" /> </p>
                    <p class="pmini" id="comiTeloLLevo">ComiTeloLLevo: $ <input type="text" class="inputCalculados" id="comisTeloLLevo" disabled="disabled" /></p>
                    <p class="pmini" id="comi">Comision de para quien le va trae el pedido: $ <input type="text" class="inputCalculados" id="comis" disabled="disabled" /></p>
                    <p class="pnegrita"><b>Pago total:  $ <input type="text" id="total" class="inputCalculados" disabled="disabled" /> </b></p>
                </div>

            </div>

        </div>
        <!--Row with three equal columns-->
        <div class="row">
            <button class="btnbtn" type="submit">Hacer Pedido</button>

        </div>

    </div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
<SCRIPT LANGUAGE="JavaScript">

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
            }
        })
        btn.addEventListener("click", e => {
            e.preventDefault();
            widget_cloudinary.open()
        }, false)
        imagen.value = urlImagen;
        console.log(imagen.value);

    function calcular() {
        ne = eval(document.getElementById('neto').value);


        comiTeloLLevo = ne / 50;
        comi = ne / 20;
        total = ne + comi + comiTeloLLevo;

        document.getElementById('comisTeloLLevo').value = comiTeloLLevo;
        document.getElementById('comis').value = comi;
        document.getElementById('pneto').value = ne;
        document.getElementById('total').value = total;
    }
</SCRIPT>

</html>
