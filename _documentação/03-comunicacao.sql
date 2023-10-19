/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `comunicacao` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `comunicacao`;

CREATE TABLE IF NOT EXISTS `comunicados` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int unsigned NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diretorio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sequencia` int NOT NULL,
  `ativo` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK__usuarios` (`usuario_id`),
  CONSTRAINT `FK__usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comunicados` (`id`, `usuario_id`, `titulo`, `descricao`, `link`, `diretorio`, `data_cadastro`, `sequencia`, `ativo`) VALUES
	(1, 1, 'Segundo comunicado', '', '', 'uploads/1.jpeg', '2023-09-11 20:04:59', 0, 0),
	(2, 1, 'Segundo comunicado', 'Descrição segundo comunicado', 'https://www.devmedia.com.br/forum/como-pegar-extensao-de-um-arquivo-enviado-via-php/582870', 'uploads/2.png', '2023-09-11 20:12:26', 0, 0),
	(3, 1, 'Cruzeiro maior de Minas', 'Cruzeirão', 'https://cruzeiro.com.br/', 'uploads/3.jpg', '2023-09-12 20:44:40', 0, 0),
	(4, 1, 'Cruzeiro maior de Minas Gerais', 'E melhor do Brasil', 'https://horadecodar.com.br', 'uploads/4.jpg', '2023-09-12 20:48:28', 0, 0),
	(5, 1, 'Primeiro comunicado teste', 'gfghghghgh', 'https://www.w3schools.com/', 'uploads/5.jpg', '2023-10-19 16:08:06', 0, 0),
	(6, 1, 'Primeiro comunicado', 'jdfhjdhjfdjhf', 'https://cruzeiro.com.br/', 'uploads/6.jpg', '2023-10-19 16:11:53', 0, 0),
	(7, 1, 'Primeiro comunicado', '', '', 'uploads/7.jpg', '2023-10-19 16:16:58', 0, 0),
	(8, 1, 'Primeiro comunicado', '', '', 'uploads/8.png', '2023-10-19 16:18:09', 1, 1),
	(9, 1, 'Segundo comunicado', '', '', 'uploads/9.jpeg', '2023-10-19 16:19:24', 2, 1),
	(10, 1, 'Terceiro comunicado', 'O cruzeiro vai ganhar de 1 a 0', 'https://cruzeiro.com.br/', 'uploads/10.jpg', '2023-10-19 16:23:17', 3, 1);

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `data_cadastro`, `ativo`) VALUES
	(1, 'admin', '$2y$10$Le.eHk5q3lkt4zWArGVVBu82ckU.q00bTO0vzkqlcDUTQuPlkYc.i', '2023-08-22 20:45:46', 1),
	(2, 'comunicacao', '$2y$10$c2hPyD5bTJMZ/8wuDbQvVONN4864M2fIzgUkokMaVuEFwZkwU7Hr2', '2023-09-04 19:35:34', 1),
	(3, 'matheus', '$2y$10$7F4Mr1BcF7W9ObsRTKtzf.eFrMed/hVOlfgUej8pQ/tCTYe0jE/zW', '2023-09-04 19:41:28', 1),
	(4, 'marcelo', '$2y$10$cPjkEey9N5d8K5uSITrNmO7CcZWx3u/VPx0gOHv6/X86Y9SDiw1aK', '2023-10-04 19:40:46', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
