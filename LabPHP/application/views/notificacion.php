<html>
<header>
    <?php
    include ('headerLogueado.php');   
   ?>
</header>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<style>
.row {
    margin-top: 1rem;

    background: #ffffff;
    z-index: 0;
}

.col {
    background-color: #fff;
    border-radius: 10px;
    position: relative;
    overflow: hidden;
    max-width: 100%;
    padding: 10px 20px;
    width: 100%;
    border: none;
    z-index: 0;
}


html,
body {
    margin: 0;
}
.div_contenedorr {
    height: 100vh;
}

.div_centradoo {
    width: 80%;
    height: 100vh;
    position: absolute;
    top: 15%;
    left: 30%;

}
</style>


<body>
    <?php if($Notificaciones != null){?>
    <?php foreach ($Notificaciones as $row) {?>
    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header" style="background: #f5a25d ;"></h5>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text"><?=$row->contenido;?></p>
                    <p class="card-text"><?=$row->time;?></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php 
} ?>
    <?php 
} ?>
    <?php 
if($Notificaciones == null){?>
    <div class="div_contenedorr">
        <div class="div_centradoo">
            <h1>Usted no tiene ninguna notificación</h1>
        </div>
    </div>
    <?php } ?>
</body>

</html>
<script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<SCRIPT LANGUAGE="JavaScript">





</SCRIPT>

<footer>
    <?php
    include ('footer.php');
?>
</footer>

</html>