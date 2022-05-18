<?php
if(isset($_SESSION["usuario"])){
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
        
        select{
            font-family: 'Sen', sans-serif;
            color: #606060;
            font-size: 20px;
            width: 90%;
            justify-content: center;
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

//-----------------------------------------HASTA
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
        <!--Row with two equal columns-->
        <div class="row">

            <div class="col">
          
                    <h2>Publicar Viaje</h2>
                    <button class="btnbtn" id="btn" onclick="toggle();"> Ida y vuelta </button>
                
                <form action="<?= base_url().'index.php/viaje/registro'?>" method="POST">
                    <div class="cont">
                        <div class="c2p">
                            <p><b>Desde:</b></p>
                        </div>
                        <div class="c2p">
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
                            <p><b>Hasta:</b></p>
                        </div>
                        <div class="c2p">
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
                        <select id="c"  name="c" >
                            <option>Ciudad</option>
                        </select>
                        </div>
                        <div class="c2p">
                            <p>Fecha ida:</p>
                            <input id="fechaI" name="fechaI" class="inputlogin" type="date" />
                        </div>
                        <div class="c2p">
                            <p id="element2">Fecha vuelta:</p>
                            <input id="element1" name="element1"  type="date" value="none" />
                        </div>

                       
                </div>
            </div>

            <button class="btnAViaje" type="submit">Publicar Viaje</button>
        </form>   
     
    </div>
 

    </div>

 
</body>
<?php
    include ('footer.php');
?>
</html>