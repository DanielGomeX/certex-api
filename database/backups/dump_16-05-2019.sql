-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema certexapi
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema certexapi
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `certexapi` DEFAULT CHARACTER SET utf8 ;
USE `certexapi` ;

-- -----------------------------------------------------
-- Table `certexapi`.`states`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`states` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `uf` VARCHAR(2) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `certexapi`.`cities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`cities` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(70) NOT NULL,
  `states_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cities_states_idx` (`states_id` ASC),
  CONSTRAINT `fk_cities_states`
    FOREIGN KEY (`states_id`)
    REFERENCES `certexapi`.`states` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `certexapi`.`companies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`companies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cnpj` VARCHAR(45) NOT NULL,
  `state_registration` VARCHAR(45) NOT NULL,
  `social_name` VARCHAR(45) NULL,
  `fantasy_name` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `cep` VARCHAR(45) NULL,
  `complement` VARCHAR(45) NULL,
  `neighborhood` VARCHAR(45) NULL,
  `signature` TEXT NULL,
  `cities_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_companies_cities1_idx` (`cities_id` ASC),
  CONSTRAINT `fk_companies_cities1`
    FOREIGN KEY (`cities_id`)
    REFERENCES `certexapi`.`cities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'The contractor of we software.';


-- -----------------------------------------------------
-- Table `certexapi`.`access_levels`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`access_levels` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `certexapi`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(100) NULL,
  `companies_id` INT NOT NULL,
  `access_levels_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_companies1_idx` (`companies_id` ASC),
  INDEX `fk_users_access_levels1_idx` (`access_levels_id` ASC),
  CONSTRAINT `fk_users_companies1`
    FOREIGN KEY (`companies_id`)
    REFERENCES `certexapi`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_access_levels1`
    FOREIGN KEY (`access_levels_id`)
    REFERENCES `certexapi`.`access_levels` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `certexapi`.`responsibilities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`responsibilities` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `certexapi`.`users_has_responsibilities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`users_has_responsibilities` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `users_id` INT NOT NULL,
  `responsibilities_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_has_responsibilities_responsibilities1_idx` (`responsibilities_id` ASC),
  INDEX `fk_users_has_responsibilities_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_users_has_responsibilities_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `certexapi`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_responsibilities_responsibilities1`
    FOREIGN KEY (`responsibilities_id`)
    REFERENCES `certexapi`.`responsibilities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `certexapi`.`manufacturers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`manufacturers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(45) NULL,
  `cities_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_manufacturers_cities1_idx` (`cities_id` ASC),
  CONSTRAINT `fk_manufacturers_cities1`
    FOREIGN KEY (`cities_id`)
    REFERENCES `certexapi`.`cities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `certexapi`.`extinguishers_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`extinguishers_status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'Options about situation of extinguishers';


-- -----------------------------------------------------
-- Table `certexapi`.`extinguishers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`extinguishers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(50) NULL,
  `numeration` VARCHAR(45) NULL,
  `capacity` VARCHAR(45) NULL,
  `charge` VARCHAR(45) NULL,
  `charge_date` DATETIME NULL,
  `validate_date` DATETIME NULL,
  `location` TEXT NULL,
  `manufacturers_id` INT NOT NULL,
  `extinguishers_status_id` INT NOT NULL,
  `companies_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_extinguishers_manufacturers1_idx` (`manufacturers_id` ASC),
  INDEX `fk_extinguishers_extinguishers_status1_idx` (`extinguishers_status_id` ASC),
  INDEX `fk_extinguishers_companies1_idx` (`companies_id` ASC),
  CONSTRAINT `fk_extinguishers_manufacturers1`
    FOREIGN KEY (`manufacturers_id`)
    REFERENCES `certexapi`.`manufacturers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_extinguishers_extinguishers_status1`
    FOREIGN KEY (`extinguishers_status_id`)
    REFERENCES `certexapi`.`extinguishers_status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_extinguishers_companies1`
    FOREIGN KEY (`companies_id`)
    REFERENCES `certexapi`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `certexapi`.`extinguishers_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`extinguishers_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'https://conect.online/blog/descubra-os-principais-tipos-de-e' /* comment truncated */ /*xtintores-de-incendio-e-suas-diferencas/*/;


-- -----------------------------------------------------
-- Table `certexapi`.`extinguishers_has_extinguishers_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`extinguishers_has_extinguishers_types` (
  `extinguishers_id` INT NOT NULL,
  `extinguishers_types_id` INT NOT NULL,
  PRIMARY KEY (`extinguishers_id`, `extinguishers_types_id`),
  INDEX `fk_extinguishers_has_extinguishers_types_extinguishers_type_idx` (`extinguishers_types_id` ASC),
  INDEX `fk_extinguishers_has_extinguishers_types_extinguishers1_idx` (`extinguishers_id` ASC),
  CONSTRAINT `fk_extinguishers_has_extinguishers_types_extinguishers1`
    FOREIGN KEY (`extinguishers_id`)
    REFERENCES `certexapi`.`extinguishers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_extinguishers_has_extinguishers_types_extinguishers_types1`
    FOREIGN KEY (`extinguishers_types_id`)
    REFERENCES `certexapi`.`extinguishers_types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `certexapi`.`questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`questions` (
  `id` INT NOT NULL,
  `question` TEXT NOT NULL,
  `active` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'Questions to make a checklist.';


-- -----------------------------------------------------
-- Table `certexapi`.`alternatives`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`alternatives` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `alternative` TEXT NOT NULL,
  `active` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'Alternatives to questions. Example' /* comment truncated */ /*
The extinctor are not opened? (question)
Yes (alterntive)
No (alternative)*/;


-- -----------------------------------------------------
-- Table `certexapi`.`questions_has_alternatives`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`questions_has_alternatives` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `questions_id` INT NOT NULL,
  `alternatives_id` INT NOT NULL,
  INDEX `fk_questions_has_alternatives_alternatives1_idx` (`alternatives_id` ASC),
  INDEX `fk_questions_has_alternatives_questions1_idx` (`questions_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_questions_has_alternatives_questions1`
    FOREIGN KEY (`questions_id`)
    REFERENCES `certexapi`.`questions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_questions_has_alternatives_alternatives1`
    FOREIGN KEY (`alternatives_id`)
    REFERENCES `certexapi`.`alternatives` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `certexapi`.`certifications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`certifications` (
  `id` INT NOT NULL,
  `report_code` VARCHAR(45) NULL,
  `signature` TEXT NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_certifications_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_certifications_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `certexapi`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `certexapi`.`checklist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `certexapi`.`checklist` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` TEXT NULL,
  `photo` TEXT NULL,
  `active` TINYINT(1) NULL,
  `alternatives_id` INT NOT NULL,
  `questions_id` INT NOT NULL,
  `extinguishers_id` INT NOT NULL,
  `certifications_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_answers_questions1_idx` (`questions_id` ASC),
  INDEX `fk_answers_alternatives1_idx` (`alternatives_id` ASC),
  INDEX `fk_checklist_extinguishers1_idx` (`extinguishers_id` ASC),
  INDEX `fk_checklist_certifications1_idx` (`certifications_id` ASC),
  CONSTRAINT `fk_answers_questions1`
    FOREIGN KEY (`questions_id`)
    REFERENCES `certexapi`.`questions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_answers_alternatives1`
    FOREIGN KEY (`alternatives_id`)
    REFERENCES `certexapi`.`alternatives` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_checklist_extinguishers1`
    FOREIGN KEY (`extinguishers_id`)
    REFERENCES `certexapi`.`extinguishers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_checklist_certifications1`
    FOREIGN KEY (`certifications_id`)
    REFERENCES `certexapi`.`certifications` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'anwser about the questions';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
