-- MariaDB dump 10.19  Distrib 10.4.25-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ti93phpdb01
-- ------------------------------------------------------
-- Server version	10.4.25-MariaDB

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
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientes`
--

LOCK TABLES `tbclientes` WRITE;
/*!40000 ALTER TABLE `tbclientes` DISABLE KEYS */;
INSERT INTO `tbclientes` VALUES (2,'sajslk@jhagsj.com','8c10a02a0928511c460bd65e9ec59d0a','12345678909'),(3,'maumau','123@gmail.com','12345678909'),(4,'bbb','bbb','42348732'),(7,'sdasdasdsa','senacdsada@sakjs.com','378624873264878'),(8,'dsfoksdpo','dpslfp@sdgya.com','d237983279'),(9,'klakjjdksska','gois12@gmail.com','12342312334'),(10,'Henrique Rojo','hen@gmail.com','12345678909'),(11,'Henrique Rojo a','hen@gmail.com12','1234567890922'),(12,'henrique duarte rojo','henriquerojo10@gmail','45555555555555555555555555555555');
/*!40000 ALTER TABLE `tbclientes` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpedidoreservas`
--

LOCK TABLES `tbpedidoreservas` WRITE;
/*!40000 ALTER TABLE `tbpedidoreservas` DISABLE KEYS */;
INSERT INTO `tbpedidoreservas` VALUES (2,12,'2023-02-16 22:58:00','Enviado',9),(3,12,'2023-02-18 16:01:00','Enviado',11);
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
  `mesa` varchar(45) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuarios`
--

LOCK TABLES `tbusuarios` WRITE;
/*!40000 ALTER TABLE `tbusuarios` DISABLE KEYS */;
INSERT INTO `tbusuarios` VALUES (1,'senac','81dc9bdb52d04dc20036dbd8313ed055','sup',NULL),(2,'joao','81dc9bdb52d04dc20036dbd8313ed055','com',NULL),(4,'Maurício','250cf8b51c773f3f8dc8b4be867a9a02','sup',NULL),(12,'Prova','81dc9bdb52d04dc20036dbd8313ed055','com',NULL),(25,'12342312334','e09c80c42fda55f9d992e59ca6b3307d','com',NULL);
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-17 16:42:53
