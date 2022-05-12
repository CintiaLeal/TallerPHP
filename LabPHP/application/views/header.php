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

</style>
</head>
<body>
<nav>
        <div class="conteiner">
            <div class="c1">
                <img src="imgs/te_lo_llevo-removebg-preview.png" alt="Logo" height="80px" width="auto">
            </div>
            <div class="c2">
                <u style="color:lightcoral"><a class="af">Comprar</a></u>
            </div>
            <div class="c2">
                <label style="color: #389393">|</label>
            </div>
            <div class="c2">
                <u style="color:lightcoral"><a class="af">Viajar</a></u>
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
                    <button type="submit" style="background-color: #389393; color: white; border-radius: 5px; margin: 2%; size: 10px;"><a href = "<?= base_url().'/index.php/welcome/login'?>" >Iniciar sesión</a></button>
                    <button type="submit" style="background-color:lightsalmon; color: white; border-radius: 5px; padding-right: 12px; padding-left: 12px; margin: 2%;">Registrarse</button>  
			</div>
        </div>
    </nav>
