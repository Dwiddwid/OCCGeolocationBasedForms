-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema occ
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema occ
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `occ` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `occ` ;

-- -----------------------------------------------------
-- Table `occ`.`Address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ`.`Address` (
  `addressID` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `street` VARCHAR(45) NULL COMMENT '',
  `city` VARCHAR(40) NULL DEFAULT NULL COMMENT '',
  `zip` VARCHAR(5) NULL DEFAULT NULL COMMENT '',
  `state` VARCHAR(2) NOT NULL DEFAULT '00' COMMENT '',
  `mailing` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  UNIQUE INDEX `addressID_UNIQUE` (`addressID` ASC)  COMMENT '',
  PRIMARY KEY (`street`, `city`, `zip`, `state`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `occ`.`PhoneEmailIdentifier`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ`.`PhoneEmailIdentifier` (
  `phoneEmailID` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `phoneNumber` VARCHAR(10) NOT NULL DEFAULT 0 COMMENT '',
  `emailAddress` VARCHAR(45) NOT NULL DEFAULT 0 COMMENT '',
  PRIMARY KEY (`phoneNumber`, `emailAddress`)  COMMENT '',
  UNIQUE INDEX `phoneEmailID_UNIQUE` (`phoneEmailID` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `occ`.`Organization`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ`.`Organization` (
  `organizationID` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `officialName` VARCHAR(31) NOT NULL COMMENT '',
  `addressID` INT UNSIGNED NOT NULL COMMENT '',
  `phoneEmailID` INT UNSIGNED NULL COMMENT '',
  `hours` VARCHAR(45) NULL COMMENT '',
  `website` VARCHAR(45) NULL COMMENT '',
  `church` TINYINT(1) NULL COMMENT '',
  PRIMARY KEY (`officialName`, `addressID`)  COMMENT '',
  UNIQUE INDEX `churchID_UNIQUE` (`organizationID` ASC)  COMMENT '',
  INDEX `organization_addressFK_idx` (`addressID` ASC)  COMMENT '',
  INDEX `organization_phoneEmailFK_idx` (`phoneEmailID` ASC)  COMMENT '',
  CONSTRAINT `organization_addressFK`
    FOREIGN KEY (`addressID`)
    REFERENCES `occ`.`Address` (`addressID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `organization_phoneEmailFK`
    FOREIGN KEY (`phoneEmailID`)
    REFERENCES `occ`.`PhoneEmailIdentifier` (`phoneEmailID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `occ`.`Person`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ`.`Person` (
  `personID` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `firstName` VARCHAR(45) NOT NULL COMMENT '',
  `middleName` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '',
  `lastName` VARCHAR(45) NOT NULL COMMENT '',
  `suffix` VARCHAR(45) NULL DEFAULT '' COMMENT '',
  `addressID` INT UNSIGNED NULL DEFAULT 0 COMMENT '',
  `phoneEmailID` INT UNSIGNED NOT NULL COMMENT '',
  PRIMARY KEY (`firstName`, `middleName`, `lastName`, `phoneEmailID`)  COMMENT '',
  INDEX `person_addressFK_idx` (`addressID` ASC)  COMMENT '',
  UNIQUE INDEX `personID_UNIQUE` (`personID` ASC)  COMMENT '',
  INDEX `person_phoneEmailIdentifierID_idx` (`phoneEmailID` ASC)  COMMENT '',
  CONSTRAINT `person_addressFK`
    FOREIGN KEY (`addressID`)
    REFERENCES `occ`.`Address` (`addressID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `person_phoneEmailIdentifierID`
    FOREIGN KEY (`phoneEmailID`)
    REFERENCES `occ`.`PhoneEmailIdentifier` (`phoneEmailID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `occ`.`Pastor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ`.`Pastor` (
  `personID` INT UNSIGNED NOT NULL COMMENT '',
  `organizationID` INT UNSIGNED NOT NULL COMMENT '',
  `position` TEXT(45) NULL COMMENT '',
  PRIMARY KEY (`personID`, `organizationID`)  COMMENT '',
  INDEX `personID_idx` (`personID` ASC)  COMMENT '',
  INDEX `pastor_organizationFK_idx` (`organizationID` ASC)  COMMENT '',
  CONSTRAINT `pastor_personFK`
    FOREIGN KEY (`personID`)
    REFERENCES `occ`.`Person` (`personID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `pastor_organizationFK`
    FOREIGN KEY (`organizationID`)
    REFERENCES `occ`.`Organization` (`organizationID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `occ`.`ProjectLeader`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ`.`ProjectLeader` (
  `leaderID` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `personID` INT UNSIGNED NOT NULL COMMENT '',
  `orgainzationID` INT UNSIGNED NOT NULL COMMENT '',
  `startdate` DATE NOT NULL COMMENT '',
  `enddate` DATE NULL COMMENT '',
  INDEX `personFK_idx` (`personID` ASC)  COMMENT '',
  INDEX `organizationFK_idx` (`orgainzationID` ASC)  COMMENT '',
  PRIMARY KEY (`personID`, `orgainzationID`, `startdate`)  COMMENT '',
  UNIQUE INDEX `leaderID_UNIQUE` (`leaderID` ASC)  COMMENT '',
  CONSTRAINT `project_personFK`
    FOREIGN KEY (`personID`)
    REFERENCES `occ`.`Person` (`personID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `organizationFK`
    FOREIGN KEY (`orgainzationID`)
    REFERENCES `occ`.`Organization` (`organizationID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `occ`.`DropOffLocation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ`.`DropOffLocation` (
  `locationID` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `organizationID` INT UNSIGNED NOT NULL COMMENT '',
  PRIMARY KEY (`locationID`)  COMMENT '',
  CONSTRAINT `dropOffLocation_organizationFK`
    FOREIGN KEY (`organizationID`)
    REFERENCES `occ`.`Organization` (`organizationID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `occ`.`DropOff`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ`.`DropOff` (
  `dropOffID` INT UNSIGNED NOT NULL COMMENT '',
  `personID` INT UNSIGNED NULL COMMENT '',
  `organizationID` INT UNSIGNED NULL COMMENT '',
  `locationID` INT UNSIGNED NOT NULL COMMENT '',
  `boxes` INT NOT NULL COMMENT '',
  `time` DATETIME NOT NULL COMMENT '',
  PRIMARY KEY (`dropOffID`)  COMMENT '',
  INDEX `personID_idx` (`personID` ASC)  COMMENT '',
  INDEX `dropOff_locationFK_idx` (`locationID` ASC)  COMMENT '',
  INDEX `dropOff_locationFK_idx1` (`organizationID` ASC)  COMMENT '',
  CONSTRAINT `dropOff_personFK`
    FOREIGN KEY (`personID`)
    REFERENCES `occ`.`Person` (`personID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `dropOff_locationFK`
    FOREIGN KEY (`locationID`)
    REFERENCES `occ`.`DropOffLocation` (`locationID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `dropOff_organizationFK`
    FOREIGN KEY (`organizationID`)
    REFERENCES `occ`.`Organization` (`organizationID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `occ`.`Team`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ`.`Team` (
  `teamID` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `area` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`teamID`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `occ`.`Volunteer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ`.`Volunteer` (
  `userName` VARCHAR(20) NOT NULL COMMENT '',
  `personID` INT UNSIGNED NOT NULL COMMENT '',
  `password` VARCHAR(45) NOT NULL COMMENT '',
  `position` VARCHAR(20) NOT NULL COMMENT '',
  `teamID` INT UNSIGNED NOT NULL COMMENT '',
  PRIMARY KEY (`userName`)  COMMENT '',
  INDEX `personID_idx` (`personID` ASC)  COMMENT '',
  UNIQUE INDEX `personID_UNIQUE` (`personID` ASC)  COMMENT '',
  INDEX `volunteer_teamFK_idx` (`teamID` ASC)  COMMENT '',
  CONSTRAINT `personID`
    FOREIGN KEY (`personID`)
    REFERENCES `occ`.`Person` (`personID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `volunteer_teamFK`
    FOREIGN KEY (`teamID`)
    REFERENCES `occ`.`Team` (`teamID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `occ`.`VolunteerTime`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ`.`VolunteerTime` (
  `startTime` DATETIME NOT NULL COMMENT '',
  `personID` INT UNSIGNED NOT NULL COMMENT '',
  `endTime` DATETIME NOT NULL COMMENT '',
  `locationID` INT UNSIGNED NOT NULL COMMENT '',
  PRIMARY KEY (`personID`, `startTime`)  COMMENT '',
  INDEX `volunteerTime_locationFK_idx` (`locationID` ASC)  COMMENT '',
  CONSTRAINT `volunteerTime_locationFK`
    FOREIGN KEY (`locationID`)
    REFERENCES `occ`.`DropOffLocation` (`locationID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `volunteerTime_personFK`
    FOREIGN KEY (`personID`)
    REFERENCES `occ`.`Person` (`personID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `occ`.`Event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ`.`Event` (
  `eventID` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(45) NOT NULL COMMENT '',
  `description` LONGTEXT NULL COMMENT '',
  `date` DATE NOT NULL COMMENT '',
  `startTime` TIME NOT NULL COMMENT '',
  `endTime` TIME NOT NULL COMMENT '',
  `Location` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`eventID`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `occ`.`EventAttendee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ`.`EventAttendee` (
  `eventID` INT UNSIGNED NOT NULL COMMENT '',
  `personID` INT UNSIGNED NOT NULL COMMENT '',
  PRIMARY KEY (`eventID`, `personID`)  COMMENT '',
  INDEX `eventAttendee_personFK_idx` (`personID` ASC)  COMMENT '',
  CONSTRAINT `event_eventAttendeeFK`
    FOREIGN KEY (`eventID`)
    REFERENCES `occ`.`Event` (`eventID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `eventAttendee_personFK`
    FOREIGN KEY (`personID`)
    REFERENCES `occ`.`Person` (`personID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
