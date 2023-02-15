-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema ti93phpdb01
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ti93phpdb01
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ti93phpdb01` DEFAULT CHARACTER SET utf8 ;
USE `ti93phpdb01` ;

-- -----------------------------------------------------
-- Table `ti93phpdb01`.`tbmesas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ti93phpdb01`.`tbmesas` (
  `idmesa` INT(11) NOT NULL,
  `qtde_pessoas` VARCHAR(45) NOT NULL,
  `status` ENUM('Disponível', 'Indisponível') NOT NULL,
  PRIMARY KEY (`idmesa`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ti93phpdb01`.`tbpedidoreservas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ti93phpdb01`.`tbpedidoreservas` (
  `idpedidoReservas` INT(11) NOT NULL,
  `id_cliente_fk` INT(11) NOT NULL,
  PRIMARY KEY (`idpedidoReservas`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ti93phpdb01`.`tbtipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ti93phpdb01`.`tbtipos` (
  `id_tipo` INT(11) NOT NULL AUTO_INCREMENT,
  `sigla_tipo` VARCHAR(3) NOT NULL,
  `rotulo_tipo` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_tipo`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ti93phpdb01`.`tbprodutos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ti93phpdb01`.`tbprodutos` (
  `id_produto` INT(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_produto` INT(11) NOT NULL,
  `descri_produto` VARCHAR(100) NOT NULL,
  `resumo_produto` VARCHAR(1000) NULL DEFAULT NULL,
  `valor_produto` DECIMAL(9,2) NULL DEFAULT NULL,
  `imagem_produto` VARCHAR(50) NULL DEFAULT NULL,
  `destaque_produto` ENUM('Sim', 'Não') NOT NULL,
  PRIMARY KEY (`id_produto`),
  INDEX `id_tipo_produto_fk` (`id_tipo_produto` ASC) VISIBLE,
  CONSTRAINT `id_tipo_produto_fk`
    FOREIGN KEY (`id_tipo_produto`)
    REFERENCES `ti93phpdb01`.`tbtipos` (`id_tipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 31
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ti93phpdb01`.`tbreservas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ti93phpdb01`.`tbreservas` (
  `idreservas` INT(11) NOT NULL,
  `status` ENUM('Confirmado', 'Expirado') NOT NULL,
  `id_mesas_fk` INT(11) NOT NULL,
  `id_pedido_fk` INT(11) NOT NULL,
  PRIMARY KEY (`idreservas`),
  INDEX `id_mesas_fk` (`id_mesas_fk` ASC) VISIBLE,
  INDEX `id_pedido_fk` (`id_pedido_fk` ASC) VISIBLE,
  CONSTRAINT `id_mesas_fk`
    FOREIGN KEY (`id_mesas_fk`)
    REFERENCES `ti93phpdb01`.`tbmesas` (`idmesa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_pedido_fk`
    FOREIGN KEY (`id_pedido_fk`)
    REFERENCES `ti93phpdb01`.`tbpedidoreservas` (`idpedidoReservas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ti93phpdb01`.`tbusuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ti93phpdb01`.`tbusuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `login_usuario` VARCHAR(30) NOT NULL,
  `senha_usuario` VARCHAR(32) NULL DEFAULT NULL,
  `nivel_usuario` ENUM('sup', 'com', 'cli') NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `login_usuario_uniq` (`login_usuario` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8;

USE `ti93phpdb01` ;

-- -----------------------------------------------------
-- Placeholder table for view `ti93phpdb01`.`vw_tbprodutos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ti93phpdb01`.`vw_tbprodutos` (`id_produto` INT, `id_tipo_produto` INT, `sigla_tipo` INT, `rotulo_tipo` INT, `descri_produto` INT, `resumo_produto` INT, `valor_produto` INT, `imagem_produto` INT, `destaque_produto` INT);

-- -----------------------------------------------------
-- View `ti93phpdb01`.`vw_tbprodutos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ti93phpdb01`.`vw_tbprodutos`;
USE `ti93phpdb01`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ti93phpdb01`.`vw_tbprodutos` AS select `p`.`id_produto` AS `id_produto`,`p`.`id_tipo_produto` AS `id_tipo_produto`,`t`.`sigla_tipo` AS `sigla_tipo`,`t`.`rotulo_tipo` AS `rotulo_tipo`,`p`.`descri_produto` AS `descri_produto`,`p`.`resumo_produto` AS `resumo_produto`,`p`.`valor_produto` AS `valor_produto`,`p`.`imagem_produto` AS `imagem_produto`,`p`.`destaque_produto` AS `destaque_produto` from (`ti93phpdb01`.`tbprodutos` `p` join `ti93phpdb01`.`tbtipos` `t`) where `p`.`id_tipo_produto` = `t`.`id_tipo`;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
