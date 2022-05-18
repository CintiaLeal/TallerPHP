<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Document</title>
<style>
    .nombre{
        text-align: center;
        font-size: 35px;
    }
    .flex{
        display:flex;
        justify-content: center;
    }
    label{ color: red;
        text-align: center;
        font-size: 60px;
    }
    input[type = "radio"]{
         display:none;
         }
         img{
             max-width: 200px;
         }
         button.Cal{
             border-radius: 12px;
             background-color:  #f5a25d ;
             font-size: 20px;
         }
         label:hover ~ label{color:#606060;}
</style>
</head>
<body>
    <p class="nombre">Ninkname</p>
</div>
<div class="flex">
<img src="./persona.jpg" class="img" alt= " http://www.w3.org/2000/svg" width="40" height="40" fill="#389393" class="bi bi-person-circle" viewBox="0 0 16 16" style="opacity: 50%;">
<div>
<form>
    <p class="clasificacion">
      --><input id="radio1" type="radio" name="estrellas" value="5"><!--
      --><label for="radio1">❤</label><!--
      --><input id="radio2" type="radio" name="estrellas" value="4"><!--
      --><label for="radio2">❤</label><!--
      --><input id="radio3" type="radio" name="estrellas" value="3"><!--
      --><label for="radio3">❤</label><!--
      --><input id="radio4" type="radio" name="estrellas" value="2"><!--
      --><label for="radio4">❤</label><!--
      --><input id="radio5" type="radio" name="estrellas" value="1"><!--
      --><label for="radio5">❤</label>
    </p>
  </form>
  <div>
      <button class="Cal"> Calificar</button>
    </div>
</div>
</div>
</body>
</html>