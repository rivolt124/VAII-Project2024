SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets`
(
    `id`            INT             NOT NULL AUTO_INCREMENT,
    `ticket_number` INT             NOT NULL,
    `flight_number` varchar(6)      NOT NULL,
    `passport_id`   INT             NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `ticket_number_unique` (`ticket_number`),
    CONSTRAINT `fk_ticket_flight`
        FOREIGN KEY (`flight_number`)
            REFERENCES `flights` (`flight_number`)
            ON DELETE CASCADE,
    CONSTRAINT `fk_ticket_passenger`
        FOREIGN KEY (`passport_id`)
            REFERENCES `passengers` (`PASSPORT_ID`)
            ON DELETE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `tickets` (`ticket_number`, `flight_number`, `passport_id`)
VALUES (101, 'BA456', 12345678),
       (102, 'LH789', 87654321),
       (103, 'AF123', 11223344),
       (104, 'EK900', 99887766),
       (105, 'SQ456', 22334455);