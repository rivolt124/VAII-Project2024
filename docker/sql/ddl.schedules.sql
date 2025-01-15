SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE `schedules`
(
    `id`            INT                 NOT NULL AUTO_INCREMENT,
    `flight_number` varchar(6)          NOT NULL,
    `date`          date                NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `flight_date_unique` (`flight_number`, `date`),
    CONSTRAINT `fk_flight_number` FOREIGN KEY (`flight_number`) REFERENCES `flights` (`flight_number`) ON DELETE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

