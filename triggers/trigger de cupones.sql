CREATE TRIGGER `notificacion_cupon` AFTER INSERT ON `cupones`
 FOR EACH ROW BEGIN
INSERT INTO notificaciones (id_usuario,contenido) VALUES (NEW.u_recibe,'Has recibido un cupon!');
INSERT INTO notificaciones (id_usuario,contenido) VALUES (NEW.u_comparte,'Has recibido un cupon!');
END