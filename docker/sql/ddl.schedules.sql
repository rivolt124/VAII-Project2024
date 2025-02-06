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
    `date`          date                NOT NULL DEFAULT '0000-00-00',
    PRIMARY KEY (`id`),
    UNIQUE KEY `flight_date_unique` (`flight_number`, `date`),
    CONSTRAINT `fk_flight_number` FOREIGN KEY (`flight_number`) REFERENCES `flights` (`flight_number`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `schedules` (`flight_number`, `date`)
VALUES
    ('BA101', '2025-02-20'),
    ('LH102', '2025-02-20'),
    ('AF203', '2025-02-21'),
    ('EK104', '2025-02-21'),
    ('SQ105', '2025-02-22'),
    ('AA206', '2025-02-22'),
    ('QF207', '2025-02-23'),
    ('CX208', '2025-02-23'),
    ('DL209', '2025-02-24'),
    ('UA210', '2025-02-24'),
    ('NZ211', '2025-02-25'),
    ('LS212', '2025-02-25'),
    ('OS213', '2025-02-26'),
    ('TK214', '2025-02-26'),
    ('BA301', '2025-02-27'),
    ('LH302', '2025-02-27'),
    ('AF303', '2025-02-28'),
    ('EK304', '2025-02-28');
