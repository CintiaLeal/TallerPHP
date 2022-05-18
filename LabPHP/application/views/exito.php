<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href='https://css.gg/phone.css' rel='stylesheet'>
        <link href='https://css.gg/mail.css' rel='stylesheet'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sen&family=Unica+One&display=swap');
        #logo{
            margin-top: 2%;
            margin-left: 2%;
            color: white;
            background-color: #ffe1d6;
            max-width: 160px;
            border-radius: 15px;
            justify-content: center;
        }
        a,b{
            color: white;  
        }
        h1{
            font-size: 82px;
            text-decoration: underline;
            font-family: 'Unica One', cursive;
            color: #389393;
        }
        h2{
            font-size: 52px;
            font-family: 'Unica One', cursive;
            color:#fa7f72;
            opacity: 70%;

        }
        .button {
            border: none;
            color: black;
            padding: 10px;
            text-align: center;
            font-family: 'Sen', sans-serif;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 5px 1px;
            cursor: pointer;


        }

        .button1 {border-radius: 12px;  background-color:#389393; opacity: 50%;} 
        .button2 {border-radius: 12px;  background-color: pink; }

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
        i{
            height:50px; 
            width: auto;
            opacity: 50%;
        }
        .buscar{
            max-height: 40px;
        }

        .iconos{
            max-height: 40px;
            max-width: 40px;
            margin: 3%;
            border: none;
            background-color: white;
        }

    </style>
</head>

    <body>
        <div id="logo">
            <a href="<?= base_url().'/index.php'?>" style="text-align:center;">
                <img src="https://res.cloudinary.com/dmc55ugqh/image/upload/v1652475704/te_lo_llevo-removebg-preview_qhl4w4.png" style="max-height:100px; max-width: auto;">
            </a>
        </div>

        <div class="row d-flex flex-column align-items-center">
            <h1 id="titulo" style="text-align:center;">Listo!</h1>
        </div>
        <div class="row d-flex flex-column align-items-center">
            <h2 style="text-align:center;">Su petición ha sido procesada con éxito</h2>
        </div>
        <div class="row d-flex flex-column align-items-center">
            <a href="<?= base_url().'/index.php'?>" style="text-align:center;"><button type="submit" class="button button1"><b style="color: white;">Volver al inicio</b></button></a>
        </div>

        <?php
            include ('footer.php');
        ?>
    </body>
</html>