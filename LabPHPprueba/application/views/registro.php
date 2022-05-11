
<?php  form_open('/altaUsuario/alta'); ?> 

<html>


<!--<form method="post" accept-charset="utf-8" action="http://localhost/LabPHP/application/controllers/altaUsuario"  id="myform"> -->
    <h1>Crear Usuario</h1>
    <div class="social-container">
        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <!-- <span>or use your email for registration</span> -->
    <input type="text" id="nickname" placeholder="User Name" />
    <div class="conteiner" onkeypress="enterEnviar(event);">
        <div class="c1">
            <input type="text" id="nombre" placeholder="Nombre" />
        </div>
        <div class="c2">

            <input type="text" id="apellido" placeholder="Apellido" />
        </div>
        <div class="c1">
            <input type="text" id="telefono" placeholder="Telefono" />
        </div>
        <div class="c2">
            <input type="file" id="imagen" placeholder="Imagen" />
        </div>
    </div>
    <input type="text" id="email" placeholder="Email" />
    <input type="text" id="biografia" placeholder="Biografia" />
    <input id="pass1" id="password" type="password" placeholder="Contrasenia" />
    <!-- <input id="pass2" type="password" placeholder="Repite tu Contrasenia" />-->
    <!--<input type="submit" onclick="validarContrasena()" class="button" value="Registrar">-->
    <button type="submit" id="btnregistrar">Registrar</button>
</form>


</html>
<?php form_close(); ?>