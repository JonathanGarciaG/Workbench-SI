-- MySQL Script generated by MySQL Workbench
-- 06/02/18 15:54:05
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema pedidos_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pedidos_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pedidos_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `pedidos_db` ;

-- -----------------------------------------------------
-- Table `pedidos_db`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedidos_db`.`clientes` (
  `nif` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  PRIMARY KEY (`nif`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedidos_db`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedidos_db`.`pedidos` (
  `numero` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NULL,
  `cliente` INT NULL,
  `producto` INT NULL,
  `cantidad` INT NULL,
  `clientes_nif` INT NOT NULL,
  PRIMARY KEY (`numero`, `clientes_nif`),
  INDEX `fk_pedidos_clientes_idx` (`clientes_nif` ASC),
  CONSTRAINT `fk_pedidos_clientes`
    FOREIGN KEY (`clientes_nif`)
    REFERENCES `pedidos_db`.`clientes` (`nif`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedidos_db`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedidos_db`.`productos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `precio` DECIMAL(20) NULL,
  `descripcion` VARCHAR(45) NULL,
  `pedidos_numero` INT NOT NULL,
  `pedidos_clientes_nif` INT NOT NULL,
  PRIMARY KEY (`id`, `pedidos_numero`, `pedidos_clientes_nif`),
  INDEX `fk_productos_pedidos1_idx` (`pedidos_numero` ASC, `pedidos_clientes_nif` ASC),
  CONSTRAINT `fk_productos_pedidos1`
    FOREIGN KEY (`pedidos_numero` , `pedidos_clientes_nif`)
    REFERENCES `pedidos_db`.`pedidos` (`numero` , `clientes_nif`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
