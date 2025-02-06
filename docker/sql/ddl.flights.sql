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
    `origin`        CHAR(3)         NOT NULL,
    `destination`   CHAR(3)         DEFAULT NULL,
    `airplane`      VARCHAR(10)     DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `flight_number_unique` (`flight_number`),
    CONSTRAINT `fk_origin` FOREIGN KEY (`origin`) REFERENCES `airports` (`IATA`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_destination` FOREIGN KEY (`destination`) REFERENCES `airports` (`IATA`) ON UPDATE CASCADE,
    CONSTRAINT `fk_airplane` FOREIGN KEY (`airplane`) REFERENCES `airplanes` (`registration`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `flights` (`flight_number`, `origin`, `destination`, `airplane`)
VALUES
    ('BA101', 'LHR', 'JFK', 'BGA113Y'),
    ('LH102', 'FRA', 'ORD','UAE34Y'),
    ('AF203', 'CDG', 'LAX','E10E3'),
    ('EK104', 'DXB', 'SIN','NJE478E'),
    ('SQ105', 'SIN', 'SYD','KLM37M'),
    ('AA206', 'DFW', 'LAX','UAE33T'),
    ('QF207', 'SYD', 'LHR','AFR194'),
    ('CX208', 'HKG', 'CDG','SXS2FC'),
    ('DL209', 'ATL', 'JFK', 'CCA720'),
    ('UA210', 'SFO', 'SVO', 'ITY159'),
    ('NZ211', 'MUC', 'AAL', 'BAW198'),
    ('LS212', 'AMS', 'LIS', 'QTR780'),
    ('OS213', 'ZRH', 'WAW', 'OYA5545'),
    ('TK214', 'IST', 'AMS', 'KLM37M'),
    ('BA301', 'LHR', 'SFO', 'BGA113Y'),
    ('LH302', 'FRA', 'HKG', 'ITY159'),
    ('AF303', 'CDG', 'SYD', 'E10E3'),
    ('EK304', 'DXB', 'JFK', 'KLM37M');
