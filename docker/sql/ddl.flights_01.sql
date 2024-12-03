SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `flights`;
CREATE TABLE `flights`
(
    `flight_number` varchar(6)      NOT NULL,
    `origin`        varchar(20)     NOT NULL,
    `destination`   varchar(20)     DEFAULT NULL,
    PRIMARY KEY (`flight_number`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `flights` (`flight_number`, `origin`, `destination`)
VALUES ('LS497', 'LEEDS', 'VIENNA'),
       ('OS373', 'VIENNA', 'AMSTERDAM'),
       ('TK1723', 'ISTANBUL', 'BERLIN');