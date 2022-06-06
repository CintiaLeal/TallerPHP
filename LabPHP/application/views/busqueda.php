<?php
session_start();
if(isset($_SESSION["usuario"])){
    include ('headerLogueado.php');
}
else{
    include ('header.php');
}
?>

<div class="conteiner">    
    <input  id="busqueda" name="busqueda" type="search" style="max_width 40%">
    <button id = "busca" type="button" onclick = "buscar()"> 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-search" viewBox="0 0 16 16" style="margin: 3%;">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
    </button>
</div>

    <form action="<?=base_url().'/index.php/pedido/verPedido'?>" id="form" method="POST">
        <div class="conteiner">    
            <p> Pedidos: </p>
            <div class="conteiner">  
                <div id = "divpedidos" class="scroll_text_pedidos">
                </div>
            </div>  
        </div>
        <input id="idPedido" name="idPedido" class="d-none">
    </form>
    <form action="<?=base_url().'/index.php/viaje/verViaje'?>" id="form" method="POST">
        <div class="conteiner">
            <p> Viajes: </p>
            <div id = "divviajes" class="scroll_text_pedidos">
            </div>
        </div>
        <input id="idViaje" name="idViaje" class="d-none">
    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
    function buscar(){
    var contenido = document.getElementById("busqueda").value;
    $('divpedidos').empty();
    $.ajax({
        type: 'POST',
        url: '<?=base_url() . '/index.php/Busqueda/busqueda'?>',
        data: {contenido: contenido}, 
        dataType: "json",
        success: function(resp) {
            console.log("haoos");
          let p = resp.pedidos;
          let v = resp.viajes;
            var divpedidos = document.getElementById('divpedidos');
            var divviajes = document.getElementById('divviajes');
            divpedidos.innerHTML = "";
            divviajes.innerHTML = "";
            $.each(p, function(index, element){
                var pedidos = document.createElement('div');
                var img = document.createElement('img');
                img.setAttribute('src', element.imagen);
                img.setAttribute('style', "max-width: 50px;")
                pedidos.setAttribute("id", "pedidos");
                var parafo = document.createElement('button');
                parafo.setAttribute("onclick","verIdV(pedidos.numero)")
                parafo.setAttribute("class" , "texto");
                var p1 = document.createElement('p');
                var p2 = document.createElement('p');
                var p3 = document.createElement('p');
                p1.textContent = "Titulo: "+element.titulo;
                p2.textContent = "Descripcion: "+ element.descripcion;
                p3.textContent = "Precio: $" + element.precio ;
                pedidos.appendChild(img);
                parafo.appendChild(p1);
                parafo.appendChild(p2);
                parafo.appendChild(p3);
                pedidos.appendChild(parafo);
                divpedidos.appendChild(pedidos);
            });
            $.each(v, function(index, viaje){
                var viajes = document.createElement('button');
                viajes.setAttribute("id", "pedidos");
                viajes.setAttribute("class" , "texto");
                viajes.setAttribute("onclick","verIdV(viaje.viaje_id)")
                var p1 = document.createElement('p');
                var p2 = document.createElement('p');
                var p3 = document.createElement('p');
                var p4 = document.createElement('p');
                p1.textContent = "Viaje: " + viaje.viaje_id;
                p2.textContent = "Fecha ida: "+viaje.fechaI;
                p3.textContent ="Origen: "+ viaje.origen;
                p4.textContent ="Destino: " + viaje.destino;
                viajes.appendChild(p1);
                viajes.appendChild(p2);
                viajes.appendChild(p3);
                viajes.appendChild(p4);
                divviajes.appendChild(viajes);
            });
        }
    });
}

function verIdV(id){
        document.getElementById("idViaje").value = id;
        document.getElementById("form").submit();
    }

    function verIdP(id){
        document.getElementById("idPedido").value = id;
        document.getElementById("form").submit();
    }
</script>


<?php
    include ('footer.php');
?>