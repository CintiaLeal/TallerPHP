<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Te lo llevo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://css.gg/phone.css' rel='stylesheet'>
    <link href='https://css.gg/mail.css' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Sen&family=Unica+One&display=swap');
/*ESTILOS DEL HEADER*/
.af{
    font-family: 'Sen', sans-serif;
    color: #fa7f72;
}
.conteiner {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.c1 {
    width: 15%;
    margin: 2%;
    display: flex;
}

.c2 {
    width: 10%;
    padding: 1%;
    margin-top: 1.5%;

}

.c3{
    width: 15%;
    margin: 1.5%;
}
.c4{
    width: 15%;
    margin: 2%;
    display: flex;
    justify-content: flex-end;
}

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
/*ESTILOS DE PERFILES*/
.comprador{
    font-family: 'Unica One', cursive;
    font-size: x-large;
    color: #aaaaaa;
}

.viajero{
    font-family: 'Unica One', cursive;
    font-size: x-large;
    color: #aaaaaa;
}

.c_perfiles{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.bio_title{
    font-family: 'Unica One', cursive;
    font-size: medium;
    color: #aaaaaa;
}

.valoraciones_title{
    font-family: 'Unica One', cursive;
    font-size: medium;
    color: #aaaaaa;
}

.c_bio_val{
    margin: 2%;
    display: flex;
}

.scroll_text_bio{
    background-color: #389393;
    opacity: 50%;
    border-radius: 5px;
    color: white;
    width: 300px;
    height: 150px;
}

.scroll_text_val{
    background-color: #fa7f72;
    opacity: 50%;
    border-radius: 5px;
    color: white;
    width: 300px;
    height: 150px;
}

.c_textarea{
    width: 100%;
    display: flex;
}

/*ESTILOS PARA EDITAR USUARIO*/
.cU{
    width: 15%;
    margin: 20px;
    display: flex;
    justify-content: center;
}
/*ESTILOS PARA VER PEDIDOS*/
.scroll_text_pedidos{
    border-color: #389393;
    border-radius: 5px;
    color: white;
    width: 700px;
    height: auto;
}

/*ESTILOS PARA VER VIAJE PARTICULAR */

.atributosV{
    margin: 5px;
    font-family: 'Sen', sans-serif;
}

.contenedorAtributos{
    justify-content:start;
}

.contenedorParticular{
    margin: 10px; 
    justify-content:center;
}

.contenedorImagen{
    border-radius: 10px;
    border-color: #389393;
    border-width: 1px;
}

.listaPedidos{
    background-color: #fa7f72;
    color: white;
    opacity: 50%;
    border-radius: 10px;
}
</style>
</head>
<body>
<nav>
        <div class="conteiner">
            <div class="c1">
                <img src="https://res.cloudinary.com/djiek0hdx/image/upload/v1652475313/te_lo_llevo-removebg-preview_e6vtz2.png" alt="Logo" height="80px" width="auto">
            </div>
			<div class="c1">
                <input type="search" id="form1" class="form-control buscar" placeholder="Buscar">
                <button type="button" style="background-color:dimgray; border-radius:5px;" class="buscar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-search" viewBox="0 0 16 16" style="margin: 3%;">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
			</div>
			<div class="c3">
                    <button type="submit" style="background-color: #389393; color: white; border-radius: 5px; margin: 2%; size: 10px;"><a href = "<?= base_url().'/index.php/welcome/login'?>" style="color: white;">Iniciar sesión</a></button>
                    <button type="submit" style="background-color:lightsalmon; color: white; border-radius: 5px; padding-right: 12px; padding-left: 12px; margin: 2%;"><a href = "<?= base_url().'/index.php/welcome/login'?>" style="color: white">Registrarse<a></button>  
			</div>
        </div>
    </nav>
