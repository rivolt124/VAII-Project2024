SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `airports`;
CREATE TABLE `airports`
(
    `id`            INT             NOT NULL AUTO_INCREMENT,
    `IATA`          char(3)         DEFAULT NULL,
    `airport_name`  varchar(20)     NOT NULL,
    `country`       char(2)         NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `IATA_unique` (`IATA`),
    UNIQUE KEY `airport_name_unique` (`airport_name`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `airports` (`IATA`, `airport_name`, `country`)
VALUES ('LHR', 'Heathrow', 'GB'),
       ('CDG', 'Charles de Gaulle', 'FR'),
       ('FRA', 'Frankfurt', 'DE'),
       ('DXB', 'Dubai International', 'AE'),
       ('SYD', 'Sydney', 'AU');