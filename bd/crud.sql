# Host: LocalHost:3399  (Version 5.5.5-10.4.22-MariaDB)
# Date: 2023-09-29 08:23:36
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "usuarios"
#

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `usu_id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `usu_nome` varchar(255) NOT NULL DEFAULT '',
  `usu_email` varchar(255) NOT NULL DEFAULT '',
  `usu_senha` varchar(255) NOT NULL DEFAULT '',
  `usu_foto_perfil` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "usuarios"
#

