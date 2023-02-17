-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ti93phpdb01
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbclientes`
--

DROP TABLE IF EXISTS `tbclientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbclientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `id_usuario_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `id_usuario_fk` (`id_usuario_fk`),
  CONSTRAINT `id_usuario_fk` FOREIGN KEY (`id_usuario_fk`) REFERENCES `tbusuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientes`
--

LOCK TABLES `tbclientes` WRITE;
/*!40000 ALTER TABLE `tbclientes` DISABLE KEYS */;
INSERT INTO `tbclientes` VALUES (2,'sajslk@jhagsj.com','8c10a02a0928511c460bd65e9ec59d0a','12345678909',NULL),(3,'maumau','123@gmail.com','12345678909',NULL),(4,'bbb','bbb','42348732',3),(7,'sdasdasdsa','senacdsada@sakjs.com','378624873264878',21),(8,'dsfoksdpo','dpslfp@sdgya.com','d237983279',23);
/*!40000 ALTER TABLE `tbclientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblig_mesa`
--

DROP TABLE IF EXISTS `tblig_mesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblig_mesa` (
  `id_lig_mesa` int(11) NOT NULL AUTO_INCREMENT,
  `id_mesa_fk` int(11) NOT NULL,
  `id_reserva_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_lig_mesa`),
  KEY `id_mesa_fk` (`id_mesa_fk`),
  KEY `id_reserva_fk` (`id_reserva_fk`),
  CONSTRAINT `id_mesa_fk` FOREIGN KEY (`id_mesa_fk`) REFERENCES `tbmesas` (`id_mesa`),
  CONSTRAINT `id_reserva_fk` FOREIGN KEY (`id_reserva_fk`) REFERENCES `tbreservas` (`id_reserva`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblig_mesa`
--

LOCK TABLES `tblig_mesa` WRITE;
/*!40000 ALTER TABLE `tblig_mesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblig_mesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbmesas`
--

DROP TABLE IF EXISTS `tbmesas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbmesas` (
  `id_mesa` int(11) NOT NULL AUTO_INCREMENT,
  `qtde_pessoas` varchar(45) NOT NULL,
  `status_mesa` enum('Disponível','Indisponível') NOT NULL,
  `deleted_mesas` datetime DEFAULT NULL,
  PRIMARY KEY (`id_mesa`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbmesas`
--

LOCK TABLES `tbmesas` WRITE;
/*!40000 ALTER TABLE `tbmesas` DISABLE KEYS */;
INSERT INTO `tbmesas` VALUES (8,'11','Disponível',NULL);
/*!40000 ALTER TABLE `tbmesas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbpedidoreservas`
--

DROP TABLE IF EXISTS `tbpedidoreservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbpedidoreservas` (
  `id_pedido_reservas` int(11) NOT NULL AUTO_INCREMENT,
  `num_pessoas` int(11) NOT NULL,
  `data_reserva` datetime NOT NULL,
  `status_pedido` enum('Enviado','Análise') NOT NULL,
  `id_cliente_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_pedido_reservas`),
  KEY `id_cliente_fk` (`id_cliente_fk`),
  CONSTRAINT `id_cliente_fk` FOREIGN KEY (`id_cliente_fk`) REFERENCES `tbclientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpedidoreservas`
--

LOCK TABLES `tbpedidoreservas` WRITE;
/*!40000 ALTER TABLE `tbpedidoreservas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbpedidoreservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbprodutos`
--

DROP TABLE IF EXISTS `tbprodutos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbprodutos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_produto` int(11) NOT NULL,
  `descri_produto` varchar(100) NOT NULL,
  `resumo_produto` varchar(1000) DEFAULT NULL,
  `valor_produto` decimal(9,2) DEFAULT NULL,
  `imagem_produto` varchar(50) DEFAULT NULL,
  `destaque_produto` enum('Sim','Não') NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `id_tipo_produto_fk` (`id_tipo_produto`),
  CONSTRAINT `id_tipo_produto_fk` FOREIGN KEY (`id_tipo_produto`) REFERENCES `tbtipos` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbprodutos`
--

LOCK TABLES `tbprodutos` WRITE;
/*!40000 ALTER TABLE `tbprodutos` DISABLE KEYS */;
INSERT INTO `tbprodutos` VALUES (1,1,'Picanha ao alho',' Esta e a combinação do sabor inconfundível da picanha com o aroma acentuado do alho. Condimento que casa perfeitamente com este corte nobre',29.90,'picanha_alho.jpg','Sim'),(2,1,'Fraldinha','Uma das carnes mais suculentas do cardápio. Requintada, com maciez particular e pouca gordura, e uma carne que chama atenção pela sua textura',29.90,'fraldinha.jpg','Não'),(3,1,'Costela','A mais procurada! Feita na churrasqueira ou ao fogo de chão, e preparada por mais de 08 horas para atingir o ponto ideal e torna-la a referência de nossa churrascaria',29.90,'costelona.jpg','Sim'),(4,1,'Cupim','Uma referência especial dos paulistas. Bastante gordurosa e macia, o cupim e uma carne fibrosa, que se desfia quando bem preparada ',29.90,'cupim.jpg','Sim'),(5,1,'Picanha ','Considerada por muitos como a mais nobre e procurada carne de churrasco, a picanha pode ser servida ao ponto , mal passada ou bem passada. Suculenta e com sua característica capa de gordura',29.90,'picanha_sem.jpg','Não'),(6,2,'Apfelstrudel','Sobremesa tradicional austro-germânica e um delicioso folhado de maça e canela com sorvete',29.90,'strudel.jpg','Não'),(7,1,'Alcatra','Carne com muitas fibras, porém macia. Sua lateral apresenta uma boa parcela de gordura. Equilibrando de forma harmônica maciez e fibras.',29.90,'alcatra_pedra.jpg','Não'),(8,1,'Maminha','Vem da parte inferior da Alcatra. E uma carne com fibras, porém macia e saborosa.',29.90,'maminha.jpg','Não'),(9,2,'Abacaxi','Abacaxi assado com canela ao creme de leite condensado ',29.90,'abacaxi.jpg','Não'),(29,1,'Costela','A mais procurada! Feita na churrasqueira ou ao fogo de chão, e preparada por mais de 08 horas para atingir o ponto ideal e torna-la a referência de nossa churrascaria',29.90,'costelona.jpg','Sim');
/*!40000 ALTER TABLE `tbprodutos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbreservas`
--

DROP TABLE IF EXISTS `tbreservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbreservas` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `status_reserva` enum('Confirmado','Cancelado','Expirado') NOT NULL,
  `id_pedido_fk` int(11) NOT NULL,
  `deleted_reserva` datetime DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_pedido_fk` (`id_pedido_fk`),
  CONSTRAINT `id_pedido_fk` FOREIGN KEY (`id_pedido_fk`) REFERENCES `tbpedidoreservas` (`id_pedido_reservas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbreservas`
--

LOCK TABLES `tbreservas` WRITE;
/*!40000 ALTER TABLE `tbreservas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbreservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbtipos`
--

DROP TABLE IF EXISTS `tbtipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbtipos` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `sigla_tipo` varchar(3) NOT NULL,
  `rotulo_tipo` varchar(15) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtipos`
--

LOCK TABLES `tbtipos` WRITE;
/*!40000 ALTER TABLE `tbtipos` DISABLE KEYS */;
INSERT INTO `tbtipos` VALUES (1,'chu','Churrasco'),(2,'sob','Sobremesa'),(5,'beb','Bebidas'),(6,'sld','Saladas');
/*!40000 ALTER TABLE `tbtipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbusuarios`
--

DROP TABLE IF EXISTS `tbusuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbusuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `login_usuario` varchar(30) NOT NULL,
  `senha_usuario` varchar(32) NOT NULL,
  `nivel_usuario` enum('sup','com','cli') NOT NULL,
  `deleted_usuario` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `login_usuario_uniq` (`login_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuarios`
--

LOCK TABLES `tbusuarios` WRITE;
/*!40000 ALTER TABLE `tbusuarios` DISABLE KEYS */;
INSERT INTO `tbusuarios` VALUES (1,'senac','81dc9bdb52d04dc20036dbd8313ed055','sup',NULL),(2,'joao','81dc9bdb52d04dc20036dbd8313ed055','com',NULL),(3,'maria','68053af2923e00204c3ca7c6a3150cf7','cli',NULL),(4,'Maurício','250cf8b51c773f3f8dc8b4be867a9a02','sup',NULL),(12,'Prova','81dc9bdb52d04dc20036dbd8313ed055','com',NULL),(21,'skldlk@dlsk.com','2bc10c690d094878dd79df0f1a0c7777','com',NULL),(23,'senac@oo.com','e2ac4afbfb89903287aefa0208863bc5','com',NULL),(24,'dpslfp@sdgya.com','69a59e28dff3fda13afb69d0299de640','com',NULL);
/*!40000 ALTER TABLE `tbusuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vw_tbprodutos`
--

DROP TABLE IF EXISTS `vw_tbprodutos`;
/*!50001 DROP VIEW IF EXISTS `vw_tbprodutos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_tbprodutos` (
  `id_produto` tinyint NOT NULL,
  `id_tipo_produto` tinyint NOT NULL,
  `sigla_tipo` tinyint NOT NULL,
  `rotulo_tipo` tinyint NOT NULL,
  `descri_produto` tinyint NOT NULL,
  `resumo_produto` tinyint NOT NULL,
  `valor_produto` tinyint NOT NULL,
  `imagem_produto` tinyint NOT NULL,
  `destaque_produto` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_tbreserva`
--

DROP TABLE IF EXISTS `vw_tbreserva`;
/*!50001 DROP VIEW IF EXISTS `vw_tbreserva`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_tbreserva` (
  `id_reserva` tinyint NOT NULL,
  `deleted_reserva` tinyint NOT NULL,
  `status_reserva` tinyint NOT NULL,
  `id_pedido_fk` tinyint NOT NULL,
  `id_pedido_reservas` tinyint NOT NULL,
  `num_pessoas` tinyint NOT NULL,
  `data_reserva` tinyint NOT NULL,
  `status_pedido` tinyint NOT NULL,
  `id_cliente_fk` tinyint NOT NULL,
  `id_cliente` tinyint NOT NULL,
  `nome` tinyint NOT NULL,
  `email` tinyint NOT NULL,
  `cpf` tinyint NOT NULL,
  `id_usuario_fk` tinyint NOT NULL,
  `id_usuario` tinyint NOT NULL,
  `login_usuario` tinyint NOT NULL,
  `senha_usuario` tinyint NOT NULL,
  `nivel_usuario` tinyint NOT NULL,
  `deleted_usuario` tinyint NOT NULL,
  `id_mesa` tinyint NOT NULL,
  `qtde_pessoas` tinyint NOT NULL,
  `deleted_mesas` tinyint NOT NULL,
  `status_mesa` tinyint NOT NULL,
  `id_lig_mesa` tinyint NOT NULL,
  `id_mesa_fk` tinyint NOT NULL,
  `id_reserva_fk` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_tbprodutos`
--

/*!50001 DROP TABLE IF EXISTS `vw_tbprodutos`*/;
/*!50001 DROP VIEW IF EXISTS `vw_tbprodutos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_tbprodutos` AS select `p`.`id_produto` AS `id_produto`,`p`.`id_tipo_produto` AS `id_tipo_produto`,`t`.`sigla_tipo` AS `sigla_tipo`,`t`.`rotulo_tipo` AS `rotulo_tipo`,`p`.`descri_produto` AS `descri_produto`,`p`.`resumo_produto` AS `resumo_produto`,`p`.`valor_produto` AS `valor_produto`,`p`.`imagem_produto` AS `imagem_produto`,`p`.`destaque_produto` AS `destaque_produto` from (`tbprodutos` `p` join `tbtipos` `t`) where `p`.`id_tipo_produto` = `t`.`id_tipo` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_tbreserva`
--

/*!50001 DROP TABLE IF EXISTS `vw_tbreserva`*/;
/*!50001 DROP VIEW IF EXISTS `vw_tbreserva`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_tbreserva` AS select `tbreservas`.`id_reserva` AS `id_reserva`,`tbreservas`.`deleted_reserva` AS `deleted_reserva`,`tbreservas`.`status_reserva` AS `status_reserva`,`tbreservas`.`id_pedido_fk` AS `id_pedido_fk`,`tbpedidoreservas`.`id_pedido_reservas` AS `id_pedido_reservas`,`tbpedidoreservas`.`num_pessoas` AS `num_pessoas`,`tbpedidoreservas`.`data_reserva` AS `data_reserva`,`tbpedidoreservas`.`status_pedido` AS `status_pedido`,`tbpedidoreservas`.`id_cliente_fk` AS `id_cliente_fk`,`tbclientes`.`id_cliente` AS `id_cliente`,`tbclientes`.`nome` AS `nome`,`tbclientes`.`email` AS `email`,`tbclientes`.`cpf` AS `cpf`,`tbclientes`.`id_usuario_fk` AS `id_usuario_fk`,`tbusuarios`.`id_usuario` AS `id_usuario`,`tbusuarios`.`login_usuario` AS `login_usuario`,`tbusuarios`.`senha_usuario` AS `senha_usuario`,`tbusuarios`.`nivel_usuario` AS `nivel_usuario`,`tbusuarios`.`deleted_usuario` AS `deleted_usuario`,`tbmesas`.`id_mesa` AS `id_mesa`,`tbmesas`.`qtde_pessoas` AS `qtde_pessoas`,`tbmesas`.`deleted_mesas` AS `deleted_mesas`,`tbmesas`.`status_mesa` AS `status_mesa`,`tblig_mesa`.`id_lig_mesa` AS `id_lig_mesa`,`tblig_mesa`.`id_mesa_fk` AS `id_mesa_fk`,`tblig_mesa`.`id_reserva_fk` AS `id_reserva_fk` from (((((`tbmesas` join `tblig_mesa` on(`tbmesas`.`id_mesa` = `tblig_mesa`.`id_mesa_fk`)) join `tbreservas` on(`tblig_mesa`.`id_reserva_fk` = `tbreservas`.`id_reserva`)) join `tbpedidoreservas` on(`tbreservas`.`id_reserva` = `tbpedidoreservas`.`id_pedido_reservas`)) join `tbclientes` on(`tbpedidoreservas`.`id_pedido_reservas` = `tbclientes`.`id_cliente`)) join `tbusuarios` on(`tbclientes`.`id_cliente` = `tbusuarios`.`id_usuario`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-17  6:43:28
