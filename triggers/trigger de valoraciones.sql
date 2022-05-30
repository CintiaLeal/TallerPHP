CREATE TRIGGER `notificacion_valoraciones` AFTER INSERT ON `valoraciones`
 FOR EACH ROW BEGIN
DECLARE usu VARCHAR(20);
DECLARE cont VARCHAR(256);
SET usu = (SELECT nick FROM usuarios WHERE id = NEW.valora);
SET cont = CONCAT('Has sido valorado por',' ',usu);
INSERT INTO notificaciones (id_usuario,contenido) VALUES(NEW.recibe, cont);
END