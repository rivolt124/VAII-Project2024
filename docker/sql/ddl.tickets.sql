SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets`
(
    `id`            INT             NOT NULL AUTO_INCREMENT,
    `ticket_number` INT(4)          NOT NULL,
    `flight_number` varchar(6)      NOT NULL,
    `passenger_id`  INT             NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `ticket_number_unique` (`ticket_number`),
    CONSTRAINT `fk_ticket_flight` FOREIGN KEY (`flight_number`) REFERENCES `flights` (`flight_number`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_passenger` FOREIGN KEY (`passenger_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `tickets` (`ticket_number`, `flight_number`, `passenger_id`)
VALUES
    (1002, 'LH102', 2),
    (1003, 'AF203', 3),
    (1004, 'EK104', 2),
    (1005, 'SQ105', 2);