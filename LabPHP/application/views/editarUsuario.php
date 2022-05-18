<?php
if(isset($_SESSION)){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>
<form action="<?= base_url().'/index.php/usuario/editar'?>" id="form" method="POST">
    <div style="display: flex; justify-content:center; margin-bottom: 3%;">
            <h4><u style="font-family: 'Unica One', cursive; color: darksalmon;">Ingrese los datos que desea editar</u></h4>
    </div>

    <div class="conteiner">

        <div class="cU">
            <input type="text" placeholder="Nombre" name="nombre"/>
        </div>

        <div class="cU">
            <input type="text" placeholder="Apellido" name="apellido"/>
        </div>

        <div class="cU">
            <input type="text" placeholder="Biografia"name="biografia"/>
        </div>

        <div class="cU">
            <input type="number" placeholder="Telefono"name="telefono"/>
        </div>
    </div>

    <div style="display: flex; justify-content:center; margin-top:3%;">
            <button  type="button" class="file-select btn" id="btn" style="border-color:#389393; border-radius:5px; background-color:#389393; opacity:70%; color: white; margin:5px;">
                Editar imagen
            </button>
            <input name="imagen" id="imagen" class="d-none"/>
            <button  type="submit" id="confirmar" style="border-color:lightcoral; border-radius:5px; background-color:lightcoral; opacity:70%; color: white; margin: 5px; margin-left:10%">
                Confirmar
            </button>
    </div>
</form>
<?php
    include ('footer.php');
?>
<script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
<script>
    //imagen en cloudinary
    const btn = document.querySelector("#btn");
    let imagen = document.getElementById("imagen");
    let urlImagen = '';
    const widget_cloudinary = cloudinary.createUploadWidget({
    cloudName: "dmc55ugqh",
    uploadPreset: "fkvyrxo1"
    }, (error, result) => {
    if (!error && result && result.event === 'success') {
        console.log(result.info.secure_url)
        urlImagen = result.info.secure_url;
        imagen.value = urlImagen;
    }
    })
    btn.addEventListener("click", e => {
    e.preventDefault();
    widget_cloudinary.open();
    }, false)
    let conf = document.getElementById("confirmar");
    let form = document.getElementById("form");
    conf.addEventListener("click", e=> {
        e.preventDefault();
        form.submit();
    })
</script>