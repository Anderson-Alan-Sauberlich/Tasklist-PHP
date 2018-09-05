-- MySQL Script generated by MySQL Workbench
-- qua 05 set 2018 10:46:45 -03
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema DB_TASKLIST
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema DB_TASKLIST
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `DB_TASKLIST` ;
USE `DB_TASKLIST` ;

-- -----------------------------------------------------
-- Table `DB_TASKLIST`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_TASKLIST`.`status` (
  `status_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`status_id`),
  UNIQUE INDEX `status_id_UNIQUE` (`status_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_TASKLIST`.`task`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_TASKLIST`.`task` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `status_id` INT UNSIGNED NOT NULL,
  `title` VARCHAR(45) NOT NULL,
  `description` VARCHAR(100) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `deleted_at` DATETIME NULL,
  `finished_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_tsk_sts_idx` (`status_id` ASC),
  CONSTRAINT `fk_tsk_sts_idx`
    FOREIGN KEY (`status_id`)
    REFERENCES `DB_TASKLIST`.`status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `DB_TASKLIST`.`status`
-- -----------------------------------------------------
START TRANSACTION;
USE `DB_TASKLIST`;
INSERT INTO `DB_TASKLIST`.`status` (`status_id`, `description`) VALUES (1, 'Created');
INSERT INTO `DB_TASKLIST`.`status` (`status_id`, `description`) VALUES (2, 'Finished');
INSERT INTO `DB_TASKLIST`.`status` (`status_id`, `description`) VALUES (4, 'Deleted');

COMMIT;

