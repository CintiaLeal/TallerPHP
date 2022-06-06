CREATE TRIGGER `notificacion_oferta_aceptada` AFTER UPDATE ON `ofertas`
 FOR EACH ROW BEGIN
IF NEW.aceptada = 1 THEN BEGIN
    DECLARE cont VARCHAR(256);
    DECLARE viajero VARCHAR(20);
    SET cont = CONCAT('Su oferta sobre el pedido ',NEW.pedido,' ha sido aceptada');
    SET viajero = (SELECT u.id FROM 		viaje v JOIN usuarios u WHERE 			v.nick=u.nick AND v.viaje_id = 			NEW.viaje);
    INSERT INTO notificaciones 				(id_usuario,contenido) 					VALUES(viajero,cont);
    UPDATE pedidos p SET p.estado = 'pendiente' WHERE p.numero = NEW.pedido;
    END;
END IF;
END

CREATE TRIGGER `notificacion_cupon` AFTER INSERT ON `cupones`
 FOR EACH ROW BEGIN
INSERT INTO notificaciones (id_usuario,contenido) VALUES (NEW.u_recibe,'Has recibido un cupon!');
END

CREATE TRIGGER `notificacion_nueva_oferta` AFTER INSERT ON `ofertas`
 FOR EACH ROW BEGIN
DECLARE _id BIGINT;
DECLARE cont VARCHAR(256);
SET _id := (SELECT p.usuario FROM ofertas o JOIN pedidos p ON p.numero = o.pedido WHERE o.pedido=NEW.pedido);
SET cont = CONCAT('Su pedido ',NEW.pedido,' tiene una nueva oferta');
INSERT INTO notificaciones (id_usuario,contenido) VALUES(_id,cont);
END

CREATE TRIGGER `notificacion_valoraciones` AFTER INSERT ON `valoraciones`
 FOR EACH ROW BEGIN
DECLARE usu VARCHAR(20);
DECLARE cont VARCHAR(256);
SET usu = (SELECT nick FROM usuarios WHERE id = NEW.valora);
SET cont = CONCAT('Has sido valorado por',' ',usu);
INSERT INTO notificaciones (id_usuario,contenido) VALUES(NEW.recibe, cont);
END

CREATE TRIGGER `valor_cupon_viaje` AFTER UPDATE ON `usuarios`
 FOR EACH ROW BEGIN
IF NEW.accion = 2 THEN
BEGIN
DECLARE _id BIGINT;
SET _id = (SELECT u_from FROM cupones where u_recibe = NEW.id);
UPDATE cupones SET descuento = 2100 WHERE u_recibe = _id;
END;
END IF;
END

CREATE TRIGGER `valor_cupon_pedido` AFTER UPDATE ON `usuarios`
 FOR EACH ROW BEGIN
IF NEW.accion = 1 THEN
BEGIN
DECLARE _id BIGINT;
SET _id = (SELECT u_from FROM cupones where u_recibe = NEW.id);
UPDATE cupones SET descuento = 420 WHERE u_recibe = _id;
END;
END IF;
END

CREATE TRIGGER `mensaje_oferta` AFTER INSERT ON `ofertas` FOR EACH ROW BEGIN DECLARE idUsuario BIGINT; DECLARE idComprador BIGINT; SET idUsuario = (Select id FROM usuarios u JOIN viaje v ON v.nick = u.nick WHERE v.viaje_id = NEW.viaje); SET idComprador = (Select id FROM usuarios u JOIN pedidos p ON p.usuario = u.id WHERE p.numero = NEW.pedido); INSERT INTO mensaje(envio,recibio,contenido) VALUES(idUsuario,idComprador,"Hola, te hice una oferta sobre tu pedido, ¿qué te parece?"); END