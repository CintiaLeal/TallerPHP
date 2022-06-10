# Desarrollo de Aplicaciones Web con PHP 2022
## Integrantes: 
- Romina Lopez <br>
- Franco Cuesta <br>
- Cintia Leal <br>

![Sin título](https://user-images.githubusercontent.com/66495366/168454794-5157f055-b3a8-4515-b343-01b6b2716358.png)
## Visión y Requerimientos Funcionales: <br>
Hoy en día Internet se utiliza cada vez más en diferentes tipos de actividades, por
distintos tipos de usuarios con diversos intereses. Incluso el paradigma de ganar dinero
ha cambiado a partir de Internet, y hoy en día se presentan diversas plataformas que
utilizando el capital humano permiten brindar soluciones para el comercio exterior. Un
ejemplo de estos sitios es Grabr (www.grabr.io).

El sistema a construir será un Sitio de Envío de Pedidos denominado TeLoLlevo®, que
permite a los usuarios solicitar artículos al exterior, y a viajeros facilitarle el envío de
dichos artículos aprovechando de viajar por el mundo.

Los visitantes del sitio podrán visualizar las diferentes solicitudes de artículos y realizar
búsquedas personalizadas aún sin tener una cuenta creada. Sin embargo para poder
solicitar un artículo será necesario estar registrado y contar con un perfil.

Existen 2 roles para los usuarios registrados: ser comprador y ser viajero. Una vez
registrado un usuario puede ejercer de los dos roles indistintamente.

Como comprador se puede solicitar artículos, gestionar los mismos, aceptar ofertas de
entrega de viajeros, así como realizar el seguimiento a través de la mensajería.
Como viajero se puede publicar un viaje a realizar, enviar ofertas sobre artículos
publicados, gestionar las entregas de los pedidos, así como mantener la comunicación
con el comprador a través de la mensajería.

De cada usuario interesa saber su nickname (único), su email (único), teléfono, nombre
completo, imagen, y una pequeña biografía.

Como se mencionó anteriormente, un usuario podrá solictar artículos al exterior
generando pedidos. De cada pedido se conoce su número (único en el sistema), su título,
una descripción del artículo, precio del mismo, imagen (al menos una), un link de
dónde se adquiere (opcional, para artículos artículos disponibles en Internet), fecha de
entrega del artículo (la elige el comprador de acuerdo a sus intereses), origen, y destino.
Por otro lado un usuario también puede registrar un viaje que vaya a realizar. Para
registrarlo es necesario brindar origen del viaje, destino, y fecha de arribo.

Una vez pubicado un pedido, los viajeros podrán realizar ofertas sobre cada pedido.
Para eso deben contar con algún viaje con el mismo origen y destino, así como fecha de
entrega. Ellos podrán realizar la oferta de llevar el paquete detallando la comisión que
cobrarán por dicho envío.

Por parte del comprador, una vez reciba una oferta de entrega recibirá una notificación
(siempre dentro de su portada en el sistema). Una vez notificado, tendrá la posiblidad
de aceptar la oferta, así como de postergarla para una elección futura.

Los pedidos ni bien son creados permanecen activos hasta que su fecha de entrega expire
(con lo cual pasan a estar inactivos), o hasta que el comprador acepte alguna oferta
recibida (con lo cual pasan a estar en tránsito). Finalmente cuando los paquetes hayan
sido entregados y ambas partes declaren lo mismo, el pedido pasará al estado entregado.
Cada usuario tiene su reputación obtenida en base a calificaciones de los usuarios con
los que ha estado vinculado. Una vez entregado un pedido, ambos usuarios se calificarán
de acuerdo a la experiencia vivida. Para realizar una calificación se debe otorgar un
número entre 1 y 5, y opcionalmente un comentario. La reputación de un usuario es el
promedio de todas las calificaciones obtenidas anteriormente; al comenzar todos los
usuario cuentan con 5 estrellas.

Una vez realizada una oferta de envío, ambos usuarios podrán mantenerse en contacto
a través de la mensajería de la plataforma. De esta forma el comprador podrá tener más
información a la hora de decidir aceptar dicha oferta o no.
Por último, los usuarios pueden obtener cupones de descuento a través de compartir la
plataforma con sus conocidos. Una vez que sus conocidos concretaron una entrega de
pedido (ya sea como comprador o como viajero) el usuario obtendrá un cupón
correspondiente. Si quien ingresó realizó un viaje el usuario recibirá 50 USD de
descuento, en cambio si el nuevo integrante concretó una compra, ambos recibirán 10
USD. El cupón obtenido sirve para aplicar a futuras compras, el usuario elige cuándo
hacerlo, aunque un cupón obtenido tienen vigencia de un año a partir de su emisión.
## Plataforma desarrollada
![image](https://user-images.githubusercontent.com/66495366/173108519-4da36877-1cb9-4a92-81c9-114ca2b9cc69.png)
![image](https://user-images.githubusercontent.com/66495366/173108630-4f45c9be-22d4-47a9-8822-f6d4db82b7e3.png)
![image](https://user-images.githubusercontent.com/66495366/173108683-09c6bc0c-72cb-479d-8733-a41a0ade7f2d.png)
![image](https://user-images.githubusercontent.com/66495366/173108890-da8f5268-9509-4a8f-bcff-55a77b09e826.png)
![image](https://user-images.githubusercontent.com/66495366/173108755-3d2064d4-152a-427c-a41c-b6ca673e15b0.png)



