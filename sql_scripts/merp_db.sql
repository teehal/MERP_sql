-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema merp
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema merp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `merp` DEFAULT CHARACTER SET utf8 ;
USE `merp` ;

-- -----------------------------------------------------
-- Table `merp`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `merp`.`user` (
  `username` VARCHAR(32) NOT NULL,
  `email` VARCHAR(254) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `is_admin` TINYINT NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `merp`.`combat_scenario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `merp`.`combat_scenario` (
  `scenario_id` INT NOT NULL AUTO_INCREMENT,
  `scenario_name` VARCHAR(45) NOT NULL,
  `description` LONGTEXT NOT NULL,
  `owner_id` INT NULL,
  PRIMARY KEY (`scenario_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `merp`.`npc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `merp`.`npc` (
  `name` VARCHAR(60) NOT NULL,
  `class` VARCHAR(24) NOT NULL,
  `level` INT NOT NULL,
  `race` VARCHAR(18) NOT NULL,
  `owner_id` INT NULL,
  `npc_id` INT NOT NULL AUTO_INCREMENT,
  `background` LONGTEXT NULL,
  `scenario_id` INT NULL,
  `defensive_bonus` INT NOT NULL,
  `hit_points` INT NOT NULL,
  `offensive_primary` INT NOT NULL,
  `offensive_secondary` INT NULL,
  `primary_weapon` VARCHAR(45) NOT NULL,
  `secondary_weapon` VARCHAR(45) NULL,
  `shield` TINYINT NULL,
  `helmet` TINYINT NULL,
  `arm_armor` TINYINT NULL,
  `leg_armor` TINYINT NULL,
  `armor` VARCHAR(45) NULL,
  PRIMARY KEY (`npc_id`),
  INDEX `npc_fk_idx` (`owner_id` ASC),
  INDEX `npc_fk_2_idx` (`scenario_id` ASC),
  CONSTRAINT `npc_fk`
    FOREIGN KEY (`owner_id`)
    REFERENCES `merp`.`user` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `npc_fk_2`
    FOREIGN KEY (`scenario_id`)
    REFERENCES `merp`.`combat_scenario` (`scenario_id`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE USER 'merpuser' IDENTIFIED BY 'merpuser';

GRANT ALL ON `merp`.* TO 'merpuser';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
