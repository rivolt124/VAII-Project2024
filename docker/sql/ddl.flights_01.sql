SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `flights`;
CREATE TABLE `flights`
(
    `id`            INT             NOT NULL AUTO_INCREMENT,
    `flight_number` varchar(6)      NOT NULL,
    `origin`        varchar(20)     NOT NULL,
    `destination`   varchar(20)     DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `flight_number_unique` (`flight_number`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `flights` (`flight_number`, `origin`, `destination`)
VALUES ('BA456', 'LONDON', 'PARIS'),
       ('LH789', 'FRANKFURT', 'ROME'),
       ('AF123', 'PARIS', 'NEW YORK'),
       ('EK900', 'DUBAI', 'TOKYO'),
       ('SQ456', 'SINGAPORE', 'SYDNEY'),
       ('AA789', 'DALLAS', 'CHICAGO'),
       ('QF100', 'SYDNEY', 'LOS ANGELES'),
       ('CX200', 'HONG KONG', 'SAN FRANCISCO'),
       ('DL345', 'ATLANTA', 'MIAMI'),
       ('UA678', 'DENVER', 'LAS VEGAS'),
       ('NZ890', 'AUCKLAND', 'SINGAPORE'),
       ('LS497', 'LEEDS', 'VIENNA'),
       ('OS373', 'VIENNA', 'AMSTERDAM'),
       ('TK1723', 'ISTANBUL', 'BERLIN');
