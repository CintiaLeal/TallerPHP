<?php
if(isset($_SESSION)){
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
    <title>Bootstrap Auto-layout Columns</title>
    <script src="jquery-1.11.2.min.js"></script>
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
            width: 900px;
            max-width: 100%;
            min-height: 300px;
            padding: 10px 15px;
            width: 100%;
            border: 1px solid rgba(0, 0, 0, 0.5)
        }
        
     
        
        .cont {
            display: flex;
            flex-wrap: wrap;
        }
        
        .c1p {
            width: 25%;
            padding: 1%;
            justify-content: center;
        }
        
        .c2p {
            width: 25%;
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
        
        .btnAViaje {
            border: 1px solid #F5A25D;
            background-color: #F5A25D;
            font-size: 20px;
        }
        
        .btnAViaje:hover {
            background-color: #f44336;
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
        
      
    </style>
</head>

<body>
    <div class="container">
        <!--Row with two equal columns-->
        <div class="row">

            <div class="col">
                
                    <h2>Publicar Viaje</h2>
                    <button class="btnbtn" id="btn" onclick="toggle();"> Ida y vuelta </button>
                
            <form action="<?= base_url().'/index.php/viaje/registroViaje'?>" method="POST">
                <div class="cont">
                    <div class="c1">
                        <p><b>Desde:</b></p>
                    </div>
                    <div class="c2p">
                    <select>
                     <option value="">Pais</option>
                        <?php foreach ($Lugar as $row) {?>
                        <option value="<?=$row->id;?>"><?=$row->name;?></option>
                          <?php } ?>
                    </select>
               
                    </div>
                    <div class="c2p">
                        <p>Estado</p>
                        <select>
                        <option>Selecciones</option>
                    </select>
                    </div>
                    <div class="c2p">
                        <p>Ciudad</p>
                        <select>
                        <option>Selecciones</option>
                    </select>
                    </div>
                    <div class="c1">
                        <p><b>Hasta:</b></p>
                    </div>
                    <div class="c2p">
                    <select>
                     <option value="">Pais</option>
                        <?php foreach ($Lugar as $row) {?>
                        <option value="<?=$row->id;?>"><?=$row->name;?></option>
                          <?php } ?>
                    </select>
                    </div>
                    <div class="c2p">
                        <p>Estado</p>
                        <select>
                        <option>Selecciones</option>
                    </select>
                    </div>
                    <div class="c2p">
                        <p>Ciudad</p>
                        <select>
                        <option>Selecciones</option>
                    </select>
                    </div>

                    <div class="c2p">
                        <p>Fecha ida:</p>
                        <input class="inputlogin" type="date" />
                    </div>
                    <div class="c2p">
                        <p id="element2">Fecha vuelta:</p>
                        <input id="element1" type="date" value="none" />
                    </div>


                </div>
            </div>

            <button class="btnAViaje" type="submit">Publicar Viaje</button>
        </form>   
        </div>


    </div>


    </div>


</body>
<?php
    include ('footer.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<SCRIPT LANGUAGE="JavaScript">
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
</SCRIPT>

</html>