<?php
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}

?>
<!-- codigo puro html -->
<div class="conteiner">
    <div style="width: 30%; text-align: centre;">
        <div style="margin: 10%;">
            <h1 style="font-family: 'Unica One', cursive; color: gray;text-align: center;">Compra en el exterior de manera simple, fácil y segura</h1>   
        </div>
        <div style="margin: 10%;">
            <p style="font-family: 'Sen', sans-serif; color: gray; text-align: center;">Consigue esos productos que siempre quisiste, al precio más bajo y entregados por viajeros a tu ciudad.</p>
        </div>
        <!-- <a href = "https://api.twitter.com/oauth/authenticate?oauth_token=NPcudxy0yU5T3tBzho7iCotZ3cnetKwcTIRlX0iwRl0" > login </a>     -->
    </div>
</div>



<?php
    include ('footer.php');
?>