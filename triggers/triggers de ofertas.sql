CREATE TRIGGER `notificacion_nueva_oferta` AFTER INSERT ON `ofertas`
 FOR EACH ROW BEGIN
DECLARE _id BIGINT;
DECLARE cont VARCHAR(256);
SET _id := (SELECT p.usuario FROM ofertas o JOIN pedidos p ON p.numero = o.pedido WHERE o.pedido=NEW.pedido);
SET cont = CONCAT('Su pedido ',NEW.pedido,' tiene una nueva oferta');
INSERT INTO notificaciones (id_usuario,contenido) VALUES(_id,cont);
END

CREATE TRIGGER `notificacion_oferta_aceptada` AFTER UPDATE ON `ofertas`
 FOR EACH ROW BEGIN
IF NEW.aceptada = 1 THEN BEGIN
    DECLARE cont VARCHAR(256);
    DECLARE viajero VARCHAR(20);
    SET cont = CONCAT('Su oferta sobre el pedido ',NEW.pedido,' ha sido aceptada');
    SET viajero = (SELECT u.nick FROM 		viaje v JOIN usuarios u WHERE 			v.nick=u.nick AND v.viaje_id = 			NEW.viaje);
    INSERT INTO notificaciones 				(id_usuario,contenido) 					VALUES(viajero,cont);
    END;
END IF;
END
