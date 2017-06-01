CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `perfil` int(11) NOT NULL,
  `Estatus` varchar(10) NOT NULL DEFAULT 'Activo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` (`id`,`email`,`contrasena`,`nombre`,`apellido`,`perfil`,`Estatus`) 
VALUES (1,'adminraw@raw.com','$2y$10$yY7BjP4CNs60Mf5E90DrKuVR88PIKR3ivEqs.IhMYPW6IGKS0Kfy.','Admin','RAW',1,'Activo');

